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

        {{-- Delayed initialization - same approach as React frontend --}}
        <script>
        (function() {
            const adId = '{{ $adId }}';
            const expectedWidth = {{ $adDimensions['width'] === '100%' ? 'container.offsetWidth' : "'" . $adDimensions['width'] . "'"}};
            const adElement = document.getElementById(adId);
            const container = document.getElementById(adId + '-container');

            // Wait for DOM to be fully rendered before pushing ad
            function initAd() {
                if (!adElement || adElement.getAttribute('data-adsbygoogle-status')) {
                    return; // Already initialized
                }

                // Get actual dimensions
                const rect = container ? container.getBoundingClientRect() : null;
                const hasValidSize = rect && rect.width > 0 && rect.height > 0;

                if (hasValidSize) {
                    try {
                        if (typeof adsbygoogle !== 'undefined') {
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            console.log('✅ AdSense initialized:', adId, 'Size:', rect.width + 'x' + rect.height);
                        } else {
                            console.warn('⚠️ AdSense not loaded yet for:', adId);
                            setTimeout(initAd, 1000);
                        }
                    } catch (e) {
                        console.error('❌ AdSense error for', adId, ':', e.message);
                    }
                } else {
                    console.warn('⚠️ Container not ready for', adId, '- Rect:', rect, ', retrying...');
                    setTimeout(initAd, 500);
                }
            }

            // Initialize after window is fully loaded (like React useEffect)
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(initAd, 800);
                });
            } else {
                setTimeout(initAd, 800);
            }
        })();
        </script>
    @endif
@endif
