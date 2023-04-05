<?php

namespace App\Models;

use App\Models\Concerns\IsPlasticoinable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Voucher extends Model
{
    use IsPlasticoinable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<string>
     */
    protected $fillable = [
        'company_id',
        'benefit_id',
        'value',
        'code',
    ];

    /**
     * Retrieve the plastic amount with kg attribute.
     */
    public function valueWithPlasticoins(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->value . ' plasticoins'
        );
    }

    /**
     * Retrieve the valid until attribute.
     */
    public function validUntil(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->created_at->addDay()
        );
    }

    /**
     * Assign default values for the voucher.
     */
    public function assignDefaultCreationValues(): void
    {
        if (is_null($this->company_id)) {
            $this->company_id = $this->benefit->company_id;
        }

        if (is_null($this->value)) {
            $this->value = $this->benefit->value;
        }

        if (is_null($this->code)) {
            $this->code = $this->generateCode();
        }
    }

    /**
     * Generate a code for the voucher.
     */
    private function generateCode(): string
    {
        do {
            $code = Str::random(5);
        } while (Voucher::where('code', $code)->exists());

        return $code;
    }

    /**
     * Sync plasticoins with the model.
     */
    private function syncPlasticoins(): void
    {
        $this->updateQuietly([
            'value' => $this->benefit->value,
        ]);

        $this->plasticoins()->create([
            'user_id' => $this->user_id,
            'amount' => $this->benefit->value * -1, // Substract voucher value
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
                    ->where('amount', $this->benefit->value * -1),
                operator: '=',
                count: 1
            )

            // Check if exists
            ->exists();
    }

    /**
     * Retrieve the company of the voucher.
     */
    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class);
    }

    /**
     * Retrieve the benefit of the voucher.
     */
    public function benefit(): BelongsTo
    {
        return $this->belongsTo(Benefit::class);
    }
}
