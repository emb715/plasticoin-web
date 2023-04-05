<?php

namespace App\Nova\Metrics;

use App\Models\Plasticoin;
use Carbon\Carbon;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;
use Laravel\Nova\Metrics\ValueResult;

class TotalPlasticoins extends Value
{
    /**
     * The displayable name of the metric.
     *
     * @var string
     */
    public $name = 'Plasticoins emitidos';

    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request): ValueResult
    {
        return $this->result(Plasticoin::where('amount', '>=', 0)->sum('amount'));
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     */
    public function cacheFor(): Carbon
    {
        return now()->addMinutes(5);
    }
}
