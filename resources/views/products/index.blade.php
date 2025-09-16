@extends('Layouts.app')

@section('title', 'Productos')

@section('content')
    <h1 class="text-3xl font-bold text-gray-900 mb-10 text-center">Productos Disponibles</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($products as $product)
            <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition overflow-hidden">
                <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" 
                     class="w-full h-60 object-cover hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h2 class="text-xl font-semibold text-gray-900">{{ $product['name'] }}</h2>
                    <p class="text-gray-600 text-sm mb-4">{{ $product['description'] }}</p>
                    <p class="text-lg font-bold text-green-600 mb-4">$ {{ number_format($product['price'], 0, ',', '.') }}</p>
                    <a href="{{ url('/products/'.$product['id'].'/'.$product['category']) }}" 
                       class="block bg-gray-900 text-white text-center py-2 rounded-lg hover:bg-gray-800 transition">
                        Ver Detalles
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
