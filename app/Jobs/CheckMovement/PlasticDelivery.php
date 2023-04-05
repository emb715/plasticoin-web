<?php

namespace App\Jobs\CheckMovement;

use App\Exceptions\MovementNotAllowed;
use App\Models;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Validation\UnauthorizedException;

class PlasticDelivery
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Models\PlasticDelivery $plasticDelivery)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Check if user creating plastic delivery to himself.
        throw_if(
            $this->plasticDelivery->user->is(auth()->user()) && auth()->user()->isNotAdmin(),
            new MovementNotAllowed(__('Can\'t create plastic delivery to yourself.'))
        );

        // Check if user creating plastic delivery to himself.
        throw_if(
            auth()->user()->cant('view', $this->plasticDelivery->collectionCenter),
            new UnauthorizedException(__('You don\'t have access to that collection center.'))
        );
    }
}
