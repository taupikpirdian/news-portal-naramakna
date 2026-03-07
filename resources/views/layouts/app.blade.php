<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @include("components.head")
    @stack('styles')
    <style>
        .ad-sidebar-left {
            position: fixed;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 950;
        }

        .ad-sidebar-right {
            position: fixed;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 950;
        }

        @media (min-width: 1280px) {
            .ad-sidebar-left {
                display: block;
            }
            .ad-sidebar-right {
                display: block;
            }
        }

        @media (max-width: 1279px) {
            .ad-sidebar-left,
            .ad-sidebar-right {
                display: none;
            }
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">
    @include("components.header")
    @include('components.sidebar')

    {{-- Sidebar Ads - Left & Right --}}
    @php
        $isLocalhost = request()->getHost() === 'localhost' || request()->getHost() === '127.0.0.1' || app()->environment('local');
    @endphp

    @if($isLocalhost)
        {{-- Development Mode - Localhost Placeholder --}}
        <div class="ad-sidebar-left">
            <div class="w-36 h-auto max-h-[80vh] rounded-xl shadow-2xl p-4 text-center bg-gradient-to-br from-amber-500 to-orange-600 text-white">
                <svg class="w-12 h-12 mx-auto mb-2 opacity-90" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <p class="text-sm font-bold">📢 Ad Space</p>
                <p class="text-xs mt-1 opacity-90">Left Sidebar</p>
                <p class="text-xs mt-2 bg-white/20 rounded-lg px-2 py-1 font-semibold">160 × 600</p>
                <p class="text-xs mt-1 opacity-75">Skyscraper</p>
            </div>
        </div>
        <div class="ad-sidebar-right">
            <div class="w-36 h-auto max-h-[80vh] rounded-xl shadow-2xl p-4 text-center bg-gradient-to-br from-amber-500 to-orange-600 text-white">
                <svg class="w-12 h-12 mx-auto mb-2 opacity-90" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <p class="text-sm font-bold">📢 Ad Space</p>
                <p class="text-xs mt-1 opacity-90">Right Sidebar</p>
                <p class="text-xs mt-2 bg-white/20 rounded-lg px-2 py-1 font-semibold">160 × 600</p>
                <p class="text-xs mt-1 opacity-75">Skyscraper</p>
            </div>
        </div>
    @else
        {{-- Production Mode - Google AdSense --}}
        <div class="ad-sidebar-left">
            <x-google-ads type="sidebar_left" class="w-36 h-auto max-h-[80vh] rounded-xl shadow-2xl" />
        </div>
        <div class="ad-sidebar-right">
            <x-google-ads type="sidebar_right" class="w-36 h-auto max-h-[80vh] rounded-xl shadow-2xl" />
        </div>
    @endif

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Hero Banner Ads --}}
        <div class="mt-6">
            <x-hero-banner placement="hero-banner" :limit="1" />
        </div>
        <br>
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
