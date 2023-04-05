<?php

namespace App\Models;

use App\Models\Concerns\IsEnabled;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use IsEnabled, SoftDeletes;

    /**
     * Retrieve the country of the province.
     */
    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    /**
     * Retrieve the cities of the country.
     */
    public function cities(): HasMany
    {
        return $this->hasMany(City::class);
    }
}
