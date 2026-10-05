@props([
    'placement' => 'article-side-one',
])

@php
    $apiUrl = config('app.url') . '/api/ads/serve?placement=' . $placement . '&limit=1';
    $componentId = 'sidebar-banner-' . str_replace('.', '', uniqid('', true));
@endphp

<div id="{{ $componentId }}" class="sidebar-banner-container">
    <div id="{{ $componentId }}-banner" style="display: none;" class="bg-white rounded-2xl shadow-sm p-4 mb-6">
        <div class="w-[300px] mx-auto">
            <a id="{{ $componentId }}-banner-link" target="_blank" rel="noopener noreferrer" class="block">
                <img id="{{ $componentId }}-banner-image" src="" alt="Advertisement" class="w-full h-auto rounded-lg" loading="lazy">
            </a>
        </div>
    </div>
</div>

<script>
(function() {
    const componentId = '{{ $componentId }}';
    const apiUrl = '{{ $apiUrl }}';
    const banner = document.getElementById(componentId + '-banner');
    const bannerLink = document.getElementById(componentId + '-banner-link');
    const bannerImage = document.getElementById(componentId + '-banner-image');

    async function fetchBanner() {
        try {
            const response = await fetch(apiUrl);
            const data = await response.json();

            if (data.success && data.data && data.data.ads && data.data.ads.length > 0) {
                const ad = data.data.ads[0];

                // Set banner data
                bannerLink.href = ad.target_url || '#';
                bannerImage.src = ad.media_url || ad.image_url || '';
                bannerImage.alt = ad.campaign_name || 'Advertisement';

                // Show banner
                banner.style.display = 'block';
            }
            // If no data, banner remains hidden
        } catch (error) {
            console.error('Error fetching sidebar banner:', error);
            // Banner remains hidden on error
        }
    }

    // Fetch banner when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', fetchBanner);
    } else {
        fetchBanner();
    }
})();
</script>
