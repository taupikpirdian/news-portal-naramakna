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
    @include('components.sidebar')

    <div class="fixed lg:left-[calc(50%-theme(maxWidth.6xl)/2-10rem)] xl:left-[calc(50%-theme(maxWidth.6xl)/2-12rem)] 2xl:left-[calc(50%-theme(maxWidth.6xl)/2-14rem)] top-[calc(50%+2.5rem)] -translate-y-1/2 hidden lg:block z-[900]">
        <img src="https://placehold.co/160x600/e2e8f0/64748b?text=Advertisement" alt="Advertisement" class="w-[9.25rem] h-auto max-h-[80vh] rounded-lg shadow-lg">
    </div>
    <div class="fixed right-4 top-[calc(50%+2.5rem)] -translate-y-1/2 hidden lg:block z-[900]">
        <img src="https://placehold.co/160x600/e2e8f0/64748b?text=Advertisement" alt="Advertisement" class="w-[9.25rem] h-auto max-h-[80vh] rounded-lg shadow-lg">
    </div>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mt-6">
            <div class="bg-blue-100 border border-blue-300 rounded-lg py-8 text-center text-blue-800 text-sm font-medium mb-8">Google Ads</div>
        </div>
        @yield('content')
    </main>
    @include("components.footer")
    @stack('scripts')

    <script>
    function openMoreSidebar() {
        const el = document.getElementById('moreSidebar');
        const panel = document.getElementById('moreSidebarPanel');
        if (!el || !panel) return;
        el.classList.remove('hidden');
        requestAnimationFrame(() => {
            el.classList.add('opacity-100');
            panel.classList.remove('translate-x-full');
        });
    }

    function closeMoreSidebar() {
        const el = document.getElementById('moreSidebar');
        const panel = document.getElementById('moreSidebarPanel');
        if (!el || !panel) return;
        el.classList.remove('opacity-100');
        panel.classList.add('translate-x-full');
        setTimeout(() => el.classList.add('hidden'), 300);
    }
    </script>
</body>
</html>
