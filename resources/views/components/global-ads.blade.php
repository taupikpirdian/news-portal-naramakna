@props([
    'placement' => 'global',
    'type' => 'leaderboard',
    'priority' => false,
    'lazy' => false,
])

@php
    $apiUrl = config('app.url') . '/api/ads/serve?placement=' . $placement . '&limit=1';
    $componentId = 'global-ad-' . str_replace('.', '', uniqid('', true));
@endphp

<div id="{{ $componentId }}" class="global-ad-container">
    <!-- Loading state -->
    <div id="{{ $componentId }}-loading-state" class="animate-pulse bg-gray-200 rounded-lg flex items-center justify-center"
         style="min-width: 300px; min-height: 90px;">
        <span class="text-gray-400 text-sm">Loading...</span>
    </div>

    <!-- API Ad Container -->
    <div id="{{ $componentId }}-ad-container" style="display: none;" class="relative">
        <a id="{{ $componentId }}-ad-link" target="_blank" rel="noopener noreferrer" class="block">
            <img id="{{ $componentId }}-ad-image" class="w-full h-auto rounded-lg shadow-lg" alt="" loading="lazy">
        </a>
    </div>

    {{-- Fallback to Google Ads when no ad available --}}
    <div id="{{ $componentId }}-fallback" style="display: none; width: 100%; min-height: 90px; margin-top: 16px; margin-bottom: 16px; overflow: hidden;">
        @if(config('ads.enabled') && config('ads.adsense_publisher_id'))
            <x-google-ads :type="$type" :priority="$priority" :lazy="$lazy" :defer="true" />
        @endif
    </div>
</div>

<script>
(function() {
    const componentId = '{{ $componentId }}';
    const apiUrl = '{{ $apiUrl }}';
    const loadingState = document.getElementById(componentId + '-loading-state');
    const adContainer = document.getElementById(componentId + '-ad-container');
    const adLink = document.getElementById(componentId + '-ad-link');
    const adImage = document.getElementById(componentId + '-ad-image');
    const fallback = document.getElementById(componentId + '-fallback');

    // Function to initialize Google Ads after fallback is visible
    function initializeGoogleAds() {
        requestAnimationFrame(function() {
            setTimeout(function() {
                // Find all deferred ads in fallback container
                fallback.querySelectorAll('.deferred-ad').forEach(function(ad) {
                    if (typeof adsbygoogle !== 'undefined') {
                        try {
                            ad.classList.remove('adsbygoogle-placeholder');
                            ad.classList.add('adsbygoogle');
                            (adsbygoogle = window.adsbygoogle || []).push({});
                        } catch(e) {
                            console.error('Error initializing global ad:', e);
                        }
                    }
                });
            }, 100);
        });
    }

    function showFallback() {
        loadingState.style.display = 'none';
        adContainer.style.display = 'none';
        adImage.removeAttribute('src');

        if (fallback.childElementCount > 0) {
            fallback.style.display = 'block';
            initializeGoogleAds();
        }
    }

    // A failed campaign image should become an ad slot, never an article
    // image placeholder with a different aspect ratio.
    adImage.addEventListener('error', function(event) {
        event.stopImmediatePropagation();
        showFallback();
    });

    async function fetchAd() {
        try {
            const response = await fetch(apiUrl);
            const data = await response.json();

            // Hide loading state
            loadingState.style.display = 'none';

            if (data.success && data.data && data.data.ads && data.data.ads.length > 0) {
                const ad = data.data.ads[0];

                // Set ad data
                adLink.href = ad.target_url || '#';
                adImage.src = ad.media_url || ad.image_url || '';
                adImage.alt = ad.campaign_name || 'Advertisement';

                // Show ad
                adContainer.style.display = 'block';
            } else {
                // Show fallback - Google Ads
                showFallback();
            }
        } catch (error) {
            console.error('Error fetching global ad:', error);

            // Hide loading and show fallback
            showFallback();
        }
    }

    // Fetch ad when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', fetchAd);
    } else {
        fetchAd();
    }
})();
</script>
