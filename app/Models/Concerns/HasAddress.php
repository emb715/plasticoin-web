<?php

namespace App\Models\Concerns;

use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasAddress
{
    /**
     * Retrieve country of the model.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Retrieve province of the model.
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Retrieve city of the model.
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
