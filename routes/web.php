<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::middleware(['auth', 'role:admin'])->prefix('product')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
});

Route::middleware(['auth', 'role:admin'])->prefix('article')->group(function () {
    Route::get('/', [ArticleController::class, 'index'])->name('articles.index');
    Route::get('/create', [ArticleController::class, 'create'])->name('articles.create');
    Route::post('/store', [ArticleController::class, 'store'])->name('articles.store');
    Route::get('/{id}', [ArticleController::class, 'show'])->name('articles.show');
    Route::post('/change-status/{id}', [ArticleController::class, 'changeStatus'])->name('articles.change-status');
    Route::delete('delete/{id}', [ArticleController::class, 'destroy'])->name('articles.destroy');
    Route::get('/preview/{id}', [ArticleController::class, 'preview'])->name('articles.preview');
});

Route::middleware(['auth', 'role:admin'])->prefix('category')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
});

Route::middleware(['auth', 'role:admin'])->prefix('rating')->group(function () {
    Route::get('/', [RatingController::class, 'index'])->name('ratings.index');
    Route::post('/', [RatingController::class, 'store'])->name('ratings.store');
});
Route::post('/upload-image', [ImageUploadController::class, 'store'])->name('upload.image');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('{any}', [HomeController::class, 'root'])->where('any', '.*');

