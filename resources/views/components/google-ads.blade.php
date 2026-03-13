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

    // Style classes based on type - matching React frontend
    $styleClasses = match($type) {
        'sidebar_left', 'sidebar_right' => 'width: 160px; min-width: 160px; height: 600px; min-height: 600px;',
        'header' => 'width: 100%; min-width: 300px; height: 250px; min-height: 90px;',
        'article' => 'width: 100%; min-width: 300px; height: 180px; min-height: 90px;',
        default => 'width: 100%; min-width: 300px; height: 120px; min-height: 90px;' // regular/leaderboard
    };
@endphp

@if($enabled && $publisherId)
    @if($isLocalhost)
        {{-- Development: Simple placeholder --}}
        <div class="ad-{{ $type }}" style="{{$styleClasses}} background:#facc15; border-radius:8px; display:flex; align-items:center; justify-content:center;">
            <div style="text-align:center; color:#1f2937; font-size:0.75rem; font-weight:600;">
                {{ $type }}<br><small style="opacity:0.8">{{ $styleClasses }}</small>
            </div>
        </div>
    @else
        {{-- Production: Auto-format approach (SAME AS REACT FRONTEND) --}}
        {{-- Container dengan dimensi jelas untuk AdSense --}}
        <div id="{{ $adId }}-container" style="display:inline-block; {{$styleClasses}}">
            <ins id="{{ $adId }}"
                 class="adsbygoogle"
                 style="display:block; width:100%; height:100%;"
                 data-ad-client="{{ $publisherId }}"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
        </div>

        {{-- Delayed initialization - same approach as React frontend --}}
        <script>
        (function() {
            const adId = '{{ $adId }}';
            const adElement = document.getElementById(adId);
            const container = document.getElementById(adId + '-container');

            // Wait for DOM to be fully rendered before pushing ad
            function initAd() {
                if (!adElement || adElement.getAttribute('data-adsbygoogle-status')) {
                    return; // Already initialized
                }

                // Check if container has valid dimensions
                if (container && container.offsetWidth > 0) {
                    try {
                        if (typeof adsbygoogle !== 'undefined') {
                            (adsbygoogle = window.adsbygoogle || []).push({});
                            console.log('✅ AdSense initialized:', adId, 'Width:', container.offsetWidth);
                        } else {
                            console.warn('⚠️ AdSense not loaded yet for:', adId);
                            // Retry after 1 second
                            setTimeout(initAd, 1000);
                        }
                    } catch (e) {
                        console.error('❌ AdSense error for', adId, ':', e);
                    }
                } else {
                    console.warn('⚠️ Container width is 0 for', adId, ', retrying...');
                    // Retry if container doesn't have width yet
                    setTimeout(initAd, 500);
                }
            }

            // Initialize after window is fully loaded (like React useEffect)
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    setTimeout(initAd, 800); // 800ms delay like React
                });
            } else {
                setTimeout(initAd, 800); // 800ms delay like React
            }
        })();
        </script>
    @endif
@endif
