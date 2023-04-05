<?php

namespace App\Nova;

use App\Models;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\MorphTo;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Plasticoin extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Plasticoin>
     */
    public static $model = \App\Models\Plasticoin::class;

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = ['user.name'];

    /**
     * The relationships that should be eager loaded when performing an index query.
     *
     * @var array
     */
    public static $with = ['user', 'plasticoinable'];

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(NovaRequest $request): array
    {
        return [
            ID::make()->sortable(),

            BelongsTo::make(User::singularLabel(), 'user', User::class),

            MorphTo::make('Operación', 'plasticoinable')
                ->types([
                    PlasticDelivery::class,
                    Transfer::class,
                    Voucher::class,
                ]),

            Number::make('Cantidad', 'amount')
                ->textAlign(Text::CENTER_ALIGN),
        ];
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     */
    public static function indexQuery(NovaRequest $request, $query): Builder
    {
        return $query->when(
            $request->user()->isNotAdmin(),
            fn () => $query
                ->whereHasMorph(
                    'plasticoinable',
                    Models\PlasticDelivery::class,
                    fn (Builder $query) => $query->whereIn(
                        'collection_center_id',
                        $request->user()->collection_center_ids
                    )
                )

        );
    }
}
