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

    // Method to show the product editing form
    public function editProduct($productId)
    {
        $product = Product::findOrFail($productId);

        return view('admin.editProduct', compact('product'));
    }

    // Method to update the product
    public function updateProduct(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        // Validate the form data
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_price' => 'required|integer|min:0',
            'product_description' => 'required|string',
            'how_to_use' => 'required|string',
            'product_ingredients' => 'required|string',
            'product_image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        // Update the product fields
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_description = $request->product_description;
        $product->how_to_use = $request->how_to_use;
        $product->product_ingredients = $request->product_ingredients;

        if ($request->hasFile('product_image')) {
            // Store the uploaded image
            $imagePath = $request->file('product_image')->store('product_images', 'public');
            $product->product_image = $imagePath;
        }

        $product->save(); // Save the updated product

        // Redirect after the product is updated
        return redirect()->route('admin.manageProducts')->with('status', 'Product updated successfully!');
    }
}
