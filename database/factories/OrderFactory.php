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
    public function definition(): array
    {
        return [
            'user_id' => rand(1, 10),
            'user_name' => fake()->name(),
            'user_email' => fake()->email(),
            'user_phone' => fake()->phoneNumber(),
            'user_address' => fake()->address(),
            'total_price' => 1000000,
        ];
    }
}
