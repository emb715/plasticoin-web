<?php

namespace App\Models;

use App\Models\Concerns\IsEnabled;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use IsEnabled, SoftDeletes;

    /**
     * Retrieve the provinces of the country.
     */
    public function provinces(): HasMany
    {
        return $this->hasMany(Province::class);
    }
}
