<?php

namespace Database\Seeders;

use App\Models\SliderHome;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderHomeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (SliderHome::exists()) {
            return;
        }

        SliderHome::unguard();

        $sliderBenefits = collect(json_decode(
            File::get(database_path('seeders/data/home_slides.json')),
            true
        ))
            ->each(fn ($item) => $this->getImageFile($item))
            ->each(fn ($item) => $this->getImageFile($item, 'mobile_image'))
            ->map(fn ($item) => array_merge($item, [
                'image' => Arr::get($item, 'image') ? 'slider/home/' . Arr::get($item, 'image') : null,
                'mobile_image' => Arr::get($item, 'mobile_image') ? 'slider/home/' . Arr::get($item, 'mobile_image') : null,
            ]));

        foreach ($sliderBenefits as $sliderBenefit) {
            SliderHome::create($sliderBenefit);
        }

        SliderHome::reguard();
    }

    /**
     * Get the image file from the server.
     */
    private function getImageFile(array $slider, $image = 'image'): void
    {
        if (is_null($slider[$image])) {
            return;
        }

        if (Storage::disk('public')->fileExists('slider/home/' . $slider[$image])) {
            return;
        }

        Storage::disk('public')->put(
            'slider/home/' . $slider[$image],
            file_get_contents('https://www.plasticoin.com.uy/storage/' . $slider[$image])
        );
    }
}
