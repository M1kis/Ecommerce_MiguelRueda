<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Método para listar productos
    public function index()
    {
        return view("index");
    }

    // Método para mostrar el detalle de un producto
    public function detail($id, $category = null)
    {
        if ($category != null) {
            return view("products.detail",[
            'id'=> $id,
            'category' => $category]);
        } else {
            return view("products.detail",[
                'id'=> $id, 
                'category' => ""]);
        }
    }
    function create (){
        return "FORM FOR CREATE PRODUCTS";
    }
}
