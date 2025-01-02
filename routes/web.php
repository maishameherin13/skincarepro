<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\DashboardController;
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

Route::get('/quiz', [QuizController::class, 'index'])->name('quiz');
Route::post('/quiz/submit', [QuizController::class, 'submit'])->name('quiz.submit');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/quiz', [QuizController::class, 'show'])->name('quiz');
    Route::post('/quiz', [QuizController::class, 'store'])->name('quiz.store');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
