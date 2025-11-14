<div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition overflow-hidden">
    <img src="{{ $product->url_image ?? 'https://via.placeholder.com/400x300?text=' . urlencode($product->name) }}" 
         alt="{{ $product->name }}" 
         class="w-full h-60 object-cover hover:scale-105 transition duration-500">
    <div class="p-6">
        <h3 class="text-xl font-semibold text-gray-900 mb-1">{{ $product->name }}</h3>
        @if($product->brand)
            <p class="text-sm text-gray-500 mb-2">{{ $product->brand->name }}</p>
        @endif
        <p class="text-gray-600 text-sm mb-4 line-clamp-2">{{ $product->description }}</p>
        <p class="text-lg font-bold text-green-600 mb-4">$ {{ number_format($product->price, 2, ',', '.') }}</p>
        <a href="{{ route('products.detail', ['id' => $product->id, 'category' => $product->category->name ?? '']) }}" 
           class="block bg-gray-900 text-white text-center py-2 rounded-lg hover:bg-gray-800 transition">
            Ver Detalles
        </a>
    </div>
</div>

