<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class SliderHome extends Model
{
    use SoftDeletes;

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
     * Retrieve the mobile image url.
     */
    public function mobileImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => Storage::url($this->mobile_image)
        );
    }
}
