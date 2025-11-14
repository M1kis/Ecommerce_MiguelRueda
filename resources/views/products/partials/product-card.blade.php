<div class="group bg-white border border-gray-100 rounded-2xl shadow-sm hover:shadow-lg transition overflow-hidden">
  <!-- Media + overlay -->
  <div class="relative bg-gray-100 aspect-[4/3] overflow-hidden">
    <img
      src="{{ $product->url_image ?? 'https://via.placeholder.com/800x600?text=' . urlencode($product->name) }}"
      alt="{{ $product->name }}"
      class="w-full h-full object-cover transition duration-500 group-hover:scale-[1.03]"
      loading="lazy"
    />

    <!-- Badge de categoría opcional -->
    @if(!empty($product->category?->name))
      <span class="absolute left-3 top-3 inline-flex items-center rounded-full bg-black/70 text-white px-2 py-0.5 text-xs font-medium">
        {{ $product->category->name }}
      </span>
    @endif

    <!-- Acciones rápidas -->
    <div class="pointer-events-none absolute inset-x-0 bottom-0 p-3 opacity-0 translate-y-2 transition duration-300 group-hover:opacity-100 group-hover:translate-y-0">
      <div class="pointer-events-auto flex justify-end gap-2">
        <a href="{{ route('products.detail', ['id' => $product->id, 'category' => $product->category->name ?? '']) }}"
           class="inline-flex items-center rounded-lg bg-white/95 backdrop-blur px-3 py-1.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-white">
          Ver
        </a>
      </div>
    </div>
  </div>

  <!-- Body -->
  <div class="p-4">
    <!-- Marca -->
    @if($product->brand)
      <p class="text-xs uppercase tracking-wide text-gray-500">{{ $product->brand->name }}</p>
    @endif

    <!-- Nombre -->
    <h3 class="mt-1 text-base font-semibold text-gray-900 line-clamp-2 min-h-[2.5rem]">
      {{ $product->name }}
    </h3>

    <!-- Descripción -->
    @if(!empty($product->description))
      <p class="mt-2 text-sm text-gray-600 line-clamp-2">
        {{ $product->description }}
      </p>
    @endif

    <!-- Precio -->
    <div class="mt-4 flex items-baseline gap-2">
      <span class="text-lg font-extrabold text-gray-900">
        $ {{ number_format($product->price, 2, ',', '.') }}
      </span>
      @if(!empty($product->old_price) && $product->old_price > $product->price)
        <span class="text-sm text-gray-400 line-through">
          $ {{ number_format($product->old_price, 2, ',', '.') }}
        </span>
        <span class="ml-1 inline-flex items-center rounded-md bg-green-100 px-1.5 py-0.5 text-xs font-semibold text-green-700">
          -{{ round(100 - ($product->price / $product->old_price) * 100) }}%
        </span>
      @endif
    </div>

    <!-- CTA inferior -->
    <div class="mt-4 flex items-center gap-2">
      <a href="{{ route('products.detail', ['id' => $product->id, 'category' => $product->category->name ?? '']) }}"
         class="flex-1 inline-flex items-center justify-center rounded-lg border border-gray-300 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-50">
        Ver detalles
      </a>
    </div>
  </div>
</div>


