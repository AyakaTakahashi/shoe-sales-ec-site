<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['verify' => true]);

//Product
Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::resource('products', ProductController::class)->middleware(['auth', 'verified']);
Route::post('/favorite/{product}', [ProductController::class, 'favoriteProductsToggle'])->name('products.favorite');

//User
Route::get('users', [UserController::class, 'index'])->name('users.index');
Route::get('users/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('users/update', [UserController::class, 'update'])->name('users.update');
Route::get('users/password', [UserController::class, 'showPasswordUpdate'])->name('users.show_password_update');
Route::put('users/password', [UserController::class, 'updatePassword'])->name('users.update_password');
Route::get('users/favorite', [UserController::class, 'showFavorite'])->name('users.favorite');
Route::get('users/orderhistory', [UserController::class, 'getOrderHistory'])->name('users.order_history');
Route::get('users/orderhistorydetail/{order_id}', [UserController::class, 'getOrderHistoryDetail'])->name('users.order_history_detail');

//cart
Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/add', [CartController::class, 'addToCart'])->name('cart.add');

//Order
Route::get('order', [OrderController::class, 'index'])->name('orders.checkout');
Route::put('order/create', [OrderController::class, 'create'])->name('orders.create');
Route::get('order/complete/{order_id}', [OrderController::class, 'showOrderComplete'])->name('orders.complete');
