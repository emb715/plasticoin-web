<?php

namespace App\Models;

use App\Models\Concerns\HasAddress;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;

class Client extends Model implements Sortable
{
    use HasAddress, SortableTrait, SoftDeletes;

    /**
     * Retrieve the image url.
     */
    public function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::url($this->image)
        );
    }
}
