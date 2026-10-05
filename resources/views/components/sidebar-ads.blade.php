@props([
    'side' => 'left', // left or right
])

@php
    // Use 'sidebar' (same as production frontend)
    $apiUrl = config('app.url') . '/api/ads/serve?placement=sidebar&limit=1';
    $componentId = 'sidebar-' . $side . '-' . uniqid();
@endphp

<div id="{{ $componentId }}" class="sidebar-ad-container">
    <!-- Sidebar Ad Container -->
    <div id="{{ $componentId }}-ad-container" style="display: none;" class="relative">
        <a id="{{ $componentId }}-ad-link" target="_blank" rel="noopener noreferrer" class="block">
            <img id="{{ $componentId }}-ad-image" class="w-full h-auto rounded-lg shadow" style="max-width: 160px;" alt="">
        </a>
    </div>
</div>

<script>
(function() {
    const componentId = '{{ $componentId }}';
    const apiUrl = '{{ $apiUrl }}';
    const adContainer = document.getElementById(componentId + '-ad-container');
    const adLink = document.getElementById(componentId + '-ad-link');
    const adImage = document.getElementById(componentId + '-ad-image');

    console.log('[Sidebar-{{ $side }}] Initializing ad component');
    console.log('[Sidebar-{{ $side }}] API URL:', apiUrl);

    async function fetchAd() {
        try {
            console.log('[Sidebar-{{ $side }}] Fetching ad from API...');

            const response = await fetch(apiUrl);
            console.log('[Sidebar-{{ $side }}] Response status:', response.status);

            const data = await response.json();
            console.log('[Sidebar-{{ $side }}] Response data:', data);

            if (data.success && data.data && data.data.ads && data.data.ads.length > 0) {
                const ad = data.data.ads[0];
                console.log('[Sidebar-{{ $side }}] Ad found:', ad);

                // Set ad data
                adLink.href = ad.target_url;
                adImage.src = ad.media_url || ad.image_url;
                adImage.alt = ad.campaign_name || 'Advertisement';

                // Show ad
                adContainer.style.display = 'block';

                console.log('[Sidebar-{{ $side }}] ✅ Ad loaded successfully:', ad.campaign_name);
            } else {
                console.warn('[Sidebar-{{ $side }}] ❌ No ads available from API');
                console.warn('[Sidebar-{{ $side }}] Response:', data);
            }
        } catch (error) {
            console.error('[Sidebar-{{ $side }}] ❌ Error fetching ad:', error);
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
