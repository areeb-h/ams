<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ?? 'Website Title' }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link rel="prefetch" href="{{ route('website.home') }}">
        <link rel="prefetch" href="{{ route('website.about') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="bg-gray-100">
    <header class="bg-white shadow">
        <x-website-navbar />
    </header>

    <main>
        {{ $slot }}
    </main>

    <footer class="bg-white text-center text-sm py-4">
        &copy; {{ date('Y') }} Your Website Name. All Rights Reserved.
    </footer>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
