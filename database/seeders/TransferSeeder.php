<?php

namespace Database\Seeders;

use App\Models\Transfer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class TransferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Transfer::exists()) {
            return;
        }

        Transfer::unguard();

        $transfers = collect(
            json_decode(
                File::get(database_path('seeders/data/transfers.json')),
                true
            )
        )
            ->filter(fn ($item) => is_null($item['deleted_at']))
            ->map(fn ($item) => array_merge(
                Arr::except($item, ['deleted_at', 'from_id', 'to_id']),
                [
                    'user_id' => $item['from_id'],
                    'to_user_id' => $item['to_id'],
                ]
            ));

        foreach ($transfers as $transfer) {
            Transfer::updateOrCreate(['id' => $transfer['id']], $transfer);
        }

        Transfer::reguard();
    }
}
