<?php

use App\Http\Controllers\LaporanTransaksiController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\NotesController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\DiscountController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('staff', StaffController::class);
    Route::resource('laporan', LaporanTransaksiController::class);
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('type', TypeController::class);
    Route::resource('discount', DiscountController::class);
    Route::resource("note", NotesController::class);

    Route::get('/cart', [ProductController::class, 'cart'])->name('cart');
    Route::get('/cart/add/{id}/{value}', [ProductController::class, 'addItem'])->name('additem');
    // Route::get("/pembeli", [UserController::class, 'index'])->name("homePembeli");
    Route::get("/historyTransaksi", [UserController::class, 'historyTransaksi'])->name("historyTransaksi");
    Route::get("/pembeli/category", [UserController::class, 'category'])->name("pembeliCategory");
    Route::post("/pembeli/category/products", [UserController::class, 'categoryByProduct'])->name("categoryByProduct");
    Route::get('product/addcart/{id}', [ProductController::class, 'addToCart'])->name('addToCart');
    Route::post('/discount/apply', [DiscountController::class, 'applyDiscount'])->name('applydiscount');
    Route::post('/point/apply', [DiscountController::class, 'applyPoint'])->name('applypoint');
    Route::post('/discount/checkout', [NotesController::class, 'checkout'])->name('checkout');
    Route::get('/pembeli/profile', [UserController::class, 'profile'])->name('profile');
    Route::post('/pembeli/topup', [UserController::class, 'updateSaldo'])->name('updateS');
});

Auth::routes();
