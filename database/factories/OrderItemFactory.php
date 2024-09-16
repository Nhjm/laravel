<?php

namespace Database\Factories;

use Illuminate\Support\Str;
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
    public function definition(): array
    {
        return [
            'order_id' => rand(1, 10),
            'product_variant_id' => rand(1, 10),
            'quantity' => 10,
            'name' => fake()->text(10),
            'sku' => Str::random(10),
            'img_thumbnail' => fake()->imageUrl(),
            'price_regular' => 100000,
            'variant_size_name' => fake()->text(10),
            'variant_color_name' => fake()->text(10),
        ];
    }
}
