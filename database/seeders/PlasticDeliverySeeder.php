<?php

namespace Database\Seeders;

use App\Models\PlasticDelivery;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class PlasticDeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (PlasticDelivery::exists()) {
            return;
        }

        PlasticDelivery::unguard();

        $plasticDeliveries = collect(
            json_decode(
                File::get(database_path('seeders/data/plastic_deliveries.json')),
                true
            )
        )
            ->filter(fn ($item) => is_null($item['deleted_at']))
            ->map(fn ($item) => array_merge(
                Arr::except($item, ['deleted_at']),
                [
                    'home_plastic_amount' => $item['home_plastic_amount'] ?? 0,
                    'beach_plastic_amount' => $item['beach_plastic_amount'] ?? 0,
                    'micro_plastic_amount' => $item['micro_plastic_amount'] ?? 0,
                ]
            ));

        foreach ($plasticDeliveries as $plasticDelivery) {
            PlasticDelivery::updateOrCreate(['id' => $plasticDelivery['id']], $plasticDelivery);
        }

        PlasticDelivery::reguard();
    }
}
