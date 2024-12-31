<?php

namespace App\Http\Controllers;

use App\Models\Product; // Assuming you have a Product model
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Method to fetch all products and pass them to the view
    public function index()
    {
        // Retrieve all products from the database
        $products = Product::all();

        // Pass the products data to the products view
        return view('products', compact('products'));
    }
    
    public function show($product_id)
    {
        // Retrieve the product by its ID
        $product = Product::findOrFail($product_id);
    
        // Get the image data (BLOB) from the database
        $imageData = $product->product_image;
    
        // // Return the image as a response with the appropriate content type
        // return response($imageData)
        //     ->header('Content-Type', 'image/jpeg'); // Or the appropriate mime type for your images
    
        $imageInfo = getimagesizefromstring($imageData);
        $mimeType = $imageInfo['mime'];
        
        return response($imageData)
            ->header('Content-Type', $mimeType);
    }
  


}
