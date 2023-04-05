<?php

namespace App\Observers;

use App\Jobs\CheckMovement;
use App\Jobs\SendPlasticDeliveryNotifications;
use App\Jobs\SendVoucherNotifications;
use App\Models\PlasticDelivery;
use App\Models\Transfer;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Model;

class PlasticoinableObserver
{
    /**
     * Handle the User "creating" event.
     */
    public function creating(Model $model): void
    {
        if (is_null($model->user_id)) {
            $model->user_id = auth()->user()->getKey();
        }

        match (get_class($model)) {
            PlasticDelivery::class => CheckMovement\PlasticDelivery::dispatch($model),
            Transfer::class => CheckMovement\Transfer::dispatch($model),
            Voucher::class => CheckMovement\Voucher::dispatch($model),
        };

        if (method_exists($model, 'assignDefaultCreationValues')) {
            $model->assignDefaultCreationValues();
        }
    }

    /**
     * Handle the User "created" event.
     */
    public function created(Model $model): void
    {
        $model->applyPlasticoins();

        match (get_class($model)) {
            PlasticDelivery::class => SendPlasticDeliveryNotifications::dispatch($model),
            Voucher::class => SendVoucherNotifications::dispatch($model),
            default => null
        };
    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(Model $model): void
    {
        $model->applyPlasticoins();
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(Model $model): void
    {
        $model->plasticoins()->delete();
    }
}
