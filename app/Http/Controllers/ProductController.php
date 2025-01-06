<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Search functionality
        $search = $request->input('search');
        $productsQuery = Product::query();

        if ($search) {
            $productsQuery->where('product_name', 'like', '%' . $search . '%');
        }

        $products = $productsQuery->get();
        return view('products', compact('products'));
    }

    public function show($product_id)
    {
        $product = Product::findOrFail($product_id);
        $imageData = $product->product_image;
        $imageInfo = getimagesizefromstring($imageData);
        $mimeType = $imageInfo['mime'];

        return response($imageData)->header('Content-Type', $mimeType);
    }

    public function addToFavorites($product_id)
    {
        $product = Product::find($product_id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        $favorites = session()->get('favorites', []);

        if (!isset($favorites[$product_id])) {
            $favorites[$product_id] = [
                'name' => $product->product_name,
                'price' => $product->product_price,
            ];
            session()->put('favorites', $favorites);

            return response()->json(['success' => true, 'message' => 'Product added to favorites']);
        }

        return response()->json(['success' => true, 'message' => 'Product is already in favorites']);
    }

    public function showFavorites()
    {
        $favorites = session()->get('favorites', []);
        return view('favorites', compact('favorites'));
    }

    // New method to delete product (moved from AdminController)
    public function deleteProduct($productId)
    {
        // Find the product by ID and delete it
        $product = Product::findOrFail($productId);
        $product->delete();

        // Redirect or return a success message after deletion
        return redirect()->route('admin.manageProducts')->with('status', 'Product deleted successfully!');
    }
}
