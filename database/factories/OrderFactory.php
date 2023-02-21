<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween($min = 1, $max = 9),
            'status' => 'closed',
            'total' => fake()->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 300),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
