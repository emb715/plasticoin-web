<?php

namespace Database\Seeders;

use App\Models\Benefit;
use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class VoucherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Voucher::exists()) {
            return;
        }

        Voucher::unguard();

        $vouchers = collect(
            json_decode(
                File::get(database_path('seeders/data/vouchers.json')),
                true
            )
        )
            ->filter(fn ($item) => is_null($item['deleted_at']))
            ->map(fn ($item) => Arr::except($item, ['deleted_at', 'redeem_at']));

        $benefits = Benefit::all();

        foreach ($vouchers as $voucher) {
            Voucher::updateOrCreate(
                ['id' => $voucher['id']],
                array_merge($voucher, [
                    'value' => $benefits->firstWhere('id', $voucher['benefit_id'])->value,
                ])
            );
        }

        Voucher::reguard();
    }
}
