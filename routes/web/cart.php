<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CART WEB ROUTES
|--------------------------------------------------------------------------
*/

// Add item to cart
Route::post('/cart', [CartController::class, 'store'])
->name('cart.store');

// Delete item in cart
Route::delete('/cart/{item}', [CartController::class, 'destroy'])
->name('cart.destroy');