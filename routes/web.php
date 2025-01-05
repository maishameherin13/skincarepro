<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Auth\AdminAuthenticatedSessionController;

Route::get('/', function () {
    return view('welcome');
});

// Admin Login Routes
Route::get('admin/login', [AdminAuthenticatedSessionController::class, 'create'])->name('admin.login');
Route::post('admin/login', [AdminAuthenticatedSessionController::class, 'store']);
Route::post('admin/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('admin.logout');

// Admin Dashboard Route
Route::middleware('auth:admin')->get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::post('admin/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('admin.logout');



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/quiz', [QuizController::class, 'show'])->name('quiz');
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

Route::post('/product/{product_id}/add-to-favorites', [ProductController::class, 'addToFavorites'])->name('product.addToFavorites');
Route::get('/favorites', [ProductController::class, 'showFavorites'])->name('favorites');

Route::get('/reviews', [ReviewController::class, 'showReviewForm'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'storeReview'])->name('reviews.store');
Route::post('/reviews/{review}/like', [ReviewController::class, 'like'])->name('reviews.like');
Route::post('/reviews/{review}/dislike', [ReviewController::class, 'dislike'])->name('reviews.dislike');

Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::get('/product/{product_id}', function($product_id) {
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
    return redirect()->route('checkout');
})->name('checkout.complete');

Route::get('/product/{id}/image', [ProductController::class, 'show'])->name('product.image');

// Require the authentication routes (login, register, etc.)
require __DIR__.'/auth.php';
