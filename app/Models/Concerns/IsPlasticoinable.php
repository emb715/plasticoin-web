<?php

namespace App\Models\Concerns;

use App\Models\Plasticoin;
use App\Models\User;
use App\Observers\PlasticoinableObserver;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait IsPlasticoinable
{
    /**
     * Sync plasticoins with the model.
     */
    abstract private function syncPlasticoins(): void;

    /**
     * Check if the model plasticoins are updated.
     */
    abstract private function arePlasticoinsUpdated(): bool;

    /**
     * Bootstrap the Is Plasticoinable trait.
     */
    protected static function bootIsPlasticoinable(): void
    {
        static::observe(PlasticoinableObserver::class);
    }

    /**
     * Apply plasticoins to the model.
     */
    public function applyPlasticoins()
    {
        // If plasticoins are updated don't to anything.
        if ($this->arePlasticoinsUpdated()) {
            return;
        }

        // Delete if plasticoins if exists.
        $this->plasticoins()->delete();

        $this->syncPlasticoins();
    }

    /**
     * Retrieve the user of the plasticoinable.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Plasticoins generated for the model.
     */
    public function plasticoins(): MorphMany
    {
        return $this->morphMany(Plasticoin::class, 'plasticoinable');
    }
}
