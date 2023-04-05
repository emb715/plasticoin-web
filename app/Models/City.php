<?php

namespace App\Models;

use App\Models\Concerns\IsEnabled;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use IsEnabled, SoftDeletes;

    /**
     * Retrieve the province of the city.
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
