<?php

namespace App\Models;

use App\Models\Concerns\HasAddress;
use App\Models\Concerns\IsEnabled;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Company extends Model implements Sortable
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
                ->withCount('vouchers')
                ->withSum('vouchers', 'value')
                ->withAvg('vouchers', 'value')
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
     * Retrieve the vouchers of the company.
     */
    public function vouchers(): HasMany
    {
        return $this->hasMany(Voucher::class);
    }
}
