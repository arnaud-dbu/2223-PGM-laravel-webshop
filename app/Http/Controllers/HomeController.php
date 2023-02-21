<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    // Show all products
    public function index()
    {
        $latestProducts = Product::latest()->take(8)->get();
        $cart = Cart::content();

        return view('home', [
            'products' => $latestProducts,
            'categories' => Category::all(),
            'cart' => $cart
        ]);
    }
}
