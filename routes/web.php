<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

Route::get('/blogs', function () {
    return view('blogs');
})->name('blogs');

Route::get('/community', function () {
    return view('community');
})->name('community');

Route::get('/products', function () {
    return view('products');
})->name('products');

Route::get('/quiz', function () {
    return view('quiz');
})->name('quiz');

Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');

Route::get('/quiz/result/{id}', [ResultController::class, 'show'])->name('quiz.result');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/product/{product_id}', function($product_id) {
    // Fetch the product by ID using the query builder
    $product = DB::table('products')->where('product_id', $product_id)->first();

    if (!$product) {
        abort(404, 'Product not found');
    }

    return view('productdetails', compact('product'));
})->name('product.details');

Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.index');

Route::post('/product/{product_id}/add-to-cart', [CartController::class, 'addToCart'])->name('product.addToCart');
Route::get('/product/{product}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/update/{product_id}', [CartController::class, 'updateQuantity'])->name('cart.update');
Route::delete('/cart/remove/{product_id}', [CartController::class, 'removeItem'])->name('cart.remove');


Route::get('/cart/checkout', function () {
    return view('cart.checkout');
})->name('checkout');

Route::post('/cart/checkout/complete', function () {
    session()->flash('success', 'Your Purchase is complete!');
    return redirect()->route('checkout'); // Redirect back to the checkout page
})->name('checkout.complete');

Route::get('/product/{id}/image', [ProductController::class, 'show'])->name('product.image');


require __DIR__.'/auth.php';
