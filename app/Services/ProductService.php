<?php

namespace App\Services;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Gate;

use App\Contracts\ProductServiceContract;

use App\Http\Resources\ProductResource;

use App\Models\Product;

class ProductService implements ProductServiceContract
{
    /**
     * Method for getting all products with pagination
     *
     * @return AnonymousResourceCollection
     */
    public function getAllProducts(): AnonymousResourceCollection
    {
        return ProductResource::collection(
            Product::simplePaginate(config('app.pagination_limit'))
        );
    }

    /**
     * Method for getting a specific product
     *
     * @param Product $product
     * @return ProductResource
     */
    public function getOneProduct(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    /**
     * Method for creating a new product
     *
     * @param array $data
     * @return void
     */
    public function createProduct(array $data): void
    {
        $product = Product::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'manufacturer_part_number' => $data['manufacturer_part_number'],
            'pack_size_id' => $data['pack_size_id'],
        ]);

        $product->retailers()->attach(
            $data['retailer_id'],
            ['product_url' => $data['product_url']]
        );

        if (isset($data['images']) && is_array($data['images'])) {
            foreach ($data['images'] as $image) {
                $product->images()->create([
                    'image_filename' => basename($image),
                    'image_url' => $image,
                ]);
            }
        }
    }

    /**
     * Method for updating the data of a specific product
     *
     * @param array $data
     * @param Product $product
     * @return void
     */
    public function updateProduct(array $data, Product $product): void
    {
        [
            'title' => $title,
            'description' => $description,
            'manufacturer_part_number' => $manufacturer_part_number,
            'pack_size_id' => $pack_size_id,
            'retailer_id' => $retailer_id,
            'product_url' => $product_url,
            'images' => $images,
        ] = $data;

        $product->title = $title ?? $product->title;
        $product->description = $description ?? $product->description;
        $product->manufacturer_part_number = $manufacturer_part_number ?? $product->manufacturer_part_number;
        $product->pack_size_id = $pack_size_id ?? $product->pack_size_id;

        $product->save();

        if (isset($retailer_id)) {
            $product->retailers()->sync([$retailer_id]);
        }

        if (isset($product_url)) {
            $product->retailers()->updateExistingPivot($retailer_id, ['product_url' => $product_url]);
        }

        if (isset($images) && is_array($images)) {
            $product->images()->delete();

            foreach ($images as $image) {
                $product->images()->create([
                    'image_filename' => basename($image),
                    'image_url' => $image,
                ]);
            }
        }
    }

    /**
     * Method for deleting a specific product
     *
     * @param Product $product
     * @return void
     */
    public function deleteProduct(Product $product): void
    {
        $product->delete();
    }

    /**
     * Method for searching a specific product by MPN
     *
     * @param string $MPN
     * @return ProductResource|null
     */
    public function searchProductByMPN(string $MPN): ?ProductResource {
        $product = Product::searchByMPN($MPN)->first();

        if (empty($product)) {
            return null;
        }

        Gate::authorize('search', $product);

        return new ProductResource($product);
    }
}
