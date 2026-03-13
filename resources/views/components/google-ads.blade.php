@props([
    'type' => 'leaderboard',
    'campaignId' => null,
    'adGroupId' => null,
])

@php
    $enabled = config('ads.enabled');
    $dataSource = config('ads.data_source');
    $adUnitConfig = config("ads.ad_units.{$type}", []);
    $adUnitEnabled = $adUnitConfig['enabled'] ?? false;
    $shouldDisplay = $enabled && $adUnitEnabled;
    $publisherId = config('ads.adsense_publisher_id');

    // Generate unique ID for this ad instance
    $uniqueId = 'adsense-' . $type . '-' . md5(uniqid(rand(), true));

    // Detect if running on localhost
    $isLocalhost = request()->getHost() === 'localhost' || request()->getHost() === '127.0.0.1' || app()->environment('local');

    // Get dimensions based on type
    if ($type === 'leaderboard') {
        $dimensions = ['width' => '100%', 'height' => '90px', 'minHeight' => '90px'];
    } elseif ($type === 'sidebar_left' || $type === 'sidebar_right') {
        $dimensions = ['width' => '160px', 'height' => '600px', 'minHeight' => '250px'];
    } elseif ($type === 'in_article') {
        $dimensions = ['width' => '100%', 'height' => '100px', 'minHeight' => '100px'];
    } else {
        $dimensions = ['width' => '100%', 'height' => '90px', 'minHeight' => '90px'];
    }
@endphp

@if($shouldDisplay)
    @if($isLocalhost && $dataSource === 'static' && $publisherId && strpos($publisherId, 'ca-pub-') === 0)
        {{-- Development Mode: Localhost Placeholder --}}
        <div class="google-ads-container google-ads-{{ $type }} {{ $attributes->class ?? 'my-4' }}"
             style="@if(in_array($type, ['sidebar_left', 'sidebar_right'])) width: 160px; height: 100%; @else width: 100%; max-width: 100%; height: 90px; min-height: 90px; @endif background: #facc15; border-radius: 8px; display: flex; flex-direction: column; align-items: center; justify-content: center; position: relative; overflow: hidden;">

            <div style="position: relative; z-index: 1; color: #1f2937; text-align: center; padding: 0.5rem;">
                <svg style="width: 32px; height: 32px; margin: 0 auto; opacity: 0.9;" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <p style="font-size: 0.75rem; margin: 0.5rem 0 0 0; font-weight: 600; opacity: 0.9;">
                    {{ str_replace('_', ' ', ucfirst($type)) }}
                </p>
                <p style="font-size: 0.65rem; margin: 0; opacity: 0.8;">
                    @if(in_array($type, ['sidebar_left', 'sidebar_right'])) 160 × Dynamic @else 100% × 90 @endif
                </p>
            </div>
        </div>

    @elseif($dataSource === 'static' && $publisherId && strpos($publisherId, 'ca-pub-') === 0)
        {{-- Production Mode: Real AdSense --}}
        <div class="google-ads-container google-ads-{{ $type }} {{ $attributes->class ?? '' }}"
             style="@if(in_array($type, ['sidebar_left', 'sidebar_right'])) width: 160px; min-width: 160px; height: 100%; @else width: 100%; max-width: 100%; height: 90px; min-height: 90px; @endif">

            <ins id="{{ $uniqueId }}"
                 class="adsbygoogle"
                 style="display:inline-block; @if(in_array($type, ['sidebar_left', 'sidebar_right'])) width:160px; min-width:160px; height:100%; @else width:100%; min-width:250px; height:90px; @endif"
                 data-ad-client="{{ $publisherId }}"
                 @if(!empty($adUnitConfig['slot']) && $adUnitConfig['slot'] !== '' && $adUnitConfig['slot'] !== '1234567891' && $adUnitConfig['slot'] !== '2234567891' && $adUnitConfig['slot'] !== '1122334455')
                 data-ad-slot="{{ $adUnitConfig['slot'] }}"
                 @endif
                 data-ad-format="{{ in_array($type, ['sidebar_left', 'sidebar_right']) ? 'vertical' : 'auto' }}"
                 data-full-width-responsive="{{ in_array($type, ['sidebar_left', 'sidebar_right']) ? 'false' : 'true' }}"></ins>

            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>
    @else
        {{-- Fallback when AdSense is not configured --}}
        <div class="google-ads-placeholder {{ $attributes->class ?? 'my-4' }} flex items-center justify-center"
             style="background: #f3f4f6; border: 1px dashed #d1d5db; padding: 1.5rem; text-align: center; min-height: 100px; width: 100%;">
            <div style="color: #6b7280;">
                <p style="font-size: 0.875rem; margin: 0;">Advertisement Space - {{ str_replace('_', ' ', ucfirst($type)) }}</p>
                @if($publisherId && strpos($publisherId, 'ca-pub-') !== 0)
                    <p style="font-size: 0.75rem; margin-top: 0.5rem; color: #ef4444;">
                        Invalid AdSense Publisher ID format. Must start with "ca-pub-"
                    </p>
                @endif
            </div>
        </div>
    @endif
@endif

{{-- AdSense Script - Load Once Per Page --}}
@push('head-scripts')
    @once
        @if($shouldDisplay && $dataSource === 'static' && $publisherId && strpos($publisherId, 'ca-pub-') === 0)
            {{-- AdSense Async Script - Standard Google Implementation --}}
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $publisherId }}" crossorigin="anonymous"></script>
        @endif
    @endonce
@endpush
