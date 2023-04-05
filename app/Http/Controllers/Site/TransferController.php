<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\TransferRequest;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TransferController
{
    use AuthorizesRequests;

    /**
     * Index page.
     */
    public function create(): View
    {
        return view('site.transfer.create');
    }

    /**
     * Confirmation page.
     */
    public function confirmation(TransferRequest $request): View
    {
        return view('site.transfer.confirmation', [
            'data' => $request->validated(),
        ]);
    }

    /**
     * Store the transfer.
     */
    public function store(TransferRequest $request): RedirectResponse
    {
        $transfer = Transfer::create([
            'to_user_id' => User::where('email', $request->email)->first()->id,
            'amount' => $request->amount,
        ]);

        return redirect()->route('site.transfer.show', ['transfer' => $transfer]);
    }

    /**
     * Show the transfer.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Transfer $transfer): View
    {
        $this->authorize('view', $transfer);

        return view('site.transfer.show', ['transfer' => $transfer]);
    }
}
