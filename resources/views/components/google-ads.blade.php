@props([
    'type' => 'leaderboard', // leaderboard, sidebar_left, sidebar_right, in_article
    'campaignId' => null,
    'adGroupId' => null,
])

@php
    $enabled = config('ads.enabled');
    $testMode = config('ads.test_mode');
    $dataSource = config('ads.data_source');
    $adUnitConfig = config("ads.ad_units.{$type}", []);
    $adUnitEnabled = $adUnitConfig['enabled'] ?? false;
    $shouldDisplay = $enabled && $adUnitEnabled;

    // Test ad slot for development
    $testSlot = 'ca-google-ads-test-slot';
@endphp

@if($shouldDisplay)
    <div class="google-ads-container google-ads-{{ $type }} {{ $attributes->class ?? '' }}" style="min-width: 100%; width: 100%;">
        @if($dataSource === 'static')
            {{-- Static AdSense Ad Unit --}}
            @if($testMode)
                {{-- Test Ad Placeholder --}}
                <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border-2 border-dashed border-blue-300 rounded-lg p-6 text-center">
                    <div class="space-y-2">
                        <div class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-sm font-semibold text-blue-800">Google Ads - {{ str_replace('_', ' ', Str::title($type)) }}</span>
                        </div>
                        <p class="text-xs text-blue-600">Ad Unit: {{ $adUnitConfig['slot'] ?? $testSlot }}</p>
                        @if($type === 'leaderboard')
                            <div class="mt-3 flex justify-center">
                                <div class="bg-white rounded shadow-sm border border-gray-200 px-8 py-3">
                                    <p class="text-xs text-gray-500 mb-1">Advertisement</p>
                                    <p class="text-sm font-medium text-gray-800">Leaderboard Ad (728x90)</p>
                                    <p class="text-xs text-gray-600 mt-1">Your ad could be here</p>
                                </div>
                            </div>
                        @elseif($type === 'sidebar_left' || $type === 'sidebar_right')
                            <div class="mt-3 flex justify-center">
                                <div class="bg-white rounded shadow-sm border border-gray-200 px-4 py-6 w-40">
                                    <p class="text-xs text-gray-500 mb-1">Sponsored</p>
                                    <p class="text-sm font-medium text-gray-800 text-center">Sidebar Ad</p>
                                    <p class="text-xs text-gray-600 mt-2 text-center">(160x600)</p>
                                </div>
                            </div>
                        @elseif($type === 'in_article')
                            <div class="mt-3 flex justify-center">
                                <div class="bg-white rounded shadow-sm border border-gray-200 px-6 py-4 w-full max-w-md">
                                    <p class="text-xs text-gray-500 mb-1">Advertisement</p>
                                    <p class="text-sm font-medium text-gray-800 text-center">In-Article Ad</p>
                                    <p class="text-xs text-gray-600 mt-1 text-center">Responsive ad unit</p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                {{-- Production AdSense Code --}}
                <ins class="adsbygoogle"
                     style="display:block; min-width: 100%; width: 100%;"
                     data-ad-client="{{ config('ads.adsense_publisher_id') }}"
                     data-ad-slot="{{ $adUnitConfig['slot'] ?? $testSlot }}"
                     data-ad-format="{{ $adUnitConfig['format'] ?? 'auto' }}"
                     @if($adUnitConfig['responsive'] ?? false) data-full-width-responsive="true" @endif
                     @if(!$testMode) data-ad-test="off" @endif></ins>
                @php
                    // Only push ads if the container is visible
                    // Check if this component is inside a hidden parent
                    $isVisible = true;
                @endphp
                <script>
                    (function() {
                        const ins = document.currentScript.previousElementSibling;
                        if (!ins) return;

                        // Check if the element or any parent is hidden
                        function isElementVisible(element) {
                            if (!element) return false;

                            const computedStyle = window.getComputedStyle(element);
                            if (computedStyle.display === 'none' || computedStyle.visibility === 'hidden') {
                                return false;
                            }

                            // Check if element has dimensions
                            const rect = element.getBoundingClientRect();
                            if (rect.width === 0 || rect.height === 0) {
                                return false;
                            }

                            // Check parent visibility
                            return isElementVisible(element.parentElement);
                        }

                        // Wait a bit to ensure DOM is ready
                        setTimeout(function() {
                            if (isElementVisible(ins)) {
                                (adsbygoogle = window.adsbygoogle || []).push({});
                            } else {
                                // Store this element to be initialized later when parent becomes visible
                                ins.setAttribute('data-ad-pending', 'true');

                                // Observe for when parent becomes visible
                                const observer = new MutationObserver(function(mutations) {
                                    mutations.forEach(function(mutation) {
                                        if (mutation.type === 'attributes' && mutation.attributeName === 'style') {
                                            if (isElementVisible(ins) && ins.getAttribute('data-ad-pending') === 'true') {
                                                ins.removeAttribute('data-ad-pending');
                                                (adsbygoogle = window.adsbygoogle || []).push({});
                                                observer.disconnect();
                                            }
                                        }
                                    });
                                });

                                // Start observing the parent
                                let parent = ins.parentElement;
                                while (parent && parent !== document.body) {
                                    observer.observe(parent, { attributes: true, attributeFilter: ['style', 'class'] });
                                    parent = parent.parentElement;
                                }

                                // Timeout after 5 seconds to avoid memory leaks
                                setTimeout(function() {
                                    observer.disconnect();
                                }, 5000);
                            }
                        }, 100);
                    })();
                </script>
            @endif
        @else
            {{-- Dynamic Ads from API --}}
            @php
                $adData = null;
                if(config('ads.cache.enabled') && Cache::has("google_ads_{$type}")) {
                    $adData = Cache::get("google_ads_{$type}");
                }
            @endphp

            @if($adData)
                <div class="bg-white border border-gray-200 rounded-lg p-4 shadow-sm">
                    <div class="text-xs text-gray-500 mb-2">Advertisement</div>
                    @if(isset($adData['headline']))
                        <h3 class="text-lg font-semibold text-gray-800 mb-1">{{ $adData['headline'] }}</h3>
                    @endif
                    @if(isset($adData['description']))
                        <p class="text-sm text-gray-600">{{ $adData['description'] }}</p>
                    @endif
                    @if(isset($adData['display_url']))
                        <p class="text-xs text-green-600 mt-2">{{ $adData['display_url'] }}</p>
                    @endif
                </div>
            @else
                {{-- Loading or Fallback --}}
                <div class="bg-gray-50 border border-gray-200 rounded-lg p-4 text-center">
                    <p class="text-sm text-gray-500">Loading ad...</p>
                </div>
                @once
                    <script>
                        // Fetch ad data asynchronously
                        fetch('/api/google-ads/fetch-ad?type={{ $type }}')
                            .then(response => response.json())
                            .then(data => {
                                if(data.success && data.data) {
                                    // Cache and render ad
                                    localStorage.setItem('google_ads_{{ $type }}', JSON.stringify(data.data));
                                    // Reload to display cached ad
                                    window.location.reload();
                                }
                            })
                            .catch(error => console.error('Error loading ad:', error));
                    </script>
                @endonce
            @endif
        @endif
    </div>
@endif

@push('scripts')
    @if($shouldDisplay && !$testMode && $dataSource === 'static')
        {{-- AdSense async script - only load once and only in production mode --}}
        @once
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ config('ads.adsense_publisher_id') }}"
                    crossorigin="anonymous"></script>
        @endonce
    @endif
@endpush
