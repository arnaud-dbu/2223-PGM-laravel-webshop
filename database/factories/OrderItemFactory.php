<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderItem>
 */
class OrderItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_id' => fake()->numberBetween($min = 1, $max = 50),
            'order_id' => fake()->numberBetween($min = 1, $max = 20),
            'name' => fake()->name(),
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 300),
            'quantity' => fake()->numberBetween($min = 1, $max = 20),
            'total' => fake()->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 300),
            'image' => 'table.webp',
        ];
    }
}
