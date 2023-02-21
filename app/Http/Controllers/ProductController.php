<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get query parameters
        $sort = $request->input('sort_by');
        $search = $request->input('search');

        // Get all products
        $products = Product::all();

        // If SORT query exists, order products based on sort value
        if ($sort) {
            switch ($sort) {
                case 'price-asc':
                    $products = $products->sortBy('price');
                    break;
                case 'price-desc':
                    $products = $products->sortBy('price')->reverse();
                    break;
                case 'alphabetically':
                    $products = $products->sortBy('artisan');
                    break;
                case 'date':
                    $products = $products->sortBy('created_at');
                    break;
            }
            // If SEARCH query exists, filter products based on search value
        } else if ($search) {
            $products = Product::where('name', 'like', '%' . "%{$search}%" . '%')
                ->orWhere('artisan', 'like', '%' . "%{$search}%" . '%')
                ->orWhere('description', 'like', '%' . "%{$search}%" . '%')
                ->get();
        }

        // Render view
        return view('products.index', [
            'products' => $products,
            'categories' => Category::all(),
            'category' => Category::find(request('category')),
            'cart' => Cart::content(),
            'search' => $search
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form fields
        $validateFields = $request->validate([
            'category_id' => 'required',
            'artisan' => 'required',
            'name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        // If image exists, add it to storage
        if ($request->hasFile('image')) {
            $validateFields['image'] = $request->file('image')->store('upload', 'public');
        }

        // Create a new product
        Product::create($validateFields);

        return back()->with('message', 'New product successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find product
        $product = Product::find($id);

        // Find cart item with matching product id
        $cartItem = Cart::content()
            ->where('id', $product->id)
            ->first();

        // Render view
        return view('products.show', [
            'products' => Product::paginate(8),
            'product' => $product,
            'cart' => Cart::content(),
            'cartItem' => $cartItem
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate form fields
        $formFields = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048'
        ]);

        // If image exists, add it to storage
        if ($request->hasFile('image')) {
            $formFields['image'] = $request->file('image')->store('upload', 'public');
        }

        // Update existing product
        Product::find($id)->update($formFields);

        return back()->with('message', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Delete product
        Product::find($id)->delete();

        return back()->with('message', 'Product deleted successfully');
    }

    /**
     * Display all products from specific category.
     */
    public function __invoke(Request $request, $id)
    {
        // Get query parameter value
        $sort = $request->input('sort_by');

        // Filter products with matching category id
        $products = Product::where('category_id', $id)->get();

        // If SORT query exists, order products based on sort value
        switch ($sort) {
            case 'price-asc':
                $products = $products->sortBy('price');
                break;
            case 'price-desc':
                $products = $products->sortBy('price')->reverse();
                break;
            case 'alphabetically':
                $products = $products->sortBy('artisan');
                break;
            case 'date':
                $products = $products->sortBy('created_at');
                break;
        }

        // Render view
        return view('products.index', [
            'products' => $products,
            'cart' => Cart::content(),
            'categories' => Category::all(),
            'category' => Category::find($id),
            'categoryId' => $id,
        ]);
    }
}
