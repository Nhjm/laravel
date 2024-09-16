<?php

namespace App\Http\Controllers;

use App\Events\OrderCreated;
use App\Models\Catalogue;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class OrderController extends Controller
{
    const PATH_VIEW = 'orders.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $catalogues = Catalogue::with('children')->whereNull('catalogue_id')->where('is_active', true)->latest('id')->get();

        if (Auth::check() && Auth::user()->role == 'user') {
            // $cart
        } else {
            $cart = session('cart', []);
            if (empty($cart)) {
                return back();
            }
            $total_price = session('total_price', []);
        }
        // dd($cart);
        return view(self::PATH_VIEW . __FUNCTION__, compact('catalogues', 'cart', 'total_price'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if (Auth::check() && Auth::user()->role == 'user') {

        } else {
            try {
                $cart = session('cart', []);
                // dd($cart);

                $name = $request->ho . ' ' . $request->ten;

                $vouchers = [];
                if ($request->voucher) {
                    $voucher_tmp = explode(',', $request->voucher);

                    foreach ($voucher_tmp as $item) {
                        $discount_code = $this->check_discount_code($item);
                        if ($discount_code) {
                            $amount = floatval($discount_code->amount);

                            $vouchers[] = [$discount_code->type => $amount];
                        }
                    }
                }
                // dd($vouchers);

                $total_price = session('total_price', 0);
                $after_voucher = $total_price;

                foreach ($vouchers as $voucher) {
                    foreach ($voucher as $key => $amount) {
                        if ($key === 'percentage') {
                            $after_voucher -= ($after_voucher / 100) * $amount;
                        } else {
                            $after_voucher -= $amount;
                        }
                    }
                }


                DB::beginTransaction();

                $user = User::firstOrCreate([
                    'email' => $request->email,
                ], [
                    'name' => $name,
                    'password' => Hash::make($request->email),
                ]);

                $order = Order::create([
                    'user_id' => $user->id,
                    'user_name' => $name,
                    'user_email' => $request->email,
                    'user_phone' => $request->sdt,
                    'user_address' => $request->address,
                    'user_notes' => $request->note,
                    'total_price' => $after_voucher,
                ]);

                $cart_items = [];
                foreach ($cart as $variant_id => $value) {
                    $cart_items[] = [
                        'order_id' => $order->id,
                        'product_variant_id' => $variant_id,
                        'quantity' => $value['cart_quantity'],
                        'name' => $value['name'],
                        'sku' => $value['sku'],
                        'img_thumbnail' => $value['image'],
                        'price_regular' => $value['price_regular'],
                        'price_sale' => $value['price_sale'],
                        'variant_size_name' => $value['size']['name'],
                        'variant_color_name' => $value['color']['name'],
                    ];
                }

                foreach ($cart_items as $item) {
                    OrderItem::create($item);
                }

                DB::commit();

                if ($request->thanh_toan === 'qr') {
                    $image_qr = 'https://img.vietqr.io/image/vietinbank-107877770396-compact2.jpg?amount=' . $after_voucher . '&addInfo=DH' . $order->id . '&accountName=Lê Văn Tuấn';
                    $order_id = $order->id;

                    return view(self::PATH_VIEW . 'qr', compact('image_qr', 'order_id', 'after_voucher'));
                } else {

                    event(new OrderCreated($order, $total_price, $after_voucher, $vouchers));

                    session()->flush();

                    return view(self::PATH_VIEW . 'success', compact('order', 'cart_items', 'total_price', 'after_voucher', 'vouchers'));
                }


            } catch (\Throwable $th) {
                DB::rollback();
                return $th->getMessage();
            }
        }
    }

    public function payment(Request $request)
    {
        // dd($request->all());

        $order = Order::with('order_items')->findOrFail($request->order_id);
        $order->update([
            'status_payment' => 'paid',
        ]);

        $cart_items = $order->order_items;
        $total_price = $order->total_price;
        $after_voucher = $total_price;
        $vouchers = [];

        event(new OrderCreated($order, $order->total_price, $order->total_price, $vouchers));

        session()->flush();

        return view(self::PATH_VIEW . 'success', compact('order', 'cart_items', 'total_price', 'after_voucher', 'vouchers'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
