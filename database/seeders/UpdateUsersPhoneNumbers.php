<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class UpdateUsersPhoneNumbers extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (now()->isAfter(Carbon::createFromDate(2023, 3, 31))) {
            return;
        }

        collect(json_decode(
            File::get(database_path('seeders/data/users.json')),
            true
        ))->each(
            fn ($item) => User::where('id', $item['id'])->update([
                'phone' => $item['phone']
            ])
        );
    }
}
