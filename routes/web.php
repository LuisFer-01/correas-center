<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;

// Landing
Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

// Productos
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{producto}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{producto}/{categoria}', [ProductController::class, 'categoryDetail'])->name('products.category');

// Aplicaciones/Industrias
Route::get('/applications', [IndustryController::class, 'index'])->name('applications.index');
Route::get('/applications/{slug}', [IndustryController::class, 'show'])->name('applications.show');

// Servicios
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Páginas secundarias
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');
Route::get('/branches', [PageController::class, 'branches'])->name('branches');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

//Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
