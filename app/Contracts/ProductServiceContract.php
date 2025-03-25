<?php

namespace App\Contracts;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

use App\Http\Resources\ProductResource;

use App\Models\Product;

interface ProductServiceContract
{
    public function getAllProducts(): AnonymousResourceCollection;
    public function getOneProduct(Product $product): ProductResource;
    public function createProduct(array $data): void;
    public function updateProduct(array $data, Product $product): void;
    public function deleteProduct(Product $product): void;
}
