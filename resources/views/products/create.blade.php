@extends('layout.app')

@section('title', 'Crear Producto')

@section('content')
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">🛒 Crear Nuevo Producto</h2>

    <div class="bg-white shadow-lg rounded-2xl p-8">
        <form action="#" method="POST" class="space-y-6">

            <!-- Nombre -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nombre del producto</label>
                <input type="text" id="name" name="name" placeholder="Ej: Laptop Gamer" 
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
            </div>

            <!-- Precio -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">Precio ($)</label>
                <input type="number" id="price" name="price" placeholder="Ej: 1200" 
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
            </div>

            <!-- Categoría -->
            <div>
                <label for="category" class="block text-sm font-medium text-gray-700">Categoría</label>
                <select id="category" name="category" 
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
                    <option value="">Seleccione una categoría</option>
                    <option value="tecnologia">Tecnología</option>
                    <option value="hogar">Hogar</option>
                    <option value="accesorios">Accesorios</option>
                    <option value="otros">Otros</option>
                </select>
            </div>

            <!-- Imagen -->
            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Imagen del producto</label>
                <input type="url" id="image" name="image" placeholder="URL de la imagen" 
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none">
            </div>

            <!-- Descripción -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea id="description" name="description" rows="4" placeholder="Escribe una breve descripción..."
                    class="mt-2 w-full px-4 py-2 border border-gray-300 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none"></textarea>
            </div>

            <!-- Botón -->
            <div class="flex justify-end">
                <button type="submit" 
                    class="px-6 py-3 bg-gradient-to-r from-indigo-600 to-purple-600 text-white font-semibold rounded-xl shadow hover:scale-105 transition">
                    Guardar Producto
                </button>
            </div>
        </form>
    </div>
@endsection
