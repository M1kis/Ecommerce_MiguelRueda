@extends('Layouts.app')

@section('title', $product['name'])

@section('content')
    <div class="bg-white rounded-3xl shadow-md p-8 grid grid-cols-1 md:grid-cols-2 gap-10">
        
        <!-- Imagen -->
        <div class="flex justify-center items-center">
            <img src="{{ $product['image'] }}" 
                 alt="{{ $product['name'] }}" 
                 class="rounded-2xl shadow-lg max-h-[400px] object-contain hover:scale-105 transition duration-500">
        </div>

        <!-- Información -->
        <div class="flex flex-col justify-between">
            <div>
                <h2 class="text-3xl font-extrabold text-gray-900 mb-4">{{ $product['name'] }}</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ $product['description'] }}</p>
                <p class="text-4xl font-bold text-green-600 mb-6">$ {{ number_format($product['price'], 0, ',', '.') }}</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4">
                <button class="flex-1 bg-gray-900 text-white py-3 rounded-xl hover:bg-gray-800 transition text-lg">
                    🛒 Añadir al carrito
                </button>
                <button class="flex-1 bg-white border border-gray-300 text-gray-800 py-3 rounded-xl hover:bg-gray-100 transition text-lg">
                    ❤️ Guardar
                </button>
            </div>
        </div>
    </div>
@endsection
