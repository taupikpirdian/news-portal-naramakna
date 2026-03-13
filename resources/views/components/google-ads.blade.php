@props([
    'type' => 'leaderboard',
    'slot' => null,
])

@php
    $enabled = config('ads.enabled');
    $publisherId = config('ads.adsense_publisher_id');

    // Get slot from prop or config
    if (empty($slot)) {
        $adUnitConfig = config("ads.ad_units.{$type}", []);
        $slot = $adUnitConfig['slot'] ?? null;
    }

    $shouldDisplay = $enabled && $publisherId && $slot;

    // Generate unique ID
    $uniqueId = 'adsense-' . $type . '-' . md5(uniqid());

    // Detect localhost
    $isLocalhost = app()->environment('local') ||
                   request()->getHost() === 'localhost' ||
                   request()->getHost() === '127.0.0.1';

    // Ad dimensions
    $dimensions = match($type) {
        'leaderboard' => ['width' => '100%', 'height' => '90px'],
        'header' => ['width' => '100%', 'height' => '90px'],
        'mid', 'bottom' => ['width' => '100%', 'height' => '90px'],
        'sidebar_left', 'sidebar_right' => ['width' => '160px', 'height' => '100%'],
        'in_article', 'article_mid', 'article_bottom', 'article_final' => ['width' => '100%', 'height' => '100px'],
        'regular', 'content' => ['width' => '100%', 'height' => '90px'],
        default => ['width' => '100%', 'height' => '90px']
    };
@endphp

@if($shouldDisplay)
    @if($isLocalhost)
        {{-- Development: Placeholder --}}
        <div class="ad-container ad-{{ $type }}"
             style="width: {{ $dimensions['width'] }}; height: {{ $dimensions['height'] }}; background: #facc15; border-radius: 8px; display: flex; align-items: center; justify-content: center; min-height: 90px;">
            <div style="text-align: center; color: #1f2937; padding: 1rem;">
                <svg style="width: 24px; height: 24px; margin: 0 auto; opacity: 0.8;" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <p style="font-size: 0.75rem; margin: 0.5rem 0 0; font-weight: 600;">
                    {{ str_replace('_', ' ', ucfirst($type)) }}
                </p>
                <p style="font-size: 0.65rem; margin: 0; opacity: 0.8;">
                    {{ $dimensions['width'] }} × {{ $dimensions['height'] }}
                </p>
            </div>
        </div>
    @else
        {{-- Production: Ultra-fast AdSense --}}
        <ins class="adsbygoogle"
             style="display:inline-block; width:{{ $dimensions['width'] }}; height:{{ $dimensions['height'] }}; min-height:90px;"
             data-ad-client="{{ $publisherId }}"
             data-ad-slot="{{ $slot }}"></ins>

        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    @endif
@endif
