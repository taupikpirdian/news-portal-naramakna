{{-- Ultra-fast Google Ads Component - MATCH REACT FRONTEND APPROACH --}}
@props([
    'type' => 'leaderboard', // leaderboard, sidebar, article, regular
])

@php
    $publisherId = config('ads.adsense_publisher_id');
    $enabled = config('ads.enabled');

    // Localhost check - simple
    $isLocalhost = app()->environment('local');

    // Unique ID for each ad instance
    $adId = 'adsense-' . $type . '-' . uniqid();

    // Explicit dimensions - !IMPORTANT to ensure they're applied
    $adDimensions = match($type) {
        'sidebar_left', 'sidebar_right' => ['width' => '160px', 'height' => '600px', 'minWidth' => '160px'],
        'header' => ['width' => '100%', 'height' => '250px', 'minWidth' => '300px'],
        'article' => ['width' => '100%', 'height' => '180px', 'minWidth' => '300px'],
        default => ['width' => '100%', 'height' => '120px', 'minWidth' => '300px'] // regular/leaderboard
    };
@endphp

@if($enabled && $publisherId)
    @if($isLocalhost)
        {{-- Development: Simple placeholder --}}
        <div class="ad-{{ $type }}" style="width:{{ $adDimensions['width'] }}; height:{{ $adDimensions['height'] }}; min-width:{{ $adDimensions['minWidth'] }}; background:#facc15; border-radius:8px; display:flex; align-items:center; justify-content:center;">
            <div style="text-align:center; color:#1f2937; font-size:0.75rem; font-weight:600;">
                {{ $type }}<br><small style="opacity:0.8">{{ $adDimensions['width'] }} × {{ $adDimensions['height'] }}</small>
            </div>
        </div>
    @else
        {{-- Production: Container dengan EXPLICIT dimensi untuk AdSense --}}
        {{-- IMPORTANT: Using !important to ensure dimensions are applied --}}
        <div id="{{ $adId }}-container"
             style="display:block !important; width:{{ $adDimensions['width'] }} !important; min-width:{{ $adDimensions['minWidth'] }} !important; height:{{ $adDimensions['height'] }} !important; position:relative; overflow:hidden;">
            <ins id="{{ $adId }}"
                 class="adsbygoogle"
                 style="display:block !important; width:100% !important; height:100% !important;"
                 data-ad-client="{{ $publisherId }}"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
        </div>

        {{-- Delayed initialization - OPTIMIZED for faster loading --}}
        <script>
        (function() {
            const adId = {!! json_encode($adId) !!};
            const isLocalhost = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';
            let retryCount = 0;
            const maxRetries = 5;

            function initAd() {
                const adElement = document.getElementById(adId);
                const container = document.getElementById(adId + '-container');

                if (!adElement || adElement.getAttribute('data-adsbygoogle-status')) {
                    return; // Already initialized or doesn't exist
                }

                // Simple dimension check
                const rect = container ? container.getBoundingClientRect() : null;
                const offsetWidth = container ? container.offsetWidth : 0;
                const hasValidSize = (rect && rect.width > 0) || (offsetWidth > 0);

                if (hasValidSize && typeof adsbygoogle !== 'undefined') {
                    try {
                        (adsbygoogle = window.adsbygoogle || []).push({});
                        // Log ONLY in development/localhost
                        if (isLocalhost && typeof console !== 'undefined') {
                            console.log('[Ads Dev] Initialized:', adId, 'Size:', rect ? rect.width + 'x' + rect.height : 'N/A');
                        }
                    } catch (e) {
                        // SILENT in production - log ONLY in development/localhost
                        if (isLocalhost && typeof console !== 'undefined') {
                            console.error('[Ads Dev] Error:', e.message);
                        }
                        // Production: silently fail, user won't see any error
                    }
                } else {
                    retryCount++;
                    if (retryCount < maxRetries) {
                        const delay = 500 * retryCount;
                        setTimeout(initAd, delay);
                    }
                }
            }

            // OPTIMIZED: Try immediately, then after short delays
            initAd(); // Immediate
            setTimeout(initAd, 200); // 200ms
            setTimeout(initAd, 500); // 500ms
            setTimeout(initAd, 1000); // 1s
        })();
        </script>
    @endif
@endif
