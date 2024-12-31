<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart($product_id)
    {
        // Fetch the product by ID
        $product = Product::where('product_id', $product_id)->first();

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        // Add product to session (cart)
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity']++;
        } else {
            $cart[$product_id] = [
                'name' => $product->product_name,
                'price' => $product->product_price,
                'quantity' => 1,
                'image' => $product->product_image,
            ];
        }

        // Save the cart back to the session
        session()->put('cart', $cart);

        // Return a JSON response
        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }

    public function updateQuantity(Request $request, $product_id)
    {
        // Update the quantity of the product in the cart
        $cart = session()->get('cart', []);
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function removeItem($product_id)
    {
        // Remove the product from the cart
        $cart = session()->get('cart', []);
        if (isset($cart[$product_id])) {
            unset($cart[$product_id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.index');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
}
