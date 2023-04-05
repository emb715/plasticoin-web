<?php

namespace App\Models;

use App\Models\Concerns\IsPlasticoinable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transfer extends Model
{
    use IsPlasticoinable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'user_id',
        'to_user_id',
        'amount',
    ];

    /**
     * Sync plasticoins with the model.
     */
    private function syncPlasticoins(): void
    {
        $this->plasticoins()->createMany([[
            'user_id' => $this->user_id,
            'amount' => $this->amount * -1, // Remove plasticoins from user
        ], [
            'user_id' => $this->to_user_id,
            'amount' => $this->amount, // Add plasticoins to user
        ]]);
    }

    /**
     * Check if the model plasticoins are updated.
     */
    private function arePlasticoinsUpdated(): bool
    {
        return static::query()

            // Filter by current id.
            ->where('id', $this->id)

            // Plasticoins that has been sent.
            ->whereHas(
                'plasticoins',
                fn (Builder $query) => $query
                    ->where('user_id', $this->user_id)
                    ->where('amount', $this->amount * -1),
                operator: '=',
                count: 1
            )

            // Plasticoins that has been received.
            ->whereHas(
                'plasticoins',
                fn (Builder $query) => $query
                    ->where('user_id', $this->to_user_id)
                    ->where('amount', $this->amount),
                operator: '=',
                count: 1
            )

            // Check that has onle those two operations.
            ->whereHas('plasticoins', operator: '=', count: 2)

            // Check if exists
            ->exists();
    }

    /**
     * Retrieve the user that received the plasticoins.
     */
    public function toUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
