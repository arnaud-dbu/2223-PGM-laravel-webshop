<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {

Route::get('/login', [AdminController::class, 'viewLogin'])
    ->name('admin.login_form');

Route::post('/login', [AdminController::class, 'login'])
    ->name('admin.login');

Route::get('/logout', [AdminController::class, 'logout'])
    ->name('admin.logout')
    ->middleware('admin');

Route::get('/dashboard/{table}', [AdminController::class, 'dashboard'])
    ->middleware('admin')
    ->name('admin.dashboard');
});
