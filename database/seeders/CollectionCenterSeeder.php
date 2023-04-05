<?php

namespace Database\Seeders;

use App\Models\CollectionCenter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class CollectionCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (CollectionCenter::exists()) {
            return;
        }

        CollectionCenter::unguard();

        $collectionCenters = collect(
            json_decode(
                File::get(database_path('seeders/data/collection_centers.json')),
                true
            )
        );

        $collectionCenters->each(fn ($item) => $this->getImageFile($item));

        foreach ($collectionCenters as $collectionCenter) {
            CollectionCenter::updateOrCreate(['id' => $collectionCenter['id']], $collectionCenter);
        }

        $collectionCenterUser = collect(
            json_decode(
                File::get(database_path('seeders/data/collection_center_user.json')),
                true
            )
        );

        DB::transaction(function () use ($collectionCenterUser) {
            foreach ($collectionCenterUser as $item) {
                DB::table('collection_center_user')->insert($item);
            }
        });

        CollectionCenter::reguard();
    }

    /**
     * Get the image file from the server.
     */
    private function getImageFile(array $collectionCenter): void
    {
        if (Storage::disk('public')->fileExists($collectionCenter['image'])) {
            return;
        }

        Storage::disk('public')->put(
            $collectionCenter['image'],
            file_get_contents('https://www.plasticoin.com.uy/storage/' . $collectionCenter['image'])
        );
    }
}
