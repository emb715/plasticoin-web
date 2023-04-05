<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::exists()) {
            return;
        }

        User::unguard();

        $users = collect(json_decode(
            File::get(database_path('seeders/data/users.json')),
            true
        ))->map(
            fn ($item) => array_merge(
                Arr::only($item, [
                    'id',
                    'name',
                    'email',
                    'country_id',
                    'province_id',
                    'city_id',
                    'city',
                    'email_verified_at',
                    'password',
                    'created_at',
                    'updated_at',
                    'deleted_at',
                ]),
                ['email' => $this->getEmail($item)]
            )
        );

        foreach ($users as $user) {
            User::updateOrCreate(['id' => $user['id']], $user);
        }

        User::whereIn('email', [
            'fkraefft@ivirtual.la',
        ])->update(['admin' => true]);

        User::reguard();
    }

    /**
     * Get user email.
     */
    private function getEmail($item): string
    {
        if (in_array($item['id'], $this->duplicatedEmailIds())) {
            return Str::squish($item['email']) . '.duplicado';
        }

        return $item['email'];
    }

    /**
     * Ids that have a duplicated email.
     */
    private function duplicatedEmailIds(): array
    {
        return [
            451,
            507,
            831,
            898,
            2755,
            3204,
            4599,
        ];
    }
}
