<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\PackSize;

class PackSizeSeeder extends Seeder
{
    private const int PACK_SIZE_COUNT = 5;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PackSize::factory(self::PACK_SIZE_COUNT)->create();
    }
}
