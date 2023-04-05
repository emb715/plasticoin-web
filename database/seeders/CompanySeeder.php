<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Company::exists()) {
            return;
        }

        Company::unguard();

        $companies = collect(
            json_decode(
                File::get(database_path('seeders/data/companies.json')),
                true
            )
        )->map(fn ($item) => Arr::except($item, ['signature']));

        $companies->each(fn ($item) => $this->getImageFile($item));

        foreach ($companies as $company) {
            Company::updateOrCreate(['id' => $company['id']], $company);
        }

        Company::reguard();
    }

    /**
     * Get the image file from the server.
     */
    private function getImageFile(array $company): void
    {
        if (Storage::disk('public')->fileExists($company['image'])) {
            return;
        }

        Storage::disk('public')->put(
            $company['image'],
            file_get_contents('https://www.plasticoin.com.uy/storage/' . $company['image'])
        );
    }
}
