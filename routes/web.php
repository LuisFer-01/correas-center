<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SucursalController;

// Landing
Route::get('/', function () {
    return Inertia::render('Home');
})->name('home');

// Productos
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{producto}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{producto}/{categoria}', [ProductController::class, 'categoryDetail'])->name('products.category');

// Ruta API para obtener marcas (usada por el carrusel)
Route::get('/api/brands', [BrandController::class, 'index']);

// Aplicaciones/Industrias
Route::get('/applications', [IndustryController::class, 'index'])->name('applications.index');
Route::get('/applications/{slug}', [IndustryController::class, 'show'])->name('applications.show');

// Servicios
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{slug}', [ServiceController::class, 'show'])->name('services.show');

// Rutas para sucursales
Route::get('/api/sucursales', [SucursalController::class, 'index']);
Route::get('/api/sucursales/{id}', [SucursalController::class, 'show']);

// Páginas secundarias
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/branches', [PageController::class, 'branches'])->name('branches');
Route::get('/privacy', [PageController::class, 'privacy'])->name('privacy');
Route::get('/terms', [PageController::class, 'terms'])->name('terms');

// Contacto
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Newsletter
Route::post('/newsletter/subscribe', [ContactController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');

// Búsqueda
Route::get('/search', [SearchController::class, 'index'])->name('search');
//Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
