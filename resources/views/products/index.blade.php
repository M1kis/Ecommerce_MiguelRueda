@extends('Layouts.app')

@section('title', 'Productos')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6 text-center">Tienda Online</h1>

        {{-- Selector de Categorías --}}
        <div class="mb-8">
            <div class="flex flex-wrap justify-center gap-3">
                <a href="{{ route('products.index') }}" 
                   class="px-6 py-2 rounded-lg transition {{ !$selectedCategoryId ? 'bg-gray-900 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                    Todos los Productos
                </a>
                @foreach ($allCategories as $category)
                    <a href="{{ route('products.index', ['category' => $category->id]) }}" 
                       class="px-6 py-2 rounded-lg transition {{ $selectedCategoryId == $category->id ? 'bg-gray-900 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
        </div>

        {{-- Si hay categoría seleccionada, mostrar productos de esa categoría --}}
        @if($selectedCategoryId && $selectedCategory)
            <div class="mb-12">
                <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-2 border-b-2 border-gray-300">
                    {{ $selectedCategory->name }}
                </h2>
                
                @if($categoryProducts->count() > 0)
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($categoryProducts as $product)
                            @include('products.partials.product-card', ['product' => $product])
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12">
                        <p class="text-gray-600 text-lg">No hay productos en esta categoría.</p>
                    </div>
                @endif
            </div>
        @else
            {{-- Productos Destacados --}}
            @if($featuredProducts->count() > 0)
                <div class="mb-12">
                    <h2 class="text-2xl font-bold text-gray-800 mb-6 pb-2 border-b-2 border-gray-300">
                        ⭐ Productos Destacados
                    </h2>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                        @foreach ($featuredProducts as $product)
                            @include('products.partials.product-card', ['product' => $product])
                        @endforeach
                    </div>
                </div>
            @endif
        @endif

        {{-- Mensaje si no hay productos --}}
        @if($featuredProducts->isEmpty() && !$selectedCategoryId)
            <div class="text-center py-12">
                <p class="text-gray-600 text-lg">No hay productos disponibles en este momento.</p>
            </div>
        @endif
    </div>
@endsection
