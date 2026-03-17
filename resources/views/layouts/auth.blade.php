<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Concesionario') }} - Acceso</title>
    <!-- Fonts, Font Awesome, Bootstrap (igual que app.blade.php) -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <main class="py-5">
        @yield('content')
    </main>
    
</body>
</html>