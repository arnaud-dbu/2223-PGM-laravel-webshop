<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| CATEGORIES WEB ROUTES
|--------------------------------------------------------------------------
*/

// Delete category
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])
    ->middleware('admin')
    ->name('category.destroy');

// Update category
Route::put('/categories/{category}', [CategoryController::class, 'update'])
    ->middleware('admin')
    ->name('category.update');

// Create new category
Route::post('/categories', [CategoryController::class, 'store'])
    ->middleware('admin')
    ->name('category.store');
