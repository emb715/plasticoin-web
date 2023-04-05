<?php

namespace App\Providers;

use App\Models\PlasticDelivery;
use App\Models\Transfer;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Relation::morphMap([
            'plastic_delivery' => PlasticDelivery::class,
            'transfer' => Transfer::class,
            'voucher' => Voucher::class,
        ]);
    }
}
