<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plasticoin extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'amount',
    ];

    /**
     * Retrieve the user of the plasticoins.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Retrieve the model that created the plasticoins.
     */
    public function plasticoinable()
    {
        return $this->morphTo();
    }
}
