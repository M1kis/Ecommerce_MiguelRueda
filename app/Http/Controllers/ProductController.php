<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product; // ✅ Importar el modelo

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

    public function index(Request $request)
    {
        // Obtener todas las categorías para el selector
        $allCategories = Category::whereHas('products')->get();
        
        // Obtener categoría seleccionada (si existe)
        $selectedCategoryId = $request->get('category');
        
        // Productos destacados (los 8 más recientes)
        $featuredProducts = Product::with(['category', 'brand'])
            ->orderBy('created_at', 'desc')
            ->limit(8)
            ->get();
        
        // Si hay una categoría seleccionada, mostrar productos de esa categoría
        if ($selectedCategoryId) {
            $selectedCategory = Category::with(['products' => function($query) {
                $query->with('brand')->orderBy('created_at', 'desc');
            }])->find($selectedCategoryId);
            
            $categoryProducts = $selectedCategory ? $selectedCategory->products : collect();
        } else {
            $selectedCategory = null;
            $categoryProducts = collect();
        }

        return view("products.index", [
            "allCategories" => $allCategories,
            "featuredProducts" => $featuredProducts,
            "selectedCategory" => $selectedCategory,
            "categoryProducts" => $categoryProducts,
            "selectedCategoryId" => $selectedCategoryId
        ]);
    }

    public function detail($id, $category = null)
    {
        $product = Product::with(['category', 'brand'])->find($id);

        if (!$product) {
            abort(404, 'Producto no encontrado');
        }

        return view("products.detail", [
            "product" => $product
        ]);
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();

        return view("products.create", [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0|max:9999999999',
            'category' => 'required|exists:categories,id',
            'brand' => 'required|exists:brand,id',


        ]);

        $product = new Product();
        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->category_id = $request->get('category'); 
        $product->brand_id = $request->get('brand');       
        //$product->image = $request->get('image');

        $product->save();

        return redirect()->route('admin.products.table');
    }

    public function table()
    {
        $products = Product::orderBy('id', 'desc')->paginate(15);
        
        return view('products.table', [
            'products' => $products
        ]);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.table');
    }

}
