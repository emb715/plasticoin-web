<?php

use App\Models\Client;
use App\Models\CollectionCenter;
use App\Models\PlasticDelivery;
use App\Models\SliderBenefit;
use App\Models\SliderHome;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

/**
 * Get home slider.
 */
if (! function_exists('indexSliders')) {
    function indexSliders(): Collection
    {
        return Cache::remember(
            'site-home-slides',
            now()->addHours(2),
            fn () => SliderHome::all()
        );
    }
}

/**
 * Get benefit slider.
 */
if (! function_exists('benefitSliders')) {
    function benefitSliders(): Collection
    {
        return Cache::remember(
            'site-benefit-slides',
            now()->addHours(2),
            fn () => SliderBenefit::all()
        );
    }
}

/**
 * Get the clients.
 */
if (! function_exists('clients')) {
    function clients(): Collection
    {
        return Cache::remember(
            'site-clients',
            now()->addHours(2),
            fn () => Client::all()
        );
    }
}

/**
 * Get the collection centers.
 */
if (! function_exists('collectionCenters')) {
    function collectionCenters(): Collection
    {
        return Cache::remember(
            'site-collection-centers',
            now()->addHours(2),
            fn () => CollectionCenter::enabled()->get()
        );
    }
}

/**
 * Get the metrics.
 */
if (! function_exists('metrics')) {
    function metrics(): array
    {
        return Cache::remember(
            'site-metrics',
            now()->addHours(2),
            fn () => [
                'users' => User::count(),
                'plastic_delivery' => PlasticDelivery::sum('plastic_amount'),
                'vouchers' => Voucher::count(),
            ]
        );
    }
}
