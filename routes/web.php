<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::get('/products', function () {
    return "List products";
});

Route::get('/products/{id}/{category?}', function ($id, $category = null) {
    if ($category != null) {
        return "Detail product: " . $id . " with category: " . $category;
    } else {
        return "Detail product: " . $id;
    }
});
