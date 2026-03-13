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

            <div style="position: relative; z-index: 1; color: #1f2937;">
                <div style="margin-bottom: 0.75rem;">
                    <svg style="width: 48px; height: 48px; margin: 0 auto; opacity: 0.9;" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                    </svg>
                </div>

                <h3 style="font-size: 1.125rem; font-weight: 700; margin: 0 0 0.5rem 0;">
                    Advertisement Space
                </h3>

                <p style="font-size: 0.875rem; margin: 0 0 1rem 0; opacity: 0.9;">
                    <span style="font-weight: 600;">{{ str_replace('_', ' ', ucfirst($type)) }}</span> Ad Unit
                </p>

                <div style="background: rgba(255,255,255,0.5); backdrop-filter: blur(10px); border-radius: 6px; padding: 0.75rem 1rem; margin: 0 auto; max-width: 400px; border: 1px solid rgba(255,255,255,0.5);">
                    <p style="font-size: 0.75rem; margin: 0; line-height: 1.5;">
                        <span style="opacity: 0.95;">Development Mode: Google AdSense does not work on localhost.</span>
                    </p>
                    <p style="font-size: 0.75rem; margin: 0.5rem 0 0 0; line-height: 1.5; opacity: 0.95;">
                        Ads will appear on <strong>production domain</strong>
                    </p>
                </div>

                <div style="margin-top: 1rem; display: inline-flex; align-items: center; gap: 0.5rem; background: rgba(255,255,255,0.5); padding: 0.375rem 0.75rem; border-radius: 20px; font-size: 0.75rem;">
                    <span style="opacity: 0.95;">Size:</span>
                    <span style="opacity: 1;">{{ $dimensions['width'] }} × {{ $dimensions['height'] }}</span>
                </div>
            </div>
        </div>

    @elseif($dataSource === 'static' && $publisherId && strpos($publisherId, 'ca-pub-') === 0)
        {{-- Production Mode: Real AdSense --}}
        <div class="google-ads-container google-ads-{{ $type }} {{ $attributes->class ?? '' }}"
             style="width: 100%; {{ in_array($type, ['sidebar_left', 'sidebar_right']) ? 'max-width: 160px;' : 'max-width: 100%;' }}"
             data-ad-type="{{ $type }}"
             data-ad-id="{{ $uniqueId }}">

            <ins id="{{ $uniqueId }}"
                 class="adsbygoogle"
                 style="display:block; {{ in_array($type, ['sidebar_left', 'sidebar_right']) ? 'min-width:160px; width:160px;' : 'min-width:250px;' }} {{ in_array($type, ['sidebar_left', 'sidebar_right']) ? 'min-height:250px; height:600px;' : 'min-height:90px;' }}"
                 data-ad-client="{{ $publisherId }}"
                 data-ad-slot="{{ $adUnitConfig['slot'] ?? '' }}"
                 data-ad-format="{{ in_array($type, ['sidebar_left', 'sidebar_right']) ? 'vertical' : 'auto' }}"
                 data-full-width-responsive="{{ in_array($type, ['sidebar_left', 'sidebar_right']) ? 'false' : 'true' }}"></ins>
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

{{-- Centralized AdSense Script Loader - Loaded Once Per Page --}}
@push('head-scripts')
    @once
        @if($shouldDisplay && $dataSource === 'static' && $publisherId && strpos($publisherId, 'ca-pub-') === 0)
            {{-- Preload AdSense script for faster loading --}}
            <link rel="preload" href="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js" as="script" crossorigin>

            {{-- Optimized AdSense Loader --}}
            <script>
                (function() {
                    'use strict';

                    // Configuration
                    const CONFIG = {
                        publisherId: '{{ $publisherId }}',
                        isLocalhost: {{ $isLocalhost ? 'true' : 'false' }},
                        rootMargin: '200px',
                        debug: {{ $isLocalhost ? 'true' : 'false' }}
                    };

                    // Cross-browser polyfill for requestIdleCallback
                    window.requestIdleCallback = window.requestIdleCallback || function(cb) {
                        const start = Date.now();
                        return setTimeout(function() {
                            cb({
                                didTimeout: false,
                                timeRemaining: function() {
                                    return Math.max(0, 50 - (Date.now() - start));
                                }
                            });
                        }, 1);
                    };

                    // Logger utility
                    const logger = {
                        log: function(type, msg, data) {
                            if (CONFIG.debug && window.console) {
                                const styles = {
                                    info: 'background: #4285f4; color: white; padding: 2px 6px; border-radius: 2px;',
                                    success: 'background: #34a853; color: white; padding: 2px 6px; border-radius: 2px;',
                                    warning: 'background: #fbbc04; color: white; padding: 2px 6px; border-radius: 2px;',
                                    error: 'background: #ea4335; color: white; padding: 2px 6px; border-radius: 2px;'
                                };
                                console.log('%c[AdSense ' + type + ']', styles[type] || styles.info, msg, data || '');
                            }
                        }
                    };

                    // AdSense Manager - Centralized ad management
                    const AdSenseManager = {
                        initialized: false,
                        adsLoaded: new Set(),
                        observer: null,
                        queue: [],

                        // Initialize the AdSense script
                        init: function() {
                            if (this.initialized || window.adsbygoogle) {
                                return Promise.resolve();
                            }

                            return new Promise((resolve, reject) => {
                                const script = document.createElement('script');
                                script.src = 'https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=' + CONFIG.publisherId;
                                script.async = true;
                                script.crossOrigin = 'anonymous';

                                script.onload = () => {
                                    this.initialized = true;
                                    logger.log('success', 'Script loaded successfully');
                                    this.processQueue();
                                    resolve();
                                };

                                script.onerror = () => {
                                    logger.log('error', 'Failed to load AdSense script');
                                    reject(new Error('AdSense script load failed'));
                                };

                                // Insert as early as possible for better performance
                                const firstScript = document.getElementsByTagName('script')[0];
                                if (firstScript && firstScript.parentNode) {
                                    firstScript.parentNode.insertBefore(script, firstScript);
                                } else {
                                    document.head.appendChild(script);
                                }
                            });
                        },

                        // Process queued ads
                        processQueue: function() {
                            while (this.queue.length > 0) {
                                const adId = this.queue.shift();
                                this.loadAd(adId);
                            }
                        },

                        // Load a single ad
                        loadAd: function(adId) {
                            if (this.adsLoaded.has(adId)) {
                                return;
                            }

                            const ins = document.getElementById(adId);
                            if (!ins) {
                                logger.log('warning', 'Ad element not found', adId);
                                return;
                            }

                            // Check if already initialized by AdSense
                            if (ins.getAttribute('data-adsbygoogle-status')) {
                                this.adsLoaded.add(adId);
                                logger.log('info', 'Ad already initialized', adId);
                                return;
                            }

                            try {
                                logger.log('info', 'Loading ad', adId);
                                (window.adsbygoogle = window.adsbygoogle || []).push({});
                                this.adsLoaded.add(adId);
                                logger.log('success', 'Ad loaded', adId);
                            } catch (e) {
                                logger.log('error', 'Failed to load ad', { id: adId, error: e.message });
                            }
                        },

                        // Queue ad for loading
                        queueAd: function(adId) {
                            if (!this.adsLoaded.has(adId) && this.queue.indexOf(adId) === -1) {
                                this.queue.push(adId);
                            }
                        },

                        // Setup intersection observer for lazy loading
                        setupObserver: function() {
                            // Check if IntersectionObserver is supported
                            if (!('IntersectionObserver' in window)) {
                                logger.log('warning', 'IntersectionObserver not supported, loading all ads immediately');
                                // Load all ads immediately if observer not supported
                                document.querySelectorAll('.adsbygoogle').forEach(ad => {
                                    this.loadAd(ad.id);
                                });
                                return;
                            }

                            this.observer = new IntersectionObserver((entries) => {
                                entries.forEach(entry => {
                                    if (entry.isIntersecting) {
                                        const adId = entry.target.id;
                                        this.observer.unobserve(entry.target);

                                        if (this.initialized) {
                                            this.loadAd(adId);
                                        } else {
                                            this.queueAd(adId);
                                            this.init();
                                        }
                                    }
                                });
                            }, {
                                rootMargin: CONFIG.rootMargin
                            });

                            logger.log('info', 'IntersectionObserver setup complete');
                        },

                        // Observe ad element
                        observeAd: function(adElement) {
                            const adType = adElement.closest('[data-ad-type]')?.getAttribute('data-ad-type');
                            const adId = adElement.id;

                            // Sidebar ads load immediately (always visible)
                            if (adType === 'sidebar_left' || adType === 'sidebar_right') {
                                if (this.initialized) {
                                    this.loadAd(adId);
                                } else {
                                    this.queueAd(adId);
                                    this.init();
                                }
                            } else if (this.observer) {
                                // Other ads use lazy loading
                                this.observer.observe(adElement);
                            }
                        }
                    };

                    // Initialize observer when DOM is ready
                    function initAdSystem() {
                        AdSenseManager.setupObserver();

                        // Find all ad containers
                        const adContainers = document.querySelectorAll('.google-ads-container .adsbygoogle');
                        logger.log('info', 'Found ads', { count: adContainers.length });

                        adContainers.forEach(adElement => {
                            AdSenseManager.observeAd(adElement);
                        });
                    }

                    // Start the system
                    if (document.readyState === 'loading') {
                        document.addEventListener('DOMContentLoaded', initAdSystem);
                    } else {
                        initAdSystem();
                    }

                    // Expose to global scope for debugging
                    if (CONFIG.debug) {
                        window.NaramaknaAdSense = AdSenseManager;
                    }
                })();
            </script>
        @endif
    @endonce
@endpush
