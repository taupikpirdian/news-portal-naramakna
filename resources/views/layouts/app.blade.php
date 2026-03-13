<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    @include("components.head")
    @stack('head-scripts')
    @stack('styles')
    <style>
        :root {
            --header-height: 190px;
        }

        .ad-sidebar-left,
        .ad-sidebar-right {
            position: fixed;
            top: var(--header-height);
            bottom: 1rem;
            z-index: 950;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding-top: 0.5rem;
        }

        .ad-sidebar-left {
            left: 1rem;
        }

        .ad-sidebar-right {
            right: 1rem;
        }

        @media (min-width: 1280px) {
            .ad-sidebar-left,
            .ad-sidebar-right {
                display: flex;
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
        // Uncomment line below to use localhost placeholder
        // $isLocalhost = request()->getHost() === 'localhost' || request()->getHost() === '127.0.0.1' || app()->environment('local');
        $isLocalhost = false; // Always use production mode to test ads
    @endphp

    @if($isLocalhost)
        {{-- Development Mode - Localhost Placeholder --}}
        <div class="ad-sidebar-left">
            <div class="rounded-xl shadow-2xl p-3 text-center bg-yellow-450 text-gray-800 flex flex-col items-center justify-center" style="width: 160px; height: 100%;">
                {{-- Icon --}}
                <div style="margin-bottom: 0.5rem;">
                    <svg style="width: 32px; height: 32px; margin: 0 auto; opacity: 0.9;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                </div>

                {{-- Main Text --}}
                <h3 style="font-size: 0.875rem; font-weight: 700; margin: 0 0 0.25rem 0; line-height: 1.2;">
                    📢 Advertisement Space
                </h3>

                {{-- Subtitle --}}
                <p style="font-size: 0.75rem; margin: 0 0 0.75rem 0; opacity: 0.9;">
                    <span style="font-weight: 600;">Sidebar Left</span>
                </p>

                {{-- Info Box --}}
                <div style="background: rgba(255,255,255,0.5); backdrop-filter: blur(10px); border-radius: 6px; padding: 0.75rem 1rem; margin: 10px; max-width: 100%; border: 1px solid rgba(255,255,255,0.5);">
                    <p style="font-size: 0.65rem; margin: 0; line-height: 1.4;">
                        <span style="opacity: 0.95;">⚠️ <strong>Dev Mode:</strong> No ads on localhost</span>
                    </p>
                    <p style="font-size: 0.65rem; margin: 0.35rem 0 0 0; line-height: 1.4; opacity: 0.95;">
                        ✅ <strong>Production domain</strong> only
                    </p>
                </div>

                {{-- Size Badge --}}
                <div style="margin-top: 0.75rem; display: inline-flex; align-items: center; gap: 0.35rem; background: rgba(255,255,255,0.5); padding: 0.25rem 0.6rem; border-radius: 20px; font-size: 0.65rem;">
                    <span style="opacity: 0.95;">📏</span>
                    <span style="opacity: 1;">160 × Dynamic</span>
                </div>
            </div>
        </div>
        <div class="ad-sidebar-right">
            <div class="rounded-xl shadow-2xl p-3 text-center bg-yellow-450 text-gray-800 flex flex-col items-center justify-center" style="width: 160px; height: 100%;">
                {{-- Icon --}}
                <div style="margin-bottom: 0.5rem;">
                    <svg style="width: 32px; height: 32px; margin: 0 auto; opacity: 0.9;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                </div>

                {{-- Main Text --}}
                <h3 style="font-size: 0.875rem; font-weight: 700; margin: 0 0 0.25rem 0; line-height: 1.2;">
                    📢 Advertisement Space
                </h3>

                {{-- Subtitle --}}
                <p style="font-size: 0.75rem; margin: 0 0 0.75rem 0; opacity: 0.9;">
                    <span style="font-weight: 600;">Sidebar Right</span>
                </p>

                {{-- Info Box --}}
                <div style="background: rgba(255,255,255,0.5); backdrop-filter: blur(10px); border-radius: 6px; padding: 0.75rem 1rem; margin: 10px; max-width: 100%; border: 1px solid rgba(255,255,255,0.5);">
                    <p style="font-size: 0.65rem; margin: 0; line-height: 1.4;">
                        <span style="opacity: 0.95;">⚠️ <strong>Dev Mode:</strong> No ads on localhost</span>
                    </p>
                    <p style="font-size: 0.65rem; margin: 0.35rem 0 0 0; line-height: 1.4; opacity: 0.95;">
                        ✅ <strong>Production domain</strong> only
                    </p>
                </div>

                {{-- Size Badge --}}
                <div style="margin-top: 0.75rem; display: inline-flex; align-items: center; gap: 0.35rem; background: rgba(255,255,255,0.5); padding: 0.25rem 0.6rem; border-radius: 20px; font-size: 0.65rem;">
                    <span style="opacity: 0.95;">📏</span>
                    <span style="opacity: 1;">160 × Dynamic</span>
                </div>
            </div>
        </div>
    @else
        {{-- Production Mode - Use Google AdSense --}}
        <div class="ad-sidebar-left">
            <x-google-ads type="sidebar_left" />
        </div>
        <div class="ad-sidebar-right">
            <x-google-ads type="sidebar_right" />
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

    // Dynamic header height for sidebar ads
    let resizeTimer;
    function updateHeaderHeight() {
        const header = document.querySelector('header');
        if (header) {
            const headerHeight = header.offsetHeight;
            document.documentElement.style.setProperty('--header-height', headerHeight + 'px');
        }
    }

    // Update on load with a small delay to ensure everything is rendered
    window.addEventListener('load', function() {
        setTimeout(updateHeaderHeight, 100);
    });

    // Debounced resize handler
    window.addEventListener('resize', function() {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(updateHeaderHeight, 100);
    });
    </script>
</body>
</html>
