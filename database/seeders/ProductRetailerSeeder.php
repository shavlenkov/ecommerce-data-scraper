<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\ProductRetailer;

class ProductRetailerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Product::all() as $product) {
            ProductRetailer::factory()->create([
                'product_id' => $product->id,
            ]);
        }
    }
}
