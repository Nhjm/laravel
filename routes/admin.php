<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CatalogueController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\DiscountCodeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductColorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('admin')
    ->as('admin.')
    ->group(function () {
        Route::get('login', [LoginController::class, 'login_form'])->name('login.form');

        Route::post('login', [LoginController::class, 'login'])->name('login');

        Route::post('logout', [LoginController::class, 'logout'])->name('logout');

        Route::middleware('check_admin')->group(function () {
            Route::get('/', function () {
                return view('admin.index');
            })->name('index');

            Route::resource('catalogues', CatalogueController::class);

            Route::resource('products', ProductController::class);

            Route::resource('colors', ProductColorController::class);

            Route::resource('sizes', ProductSizeController::class);

            Route::resource('sliders', SliderController::class);

            Route::resource('discount_codes', DiscountCodeController::class);

            Route::resource('orders', OrderController::class);

            Route::get('orders/export_order/{order}', [OrderController::class, 'export_order'])->name('orders.export_order');
        });
    });
