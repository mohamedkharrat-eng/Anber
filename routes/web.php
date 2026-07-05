<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

// Customer
Route::get('/', [HomeController::class, 'index']);

// Admin Auth
Route::get('/admin/login', [AdminController::class, 'loginPage']);
Route::post('/admin/login', [AdminController::class, 'login']);
Route::get('/admin/logout', [AdminController::class, 'logout']);

// Admin Panel
Route::middleware('auth.admin')->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard']);
    Route::get('/admin/products', [ProductController::class, 'index']);
    Route::get('/admin/products/create', [ProductController::class, 'create']);
    Route::post('/admin/products', [ProductController::class, 'store']);
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit']);
    Route::put('/admin/products/{id}', [ProductController::class, 'update']);
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy']);
    Route::delete('/admin/orders/{id}/delete', [AdminController::class, 'deleteOrder']);
    Route::get('/admin/messages', [AdminController::class, 'messages']);
    Route::delete('/admin/messages/{id}/delete', [AdminController::class, 'deleteMessage']);
});


// Cart
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add/{id}', [CartController::class, 'add']);
Route::post('/cart/update/{id}', [CartController::class, 'update']);
Route::get('/cart/remove/{id}', [CartController::class, 'remove']);
Route::get('/checkout', [CartController::class, 'checkout']);

// Order
Route::post('/order', [OrderController::class, 'store']);
Route::get('/order/success', [OrderController::class, 'success']);
Route::middleware('auth.admin')->group(function () {
    // existing routes...
    Route::get('/admin/orders', [AdminController::class, 'orders']);
    Route::post('/admin/orders/{id}/status', [AdminController::class, 'updateStatus']);
});// Customer
Route::get('/', [HomeController::class, 'index']);
Route::get('/products', [HomeController::class, 'products']);
Route::get('/contact', [HomeController::class, 'contact']);

use App\Http\Controllers\MessageController;

Route::post('/contact', [MessageController::class, 'store']);
Route::get('/favourites', [HomeController::class, 'favourites']);