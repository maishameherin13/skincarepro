<?php

namespace App\Http\Controllers;

use App\Models\Product; // Assuming you have a Product model
use App\Models\Rating; // Assuming you have a Rating model for storing ratings
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of products.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Retrieve the search query
    
        $products = Product::query();

        if ($search) {
            $products->where('product_name', 'like', '%' . $search . '%');
        }

        $products = $products->get();

        return view('products', compact('products'));
    }

    /**
     * Show a specific product by ID.
     *
     * @param int $product_id
     * @return \Illuminate\Http\Response
     */
    public function show($product_id)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($product_id);

        // Calculate the average rating for the product
        $averageRating = $product->ratings()->avg('rating');

        return view('product_details', compact('product', 'averageRating'));
    }

    /**
     * Display the product image.
     *
     * @param int $product_id
     * @return \Illuminate\Http\Response
     */
    public function showImage($product_id)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($product_id);

        // Get the image data (BLOB) from the database
        $imageData = $product->product_image;

        // Determine the MIME type
        $imageInfo = getimagesizefromstring($imageData);
        $mimeType = $imageInfo['mime'];

        return response($imageData)
            ->header('Content-Type', $mimeType);
    }

    /**
     * Add a product to the cart.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $product_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addToCart(Request $request, $product_id)
    {
        // Logic for adding the product to the cart
        // For example, saving the product ID to the session or database

        // Example response
        return response()->json(['success' => true, 'message' => 'Product added to cart']);
    }
    
    
    public function addToFavorites($product_id)
    {
        $product = Product::where('product_id', $product_id)->first();

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Product not found']);
        }

        //Add product to the session(favourite)
        $favorites = session()->get('favorites', []);
        //check if the product is already in the favorites
        if (isset($favorites[$product_id])) {
            $favorites[$product_id]['quantity']++;
        } else {
            $favorites[$product_id] = [
                'name' => $product->product_name,
                'price' => $product->product_price,
                'image' => $product->product_image,
            ];
        }
        session()->put('favorites', $favorites);
        return response()->json(['success' => true, 'message' => 'Product added to Favourites']);
    }
    /**
     * Display the list of favorite products.
     *
     * @return \Illuminate\View\View
     */
    public function showFavorites()
    {
        // Get the favorite products from the session
        $favorites = session()->get('favorites', []);

        return view('favorites', compact('favorites'));
    }


    
}
