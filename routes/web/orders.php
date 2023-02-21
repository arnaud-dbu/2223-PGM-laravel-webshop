<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ORDERS WEB ROUTES
|--------------------------------------------------------------------------
*/


// Get orders
Route::get('/orders', [OrderController::class, 'index'])
    ->middleware('auth')
    ->name('orders');

// Post order item
Route::post('/order-item', [CartController::class, 'store'])
    ->name('order-item');

// Delete Order item
Route::delete('/order-item/{orderItem}', [OrderController::class, 'destroy'])
    ->middleware('auth')
    ->name('order-item.delete');

Route::delete('/orders/{order}', [OrderController::class, 'destroy'])
    ->middleware('admin')
    ->name('order.destroy');
