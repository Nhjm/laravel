<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\API\LogController;
use App\Http\Controllers\API\CartController;
use App\Http\Controllers\API\WebhookController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('webhook', [WebhookController::class, 'index']);

Route::get('log', [LogController::class, 'index'])->name('log');

// Route::post('user', 'UserController@index')->name('user');

Route::post('payment', [OrderController::class, 'payment'])->name('payment')->middleware('web');

Route::get('product_detail/{product}', [HomeController::class, 'product_detail'])->name('api.product_detail');

Route::post('add_cart/{product}', [CartController::class, 'store'])->name('api.add_cart')->middleware('web');

Route::get('cart', [CartController::class, 'index'])->name('api.cart')->middleware('web');

Route::delete('destroy_cart/{variant_id}', [CartController::class, 'destroy'])->name('api.destroy_cart')->middleware('web');

Route::get('voucher', [HomeController::class, 'voucher'])->name('voucher');


