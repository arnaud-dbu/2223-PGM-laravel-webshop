<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Render admin login form
    public function viewLogin()
    {
        return view('admin.login');
    }

    // Admin login
    public function login(Request $request)
    {
        $check = $request->all();

        if (Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password']])) {
            return redirect()->route('admin.dashboard', 'categories')->with('error', 'Admin Login Successfully');
        } else {
            return back()->with('error', 'Invalid Email or Password');
        }
    }

    // Admin log out
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('home')->with('error', 'Admin logged out successfully');
    }

    // Render admin back office
    public function dashboard(Request $request)
    {
        // Get path
        $path = $request->table;
        // Get search query value
        $search = $request->input('search');
        // Get last order
        $latestOrder = Order::latest()->first();
        // Get amount of orders closed today
        $todayOrders = Order::whereDate('updated_at', Carbon::today())
            ->where('status', 'closed')
            ->get();

        // Generate back office view based on url path
        switch ($path) {
            case 'categories':
                $collections = Category::query()->sortable()
                    ->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('updated_at', 'LIKE', "%{$search}%")
                    ->orWhere('created_at', 'LIKE', "%{$search}%")
                    ->get();
                break;
            case 'products':
                $collections = Product::query()->sortable()
                    ->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('artisan', 'LIKE', "%{$search}%")
                    ->orWhere('description', 'LIKE', "%{$search}%")
                    ->orWhere('price', 'LIKE', "%{$search}%")
                    ->orWhere('stock', 'LIKE', "%{$search}%")
                    ->get();
                break;
            case 'users':
                $collections = User::query()->sortable()
                    ->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('firstname', 'LIKE', "%{$search}%")
                    ->orWhere('lastname', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%")
                    ->get();
                break;
            case 'orders':
                $collections = Order::query()->sortable()
                    ->where('id', 'LIKE', "%{$search}%")
                    ->orWhere('user_id', 'LIKE', "%{$search}%")
                    ->orWhere('status', 'LIKE', "%{$search}%")
                    ->orWhere('total', 'LIKE', "%{$search}%")
                    ->get();
                break;
        }

        // Render view
        return view('admin.dashboard', [
            'collections' => $collections,
            'search' => $search,
            'orderItems' => OrderItem::all(),
            'categories' => Category::all(),
            'path' => $path,
            'latestOrder' => $latestOrder,
            'todayOrders' => $todayOrders
        ]);
    }
}
