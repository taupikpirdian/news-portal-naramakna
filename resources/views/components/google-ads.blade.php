{{-- Ultra-fast Google Ads Component - MAXIMUM PERFORMANCE --}}
@props([
    'type' => 'leaderboard',
    'lazy' => false,
    'priority' => false,
])

@php
    $publisherId = config('ads.adsense_publisher_id');
    $enabled = config('ads.enabled');
    $isLocalhost = app()->environment('local');

    $adDimensions = match($type) {
        'sidebar_left', 'sidebar_right' => ['width' => '160px', 'height' => '250px', 'minWidth' => '160px'],
        'header' => ['width' => '100%', 'height' => '250px', 'minWidth' => '300px'],
        'article' => ['width' => '100%', 'height' => '180px', 'minWidth' => '300px'],
        default => ['width' => '100%', 'height' => '120px', 'minWidth' => '300px']
    };

    // Generate unique ID for each ad instance to prevent conflicts
    $adId = 'ad-' . $type . '-' . uniqid();
@endphp

@if($enabled && $publisherId)
    @if($isLocalhost)
        {{-- Development placeholder --}}
        <div class="ad-{{ $type }}"
             style="width:{{ $adDimensions['width'] }}; @if(isset($adDimensions['height'])) height:{{ $adDimensions['height'] }}; @else min-height:{{ $adDimensions['minHeight'] }}; max-height:{{ $adDimensions['maxHeight'] }}; @endif min-width:{{ $adDimensions['minWidth'] }}; background:#facc15; border-radius:8px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
            <div style="text-align:center; color:#1f2937; font-size:0.75rem; font-weight:600;">
                {{ $type }}<br><small style="opacity:0.8">{{ $adDimensions['width'] }} × {{ $adDimensions['height'] ?? $adDimensions['minHeight'] . '-' . $adDimensions['maxHeight'] }}</small>
            </div>
        </div>
    @else
        {{-- Production: Ultra-optimized --}}
        <div id="{{ $adId }}-wrapper" class="ad-wrapper" style="width: 100%; min-width: {{ $adDimensions['minWidth'] }}; overflow: hidden;">
            @if($priority)
                {{-- Priority: Immediate load - wrapped to ensure dimensions --}}
                <ins class="adsbygoogle ad-{{ $type }}"
                     style="display: block !important; width: 100% !important; min-width: {{ $adDimensions['minWidth'] }} !important; height: {{ $adDimensions['height'] }} !important;"
                     data-ad-client="{{ $publisherId }}"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
            @elseif($lazy)
                {{-- Lazy: Handled by unified observer in app.blade.php --}}
                <ins class="adsbygoogle ad-{{ $type }} lazy-ad"
                     style="display: block !important; width: 100% !important; min-width: {{ $adDimensions['minWidth'] }} !important; height: {{ $adDimensions['height'] }} !important;"
                     data-ad-client="{{ $publisherId }}"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
            @else
                {{-- Standard: Immediate load - wrapped to ensure dimensions --}}
                <ins class="adsbygoogle ad-{{ $type }}"
                     style="display: block !important; width: 100% !important; min-width: {{ $adDimensions['minWidth'] }} !important; height: {{ $adDimensions['height'] }} !important;"
                     data-ad-client="{{ $publisherId }}"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
            @endif
        </div>

        {{-- Load ad only after wrapper has valid dimensions --}}
        <script>
            (function() {
                var adWrapper = document.getElementById('{{ $adId }}-wrapper');
                var adElement = adWrapper.querySelector('.adsbygoogle');

                function loadAd() {
                    if (typeof adsbygoogle !== 'undefined') {
                        try {
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        } catch(e) {
                            console.warn('Ad load error:', e);
                        }
                    }
                }

                // Wait for DOM to be ready with valid dimensions
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', function() {
                        requestAnimationFrame(function() {
                            setTimeout(loadAd, 100);
                        });
                    });
                } else {
                    requestAnimationFrame(function() {
                        setTimeout(loadAd, 50);
                    });
                }
            })();
        </script>
    @endif
@endif
