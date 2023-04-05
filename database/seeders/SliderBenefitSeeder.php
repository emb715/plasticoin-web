<?php

namespace Database\Seeders;

use App\Models\SliderBenefit;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderBenefitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (SliderBenefit::exists()) {
            return;
        }

        SliderBenefit::unguard();

        $sliderBenefits = collect(json_decode(
            File::get(database_path('seeders/data/benefit_slides.json')),
            true
        ))
            ->each(fn ($item) => $this->getImageFile($item))
            ->map(fn ($item) => array_merge($item, [
                'image' => Arr::get($item, 'image') ? 'slider/benefit/' . Arr::get($item, 'image') : null,
            ]));

        foreach ($sliderBenefits as $sliderBenefit) {
            SliderBenefit::create($sliderBenefit);
        }

        SliderBenefit::reguard();
    }

    /**
     * Get the image file from the server.
     */
    private function getImageFile(array $slider): void
    {
        if (is_null($slider['image'])) {
            return;
        }

        if (Storage::disk('public')->fileExists('slider/benefit/' . $slider['image'])) {
            return;
        }

        Storage::disk('public')->put(
            'slider/benefit/' . $slider['image'],
            file_get_contents('https://www.plasticoin.com.uy/storage/' . $slider['image'])
        );
    }
}
