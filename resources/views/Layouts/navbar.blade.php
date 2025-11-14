<nav class="bg-white/80 backdrop-blur-md border-b border-gray-200 shadow-sm sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-3 flex justify-between items-center">

        {{-- 🔷 Logo + Título --}}
        <a href="{{ url('/products') }}" class="flex items-center space-x-3">
            <img src="{{ asset('images/logo_universidad.png') }}" alt="Logo Universidad" class="h-10 w-auto">
            <span class="text-xl font-bold text-gray-800">Mi Tienda</span>
        </a>

        {{-- 🔹 Enlaces principales --}}
        <div class="flex items-center space-x-6">
            <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900 font-medium transition">Inicio</a>
            <a href="{{ url('/admin') }}" class="text-gray-600 hover:text-gray-900 font-medium transition">Admin</a>

            {{-- 🔸 Zona de autenticación --}}
            @guest
                <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-900 font-medium transition">Login</a>
                <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-900 font-medium transition">Registrarse</a>
            @else
                {{-- Dropdown funcional con clic --}}
                <div class="relative" x-data="{ open: false }">
                    <button 
                        @click="open = !open" 
                        class="text-gray-700 font-medium hover:text-gray-900 flex items-center gap-1 focus:outline-none"
                    >
                        {{ Auth::user()->name }}
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    {{-- Dropdown oculto por defecto --}}
                    <div
                        x-show="open"
                        x-cloak
                        @click.away="open = false"
                        x-transition:enter="transition ease-out duration-100"
                        x-transition:enter-start="opacity-0 scale-95"
                        x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-75"
                        x-transition:leave-start="opacity-100 scale-100"
                        x-transition:leave-end="opacity-0 scale-95"
                        class="absolute right-0 bg-white border border-gray-200 rounded-lg shadow-md mt-2 py-2 w-48 z-50"
                    >
                        <a href="{{ route('home') }}" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Perfil</a>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                           class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                            Cerrar sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
                    </div>
                </div>
            @endguest
        </div>
    </div>
</nav>
