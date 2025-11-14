<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use App\Models\Product;

use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function create() {
        return view('admin.brands.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:brand,name',
        ], [
            'name.unique' => 'Esta marca ya existe.',
        ]);

        Brand::create([
            'name' => $request->get('name'),
        ]);

        return redirect()->route('admin.brands.table')
            ->with('success', 'Marca creada correctamente.');
    }

    public function table()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate(15);
        
        return view('admin.brands.table', [
            'brands' => $brands
        ]);
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        
        // Verificar si hay productos asociados a esta marca
        $productsCount = Product::where('brand_id', $id)->count();
        
        if ($productsCount > 0) {
            return redirect()->route('admin.brands.table')
                ->with('error', "No se puede eliminar la marca porque tiene {$productsCount} producto(s) asociado(s). Elimina primero los productos relacionados.");
        }
        
        $brand->delete();

        return redirect()->route('admin.brands.table')
            ->with('success', 'Marca eliminada correctamente.');
    }
}

