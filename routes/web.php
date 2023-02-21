<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
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

require __DIR__ . '/web/auth.php';
require __DIR__ . '/web/cart.php';
require __DIR__ . '/web/categories.php';
require __DIR__ . '/web/products.php';
require __DIR__ . '/web/admin.php';
require __DIR__ . '/web/users.php';
require __DIR__ . '/web/orders.php';

/* HOME */
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

/* CHECKOUT */
Route::get('/checkout', [CheckoutController::class, '__invoke'])
    ->middleware('auth')
    ->name('checkout');