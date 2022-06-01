<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\catalogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\productsController;
use App\Http\Controllers\Voyager\TransformController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::get('/news', [HomeController::class, 'news'])->name('home.news');

Route::get('/masterclass',[HomeController::class, 'master'])->name('home.master');

Route::resource('catalog', catalogController::class);
Route::get('product', [catalogController::class,'show'])->name('products.show');
Route::get('/cartShow', [CartController::class, 'show'])->name('cart.show');
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store');
Route::post('order', [CartController::class, 'order'])->name('cart.order');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear');
Route::post('check',[CartController::class,'check'])->name('cart.check');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('orders/transport',[TransformController::class, 'transport'])->name('orders.transport');
    Voyager::routes();
});
