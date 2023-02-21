<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /* CATEGORIES SEEDER */
        Category::factory()->create([
            'name' => 'Bowls',
            'slug' => str()->slug('Bowls'),
            'description' => fake()->text($maxNbChars = 100),
            'image' => 'bowls.webp',
        ]);

        Category::factory()->create([
            'name' => 'Cups',
            'slug' => str()->slug('Cups'),
            'description' => fake()->text($maxNbChars = 100),
            'image' => 'cups.webp',
        ]);

        Category::factory()->create([
            'name' => 'Candleholders',
            'slug' => str()->slug('Candleholders'),
            'description' => fake()->text($maxNbChars = 100),
            'image' => 'candleholders.webp',
        ]);
        Category::factory()->create([
            'name' => 'Planters',
            'slug' => str()->slug('planters'),
            'description' => fake()->text($maxNbChars = 100),
            'image' => 'planters.webp',
        ]);
        Category::factory()->create([
            'name' => 'Pitchers',
            'slug' => str()->slug('pitchers'),
            'description' => fake()->text($maxNbChars = 100),
            'image' => 'pitchers.webp',
        ]);
        Category::factory()->create([
            'name' => 'Plates',
            'slug' => str()->slug('plates'),
            'description' => fake()->text($maxNbChars = 100),
            'image' => 'plates.webp',
        ]);
        Category::factory()->create([
            'name' => 'Sculptures',
            'slug' => str()->slug('sculptures'),
            'description' => fake()->text($maxNbChars = 100),
            'image' => 'sculptures.webp',
        ]);
        Category::factory()->create([
            'name' => 'Teapots & Coffee drippers',
            'slug' => str()->slug('Teapots & Coffee drippers'),
            'description' => fake()->text($maxNbChars = 100),
            'image' => 'teapots.webp',
        ]);
        Category::factory()->create([
            'name' => 'Vases',
            'slug' => str()->slug('Vases'),
            'description' => fake()->text($maxNbChars = 100),
            'image' => 'vases.webp',
        ]);

        /* USERS SEEDER */
        User::factory(10)->create();
        
        /* PRODUCTS SEEDER */
        $categories = Category::all();

        foreach ($categories as $category) {
            for ($i = 0; $i < 10; $i++) {
                # code...
                Product::factory()
                    ->create([
                        'category_id' => $category->id,
                        'artisan' => fake()->name(2),
                        'name' => fake()->colorName(),
                        'price' => fake()->randomFloat($nbMaxDecimals = 2, $min = 20, $max = 300),
                        'stock' => fake()->numberBetween($min = 0, $max = 10),
                        'description' => fake()->text($maxNbChars = 100),
                        'image' => $category->slug . Arr::random(['-1.webp', '-2.webp', '-3.webp', '-4.webp', '-5.webp'])
                    ]);
            }
        }

        /* ORDERS SEEDER */
        Order::factory(20)->create();

        /* ORDER-ITEMS SEEDER */
        OrderItem::factory(200)->create();

        /* ADMIN SEEDER */
        Admin::factory(1)->create();
    }
}
