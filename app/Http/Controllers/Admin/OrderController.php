<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    const PATH_VIEW = 'admin.orders.';
    public function index()
    {
        $data = Order::latest('id')->get();

        $status_order = Order::STATUS_ORDER;
        $status_payment = Order::STATUS_PAYMENT;

        return view(self::PATH_VIEW . __FUNCTION__, compact('data', 'status_order', 'status_payment'));
    }

    public function export_order(Order $order)
    {
        // $order = $order->load('order_items')->toArray();
        $order->load('order_items');
        $status_payment = Order::STATUS_PAYMENT;
        // dd($order);
        // Pdf::setOption(['dpi' => 20, 'defaultFont' => 'Roboto']);
        // $bill = Pdf::loadView(self::PATH_VIEW . 'bill', $order);
        return view(self::PATH_VIEW . 'bill_2', compact('order', 'status_payment'));
        // return $bill->stream();
        // return $bill->download('invoice.pdf');
    }

    public function show(Order $order)
    {
        // $order = $order->load('order_items')->toArray();
        $order->load('order_items');

        $status_order = Order::STATUS_ORDER;
        $status_payment = Order::STATUS_PAYMENT;
        // dd($order);
        return view(self::PATH_VIEW . __FUNCTION__, compact('order', 'status_order', 'status_payment'));
    }

    public function update(Request $request, Order $order)
    {
        $order->update($request->all());

        return response()->json([
            'success' => true,
            // 'reload' => true,
            'data' => $order,
            'message' => 'Cập nhật thành công'
        ], 200);
    }
}
