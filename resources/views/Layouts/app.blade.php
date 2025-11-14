<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mikis shop</title>

    <!-- Tailwind CSS (CDN) -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

</head>

<body class="min-h-screen flex flex-col bg-slate-50">
    <!-- ✅ Navbar -->
    @include('layouts.navbar')

    <!-- ✅ Contenido principal -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- ✅ Footer -->
    @include('layouts.footer')
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

</body>

</html>
