<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Catalogue;
use App\Models\DiscountCode;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductSize;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Catalogue::factory(10)->create();
        ProductSize::factory(10)->create();
        ProductColor::factory(10)->create();
        Product::factory(10)->create();

        for ($product_id = 1; $product_id <= 10; $product_id++) {
            for ($size_id = 1; $size_id <= 4; $size_id++) {
                for ($color_id = 1; $color_id <= 3; $color_id++) {
                    ProductVariant::create([
                        'product_id' => $product_id,
                        'product_size_id' => $size_id,
                        'product_color_id' => $color_id,
                        'quantity' => 10,
                        'image' => fake()->imageUrl(),
                    ]);
                }
            }
        }

        for ($i = 1; $i <= 10; $i++) {
            ProductGallery::insert([
                [
                    'product_id' => $i,
                    'image' => fake()->imageUrl(),
                ],
                [
                    'product_id' => $i,
                    'image' => fake()->imageUrl(),
                ]
            ]);
        }

        DiscountCode::factory(10)->create();

        Cart::factory(10)->create();
        CartItem::factory(10)->create();
        Order::factory(10)->create();
        OrderItem::factory(10)->create();
    }
}
