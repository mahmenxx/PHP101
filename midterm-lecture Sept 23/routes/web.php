<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
});

Route::post('/products', [ProductController::class, 'createProduct'])->name('products.store');
Route::get('/products/create', [ProductController::class, 'createProductForm'])->name('products.create');
Route::get('/products/list', [ProductController::class, 'listProducts'])->name('products.list');
Route::get('/products/update/{id}', [ProductController::class, 'updateProductForm'])->name('products.updateForm');
Route::post('/products/update/{id}', [ProductController::class, 'updateProductPost']);
Route::post('/products/delete/{id}', [ProductController::class, 'deleteProduct'])->name('products.delete');

Route::post('/products/restore/{id}', [ProductController::class, 'restoreProduct'])->name('products.restore');
require __DIR__.'/auth.php';
