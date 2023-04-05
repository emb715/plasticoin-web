<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Client::exists()) {
            return;
        }

        Client::unguard();

        $clients = collect(
            json_decode(
                File::get(database_path('seeders/data/supporters.json')),
                true
            )
        );

        $clients->each(fn ($item) => $this->getImageFile($item));

        foreach ($clients as $client) {
            Client::updateOrCreate(
                ['id' => $client['id']],
                array_merge(
                    $client,
                    ['image' => 'clientes/' . $client['image']]
                )
            );
        }

        Client::reguard();
    }

    /**
     * Get the image file from the server.
     */
    private function getImageFile(array $client): void
    {
        if (is_null($client['image'])) {
            return;
        }

        if (Storage::disk('public')->fileExists('clientes/' . $client['image'])) {
            return;
        }

        Storage::disk('public')->put(
            'clientes/' . $client['image'],
            file_get_contents('https://www.plasticoin.com.uy/storage/' . $client['image'])
        );
    }
}
