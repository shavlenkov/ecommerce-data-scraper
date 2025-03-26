<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MetricResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'current_page' => $this->resource->currentPage(),
            'data' => $this->resource->map(function ($metrics) {
                return [
                    'average_rating' => $metrics['average_rating'],
                    'average_price' => $metrics['average_price'],
                    'average_images_count' => $metrics['average_images_count'],
                ];
            }),
            'pagination' => [
                'prev_page_url' => $this->resource->previousPageUrl(),
                'next_page_url' => $this->resource->nextPageUrl(),
            ],
        ];
    }
}
