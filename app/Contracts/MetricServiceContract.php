<?php

namespace App\Contracts;

use App\Http\Resources\MetricResource;

interface MetricServiceContract
{
    public function getMetrics($filters, $metricType = 'retailers.metrics'): MetricResource;
}
