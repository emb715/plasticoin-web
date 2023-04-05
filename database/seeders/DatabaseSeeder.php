<?php

namespace Database\Seeders;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Addresses
        $this->call([
            CountrySeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
        ]);

        // Slides
        $this->call([
            SliderHomeSeeder::class,
            SliderBenefitSeeder::class,
        ]);

        // Users
        $this->call([
            UserSeeder::class,
            UpdateUsersPhoneNumbers::class,
        ]);

        // App
        $this->call([
            ClientSeeder::class,
            CollectionCenterSeeder::class,
            CompanySeeder::class,
            BenefitSeeder::class,
        ]);

        // Plasticoins
        Model::withoutEvents(
            fn () => $this->call([
                PlasticDeliverySeeder::class,
                TransferSeeder::class,
                VoucherSeeder::class,
                PlasticoinSeeder::class,
            ])
        );
    }
}
