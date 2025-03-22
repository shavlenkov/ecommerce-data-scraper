<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Role;

class RoleSeeder extends Seeder
{
    private const int ROLE_COUNT = 2;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::factory(self::ROLE_COUNT)->create();
    }
}
