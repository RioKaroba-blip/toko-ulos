<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    @vite('resources/css/app.css')
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-900">

    <!-- Navigation -->
    @include('layouts.navigation')

    <!-- Page Content -->
    <main class="py-6 px-4 sm:px-6 lg:px-8">
        @yield('content') <!-- Konten halaman akan ditempatkan di sini -->
    </main>

    <!-- Scripts -->
    @vite('resources/js/app.js')
</body>
</html>