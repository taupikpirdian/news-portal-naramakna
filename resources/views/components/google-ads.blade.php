{{-- Ultra-fast Google Ads Component - MATCH REACT FRONTEND APPROACH --}}
@props([
    'type' => 'leaderboard', // leaderboard, sidebar, article, regular
])

@php
    $publisherId = config('ads.adsense_publisher_id');
    $enabled = config('ads.enabled');

    // Localhost check - simple
    $isLocalhost = app()->environment('local');

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
        <div style="display:inline-block; {{$styleClasses}}">
            <ins class="adsbygoogle"
                 style="display:block; width:100%; height:100%;"
                 data-ad-client="{{ $publisherId }}"
                 data-ad-format="auto"
                 data-full-width-responsive="true"></ins>
        </div>

        <script>(adsbygoogle = window.adsbygoogle || []).push({});</script>
    @endif
@endif
