<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

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
    public function definition(): array
    {
        $name = fake()->text(20);
        return [
            'catalogue_id' => rand(1, 10),
            'slug' => $name . '-' . Str::random(1),
            'sku' => Str::random(10),
            'name' => $name,
            'image' => fake()->imageUrl(),
            'price_regular' => 100000,
            'price_sale' => 80000,
            'description' => fake()->text(20),
            'material' => fake()->text(10),
            'user_manual' => fake()->text(10),
            'content' => fake()->text(40),
        ];
    }
}
