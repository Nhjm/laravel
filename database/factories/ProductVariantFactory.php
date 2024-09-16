<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => rand(1, 20),
            'product_size_id' => rand(1, 4),
            'product_color_id' => rand(1, 3),
            'quantity' => 10,
            'image' => fake()->imageUrl(),
        ];
    }
}
