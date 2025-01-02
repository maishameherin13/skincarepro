<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/quiz', [QuizController::class, 'show'])->name('quiz'); // Use 'show' method
    Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
});

Route::get('/aboutus', function () {
    return view('aboutus');
})->name('aboutus');

use App\Http\Controllers\BlogController;
Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

use App\Http\Controllers\CommunityController;
Route::get('/community', [CommunityController::class, 'index'])->name('community.index');
Route::post('/community', [CommunityController::class, 'store'])->name('community.store');
Route::post('/reactions', [CommunityController::class, 'storeReaction'])->name('community.storeReaction');

use App\Http\Controllers\TasksController;

Route::middleware(['auth'])->group(function () {
    Route::get('tasks', [TasksController::class, 'index'])->name('tasks.index');
    Route::post('tasks', [TasksController::class, 'store']);
    Route::patch('tasks/{task}', [TasksController::class, 'markAsDone']);
    Route::delete('tasks/{task}', [TasksController::class, 'destroy']);
});

Route::get('/products', function () {
    return view('products');
})->name('products');

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
