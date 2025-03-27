<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

use App\Http\Requests\StoreOrUpdateProductRequest;

use App\Http\Resources\ProductResource;

use App\Models\Product;

use App\Services\ProductService;

class ProductController extends Controller
{
    /**
     * Constructor of ProductController class
     *
     * @param ProductService $productService
     */
    public function __construct(
        protected ProductService $productService,
    ) {}

    /**
     * Display a listing of the resource
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        Gate::authorize('viewAny', Product::class);

        return $this->productService->getAllProducts();
    }

    /**
     * Store a newly created resource in storage
     *
     * @param StoreOrUpdateProductRequest $request
     * @return JsonResponse
     */
    public function store(StoreOrUpdateProductRequest $request): JsonResponse
    {
        Gate::authorize('create', Product::class);

        $this->productService->createProduct($request->validated());

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource
     *
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product): ProductResource
    {
        Gate::authorize('view', $product);

        return $this->productService->getOneProduct($product);
    }

    /**
     * Update the specified resource in storage
     *
     * @param StoreOrUpdateProductRequest $request
     * @param Product $product
     * @return JsonResponse
     */
    public function update(StoreOrUpdateProductRequest $request, Product $product): JsonResponse
    {
        Gate::authorize('update', $product);

        $this->productService->updateProduct($request->validated(), $product);

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage
     *
     * @param Product $product
     * @return JsonResponse
     */
    public function destroy(Product $product): JsonResponse
    {
        Gate::authorize('delete', $product);

        $this->productService->deleteProduct($product);

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Search the specified resource
     *
     * @param Request $request
     * @return ProductResource|JsonResponse
     */
    public function search(Request $request): ProductResource | JsonResponse
    {
        $MPN = $request->query('MPN');

        if (!empty($MPN)) {
            $product = $this->productService->searchProductByMPN($MPN);

            if (!empty($product)) {
                return $product;
            }

            return response()->json(['message' => 'Product not found']);
        }

        return response()->json(['message' => 'MPN parameter is required']);
    }
}
