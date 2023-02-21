<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{

    public function __invoke()
    {
        // Get cart items
        $cart = Cart::content();

        // Get logged user id
        $userId = Auth::user()->id;

        // Check if logged user has an open order
        $userOrder = Order::all()
            ->where('user_id', $userId)
            ->where('status', 'open');
        $userOrderId = $userOrder->first()->id;

        // Get logged user orderlist
        $userOrderItems = OrderItem::all()
            ->where('order_id', $userOrderId);


        foreach ($cart as $item) {
            // Check if cart item is existing in database
            $existingOrder = $userOrderItems
                ->where('product_id', $item->id)
                ->first();

            // if yes, update existing order in database
            if ($existingOrder) {
                $existingOrder->update(['quantity' => $item->qty]);
            } else {
                // else, create a new one
                OrderItem::create([
                    'product_id' => $item->id,
                    'order_id' => $userOrderId,
                    'name' => $item->name,
                    'price' => $item->price,
                    'total' => ($item->price) * ($item->qty),
                    'quantity' => $item->qty,
                    'image' => $item->options->image,
                ]);
            }
        }
        return view('checkout.index', [
            'cart' => $cart
        ]);
    }
}
