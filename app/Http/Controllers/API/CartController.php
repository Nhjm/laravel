<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Product $product, Request $request)
    {
        // dd($request->all());

        $variant = $product->variants()
            ->with('color', 'size')
            ->where([
                'product_color_id' => $request->color,
                'product_size_id' => $request->size
            ])->firstOrFail();

        // session()->flush();

        $quantity = $variant->quantity;


        if (Auth::check() && Auth::user()->role == 'user') {
            $cart = Cart::firstOrCreate(['user_id' => Auth::user()->id]);

            // CartItem::updateOrCreate([
            //     'cart_id' => $cart->id,
            //     'product_variant_id' => $variant->id
            // ], [
            //     'quantity' => min($request->quantity, $quantity),
            // ]);

            $cart_item = CartItem::where([
                'cart_id' => $cart->id,
                'product_variant_id' => $variant->id
            ])->first();

            if ($cart_item) {
                $cart_item->update([
                    'quantity' => min($cart_item->quantity + $request->quantity, $quantity)
                ]);
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'product_variant_id' => $variant->id,
                    'quantity' => min($request->quantity, $quantity)
                ]);
            }

        } else {

            $cart = session('cart', []);
            $product = $product->toArray();
            unset($product['image'], $product['id']);

            if (!isset($cart[$variant->id])) {
                $data = $product + $variant->toArray() + ['cart_quantity' => min($request->quantity, $quantity)];
                $cart[$variant->id] = $data;
            } else {
                $cart_quantity = $cart[$variant->id]['cart_quantity'];
                $cart[$variant->id]['cart_quantity'] = min($cart_quantity + $request->quantity, $quantity);
            }

            session()->put('cart', $cart);
        }

        // dd(session('cart'));
        return response()->json([
            'success' => true,
            'message' => 'thêm giỏ hàng thành công'
        ], 201);
    }

    public function index()
    {
        if (Auth::check() && Auth::user()->role == 'user') {
            $cart = Cart::with('cart_items.variant')->where('user_id', Auth::user()->id)->first();

            $cart_items = $cart->cart_items;

            $total_price = $cart_items->sum('quantity * product_variant.price');

            return response()->json([
                'success' => true,
                'cart' => $cart_items,
                'total_price' => $total_price
            ]);
        } else {
            $cart = session('cart', []);

            // dd($cart);
            $total_price = 0;

            foreach ($cart as $variant) {
                $total_price += ($variant['price_sale'] ?? $variant['price_regular']) * $variant['cart_quantity'];
            }

            session()->put('total_price', $total_price);

            return response()->json([
                'success' => true,
                'cart' => $cart,
                'total_price' => $total_price
            ], 200);
        }
    }

    public function destroy(Request $request, string $variant_id)
    {
        if (Auth::check() && Auth::user()->role == 'user') {

        } else {
            $cart = session('cart', []);

            if (isset($cart[$variant_id])) {
                unset($cart[$variant_id]);

                session()->put('cart', $cart);
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'xoá giỏ hàng thành công'
        ], 200);
    }
}
