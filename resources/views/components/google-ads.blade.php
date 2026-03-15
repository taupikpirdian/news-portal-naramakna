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
        'sidebar_left', 'sidebar_right' => ['width' => '160px', 'minHeight' => '250px', 'maxHeight' => '600px', 'minWidth' => '160px'],
        'header' => ['width' => '100%', 'height' => '250px', 'minWidth' => '300px'],
        'article' => ['width' => '100%', 'height' => '180px', 'minWidth' => '300px'],
        default => ['width' => '100%', 'height' => '120px', 'minWidth' => '300px']
    };
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
        @if($priority)
            {{-- Priority: Immediate load --}}
            <ins class="adsbygoogle ad-{{ $type }}"
                 style="display:block; width:{{ $adDimensions['width'] }}; min-width:{{ $adDimensions['minWidth'] }}; @if(isset($adDimensions['height'])) height:{{ $adDimensions['height'] }}; @else min-height:{{ $adDimensions['minHeight'] }}; max-height:{{ $adDimensions['maxHeight'] }}; @endif"
                 data-ad-client="{{ $publisherId }}"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
        @elseif($lazy)
            {{-- Lazy: Handled by unified observer in app.blade.php --}}
            <ins class="adsbygoogle ad-{{ $type }} lazy-ad"
                 style="display:block; width:{{ $adDimensions['width'] }}; min-width:{{ $adDimensions['minWidth'] }}; @if(isset($adDimensions['height'])) height:{{ $adDimensions['height'] }}; @else min-height:{{ $adDimensions['minHeight'] }}; max-height:{{ $adDimensions['maxHeight'] }}; @endif"
                 data-ad-client="{{ $publisherId }}"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
        @else
            {{-- Standard: Immediate load --}}
            <ins class="adsbygoogle ad-{{ $type }}"
                 style="display:block; width:{{ $adDimensions['width'] }}; min-width:{{ $adDimensions['minWidth'] }}; @if(isset($adDimensions['height'])) height:{{ $adDimensions['height'] }}; @else min-height:{{ $adDimensions['minHeight'] }}; max-height:{{ $adDimensions['maxHeight'] }}; @endif"
                 data-ad-client="{{ $publisherId }}"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
            <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
        @endif
    @endif
@endif
