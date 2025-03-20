<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Retailer;

class RetailerSeeder extends Seeder
{
    private const int RETAILER_COUNT = 10;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Retailer::factory(self::RETAILER_COUNT)->create();
    }
}
