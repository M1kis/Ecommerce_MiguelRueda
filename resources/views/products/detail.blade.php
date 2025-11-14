@extends('Layouts.app')

@section('title', $product['name'])

@section('content')
    <div class="bg-gray-50">
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div
                class="bg-white border border-gray-100 rounded-3xl shadow-sm p-6 sm:p-10 grid grid-cols-1 md:grid-cols-2 gap-10">

                <!-- Galería -->
                <div>
                    <!-- Imagen principal -->
                    <div class="relative bg-gray-100 rounded-2xl overflow-hidden">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                            class="w-full max-h-[460px] object-contain transition duration-500 hover:scale-[1.02]"
                            loading="lazy" />
                        <!-- Etiquetas opcionales -->
                        @if (!empty($product['badge']))
                            <span
                                class="absolute left-3 top-3 inline-flex items-center rounded-full bg-black/70 text-white px-3 py-1 text-xs font-medium">
                                {{ $product['badge'] }}
                            </span>
                        @endif
                    </div>
                </div>

                <!-- Información -->
                <div class="flex flex-col justify-between">
                    <div>

                        <!-- Título -->
                        <h1 class="mt-1 text-3xl sm:text-4xl font-extrabold text-gray-900">
                            {{ $product['name'] }}
                        </h1>

                        <!-- Descripción -->
                        @if (!empty($product['description']))
                            <p class="mt-4 text-gray-700 leading-relaxed">
                                {{ $product['description'] }}
                            </p>
                        @endif

                        <!-- Precio y descuento -->
                        <div class="mt-6 flex items-end gap-3">
                            <p class="text-3xl sm:text-4xl font-extrabold text-gray-900">
                                $ {{ number_format($product['price'], 0, ',', '.') }}
                            </p>
                            @if (!empty($product['old_price']) && $product['old_price'] > $product['price'])
                                <p class="text-lg text-gray-400 line-through">
                                    $ {{ number_format($product['old_price'], 0, ',', '.') }}
                                </p>
                                <span
                                    class="inline-flex items-center rounded-md bg-green-100 px-2 py-0.5 text-xs font-semibold text-green-700">
                                    -{{ round(100 - ($product['price'] / $product['old_price']) * 100) }}%
                                </span>
                            @endif
                        </div>

                        <!-- Features/atributos opcionales -->
                        @if (!empty($product['features']) && is_array($product['features']))
                            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach ($product['features'] as $label => $value)
                                    <div class="flex items-start gap-3 rounded-xl border border-gray-200 bg-gray-50 p-3">
                                        <div
                                            class="h-6 w-6 rounded-lg bg-gray-900 text-white flex items-center justify-center text-xs font-bold">
                                            i</div>
                                        <div>
                                            <p class="text-xs text-gray-500">{{ $label }}</p>
                                            <p class="text-sm font-medium text-gray-800">{{ $value }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>

                    <!-- Acciones -->
                    <div class="mt-8">
                        <div class="flex flex-col sm:flex-row items-stretch gap-4">
                            <!-- Selector de cantidad -->
                            <div
                                class="flex items-center justify-between rounded-xl border border-gray-300 bg-white px-2 py-2 w-full sm:w-40">
                                <button type="button" aria-label="Disminuir"
                                    class="h-9 w-9 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50"
                                    onclick="var q=document.getElementById('qty'); q.value=Math.max(1,parseInt(q.value||1)-1)">
                                    −
                                </button>
                                <input id="qty" name="qty" type="number" min="1" value="1"
                                    class="w-12 text-center border-0 focus:ring-0 text-gray-900" />
                                <button type="button" aria-label="Aumentar"
                                    class="h-9 w-9 rounded-lg border border-gray-300 text-gray-700 hover:bg-gray-50"
                                    onclick="var q=document.getElementById('qty'); q.value=parseInt(q.value||1)+1">
                                    +
                                </button>
                            </div>

                            <!-- Wishlist -->
                            <button type="submit"
                                class="w-full sm:w-40 rounded-xl border border-gray-300 bg-white px-4 py-3 text-gray-800 font-semibold shadow-sm transition hover:bg-gray-50">
                                ❤️ Guardar
                            </button>
                        </div>

                        <!-- Beneficios/garantías opcionales -->
                        <div class="mt-5 grid grid-cols-1 sm:grid-cols-3 gap-3">
                            <div class="rounded-xl border border-gray-200 bg-white p-3 text-sm text-gray-700">
                                🛡️ Garantía 12 meses
                            </div>
                            <div class="rounded-xl border border-gray-200 bg-white p-3 text-sm text-gray-700">
                                🚚 Envío en 24–48h
                            </div>
                            <div class="rounded-xl border border-gray-200 bg-white p-3 text-sm text-gray-700">
                                ↩️ Devolución 30 días
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Sección “También te puede interesar” (opcional) -->
            @if (!empty($related) && count($related))
                <div class="mt-10">
                    <div class="flex items-center gap-2 mb-4">
                        <span class="text-xl">✨</span>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">También te puede interesar</h2>
                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($related as $rp)
                            @include('products.partials.product-card', ['product' => (object) $rp])
                        @endforeach
                    </div>
                </div>
            @endif
        </section>
    </div>
@endsection
