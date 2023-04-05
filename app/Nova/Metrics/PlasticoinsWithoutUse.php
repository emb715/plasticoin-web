<?php

namespace App\Nova\Metrics;

use App\Models\Plasticoin;
use Carbon\Carbon;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\Metrics\Value;

class PlasticoinsWithoutUse extends Value
{
    /**
     * The displayable name of the metric.
     *
     * @var string
     */
    public $name = 'Plasticoins sin uso';

    /**
     * Calculate the value of the metric.
     */
    public function calculate(NovaRequest $request)
    {
        return $this->result(Plasticoin::sum('amount'));
    }

    /**
     * Determine the amount of time the results of the metric should be cached.
     *
     * @return \DateTimeInterface|\DateInterval|float|int|null
     */
    public function cacheFor(): Carbon
    {
        return now()->addMinutes(5);
    }
}
