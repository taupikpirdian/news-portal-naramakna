<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Naramakna')</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @include("components.head")
</head>
<body class="bg-gray-100 text-gray-800">
    @include("components.header")

    <div class="fixed lg:left-[calc(50%-theme(maxWidth.6xl)/2-3.5rem)] xl:left-[calc(50%-theme(maxWidth.6xl)/2-7rem)] 2xl:left-[calc(50%-theme(maxWidth.6xl)/2-8.5rem)] top-[calc(50%+2.5rem)] -translate-y-1/2 hidden lg:block z-[900]">
        <img src="img/5358285501561176027.jpeg" alt="Banner kiri" class="w-[9.25rem] h-auto max-h-[80vh] rounded-lg shadow-lg">
    </div>
    <div class="fixed lg:right-[calc(50%-theme(maxWidth.6xl)/2-3.5rem)] xl:right-[calc(50%-theme(maxWidth.6xl)/2-rem)] 2xl:right-[calc(50%-theme(maxWidth.6xl)/2-8.5rem)] top-[calc(50%+2.5rem)] -translate-y-1/2 hidden lg:block z-[900]">
        <img src="img/5358285501561176027.jpeg" alt="Banner kanan" class="w-[9.25rem] h-auto max-h-[80vh] rounded-lg shadow-lg">
    </div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>
    @include("components.footer")
    @stack('scripts')
</body>
</html>
