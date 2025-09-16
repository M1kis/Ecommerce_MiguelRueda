<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi Tienda')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans">

    {{-- Navbar --}}
    @include('Layouts.navbar')

    <main class="container mx-auto px-6 py-8">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('Layouts.footer')

</body>
</html>
