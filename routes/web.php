<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

// Público: catálogo y producto
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/category/{id}', [ProductController::class, 'index'])->name('products.category');
Route::get('/products/{id}/{category?}', [ProductController::class, 'detail'])->name('products.detail');

// Auth scaffolding (Laravel UI)
Auth::routes();

// Dashboard genérico de usuario autenticado (si lo usas)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin protegido
Route::prefix('admin')
    ->middleware(['auth']) // agrega aquí 'can:access-admin' o 'admin' si usas roles
    ->as('admin.')
    ->group(function () {
        // Dashboard
        Route::get('/', [AdminController::class, 'index'])->name('dashboard');

        // Categorías
        Route::get('/categories', [CategoryController::class, 'table'])->name('categories.table');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');

        // Productos
        Route::get('/products', [ProductController::class, 'table'])->name('products.table');
        Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
        Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

        // Marcas
        Route::get('/brands', [BrandController::class, 'table'])->name('brands.table');
        Route::get('/brands/create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('/brands', [BrandController::class, 'store'])->name('brands.store');
        Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
    });
