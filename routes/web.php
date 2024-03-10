<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'show'])->name('cart');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update', [CartController::class, 'update'])->name('cart.update');
    Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
});

Route::middleware('auth')->get('/products', [ProductController::class, 'index'])->name('products');

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::resource('products', AdminProductController::class);
});

Route::middleware('auth')->prefix('billing')->group(function () {
    Route::get('/', [BillingController::class, 'showForm'])->name('billing.form');
    Route::post('/', [BillingController::class, 'submit'])->name('billing.submit');
});


Route::middleware('auth')->prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/purchase', [OrderController::class, 'purchase'])->name('order.purchase');
    Route::get('/{order}', [OrderController::class, 'show'])->name('order.show');
});


require __DIR__ . '/auth.php';
