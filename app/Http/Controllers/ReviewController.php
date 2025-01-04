<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Product;  // Make sure this is present
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Show the form to submit a review
    public function showReviewForm()
    {
        // Fetch all products from the products table
        $products = Product::all();  // Fetch products

        // Fetch all reviews to display in the view
        $reviews = Review::all(); // Fetch reviews

        // Pass products and reviews to the view
        return view('reviews.create', compact('products', 'reviews'));
    }

    // Store the submitted review
    public function storeReview(Request $request)
    {
        // Validate the request data
        $request->validate([
            'username' => 'required',
            'product_name' => 'required',
            'review' => 'required',
        ]);
        $product = Product::where('product_name', $request->product_name)->first();

// Check if product exists
if (!$product) {
    return redirect()->back()->with('error', 'Product not found!');
}

Review::create([
    'username' => $request->username,
    'product_name' => $request->product_name,
    'review' => $request->review,
    'user_id' => Auth::id(),
    'product_id' => $product->id, // This should be correctly assigned now
]);
        // Redirect back with success message
        
        return redirect()->back()->with('success', 'Review submitted successfully!');
    }
    public function like($id)
        {
            $review = Review::find($id);
            $review->likes += 1;
            $review->save();

            return back();
        }

    public function dislike($id)
        {
            $review = Review::find($id);
            $review->dislikes += 1;
            $review->save();

            return back();
        }

}
