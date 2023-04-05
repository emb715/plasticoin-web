<?php

namespace App\Jobs\CheckMovement;

use App\Exceptions\InsufficientPlasticoins;
use App\Exceptions\MovementNotAllowed;
use App\Models;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class Transfer
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Models\Transfer $transfer)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Check if user is sending plasticoins to himself.
        throw_if(
            $this->transfer->toUser->is(auth()->user()),
            new MovementNotAllowed(__('Can\'t send transfer to yourself.'))
        );

        // Check if user is sending plasticoins for another person.
        throw_unless(
            $this->transfer->user->is(auth()->user()),
            new MovementNotAllowed(__('Can\'t create transfer for another user.'))
        );

        // Check if user has sufficient plasticoins to transfer.
        throw_unless(
            $this->transfer->user->hasSufficientPlasticoins($this->transfer->amount),
            new InsufficientPlasticoins(__('User does not have sufficient plasticoins.'))
        );
    }
}
