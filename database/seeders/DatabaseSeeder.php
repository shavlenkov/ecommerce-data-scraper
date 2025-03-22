<?php

namespace Database\Seeders;

use App\Models\PackSize;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PackSizeSeeder::class,
            RetailerSeeder::class,
            ProductSeeder::class,
            ProductRetailerSeeder::class,
            DataSeeder::class,
        ]);
    }
}
