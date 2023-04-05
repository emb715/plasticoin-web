<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Country::exists()) {
            return;
        }

        Country::unguard();

        $countries = collect(
            json_decode(
                File::get(database_path('seeders/data/countries.json')),
                true
            )
        )->map(fn ($item) => Arr::only($item, [
            'id',
            'name',
            'created_at',
            'updated_at',
        ]));

        foreach ($countries as $country) {
            Country::updateOrCreate(['id' => $country['id']], $country);
        }

        Country::where('id', '2')->update(['enabled' => true]);

        Country::reguard();
    }
}
