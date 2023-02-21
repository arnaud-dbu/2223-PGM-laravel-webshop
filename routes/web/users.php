<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| USERS WEB ROUTES
|--------------------------------------------------------------------------
*/

// Delete user
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->middleware('admin')
    ->name('user.destroy');

// Create user
Route::post('/users', [UserController::class, 'store'])
    ->middleware('admin')
    ->name('user.store');

// Update user
Route::put('/users/{user}', [UserController::class, 'update'])
    ->middleware('admin')
    ->name('user.update');