<?php

namespace App\Nova\Metrics;

use App\Models\Plasticoin;
use Carbon\Carbon;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;

class PlasticoinsUsed extends Value
{
    /**
     * The displayable name of the metric.
     *
     * @var string
     */
    public $name = 'Plasticoins usados';

    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request): ValueResult
    {
        return $this->sum($request, Plasticoin::where('amount', '<', 0), 'amount');
    }

    /**
     * Get the ranges available for the metric.
     */
    public function ranges(): array
    {
        return [
            30 => __('30 Days'),
            60 => __('60 Days'),
            365 => __('365 Days'),
            'TODAY' => __('Today'),
            'MTD' => __('Month To Date'),
            'QTD' => __('Quarter To Date'),
            'YTD' => __('Year To Date'),
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
