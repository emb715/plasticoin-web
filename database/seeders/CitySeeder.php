<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (City::exists()) {
            return;
        }

        City::unguard();

        $cities = json_decode(
            File::get(database_path('seeders/data/cities.json')),
            true
        );

        foreach ($cities as $city) {
            City::updateOrCreate(['id' => $city['id']], $city);
        }

        City::reguard();
    }
}
