<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Online</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    <!-- Navbar -->
    <header class="bg-white/80 backdrop-blur-md border-b border-gray-200 shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-extrabold text-gray-900 tracking-tight">🛒 MiTienda</h1>
            <nav class="space-x-6 text-gray-700 font-medium">
                <a href="#" class="hover:text-blue-600 transition">Inicio</a>
                <a href="#" class="hover:text-blue-600 transition">Categorías</a>
                <a href="#" class="hover:text-blue-600 transition">Carrito</a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="text-center py-20 bg-gradient-to-br from-blue-50 to-indigo-100">
        <h2 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">Explora lo mejor en tecnología</h2>
        <p class="text-lg text-gray-600">Productos seleccionados para ti, y al mejor precio</p>
    </section>

    <!-- Lista de productos -->
    <main class="max-w-7xl mx-auto px-6 py-16">
        <h3 class="text-2xl font-bold mb-10 text-gray-900 text-center">✨ Productos Destacados</h3>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
            @foreach ($products as $product)
                <div class="group relative bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden hover:shadow-xl transition">
                    
                    <!-- Imagen -->
                    <a href="{{ url('/products/'.$product['id'].'/'.$product['category']) }}">
                        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}"
                             class="w-full h-56 object-cover group-hover:scale-105 transition duration-500">
                    </a>

                    <!-- Info -->
                    <div class="p-5">
                        <h4 class="font-semibold text-lg text-gray-900 mb-2 truncate">{{ $product['name'] }}</h4>
                        <p class="text-sm text-gray-500 mb-3 truncate">{{ $product['description'] }}</p>
                        <p class="text-xl font-bold text-gray-900 mb-4">$ {{ number_format($product['price'], 0, ',', '.') }}</p>
                        
                        <a href="{{ url('/products/'.$product['id'].'/'.$product['category']) }}" 
                           class="block w-full text-center bg-gray-900 text-white py-2.5 rounded-xl hover:bg-gray-800 transition">
                            Ver detalles
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t border-gray-200 mt-20">
        <div class="max-w-7xl mx-auto px-6 py-8 text-center text-gray-500 text-sm">
            © {{ date('Y') }} MiTienda. Hecho con ❤️ en Laravel.
        </div>
    </footer>

</body>
</html>
