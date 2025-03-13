<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataImage>
 */
class DataImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'data_id' => $this->faker->numberBetween(1, 100),
            'image_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
