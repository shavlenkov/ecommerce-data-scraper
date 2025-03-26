<?php

namespace App\Services;

use Carbon\Carbon;

use App\Contracts\MetricServiceContract;

use App\Http\Resources\MetricResource;

use App\Models\Data;

class MetricService implements MetricServiceContract
{
    public function getMetrics($filters, $metricType = 'retailers.metrics'): MetricResource
    {
        $startDate = $filters['start_date'] ?? Data::max('created_at');
        $endDate = $filters['end_date'] ?? Data::max('created_at');

        $startDate = Carbon::parse($startDate)->startOfDay();
        $endDate = Carbon::parse($endDate)->endOfDay();

        $query = Data::query();

        if (!empty($filters['product_ids'])) {
            $query->whereIn('product_retailer_id', $filters['product_ids']);
        }

        if (!empty($filters['manufacturer_part_numbers'])) {
            $query->whereIn('manufacturer_part_number', $filters['manufacturer_part_numbers']);
        }

        if (!empty($filters['retailer_ids'])) {
            $query->whereHas('retailer', function ($queryBuilder) use ($filters) {
                $queryBuilder->whereIn('id', $filters['retailer_ids']);
            });
        }

        $query->whereBetween('created_at', [$startDate, $endDate]);

        $pagination = $query->simplePaginate(config('app.pagination_limit'));

        $groupedData = $pagination->getCollection()->groupBy(
            $metricType === 'retailers.metrics' ? function ($record) {
                return Carbon::parse($record->created_at)->toDateString();
            } : ($metricType === 'products.metrics' ? 'product_retailer_id' : null)
        )->map(function ($items) {
            return [
                'average_rating' => $items->avg('avg_rating'),
                'average_price' => $items->avg('price'),
                'average_images_count' => $items->map->images->flatten()->count() / $items->count(),
            ];
        });

        $pagination->setCollection($groupedData);

        return new MetricResource($pagination);
    }
}
