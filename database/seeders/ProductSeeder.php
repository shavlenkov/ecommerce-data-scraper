<?php

namespace Database\Seeders;

use App\Models\PackSize;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\ProductImage;

class ProductSeeder extends Seeder
{
    private const int PRODUCT_COUNT = 1000;
    private const int PRODUCT_IMAGE_COUNT = 5;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::factory(self::PRODUCT_COUNT)->create();

        foreach ($products as $product) {
            ProductImage::factory(self::PRODUCT_IMAGE_COUNT)->create([
                'product_id' => $product->id,
            ]);
        }
    }
}
