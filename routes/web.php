<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController; // 👈 añadido
use Illuminate\Support\Facades\Auth;

// Página principal y productos
Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('/category/{id}', [ProductController::class, 'index'])->name('products.category');
Route::get('/products/{id}/{category?}', [ProductController::class, 'detail'])->name('products.detail');

// Autenticación (login/register/logout)
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Grupo de rutas para el admin
Route::prefix('admin')->group(function () {

    // DASHBOARD
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');

    // CATEGORÍAS
    Route::get('/categories', [CategoryController::class, 'table'])->name('admin.categories.table');         // Listar categorías (tabla)
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create'); // Mostrar formulario
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');        // Guardar categoría
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy'); // Eliminar categoría

    // PRODUCTOS
    Route::get('/products', [ProductController::class, 'table'])->name('admin.products.table');              // Listar productos (tabla)
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');     // Mostrar formulario
    Route::post('/products/store', [ProductController::class, 'store'])->name('admin.products.store');             // Guardar producto
    Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('admin.products.destroy');  // Eliminar producto

    // BRANDS 🆕
    Route::get('/brands', [BrandController::class, 'table'])->name('admin.brands.table');                    // Listar marcas (tabla)
    Route::get('/brands/create', [BrandController::class, 'create'])->name('admin.brands.create');           // Mostrar formulario
    Route::post('/brands', [BrandController::class, 'store'])->name('admin.brands.store');                   // Guardar marca
    Route::delete('/brands/{id}', [BrandController::class, 'destroy'])->name('admin.brands.destroy');        // Eliminar marca
    
});

