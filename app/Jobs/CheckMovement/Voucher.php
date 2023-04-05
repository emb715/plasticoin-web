<?php

namespace App\Jobs\CheckMovement;

use App\Exceptions\MovementNotAllowed;
use App\Models;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Validation\ValidationException;

class Voucher
{
    use Dispatchable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public Models\Voucher $voucher)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        // Check if user is sending plasticoins for another person.
        throw_unless(
            $this->voucher->user->is(auth()->user()),
            new MovementNotAllowed(__('Can\'t create voucher for another user.'))
        );

        // Check if user has sufficient plasticoins to transfer.
        throw_unless(
            $this->voucher->user->hasSufficientPlasticoins($this->voucher->benefit->value),
            ValidationException::withMessages([
                'benefit_id' => __('No tienes suficientes plasticoins para el beneficio.'),
            ])
        );

        throw_if(
            $this->checkIfUserHasMoreThanTwoVouchers(),
            ValidationException::withMessages([
                'benefit_id' => __('No se puede emitir más de 2 veces el mismo voucher en 24hs.'),
            ])
        );

        throw_unless(
            $this->checkIfUserMadePlasticDeliveryInBenefitCollectionCenters(),
            ValidationException::withMessages([
                'benefit_id' => __(
                    'Solo se puede acceder a este beneficio si entregaste plastico en: :collectionCenters', [
                        'collectionCenters' => $this->voucher->benefit->collectionCenters->pluck('name')->implode(', '),
                    ]),
            ])
        );
    }

    /**
     * Check if the user has two or more of the same voucher in the past day.
     */
    private function checkIfUserHasMoreThanTwoVouchers(): bool
    {
        return $this->voucher->user
            ->vouchers()
            ->where('created_at', '>=', Carbon::now()->subDay())
            ->where('benefit_id', $this->voucher->benefit->id)
            ->count() >= 2;
    }

    /**
     * Check if the benefit can only be used if user made a plastic delivery in the collection centers.
     */
    private function checkIfUserMadePlasticDeliveryInBenefitCollectionCenters(): bool
    {
        if ($this->voucher->benefit->collectionCenters->isEmpty()) {
            return true;
        }

        return $this->voucher->user
            ->plasticDeliveries()
            ->whereIn('collection_center_id', $this->voucher->benefit->collectionCenters->pluck('id'))
            ->exists();
    }
}
