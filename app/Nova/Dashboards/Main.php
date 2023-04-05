<?php

namespace App\Nova\Dashboards;

use App\Nova\Metrics\PlasticDeliveriesCount;
use App\Nova\Metrics\PlasticDeliveriesPerDay;
use App\Nova\Metrics\PlasticoinsUsed;
use App\Nova\Metrics\PlasticoinsWithoutUse;
use App\Nova\Metrics\TotalPlasticoins;
use App\Nova\Metrics\UsersCount;
use App\Nova\Metrics\UsersPerDay;
use App\Nova\Metrics\VouchersCount;
use App\Nova\Metrics\VouchersPerDay;
use Laravel\Nova\Dashboards\Main as Dashboard;

class Main extends Dashboard
{
    /**
     * Get the displayable name of the dashboard.
     */
    public function name(): string
    {
        return 'Escritorio';
    }

    /**
     * Get the cards for the dashboard.
     */
    public function cards(): array
    {
        return [

            new TotalPlasticoins,

            new PlasticoinsWithoutUse,

            new PlasticoinsUsed,

            (new PlasticDeliveriesPerDay)->width('2/3'),

            new PlasticDeliveriesCount,

            (new VouchersPerDay())->width('2/3'),

            new VouchersCount,

            (new UsersPerDay)->width('2/3'),

            new UsersCount,
        ];
    }
}
