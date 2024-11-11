<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('service/{uuid}', [HomeController::class, 'serviceDetail'])->name('service.detail');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{uuid}', [HomeController::class, 'blogDetail'])->name('blog.detail');

Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('product', ProductController::class);
    Route::prefix('product')->group(function () {
        Route::get('preview/{uuid}', [ProductController::class, 'preview'])->name('product.preview');
        Route::post('change-status/{uuid}', [ProductController::class, 'changeStatus'])->name('product.change-status');
    });

    Route::resource('article', ArticleController::class);
    Route::prefix('article')->group(function () {        
        Route::post('/change-status/{uuid}', [ArticleController::class, 'changeStatus'])->name('article.change-status');
        Route::get('/preview/{uuid}', [ArticleController::class, 'preview'])->name('article.preview');
    });
    
    Route::resource('category', CategoryController::class);

    Route::resource('banner', BannerController::class);            
});

Route::prefix('rating')->group(function () {
    Route::get('/', [RatingController::class, 'index'])->name('ratings.index');
    Route::post('/', [RatingController::class, 'store'])->name('ratings.store');
});


Route::get('{any}', [DashboardController::class, 'root'])->where('any', '.*');
