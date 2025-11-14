@extends('Layouts.app')

@section('title', 'Productos')

@section('content')
<div class="bg-gray-50">
  <!-- Chips de categorías -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="bg-white border border-gray-100 rounded-2xl shadow-sm p-4 sm:p-5">
      <div class="flex flex-wrap gap-3 justify-center sm:justify-start">
        <a href="{{ route('products.index') }}"
           class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium transition
                  {{ !$selectedCategoryId ? 'bg-gray-900 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
          <span>Todos</span>
        </a>

        @foreach ($allCategories as $category)
          <a href="{{ route('products.index', ['category' => $category->id]) }}"
             class="inline-flex items-center gap-2 px-4 py-2 rounded-full text-sm font-medium transition
                    {{ (string)$selectedCategoryId === (string)$category->id ? 'bg-gray-900 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            <span>{{ $category->name }}</span>
          </a>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Listado principal -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    @if($selectedCategoryId && $selectedCategory)
      <!-- Título de categoría -->
      <div class="mb-6">
        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">{{ $selectedCategory->name }}</h2>
        <div class="mt-2 h-1 w-16 bg-gray-900 rounded-full"></div>
      </div>

      @if($categoryProducts->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          @foreach ($categoryProducts as $product)
            @include('products.partials.product-card', ['product' => $product])
          @endforeach
        </div>
      @else
        <div class="text-center py-16 bg-white border border-dashed border-gray-200 rounded-2xl">
          <p class="text-gray-600 text-lg">No hay productos en esta categoría.</p>
          <a href="{{ route('products.index') }}"
             class="mt-4 inline-flex items-center rounded-lg bg-gray-900 px-4 py-2.5 text-white text-sm font-semibold shadow-sm hover:bg-gray-800">
            Ver todos los productos
          </a>
        </div>
      @endif
    @else
      <!-- Sección destacados -->
      @if($featuredProducts->count() > 0)
        <div class="mb-6">
          <div class="flex items-center gap-2">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Todos los productos</h2>
          </div>
          <div class="mt-2 h-1 w-16 bg-gray-900 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
          @foreach ($featuredProducts as $product)
            @include('products.partials.product-card', ['product' => $product])
          @endforeach
        </div>
      @endif
    @endif

    <!-- Estado vacío general -->
    @if($featuredProducts->isEmpty() && !$selectedCategoryId)
      <div class="text-center py-16 bg-white border border-dashed border-gray-200 rounded-2xl">
        <p class="text-gray-600 text-lg">No hay productos disponibles en este momento.</p>
        <a href="{{ route('products.index') }}"
           class="mt-4 inline-flex items-center rounded-lg border border-gray-300 px-4 py-2.5 text-gray-900 text-sm font-semibold shadow-sm hover:bg-gray-50">
          Recargar catálogo
        </a>
      </div>
    @endif
  </section>
</div>
@endsection
