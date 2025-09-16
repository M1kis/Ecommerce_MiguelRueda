@extends('Layouts.app')

@section('title', 'Crear Producto')

@section('content')
    <h1 class="text-3xl font-bold text-gray-900 mb-8 text-center">Añadir Nuevo Producto</h1>

    <form action="#" method="POST" class="max-w-2xl mx-auto bg-white rounded-2xl shadow-md p-8 space-y-6">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium mb-2">Nombre del producto</label>
            <input type="text" name="name" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-900 outline-none">
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Descripción</label>
            <textarea name="description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-900 outline-none"></textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-medium mb-2">Precio</label>
                <input type="number" name="price" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-900 outline-none">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Categoría</label>
                <input type="text" name="category" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-900 outline-none">
            </div>
        </div>

        <div>
            <label class="block text-gray-700 font-medium mb-2">Imagen (URL)</label>
            <input type="text" name="image" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-gray-900 outline-none">
        </div>

        <button type="submit" class="w-full bg-gray-900 text-white py-3 rounded-lg hover:bg-gray-800 transition text-lg">
            ➕ Crear Producto
        </button>
    </form>
@endsection
