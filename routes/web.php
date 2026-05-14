<?php

use App\Http\Controllers\Brands_controller;
use App\Http\Controllers\Categories_controller;
use App\Http\Controllers\ProductImages_controller;
use App\Http\Controllers\Products_controller;
use App\Http\Controllers\ProductsSizes_controller;
use App\Http\Controllers\ProductsVariants_controller;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VariantStock_controller;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/profile', [ProfileController::class, 'detail'])->name('profile.detail');
    Route::get('/products', [Products_controller::class, 'show'])->name('products.show');
    Route::resource('product-images', ProductImages_controller::class);
    Route::resource('product-size', ProductsSizes_controller::class);
    Route::resource('product-variant', ProductsVariants_controller::class);
    Route::resource('Brands', Brands_controller::class);
    Route::resource('categories',Categories_controller::class);
    Route::resource('products',Products_controller::class);
    Route::resource('variant',VariantStock_controller::class);
    Route::get('/product-images/create', [ProductImages_controller::class, 'create'])
    ->name('product-images.create');
    Route::resource('variant-stocks', VariantStock_controller::class)
    ->except(['create']);

});

require __DIR__.'/auth.php';