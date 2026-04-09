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
            align-items: stretch;
            justify-content: center;
            padding-top: 0.5rem;
            width: 160px;
            min-width: 160px;
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

    {{-- UNIFIED LAZY AD LOADING - Single Observer for All Lazy Ads --}}
    {{-- FIXED: Only load on production - localhost shows error 403 from Google --}}
    @php
        $isProduction = !app()->environment('local');
        $shouldLoadAdsScript = config('ads.enabled')
            && config('ads.adsense_publisher_id')
            && $isProduction;
    @endphp
    @if($shouldLoadAdsScript)
    <script>
        (function() {
            // Initialize once per page
            if (window.unifiedAdLoaderInitialized) return;
            window.unifiedAdLoaderInitialized = true;

            // Use IntersectionObserver for maximum performance
            if ('IntersectionObserver' in window) {
                const adObserver = new IntersectionObserver(function(entries) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            const ad = entry.target;
                            adObserver.unobserve(ad);

                            // Wait for element to have valid dimensions before loading
                            requestAnimationFrame(function() {
                                setTimeout(function() {
                                    // Check if element has valid width
                                    const rect = ad.getBoundingClientRect();
                                    const hasValidWidth = rect && rect.width > 0;

                                    if (hasValidWidth && typeof adsbygoogle !== 'undefined') {
                                        try {
                                            // For deferred ads, add adsbygoogle class first
                                            if (ad.classList.contains('adsbygoogle-placeholder')) {
                                                ad.classList.remove('adsbygoogle-placeholder');
                                                ad.classList.add('adsbygoogle');
                                            }
                                            (adsbygoogle = window.adsbygoogle || []).push({});
                                        } catch(e) {
                                            // Silently fail
                                        }
                                    }
                                }, 100); // Small delay to ensure rendering is complete
                            });
                        }
                    });
                }, {
                    rootMargin: '200px' // Load 200px before entering viewport
                });

                // Observe all lazy ads and deferred ads (sidebar, category, etc)
                function observeLazyAds() {
                    document.querySelectorAll('.lazy-ad, .lazy-category-ad, .deferred-ad').forEach(function(ad) {
                        if (!ad.hasAttribute('data-ad-loaded')) {
                            adObserver.observe(ad);
                            ad.setAttribute('data-ad-loaded', 'true');
                        }
                    });
                }

                // Start observing after DOM is ready
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', observeLazyAds);
                } else {
                    observeLazyAds();
                }

                // Auto-observe new dynamically added ads
                if ('MutationObserver' in window) {
                    new MutationObserver(function(mutations) {
                        // Only observe if there are actual additions
                        let hasNewAds = false;
                        mutations.forEach(function(mutation) {
                            if (mutation.addedNodes.length > 0) {
                                hasNewAds = true;
                            }
                        });
                        if (hasNewAds) {
                            observeLazyAds();
                        }
                    }).observe(document.body, {
                        childList: true,
                        subtree: true
                    });
                }
            }
        })();
    </script>
    @endif

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

    // End of main scripts
    </script>
</body>
</html>
