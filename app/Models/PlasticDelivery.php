<?php

namespace App\Models;

use App\Models\Concerns\IsPlasticoinable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PlasticDelivery extends Model
{
    use IsPlasticoinable;

    /**
     * Retrieve the plastic amount with kg.
     */
    public function plasticAmountWithKg(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->plastic_amount . ' kg'
        );
    }

    /**
     * Sync plasticoins with the model.
     */
    private function syncPlasticoins(): void
    {
        $this->plasticoins()->create([
            'user_id' => $this->user_id,
            'amount' => $this->calculatePlasticoins(),
        ]);
    }

    /**
     * Check if the model plasticoins are updated.
     */
    private function arePlasticoinsUpdated(): bool
    {
        return static::query()

            // Filter by current id.
            ->where('id', $this->id)

            // Plasticoins that has been created.
            ->whereHas(
                'plasticoins',
                fn (Builder $query) => $query
                    ->where('user_id', $this->user_id)
                    ->where('amount', $this->calculatePlasticoins()),
                operator: '=',
                count: 1
            )

            // Check if exists
            ->exists();
    }

    /**
     * Calculate the plasticoins for the plastic delivery.
     */
    private function calculatePlasticoins(): float
    {
        $plasticoins = 0;

        $plasticoins += config('plasticoins.rewards.home') * ($this->home_plastic_amount ?? 0);

        $plasticoins += config('plasticoins.rewards.beach') * ($this->beach_plastic_amount ?? 0);

        $plasticoins += config('plasticoins.rewards.micro_plastic') * ($this->micro_plastic_amount ?? 0);

        return $plasticoins;
    }

    /**
     * Retrieve the collection center of the delivery.
     */
    public function collectionCenter(): BelongsTo
    {
        return $this->belongsTo(CollectionCenter::class);
    }
}
