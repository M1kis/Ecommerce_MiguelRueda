<nav class="bg-white/80 backdrop-blur-md border-b border-gray-200 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <a href="{{ url('/products') }}" class="text-xl font-bold text-gray-800">🛍 Mi Tienda</a>
        <div class="flex space-x-6">
            <a href="{{ url('/products') }}" class="text-gray-600 hover:text-gray-900">Inicio</a>
            <a href="{{ url('/products/create') }}" class="text-gray-600 hover:text-gray-900">Crear Producto</a>
        </div>
    </div>
</nav>
