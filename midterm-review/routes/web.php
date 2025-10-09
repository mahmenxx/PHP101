<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BagController;

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
Route::get('/products/list', [ProductController::class, 'listProducts'])->name('products.list')->middleware('guest');
Route::get('/products/update/{id}', [ProductController::class, 'updateProductForm'])->name('products.updateForm');
Route::post('/products/update/{id}', [ProductController::class, 'updateProductPost']);
Route::post('/products/delete/{id}', [ProductController::class, 'deleteProduct'])->name('products.delete');

Route::post('/products/restore/{id}', [ProductController::class, 'restoreProduct'])->name('products.restore');


Route::get('/adultPage', [ProductController::class, 'adultPage'])->middleware('check.age');

Route::get('/adminDashboard', [ProductController::class, 'adminDashboard'])->middleware('auth', 'checkRole:admin')->name('admin.dashboard');




Route::middleware('auth')->group(function () {
    Route::get('/createBagForm', [BagController::class, 'createBagForm'])->name('bags.createForm');
    Route::post('/createBagPost', [BagController::class, 'createBagPost'])->name('bags.createPost');
    Route::get('/bagsList', [BagController::class, 'bagsList'])->name('bags.list');
    Route::get('/bags/{id}/edit', [BagController::class, 'editBagForm'])->name('bags.editForm');
    Route::post('/bags/{id}/edit', [BagController::class, 'editBagPost'])->name('bags.editPost');

});


require __DIR__.'/auth.php';

