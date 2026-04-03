{{-- Ultra-fast Google Ads Component - MAXIMUM PERFORMANCE --}}
@props([
    'type' => 'leaderboard',
    'lazy' => false,
    'priority' => false,
    'defer' => false,
])

@php
    $publisherId = config('ads.adsense_publisher_id');
    // Tambahkan prefix "ca-pub-" jika belum ada
    if ($publisherId && !str_starts_with($publisherId, 'ca-pub-')) {
        $publisherId = 'ca-pub-' . $publisherId;
    }
    $enabled = config('ads.enabled');
    $isLocalhost = app()->environment('local');

    $adDimensions = match($type) {
        'sidebar_left', 'sidebar_right' => ['width' => '160px', 'minWidth' => '160px', 'minHeight' => '250px'],
        'header' => ['width' => '100%', 'minWidth' => '300px', 'height' => '90px', 'minHeight' => '90px'],
        'article' => ['width' => '100%', 'minWidth' => '300px', 'height' => '90px', 'minHeight' => '90px'],
        default => ['width' => '100%', 'minWidth' => '300px', 'height' => '90px', 'minHeight' => '90px']
    };

    // FIXED: Don't use data-ad-slot - use auto format like naramakna.id frontend
    // This prevents 400 errors from invalid slot IDs
    // Generate unique ID for each ad instance to prevent conflicts
    $adId = 'ad-' . str_replace('.', '', uniqid('', true));
@endphp

@if($enabled && $publisherId)
    @if($isLocalhost)
        {{-- Development placeholder --}}
        <div class="ad-{{ $type }}"
             style="width: {{ $adDimensions['width'] }}; min-width: {{ $adDimensions['minWidth'] }}; height: {{ $adDimensions['height'] }}; background:#facc15; border-radius:8px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
            <div style="text-align:center; color:#1f2937; font-size:0.75rem; font-weight:600;">
                {{ $type }}<br><small style="opacity:0.8">{{ $adDimensions['width'] }} × {{ $adDimensions['height'] }}</small>
            </div>
        </div>
    @else
        {{-- Production: Responsive full-width ads --}}
        <div id="{{ $adId }}-wrapper" class="ad-wrapper" style="width: 100%; min-width: {{ $adDimensions['minWidth'] }};">
            @if($defer)
                {{-- Defer: No adsbygoogle class until ready to load --}}
                <ins class="ad-{{ $type }} deferred-ad adsbygoogle-placeholder"
                     style="display: block; width: 100%; min-width: {{ $adDimensions['minWidth'] }}; min-height: {{ $adDimensions['minHeight'] }};"
                     data-ad-client="{{ $publisherId }}"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
            @elseif($priority)
                {{-- Priority: Immediate load --}}
                <ins class="adsbygoogle ad-{{ $type }}"
                     style="display: block; width: 100%; min-width: {{ $adDimensions['minWidth'] }}; min-height: {{ $adDimensions['minHeight'] }};"
                     data-ad-client="{{ $publisherId }}"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                    (window.adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            @elseif($lazy)
                {{-- Lazy: Handled by unified observer in app.blade.php --}}
                <ins class="adsbygoogle ad-{{ $type }} lazy-ad"
                     style="display: block; width: 100%; min-width: {{ $adDimensions['minWidth'] }}; min-height: {{ $adDimensions['minHeight'] }};"
                     data-ad-client="{{ $publisherId }}"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                    (window.adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            @else
                {{-- Standard: Immediate load --}}
                <ins class="adsbygoogle ad-{{ $type }}"
                     style="display: block; width: 100%; min-width: {{ $adDimensions['minWidth'] }}; min-height: {{ $adDimensions['minHeight'] }};"
                     data-ad-client="{{ $publisherId }}"
                     data-ad-format="auto"
                     data-full-width-responsive="true"></ins>
                <script>
                    (window.adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            @endif
        </div>
    @endif
@endif
