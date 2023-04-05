<?php

namespace App\Jobs;

use App\Models\PlasticDelivery;
use App\Notifications\NewPlasticDeliveryNotification;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendPlasticDeliveryNotifications
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public PlasticDelivery $plasticDelivery)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->plasticDelivery->user->notify(
            new NewPlasticDeliveryNotification($this->plasticDelivery)
        );
    }
}
