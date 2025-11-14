<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create() {
        return view('admin.categories.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ], [
            'name.unique' => 'Esta categoría ya existe.',
        ]);

        Category::create([
            'name' => $request->get('name'),
        ]);

        return redirect()->route('admin.categories.table')
            ->with('success', 'Categoría creada correctamente.');
    }

    public function table()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(15);
        
        return view('admin.categories.table', [
            'categories' => $categories
        ]);
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        
        // Verificar si hay productos asociados a esta categoría
        $productsCount = Product::where('category_id', $id)->count();
        
        if ($productsCount > 0) {
            return redirect()->route('admin.categories.table')
                ->with('error', "No se puede eliminar la categoría porque tiene {$productsCount} producto(s) asociado(s). Elimina primero los productos relacionados.");
        }
        
        $category->delete();

        return redirect()->route('admin.categories.table')
            ->with('success', 'Categoría eliminada correctamente.');
    }
}
