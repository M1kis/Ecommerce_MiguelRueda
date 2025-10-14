@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-16 px-6">
    @if (session('status'))
        <div class="bg-green-100 border border-green-300 text-green-800 px-6 py-4 rounded-xl shadow-md flex items-center justify-between mb-6">
            <div class="flex items-center gap-3">
                <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12l2 2l4-4m6 2a9 9 0 11-18 0a9 9 0 0118 0z" />
                </svg>
                <span class="font-medium">{{ session('status') }}</span>
            </div>
            <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800 text-sm font-semibold">✕</button>
        </div>
    @endif

    <div class="bg-white/80 backdrop-blur-md border border-gray-200 rounded-2xl shadow-lg p-10 text-center">
        <h1 class="text-3xl font-bold text-gray-800 mb-3">Bienvenido 🎉</h1>
        <p class="text-gray-600 mb-6">Has iniciado sesión correctamente en tu cuenta.</p>

        <a href="{{ url('/products') }}"
           class="inline-block px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-md transition">
            Ir a la tienda 🛒
        </a>
    </div>
</div>
@endsection
