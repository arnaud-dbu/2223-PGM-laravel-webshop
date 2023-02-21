<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Find product
        $product = Product::findOrFail($request->input(key: 'product_id'));

        // Find cart item with matching product id
        $cartItem = Cart::content()
            ->where('id', $product->id)
            ->first();

        // Get order quantity & product stock
        $orderQuantity = $request->input(key: 'quantity');
        $productStock = $product->stock;

        // Check if there is enough stock for the requested product
        if ($orderQuantity > $productStock) {
            return redirect()->route('product.show', $product->id)
                ->with('message', 'Sorry, there are not enough products in stock');
        } else {
            // If cart item exists, update item with new value
            if ($cartItem) {
                $rowId = $cartItem->rowId;
                Cart::update($rowId, $request->input(key: 'quantity'));
                return redirect()->route('product.show', $product->id)->with('message', 'Item successfully updated');
                // Else, create a new cart item
            } else {

                Cart::add(
                    $product->id,
                    $product->name,
                    $request->input(key: 'quantity'),
                    $product->price,
                    '0',
                    ['artisan' => $product->artisan, 'image', 'image' => $product->image]
                );
                return redirect()->route('product.show', $product->id)->with('message', 'Item successfully added to cart');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
        Cart::remove($id);
        return back()->with('message', 'Cart item Successfully deleted');
    }
}
