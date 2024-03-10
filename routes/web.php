<?php

use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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
    Route::get('/products', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/store', [AdminProductController::class, 'store'])->name('admin.products.store');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/products/{id}/update', [AdminProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/products/{id}/delete', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
});

Route::get('/billing', [BillingController::class, 'showForm'])->name('billing.form');
Route::post('/billing', [BillingController::class, 'submit'])->name('billing.submit');

require __DIR__ . '/auth.php';
