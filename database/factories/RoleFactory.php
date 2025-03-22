<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Role>
 */
class RoleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $randomRole = $this->faker->unique()->randomElement([
            [
                'id' => config('app.super_user_role_id'),
                'name' => 'Super user',
            ],
            [
                'id' => config('app.regular_user_role_id'),
                'name' => 'Regular user',
            ],
        ]);

        return [
            'id' => $randomRole['id'],
            'name' => $randomRole['name'],
        ];
    }
}
