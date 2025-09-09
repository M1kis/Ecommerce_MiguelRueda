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


Route::prefix('products')->controller(ProductController::class)->group(function () {
    Route::get('/','index');
    Route::get('/create', 'create');
    Route::get('/{id}/{category?}','detail');
});
