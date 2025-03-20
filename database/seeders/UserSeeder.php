<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    private const int USER_COUNT = 5;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(self::USER_COUNT)->create();
    }
}
