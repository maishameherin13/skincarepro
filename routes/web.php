<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use Illuminate\Support\Facades\Route;

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
Route::post('/product/{product_id}/add-to-favorites', [ProductController::class, 'addToFavorites'])->name('product.addToFavorites');
Route::get('/favorites', [ProductController::class, 'showFavorites'])->name('favorites');

Route::get('/reviews', [ReviewController::class, 'showReviewForm'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'storeReview'])->name('reviews.store');
Route::post('/reviews/{review}/like', [ReviewController::class, 'like'])->name('reviews.like');
Route::post('/reviews/{review}/dislike', [ReviewController::class, 'dislike'])->name('reviews.dislike');
    


require __DIR__.'/auth.php';
