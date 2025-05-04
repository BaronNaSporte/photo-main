<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

// Route::get('/', BaseController::class, "index")->name('main');
Route::get('/courses/brand/{brandId}', [BaseController::class, 'getCoursesByCategory']);

Route::get('/', [BaseController::class, 'index'])->name('courses.index');
Route::get('/brand/{brandId}', [BaseController::class, 'getCoursesByCategory'])->name('courses.getByCtegory');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function() {
    Route::get('/', [BaseController::class, 'index'])->name('reviews.index');
    Route::post('/', [BaseController::class, 'store'])->name('reviews.store');
    Route::delete('/{review}', [BaseController::class, 'destroy'])->name('reviews.destroy');
});

Route::middleware('auth')->group(function() {
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{course}', [CartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
    Route::patch('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
});

Route::middleware('auth')->group(function () {
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
});

require __DIR__.'/auth.php';
