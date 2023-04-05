<?php

namespace Database\Seeders;

use App\Models\Plasticoin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class PlasticoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Plasticoin::exists()) {
            return;
        }

        Plasticoin::unguard();

        $plasticoins = collect(
            json_decode(
                File::get(database_path('seeders/data/plasticoins.json')),
                true
            )
        )
            ->filter(fn ($item) => is_null($item['deleted_at']))
            ->map(fn ($item) => array_merge(
                Arr::except($item, ['deleted_at']),
                ['plasticoinable_type' => $this->matchPlasticoinableType($item['plasticoinable_type'])]
            ));

        foreach ($plasticoins as $plasticoin) {
            Plasticoin::updateOrCreate(['id' => $plasticoin['id']], $plasticoin);
        }

        Plasticoin::reguard();
    }

    /**
     * Retrieve the plasticoinable type.
     */
    private function matchPlasticoinableType(string $type): string
    {
        return match ($type) {
            'App\PlasticDelivery' => 'plastic_delivery',
            'App\Transfer' => 'transfer',
            'App\Voucher' => 'voucher',
            default => null
        };
    }
}
