<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Método para listar productos
    public function index()
    {
        return "List products";
    }

    // Método para mostrar el detalle de un producto
    public function detail($id, $category = null)
    {
        if ($category != null) {
            return "Detail product: " . $id . " with category: " . $category;
        } else {
            return "Detail product: " . $id;
        }
    }
    function create (){
        return "FORM FOR CREATE PRODUCTS";
    }
}
