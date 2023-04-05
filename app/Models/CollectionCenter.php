<?php

namespace App\Models;

use App\Models\Concerns\HasAddress;
use App\Models\Concerns\IsEnabled;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class CollectionCenter extends Model implements Sortable
{
    use IsEnabled, HasAddress, SortableTrait, SoftDeletes;

    /**
     * Bootstrap the model and its traits.
     */
    protected static function boot(): void
    {
        parent::boot();

        static::addGlobalScope(
            'vouchers',
            fn (Builder $query) => $query
                ->withCount('plasticDeliveries')
                ->withSum('plasticDeliveries', 'plastic_amount')
                ->withAvg('plasticDeliveries', 'plastic_amount')
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
     * Users that have access to the collection center.
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * Retrieve the plastic deliveries of the collection center.
     */
    public function plasticDeliveries(): HasMany
    {
        return $this->hasMany(PlasticDelivery::class);
    }
}
