@props([
    'placement' => 'header',
    'limit' => 1,
])

@php
    $apiUrl = config('app.url') . '/api/ads/serve?placement=' . $placement . '&limit=' . $limit;
    $componentId = 'header-ad-' . uniqid();
@endphp

<div id="{{ $componentId }}" class="header-ad-container">
    <!-- Loading state -->
    <div id="{{ $componentId }}-loading-state" class="animate-pulse bg-gray-200 rounded-lg h-24 flex items-center justify-center">
        <span class="text-gray-400">Loading...</span>
    </div>

    <!-- API Ad Banner Container -->
    <div id="{{ $componentId }}-ad-container" style="display: none;" class="relative my-8">
        <a id="{{ $componentId }}-ad-link" target="_blank" rel="noopener noreferrer" class="block">
            <img id="{{ $componentId }}-ad-image" class="w-full h-auto rounded-lg shadow-lg" alt="" loading="lazy">
        </a>
    </div>

    {{-- Fallback to Google Ads when no ad available --}}
    <div id="{{ $componentId }}-fallback" style="display: none;" class="my-8">
        @if(config('ads.enabled') && config('ads.adsense_publisher_id'))
            <x-google-ads type="article" :priority="true" />
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
                fallback.style.display = 'block';
            }
        } catch (error) {
            console.error('Error fetching header ad:', error);

            // Hide loading and show fallback
            loadingState.style.display = 'none';
            fallback.style.display = 'block';
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
