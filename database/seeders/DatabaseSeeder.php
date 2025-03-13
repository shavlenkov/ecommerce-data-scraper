<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Retailer;
use App\Models\Data;
use App\Models\Image;
use App\Models\ProductImage;
use App\Models\DataImage;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();
        Product::factory(1000)->create();
        Retailer::factory(10)->create();
        Data::factory(100)->create();
        Image::factory(50)->create();
        ProductImage::factory(100)->create();
        DataImage::factory(100)->create();
    }
}
