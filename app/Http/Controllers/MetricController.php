<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

use App\Http\Requests\GetMetricsRequest;

use App\Services\MetricService;

class MetricController extends Controller
{
    /**
     * Constructor of MetricController class
     *
     * @param MetricService $metricService
     */
    public function __construct(
        protected MetricService $metricService,
    ) {}

    public function __invoke(GetMetricsRequest $request): JsonResponse
    {
        return response()->json(
            $this->metricService->getMetrics(
                $request->validated(),
                $request->route()->getName()
            )
        );
    }
}
