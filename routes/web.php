<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroomingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ServiceController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/service', [HomeController::class, 'service'])->name('service');
Route::get('service/{uuid}', [HomeController::class, 'serviceDetail'])->name('service.detail');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/blog/{uuid}', [HomeController::class, 'blogDetail'])->name('blog.detail');
Route::get('/product', [HomeController::class, 'product'])->name('product');
Route::get('/product/{uuid}', [HomeController::class, 'productDetail'])->name('product.detail');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/team', [HomeController::class, 'team'])->name('team');
Route::get('/faq', [HomeController::class, 'faq'])->name('faq');

Route::middleware(['auth'])->group(function () {
    Route::get('/pet-gromming', [HomeController::class, 'gromming']);
    Route::post('grooming', [GroomingController::class, 'store'])->name('grooming.store');
});

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

    Route::resource('service', ServiceController::class);
    Route::prefix('service')->group(function () {
        Route::post('/change-status/{uuid}', [ServiceController::class, 'changeStatus'])->name('service.change-status');
        Route::get('/preview/{uuid}', [ServiceController::class, 'preview'])->name('service.preview');
    });

    Route::get('/grooming', [GroomingController::class, 'show']);
    Route::post('/grooming/update-status/{id}', [GroomingController::class, 'updateStatus'])->name('grooming.update-status');
    
    Route::resource('category', CategoryController::class);

    Route::resource('banner', BannerController::class);            
});

Route::prefix('rating')->group(function () {
    Route::get('/', [RatingController::class, 'index'])->name('ratings.index');
    Route::post('/', [RatingController::class, 'store'])->name('ratings.store');
});


Route::get('{any}', [DashboardController::class, 'root'])->where('any', '.*');
