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
        'sidebar_left', 'sidebar_right' => ['width' => '160px', 'height' => '250px'],
        'header' => ['width' => '728px', 'height' => '90px'],
        'article' => ['width' => '728px', 'height' => '90px'],
        default => ['width' => '728px', 'height' => '90px']
    };

    // Generate unique ID for each ad instance to prevent conflicts
    $adId = 'ad-' . str_replace('.', '', uniqid('', true));
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
        {{-- Production: Ultra-optimized with explicit pixel dimensions --}}
        <div id="{{ $adId }}-wrapper" class="ad-wrapper" style="width: {{ $adDimensions['width'] }}; height: {{ $adDimensions['height'] }}; margin: 0 auto;">
            @if($priority)
                {{-- Priority: Immediate load with explicit dimensions --}}
                <ins class="adsbygoogle ad-{{ $type }}"
                     style="display: block; width: {{ $adDimensions['width'] }}; height: {{ $adDimensions['height'] }};"
                     data-ad-client="{{ $publisherId }}"
                     data-ad-layout="in-article"></ins>
            @elseif($lazy)
                {{-- Lazy: Handled by unified observer in app.blade.php --}}
                <ins class="adsbygoogle ad-{{ $type }} lazy-ad"
                     style="display: block; width: {{ $adDimensions['width'] }}; height: {{ $adDimensions['height'] }};"
                     data-ad-client="{{ $publisherId }}"
                     data-ad-layout="in-article"></ins>
            @else
                {{-- Standard: Immediate load with explicit dimensions --}}
                <ins class="adsbygoogle ad-{{ $type }}"
                     style="display: block; width: {{ $adDimensions['width'] }}; height: {{ $adDimensions['height'] }};"
                     data-ad-client="{{ $publisherId }}"
                     data-ad-layout="in-article"></ins>
            @endif
        </div>
    @endif
@endif
