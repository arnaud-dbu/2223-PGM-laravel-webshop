<?php

use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Show all categories
Route::get('/categories', [CategoryController::class, 'index']);

// Show all products
Route::get('/products', [ProductController::class, 'index']);

// Show all products from category
Route::get('/products/category/{category}', [ProductController::class, '__invoke'])
    ->name('product.category.api');

// Show single product
Route::get('/products/{product}', [ProductController::class, 'show']);

// Create new product
Route::post('/products', [ProductController::class, 'store']);

// Delete product
Route::delete('/products/{product}', [ProductController::class, 'destroy'])
    ->name('product.destroy.api');

// Update product
Route::put('/products/{product}', [productController::class, 'update']);


