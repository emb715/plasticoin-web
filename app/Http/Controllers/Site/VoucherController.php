<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\VoucherRequest;
use App\Models\Voucher;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VoucherController
{
    use AuthorizesRequests;

    /**
     * Store a new voucher.
     */
    public function store(VoucherRequest $request): RedirectResponse
    {
        $voucher = Voucher::create($request->validated());

        return redirect()->route('site.voucher.show', [
            'voucher' => $voucher,
        ]);
    }

    /**
     * Show the voucher.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Voucher $voucher): View
    {
        $this->authorize('view', $voucher);

        return view('site.voucher.show', ['voucher' => $voucher]);
    }
}
