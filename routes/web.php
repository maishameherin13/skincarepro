<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/results', function () {
    return view('results');
})->name('results');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
