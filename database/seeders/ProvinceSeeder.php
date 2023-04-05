<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Province::exists()) {
            return;
        }

        Province::unguard();

        $provinces = json_decode(
            File::get(database_path('seeders/data/provinces.json')),
            true
        );

        foreach ($provinces as $province) {
            Province::updateOrCreate(['id' => $province['id']], $province);
        }

        Province::reguard();
    }
}
