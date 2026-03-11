@props([
    'type' => 'leaderboard', // leaderboard, sidebar_left, sidebar_right, in_article
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
    $dimensions = match($type) {
        'leaderboard' => ['width' => '100%', 'height' => '90px', 'minHeight' => '90px'],
        'sidebar_left', 'sidebar_right' => ['width' => '160px', 'height' => '600px', 'minHeight' => '250px'],
        'in_article' => ['width' => '100%', 'height' => '100px', 'minHeight' => '100px'],
        default => ['width' => '100%', 'height' => '90px', 'minHeight' => '90px']
    };
@endphp

@if($shouldDisplay)
    @if($isLocalhost && $dataSource === 'static' && $publisherId && strpos($publisherId, 'ca-pub-') === 0)
        {{-- Development Mode: Localhost Placeholder --}}
        <div class="google-ads-container google-ads-{{ $type }} {{ $attributes->class ?? 'my-4' }}"
             style="width: 100%; max-width: 100%; background: #facc15; border-radius: 8px; padding: 1.5rem; text-align: center; position: relative; overflow: hidden;">

            {{-- Content --}}
            <div style="position: relative; z-index: 1; color: #1f2937;">
                {{-- Icon --}}
                <div style="margin-bottom: 0.75rem;">
                    <svg style="width: 48px; height: 48px; margin: 0 auto; opacity: 0.9;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                </div>

                {{-- Main Text --}}
                <h3 style="font-size: 1.125rem; font-weight: 700; margin: 0 0 0.5rem 0;">
                    📢 Advertisement Space
                </h3>

                {{-- Subtitle --}}
                <p style="font-size: 0.875rem; margin: 0 0 1rem 0; opacity: 0.9;">
                    <span style="font-weight: 600;">{{ str_replace('_', ' ', ucfirst($type)) }}</span> Ad Unit
                </p>

                {{-- Info Box --}}
                <div style="background: rgba(255,255,255,0.5); backdrop-filter: blur(10px); border-radius: 6px; padding: 0.75rem 1rem; margin: 0 auto; max-width: 400px; border: 1px solid rgba(255,255,255,0.5);">
                    <p style="font-size: 0.75rem; margin: 0; line-height: 1.5;">
                        <span style="opacity: 0.95;">⚠️ <strong>Development Mode:</strong> Google AdSense does not work on localhost.</span>
                    </p>
                    <p style="font-size: 0.75rem; margin: 0.5rem 0 0 0; line-height: 1.5; opacity: 0.95;">
                        ✅ Ads will appear on <strong>production domain</strong>
                    </p>
                </div>

                {{-- Size Badge --}}
                <div style="margin-top: 1rem; display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(255,255,255,0.5); padding: 0.375rem 0.75rem; border-radius: 20px; font-size: 0.75rem;">
                    <span style="opacity: 0.95;">📏</span>
                    <span style="opacity: 1;">{{ $dimensions['width'] }} × {{ $dimensions['height'] }}</span>
                </div>
            </div>

            {{-- Debug Info (Console Only) --}}
            <script>
                (function() {
                    const adType = '{{ $type }}';
                    const publisherId = '{{ $publisherId }}';
                    const isLocalhost = {{ $isLocalhost ? 'true' : 'false' }};

                    if (isLocalhost && typeof console !== 'undefined') {
                        console.log('%c[AdSense Placeholder - Localhost]', 'background: #f59e0b; color: white; padding: 4px 8px; border-radius: 4px;', {
                            adType: adType,
                            publisherId: publisherId,
                            message: 'Showing placeholder UI instead of AdSense (localhost mode)',
                            dimensions: {{ json_encode($dimensions) }}
                        });
                    }
                })();
            </script>
        </div>

    @elseif($dataSource === 'static' && $publisherId && strpos($publisherId, 'ca-pub-') === 0)
        {{-- Production Mode: Real AdSense --}}
        <div class="google-ads-container google-ads-{{ $type }} {{ $attributes->class ?? '' }}" style="width: 100%; {{ in_array($type, ['sidebar_left', 'sidebar_right']) ? 'max-width: 160px;' : 'max-width: 100%;' }}">
            <ins id="{{ $uniqueId }}"
                 class="adsbygoogle"
                 style="display:block; {{ in_array($type, ['sidebar_left', 'sidebar_right']) ? 'min-width:160px; width:160px;' : 'min-width:250px;' }} {{ in_array($type, ['sidebar_left', 'sidebar_right']) ? 'min-height:250px; height:600px;' : 'min-height:90px;' }}"
                 data-ad-client="{{ $publisherId }}"
                 data-ad-format="{{ in_array($type, ['sidebar_left', 'sidebar_right']) ? 'vertical' : 'auto' }}"
                 data-full-width-responsive="false"></ins>
            <script>
                (function() {
                    const adUniqueId = '{{ $uniqueId }}';
                    const adType = '{{ $type }}';
                    const publisherId = '{{ $publisherId }}';
                    const isLocalhost = {{ $isLocalhost ? 'true' : 'false' }};

                    // Console logging ONLY for development/localhost
                    if (isLocalhost && typeof console !== 'undefined') {
                        console.log('%c[AdSense Debug]', 'background: #4285f4; color: white; padding: 4px 8px; border-radius: 4px;', {
                            adType: adType,
                            publisherId: publisherId,
                            uniqueId: adUniqueId,
                            isLocalhost: isLocalhost,
                            currentHost: window.location.hostname,
                            elementId: adUniqueId
                        });
                    }

                    // Global ad registry for tracking
                    if (!window.naramaknaAds) {
                        window.naramaknaAds = {
                            initialized: new Set(),
                            observer: null,
                            initAd: function(elementId) {
                                // Skip if already initialized
                                if (this.initialized.has(elementId)) {
                                    return;
                                }

                                const ins = document.getElementById(elementId);
                                if (!ins) {
                                    if (isLocalhost && typeof console !== 'undefined') {
                                        console.warn('%c✗ Ad element not found:', 'color: #ea4335;', elementId);
                                    }
                                    return;
                                }

                                // Check if element already has ads
                                if (ins.getAttribute('data-adsbygoogle-status')) {
                                    this.initialized.add(elementId);
                                    if (isLocalhost && typeof console !== 'undefined') {
                                        console.log('%c○ Ad already initialized:', 'color: #fbbc04;', elementId);
                                    }
                                    return;
                                }

                                // Check if element has visible width
                                const rect = ins.getBoundingClientRect();
                                if (isLocalhost && typeof console !== 'undefined') {
                                    console.log('%c[AdSense Dimensions]', 'color: #4285f4;', {
                                        width: rect.width,
                                        height: rect.height,
                                        element: elementId
                                    });
                                }

                                if (rect.width === 0) {
                                    if (isLocalhost && typeof console !== 'undefined') {
                                        console.warn('%c⚠ Element has no width', 'color: #fbbc04;');
                                    }
                                    return;
                                }

                                // Push ad
                                try {
                                    if (isLocalhost && typeof console !== 'undefined') {
                                        console.log('%c⟳ Pushing ad to AdSense...', 'color: #4285f4;');
                                    }
                                    (adsbygoogle = window.adsbygoogle || []).push({});
                                    this.initialized.add(elementId);

                                    if (isLocalhost && typeof console !== 'undefined') {
                                        console.warn('%c⚠ Running on localhost - Ads may not appear (403 error is normal)', 'color: #fbbc04; font-size: 12px;');
                                        console.log('%c→ Ads will appear on production domain', 'color: #34a853; font-size: 12px;');
                                    }
                                } catch (e) {
                                    if (isLocalhost && typeof console !== 'undefined') {
                                        console.error('%c✗ AdSense push error:', 'color: #ea4335;', e.message);
                                    }
                                }
                            }
                        };
                    }

                    // Register this ad for lazy loading
                    function initAd() {
                        if (window.adsbygoogle) {
                            if (isLocalhost && typeof console !== 'undefined') {
                                console.log('%c✓ AdSense script loaded', 'color: #34a853; font-weight: bold;');
                            }

                            // For sidebar ads, initialize immediately (always visible)
                            if (adType === 'sidebar_left' || adType === 'sidebar_right') {
                                window.naramaknaAds.initAd(adUniqueId);
                            } else {
                                // For other ads, use Intersection Observer for lazy loading
                                const ins = document.getElementById(adUniqueId);
                                if (!ins) {
                                    if (isLocalhost && typeof console !== 'undefined') {
                                        console.warn('%c✗ Ad element not found:', 'color: #ea4335;', adUniqueId);
                                    }
                                    return;
                                }

                                // Create observer if not exists
                                if (!window.naramaknaAds.observer) {
                                    window.naramaknaAds.observer = new IntersectionObserver((entries) => {
                                        entries.forEach(entry => {
                                            if (entry.isIntersecting) {
                                                const elementId = entry.target.id;
                                                window.naramaknaAds.initAd(elementId);
                                                window.naramaknaAds.observer.unobserve(entry.target);
                                            }
                                        });
                                    }, {
                                        rootMargin: '200px' // Start loading 200px before viewport
                                    });
                                }

                                // Observe this ad element
                                window.naramaknaAds.observer.observe(ins);
                            }
                        } else {
                            if (isLocalhost && typeof console !== 'undefined') {
                                console.warn('%c✗ AdSense script not loaded', 'color: #ea4335;');
                            }
                        }
                    }

                    // Initialize immediately when DOM is ready (no delay)
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initAd);
                    } else {
                        initAd();
                    }
                })();
            </script>
        </div>
    @else
        {{-- Fallback when AdSense is not configured or invalid publisher ID --}}
        <div class="google-ads-placeholder {{ $attributes->class ?? 'my-4' }} flex items-center justify-center" style="background: #f3f4f6; border: 1px dashed #d1d5db; padding: 1.5rem; text-align: center; min-height: 100px; width: 100%;">
            <div style="color: #6b7280;">
                <p style="font-size: 0.875rem; margin: 0;">📢 Advertisement Space - {{ str_replace('_', ' ', ucfirst($type)) }}</p>
                @if($publisherId && strpos($publisherId, 'ca-pub-') !== 0)
                    <p style="font-size: 0.75rem; margin-top: 0.5rem; color: #ef4444;">
                        ⚠️ Invalid AdSense Publisher ID format. Must start with "ca-pub-"
                    </p>
                @endif
            </div>
        </div>
    @endif
@endif

@push('head-scripts')
    @once
        @if($shouldDisplay && $dataSource === 'static' && $publisherId && strpos($publisherId, 'ca-pub-') === 0 && !$isLocalhost)
            {{-- AdSense async script - only load for production - Load early for better performance --}}
            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client={{ $publisherId }}"
                    crossorigin="anonymous"></script>
        @endif
    @endonce
@endpush
