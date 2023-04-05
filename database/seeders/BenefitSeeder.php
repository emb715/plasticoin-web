<?php

namespace Database\Seeders;

use App\Models\Benefit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Benefit::exists()) {
            return;
        }

        Benefit::unguard();

        $benefits = collect(
            json_decode(
                File::get(database_path('seeders/data/benefits.json')),
                true
            )
        )->map(fn ($item) => Arr::except($item, ['only_premium']));

        $benefits->each(fn ($item) => $this->getImageFile($item));

        foreach ($benefits as $benefit) {
            Benefit::updateOrCreate(['id' => $benefit['id']], $benefit);
        }

        Benefit::reguard();
    }

    /**
     * Get the image file from the server.
     */
    private function getImageFile(array $benefit): void
    {
        if (is_null($benefit['image'])) {
            return;
        }

        if (Storage::disk('public')->fileExists($benefit['image'])) {
            return;
        }

        Storage::disk('public')->put(
            $benefit['image'],
            file_get_contents('https://www.plasticoin.com.uy/storage/' . $benefit['image'])
        );
    }
}
