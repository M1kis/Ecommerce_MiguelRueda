<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        1 => [
            'id' => 1,
            'name' => 'Audífonos Bluetooth',
            'price' => 120,
            'image' => 'https://www.apple.com/v/airpods-pro/n/images/meta/og__eui2mpgzwyaa_overview.png',
            'category' => 'accesorios',
            'description' => 'Audífonos inalámbricos con cancelación de ruido y batería de 24 horas.'
        ],
        2 => [
            'id' => 2,
            'name' => 'Smartwatch Pro',
            'price' => 250,
            'image' => 'https://mac-center.com/cdn/shop/files/IMG-14867089.jpg?v=1726874273&width=823',
            'category' => 'tecnologia',
            'description' => 'Reloj inteligente con monitor de ritmo cardíaco, GPS y notificaciones.'
        ],
        3 => [
            'id' => 3,
            'name' => 'Laptop Gamer',
            'price' => 3200,
            'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8',
            'category' => 'computadores',
            'description' => 'PC Gamer con RTX 4080, Ryzen 9 y 32GB RAM. Ideal para gaming y streaming.'
        ],
        4 => [
            'id' => 4,
            'name' => 'Cámara Fotográfica',
            'price' => 1800,
            'image' => 'https://colombia.bioweb.co/cdn/shop/products/Sin_nombre_15e184ab-0f4e-4f28-bf65-d1f02d92cbf7.png?v=1754676513',
            'category' => 'fotografia',
            'description' => 'Cámara profesional con lente intercambiable y grabación 4K.'
        ],
    ];

    // Mostrar todos los productos
    public function index()
    {
        return view("index", ["products" => $this->products]);
    }

    // Mostrar detalle de un producto
    public function detail($id, $category = null)
    {
        $product = $this->products[$id] ?? null;

        if (!$product) {
            abort(404, 'Producto no encontrado');
        }

        return view("products.detail", [
            "product" => $product
        ]);
    }

    // Vista para crear producto
    public function create()
    {
        return view("products.create");
    }
}
