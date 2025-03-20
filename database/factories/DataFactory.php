<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Data>
 */
class DataFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $rating = [
            1 => $this->faker->numberBetween(0, 100),
            2 => $this->faker->numberBetween(0, 100),
            3 => $this->faker->numberBetween(0, 100),
            4 => $this->faker->numberBetween(0, 100),
            5 => $this->faker->numberBetween(0, 100),
        ];

        $totalRatings = 0;

        foreach ($rating as $stars => $count) {
            $totalRatings += $stars * $count;
        }

        return [
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'stock_count' => $this->faker->numberBetween(1, 100),
            'rating' => $rating,
            'avg_rating' => array_sum($rating) > 0 ? $totalRatings / array_sum($rating) : 0,
        ];
    }
}
