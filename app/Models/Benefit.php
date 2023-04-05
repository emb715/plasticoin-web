<?php

namespace App\Models;

use App\Models\Concerns\IsEnabled;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Benefit extends Model implements Sortable
{
    use IsEnabled, SortableTrait, SoftDeletes;

    /**
     * Retrieve the full name attribute.
     */
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->name . ($this->company ? ' (' . $this->company->name . ')' : '')
        );
    }

    /**
     * Retrieve the image url.
     */
    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::url($this->image)
        );
    }

    /**
     * Retrieve the company of the benefit.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Users can use the benefit if the made a plastic deliver to this collection centers.
     */
    public function collectionCenters(): BelongsToMany
    {
        return $this->belongsToMany(CollectionCenter::class);
    }
}
