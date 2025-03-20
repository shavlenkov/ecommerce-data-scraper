<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\ProductRetailer;
use App\Models\ScrapingSession;
use App\Models\Data;
use App\Models\DataImage;

class DataSeeder extends Seeder
{
    private const int DAYS_OF_YEAR = 365;
    private const int DATA_IMAGE_COUNT = 5;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < self::DAYS_OF_YEAR; $i++) {
            foreach (ProductRetailer::all() as $productRetailer) {
                $scrapingSession = ScrapingSession::firstOrCreate(
                    [
                        'retailer_id' => $productRetailer->retailer->id,
                    ],
                    [
                        'created_at'  => now()->subDays(self::DAYS_OF_YEAR - $i),
                        'updated_at'  => now()->subDays(self::DAYS_OF_YEAR - $i),
                    ]
                );

                $data = Data::factory()->create([
                    'product_retailer_id' => $productRetailer->id,
                    'scraping_session_id' => $scrapingSession->id,
                    'title' => $productRetailer->product->title,
                    'description' => $productRetailer->product->description,
                    'created_at'  => now()->subDays(self::DAYS_OF_YEAR - $i),
                    'updated_at'  => now()->subDays(self::DAYS_OF_YEAR - $i),
                ]);

                $startPosition = 1;

                DataImage::factory(self::DATA_IMAGE_COUNT)->state(function () use (&$startPosition, $data, $i) {
                    return [
                        'position' => $startPosition++,
                        'data_id' => $data->id,
                        'created_at'  => now()->subDays(self::DAYS_OF_YEAR - $i),
                        'updated_at'  => now()->subDays(self::DAYS_OF_YEAR - $i),
                    ];
                })->create();
            }
        }
    }
}
