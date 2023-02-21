<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PRODUCTS WEB ROUTES
|--------------------------------------------------------------------------
*/

// Show all products
Route::get('/products', [ProductController::class, 'index'])
    ->name('product.index');

// Show single product
Route::get('/products/{product}', [ProductController::class, 'show'])
    ->name('product.show');

// Create new product
Route::post('/products', [ProductController::class, 'store'])
    ->middleware('admin')
    ->name('product.store');

// Delete product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->middleware('admin')
    ->name('product.destroy');

// Update product
Route::put('/products/{product}', [productController::class, 'update'])
    ->middleware('admin')
    ->name('product.update');

    // Show all products from specific category
Route::get('/products/category/{category}', [ProductController::class, '__invoke'])
    ->name('product.category');
