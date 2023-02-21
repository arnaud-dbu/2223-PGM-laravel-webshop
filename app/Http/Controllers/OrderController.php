<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get id from logged user
        $userId = Auth::user()->id;

        // Get order list matching user id and status set to open
        $orderId = Order::all()
        ->where('user_id', $userId)
        ->where('status', 'open')
        ->first()
        ->id;

        // Get all order items with matching order id
        $orderItems = OrderItem::all()
        ->where('order_id', $orderId);

        return view('orders.index', [
            'orders' => $orderItems,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Get product id
        $product=Product::find(request('id'));
        
        // Get user id
        $user = Auth::user()->id;

        // Get order(s) matching user id and status set to open
        $userOrder = Order::all()
        ->where('user_id', $user)
        ->where('status', 'open');

        // Get order list id
        $userOrderId = $userOrder->first()->id;

        // Create form
        $formFields = [
            'product_id' => $product['id'],
            'order_id' => $userOrderId,
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => request('quantity'),
            'total' => $product['price'] * request('quantity'),
            'thumbnail' => $product['thumbnail']
        ];

        // Search existing order
        $existingOrder = OrderItem::all()
        ->where('order_id', $userOrderId)
        ->where('product_id', $product['id'])
        ->first();
     
        // If order already exists, update the order
        if ($existingOrder) {
            $existingOrder->update($formFields);
        } else {
            // Else, create a new one
            OrderItem::create($formFields);
        }

        return redirect()->route('product', $product->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete order
        Order::find($id)->delete();
        
        return back()->with('message', 'Order deleted successfully');
    }
}