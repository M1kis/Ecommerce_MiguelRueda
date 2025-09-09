<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí registras tus rutas web para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider dentro del grupo
| que contiene el middleware "web". ¡Crea algo grandioso!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/create}', [ProductController::class, 'create']);
Route::get('/products/{id}/{category?}', [ProductController::class, 'detail']);
