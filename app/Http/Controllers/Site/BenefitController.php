<?php

namespace App\Http\Controllers\Site;

use App\Models\Benefit;
use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BenefitController
{
    /**
     * Index page.
     */
    public function index(Request $request): View
    {
        return view('site.benefit.index', [
            'provinces' => Province::enabled()->pluck('name', 'id'),
            'cities' => City::enabled()
                ->when(
                    $request->has('province_id'),
                    fn ($query) => $query->where('province_id', $request->get('province_id'))
                )
                ->pluck('name', 'id'),
            'benefits' => $this->searchBenefitsFromRequest($request)->paginate(),
        ]);
    }

    /**
     * Show benefit page.
     *
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function show(Benefit $benefit): View
    {
        if ($benefit->isNotEnabled()) {
            abort(404);
        }

        return view('site.benefit.show', ['benefit' => $benefit]);
    }

    /**
     * Search the benefits from the given request.
     */
    private function searchBenefitsFromRequest(Request $request): Builder
    {
        $benefits = Benefit::enabled();

        $benefits->whereHas(
            'company',
            fn (Builder $query) => $query
                ->when(
                    $request->has('province_id'),
                    fn ($query) => $query->where('province_id', $request->get('province_id'))
                )
                ->when(
                    $request->has('city_id'),
                    fn ($query) => $query->where('city_id', $request->get('city_id'))
                )
        );

        $benefits->when(
            $request->has('search'),
            fn ($query) => $query
                ->whereHas(
                    'company',
                    fn ($query) => $query->where('name', 'LIKE', '%' . $request->get('search') . '%')
                )
                ->orWhere('name', 'LIKE', '%' . $request->get('search') . '%')
        );

        return $benefits;
    }
}
