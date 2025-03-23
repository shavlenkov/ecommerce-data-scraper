<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Gate;

use App\Http\Requests\StoreOrUpdateRetailerRequest;

use App\Http\Resources\RetailerResource;

use App\Models\Retailer;

use App\Services\RetailerService;

class RetailerController extends Controller
{
    /**
     * Constructor of RetailerController class
     *
     * @param RetailerService $retailerService
     */
    public function __construct(
        protected RetailerService $retailerService,
    ) {}

    /**
     * Display a listing of the resource
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        Gate::authorize('viewAny', Retailer::class);

        return $this->retailerService->getAllRetailers();
    }

    /**
     * Store a newly created resource in storage
     *
     * @param StoreOrUpdateRetailerRequest $request
     * @return JsonResponse
     */
    public function store(StoreOrUpdateRetailerRequest $request): JsonResponse
    {
        Gate::authorize('create', Retailer::class);

        $this->retailerService->createRetailer($request->validated());

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Display the specified resource
     *
     * @param Retailer $retailer
     * @return RetailerResource
     */
    public function show(Retailer $retailer): RetailerResource
    {
        Gate::authorize('view', $retailer);

        return $this->retailerService->getOneRetailer($retailer);
    }

    /**
     * Update the specified resource in storage
     *
     * @param StoreOrUpdateRetailerRequest $request
     * @param Retailer $retailer
     * @return JsonResponse
     */
    public function update(StoreOrUpdateRetailerRequest $request, Retailer $retailer): JsonResponse
    {
        Gate::authorize('update', $retailer);

        $this->retailerService->updateRetailer($request->validated(), $retailer);

        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage
     *
     * @param Retailer $retailer
     * @return JsonResponse
     */
    public function destroy(Retailer $retailer): JsonResponse
    {
        Gate::authorize('delete', $retailer);

        $this->retailerService->deleteRetailer($retailer);

        return response()->json([
            'success' => true,
        ]);
    }
}
