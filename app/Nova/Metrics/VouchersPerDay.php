<?php

namespace App\Nova\Metrics;

use App\Models\Voucher;
use Carbon\Carbon;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Trend;
use Laravel\Nova\Metrics\TrendResult;

class VouchersPerDay extends Trend
{
    /**
     * The displayable name of the metric.
     *
     * @var string
     */
    public $name = 'Vouchers por día';

    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request): TrendResult
    {
        return $this->countByDays($request, Voucher::class);
    }

    /**
     * Get the ranges available for the metric.
     */
    public function ranges(): array
    {
        return [
            30 => __('30 Days'),
            60 => __('60 Days'),
            90 => __('90 Days'),
        ];
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     */
    public function cacheFor(): Carbon
    {
        return now()->addMinutes(5);
    }
}
