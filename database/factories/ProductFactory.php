<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $array = ['bowl-1.webp', 'bowl-2.webp', 'bowl-3.webp', 'bowl-4.webp', 'bowl-5.webp'];
        return [
            'category_id' => fake()->numberBetween($min = 1, $max = 9),
            'artisan' => fake()->name(2),
            'name' => fake()->colorName(),
            'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 300),
            'stock' => fake()->numberBetween($min = 0, $max = 10),
            'description' => fake()->text($maxNbChars = 100),
            'image' => Arr::random($array)
        ];
    }
}
