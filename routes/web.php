<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;

// Página principal y productos
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}/{category?}', [ProductController::class, 'detail'])->name('products.detail');

// Autenticación (login/register/logout)
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Grupo de rutas para el admin
Route::prefix('admin')->group(function () {

    // Dashboard admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // CATEGORÍAS
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create'); // Mostrar formulario
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');        // Guardar categoría

    // PRODUCTOS
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products.index');              // ✅ Listar productos (GET)
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');     // Mostrar formulario
    Route::post('/products', [ProductController::class, 'store'])->name('admin.products.store');             // Guardar producto
});

