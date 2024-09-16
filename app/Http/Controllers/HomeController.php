<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use App\Models\Product;
use App\Models\Catalogue;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class HomeController extends Controller
{

    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        $catalogues = Catalogue::with('children')->whereNull('catalogue_id')->where('is_active', true)->latest('id')->get();

        $sliders = Slide::latest('id')->get();

        $products = Product::where('is_active', true)->take(12)->get();
        // dd($catalogues);
        return view('index', compact('catalogues', 'sliders', 'products'));
    }

    public function product_detail(Product $product)
    {
        $product->load(['variants.color', 'variants.size', 'galleries']);
        // dd($product);

        return response()->json([
            'product' => $product,
            'variants' => $product->variants,
            'galleries' => $product->galleries
        ], 201);
    }

    public function voucher(Request $request)
    {
        // dd($request->all());

        $voucher = $this->check_discount_code($request->name);

        if ($voucher) {
            return response()->json([
                'success' => true,
                'voucher' => $voucher,
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Không có voucher này'
            ], 200);
        }
    }
}
