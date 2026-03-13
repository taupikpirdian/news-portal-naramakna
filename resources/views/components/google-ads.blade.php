{{-- Ultra-fast Google Ads Component - NO PHP LOGIC DELAY --}}
@props([
    'slot' => null, // Slot ID WAJIB untuk production
])

@php
    $publisherId = config('ads.adsense_publisher_id');
    $enabled = config('ads.enabled');

    // Auto-detect type from slot or parameter
    $type = $attributes['type'] ?? 'leaderboard';

    // Simple dimensions
    $dimensions = match($type) {
        'sidebar_left', 'sidebar_right' => ['width' => '160px', 'height' => '100%'],
        default => ['width' => '100%', 'height' => '90px']
    };

    // Localhost check - simple
    $isLocalhost = app()->environment('local');
@endphp

@if($enabled && $publisherId && $slot)
    @if($isLocalhost)
        {{-- Development: Simple placeholder --}}
        <div class="ad-{{ $type }}" style="width:{{ $dimensions['width'] }}; height:{{ $dimensions['height'] }}; background:#facc15; border-radius:8px; display:flex; align-items:center; justify-content:center; min-height:90px;">
            <div style="text-align:center; color:#1f2937; font-size:0.75rem; font-weight:600;">
                {{ $type }}<br><small style="opacity:0.8">{{ $dimensions['width'] }} × {{ $dimensions['height'] }}</small>
            </div>
        </div>
    @else
        {{-- Production: Pure HTML + Push (Google Best Practice) --}}
        <ins class="adsbygoogle"
             data-ad-client="{{ $publisherId }}"
             data-ad-slot="{{ $slot }}"
             style="display:inline-block; width:{{ $dimensions['width'] }}; height:{{ $dimensions['height'] }}; min-height:90px;"></ins>

        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    @endif
@endif
