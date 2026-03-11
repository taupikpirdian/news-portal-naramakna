@extends('layouts.app')

@section('content')
<!-- Artikel Terbaru -->
<section class="mb-16" id="latest-posts-section">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
            <h2>Artikel Terbaru</h2>
        </div>
        <a href="{{ route('index') }}"
            class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
            Lihat lainnya
            <span>›</span>
        </a>
    </div>

    @if(isset($latestPosts) && count($latestPosts) > 0)
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        {{-- Featured Slider (left side - 2 columns) --}}
        <div class="lg:col-span-2">
            <div class="relative rounded-2xl overflow-hidden bg-white">
                <div class="flex h-[300px] sm:h-[380px] lg:h-[420px] transition-transform duration-500 ease"
                    id="featuredSliderContainer">
                    @if(isset($featuredPosts) && count($featuredPosts) > 0)
                    @foreach($featuredPosts as $index => $post)
                    <div class="min-w-full h-full relative" data-index="{{ $index }}">
                        <a href="{{ url('/artikel') }}/{{ $post['slug'] }}" class="block h-full">
                            <img src="{{ $post['featured_image']['url'] ?? 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=600&fit=crop' }}"
                                alt="{{ $post['title'] }}" class="w-full h-full object-cover">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent pointer-events-none">
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
                <span id="featuredChannel"
                    class="absolute top-4 left-4 px-3 py-1.5 bg-yellow-450 text-white text-xs font-semibold rounded-full">
                    {{ $featuredPosts[0]['metadata']['_channel'] ?? 'Artikel' }}
                </span>
                <button
                    class="absolute top-1/2 -translate-y-1/2 left-4 w-10 h-10 bg-white/60 backdrop-blur-sm border-none rounded-full text-gray-800 text-2xl cursor-pointer z-20 hover:bg-white">
                    <span onclick="featuredPrev()">‹</span>
                </button>
                <button
                    class="absolute top-1/2 -translate-y-1/2 right-4 w-10 h-10 bg-white/60 backdrop-blur-sm border-none rounded-full text-gray-800 text-2xl cursor-pointer z-20 hover:bg-white">
                    <span onclick="featuredNext()">›</span>
                </button>
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10" id="featuredDots"></div>
                <div class="absolute left-4 right-4 bottom-16 text-white z-10">
                    <a href="" id="featuredLink" class="no-underline">
                        <h3 id="featuredTitle"
                            class="text-xl sm:text-2xl font-bold hover:text-yellow-450 transition-colors"></h3>
                        <div class="flex gap-3 items-center text-white/80 text-sm mt-2">
                            <span id="featuredAuthor"></span>
                            <span class="w-2 h-2 bg-white/50 rounded-full"></span>
                            <span id="featuredDate"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        {{-- Latest Posts List (right side - 1 column) --}}
        <div>
            <div>
                <h4 class="text-base font-semibold text-gray-900 mb-4">Terbaru</h4>
                <div class="space-y-2">
                    @foreach($latestPosts as $post)
                    <a href="{{ url('/artikel') }}/{{ $post['slug'] }}"
                        class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                        <img src="{{ $post['featured_image']['url'] ?? 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=200&h=200&fit=crop' }}"
                            alt="{{ $post['title'] }}" class="w-20 h-20 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">{{ $post['title']
                                }}</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>{{ $post['author']['display_name'] ?? 'Redaksi' }}</span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span>{{ $post['date'] ? \Carbon\Carbon::parse($post['date'])->setTimezone('Asia/Jakarta')->format('d/m, H.i') : ''
                                    }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
</section>

{{-- Instagram Feed - Real Posts from API --}}
<x-instagram-feed :limit="12" />

{{-- In-Article Ad between Instagram and Categories --}}
@if(config('ads.enabled'))
<div class="mb-12">
    <x-google-ads type="in_article" />
</div>
@endif

{{-- List Berita Berdasarkan Kategori --}}
{{-- All categories will be loaded via AJAX --}}
<div id="categories-container">
    {{-- Categories will be loaded here via JavaScript --}}
</div>

{{-- Loading Skeleton Template --}}
<template id="category-skeleton">
    <section class="mb-10 category-section skeleton-section">
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center gap-2">
                <div class="w-1 h-8 bg-gray-200 rounded-full shimmer"></div>
                <div class="h-6 w-32 bg-gray-200 rounded shimmer"></div>
            </div>
            <div class="h-4 w-24 bg-gray-200 rounded shimmer"></div>
        </div>
        <div class="grid lg:grid-cols-12 gap-4 items-start mb-6">
            <div class="lg:col-span-5">
                <div class="rounded-2xl overflow-hidden bg-gray-200 h-[240px] sm:h-[280px] shimmer relative">
                    <div class="absolute inset-0 bg-gradient-to-t from-gray-300/30 to-transparent"></div>
                    <div class="absolute bottom-3 left-3 right-3 space-y-2">
                        <div class="h-6 bg-gray-300 rounded w-3/4 shimmer"></div>
                        <div class="h-4 bg-gray-300 rounded w-1/2 shimmer"></div>
                        <div class="h-3 bg-gray-300 rounded w-full shimmer"></div>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-7">
                <div class="grid grid-cols-2 gap-3">
                    @for($i = 0; $i < 4; $i++) <div class="flex gap-3 rounded-xl px-2 pt-0.5 pb-1.5">
                        <div class="w-20 h-20 bg-gray-200 rounded-lg shimmer"></div>
                        <div class="flex-1 space-y-2">
                            <div class="h-4 bg-gray-200 rounded shimmer"></div>
                            <div class="h-3 bg-gray-200 rounded w-3/4 shimmer"></div>
                        </div>
                </div>
                @endfor
            </div>
        </div>
        </div>
        {{-- Loading Spinner --}}
        <div class="flex items-center justify-center py-6">
            <div class="loading-spinner"></div>
        </div>
    </section>
</template>

<style>
    /* Shimmer Loading Animation */
    @keyframes shimmer {
        0% {
            background-position: -1000px 0;
        }

        100% {
            background-position: 1000px 0;
        }
    }

    .shimmer {
        background: linear-gradient(90deg, #f3f4f6 0%, #e5e7eb 20%, #f3f4f6 40%, #e5e7eb 60%, #f3f4f6 80%, #e5e7eb 100%);
        background-size: 1000px 100%;
        animation: shimmer 2s infinite linear;
    }

    /* Fade In Animation */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .fade-in-section {
        animation: fadeInUp 0.5s ease-out forwards;
    }

    /* Loading Spinner */
    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .loading-spinner {
        width: 40px;
        height: 40px;
        border: 4px solid #f3f4f6;
        border-top: 4px solid #fbbf24;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    /* Smooth Loading Indicator */
    @keyframes pulse-ring {
        0% {
            transform: scale(0.8);
            opacity: 0.5;
        }

        50% {
            transform: scale(1);
            opacity: 1;
        }

        100% {
            transform: scale(0.8);
            opacity: 0.5;
        }
    }

    .loading-indicator {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 20px;
    }

    .loading-indicator span {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: #fbbf24;
        animation: pulse-ring 1.5s ease-in-out infinite;
    }

    .loading-indicator span:nth-child(2) {
        animation-delay: 0.2s;
    }

    .loading-indicator span:nth-child(3) {
        animation-delay: 0.4s;
    }
</style>
@endsection

@push('scripts')
<script>
    // ==========================================
    // AJAX-BASED CATEGORY LOADING
    // ==========================================

    const FALLBACK_IMG = 'data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630"><rect width="100%" height="100%" fill="%23e5e7eb"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="%236b7280" font-family="sans-serif" font-size="24">Image unavailable</text></svg>';

    const categoriesApiEndpoint = "{{ route('api.categories', [], true) }}";
    const postsApiEndpoint = "{{ route('api.category.posts', [], true) }}";

    let allCategories = [];
    let loadedCount = 0;
    let isLoading = false;
    const categoriesPerBatch = 2; // Load first 2 categories immediately

    function formatJakartaDate(input) {
        if (!input) return '';
        try {
            let d;
            if (typeof input === 'number') {
                d = new Date(input);
            } else {
                let s = String(input).trim();
                if (/Z|[+-]\d{2}:\d{2}$/.test(s)) {
                    d = new Date(s);
                } else {
                    s = s.replace(' ', 'T');
                    d = new Date(s + 'Z');
                }
            }
            return new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: '2-digit', hour: '2-digit', minute: '2-digit', timeZone: 'Asia/Jakarta' }).format(d);
        } catch (e) {
            return '';
        }
    }

    // Function to fetch all categories
    async function fetchCategories() {
        try {
            const url = `${categoriesApiEndpoint}?limit=50&mainCategoriesOnly=true`;
            console.log('Fetching categories from:', url);

            const response = await fetch(url);

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            console.log('Categories API Response:', data);

            if (!data.success) {
                console.warn('API returned unsuccessful response');
                return [];
            }

            allCategories = data.data.categories || [];
            console.log('Categories fetched successfully:', allCategories.length);
            return allCategories;

        } catch (error) {
            console.error('Error fetching categories:', error);
            return [];
        }
    }

    // Function to create category HTML from data
    function createCategoryHTML(category, posts, index) {
        const firstPost = posts[0] || null;
        const otherPosts = posts.slice(1, 5);
        const readUrl = '{{ url('/artikel') }}';
        const categoryUrl = '{{ url('/kategori') }}';
        const adsEnabled = {{ config('ads.enabled') ? 'true' : 'false' }};
        const adsensePublisherId = '{{ config('ads.adsense_publisher_id') }}';
        const isLocalhost = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';

        let html = `
            <section class="mb-10 category-section fade-in-section" data-category-slug="${category.slug}" data-category-index="${index}">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
                        <h2>${category.name}</h2>
                    </div>
                    <a href="${categoryUrl}/${category.slug}" class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
                        Artikel Lainnya
                        <span>›</span>
                    </a>
                </div>
                <div class="grid lg:grid-cols-12 gap-4 items-start mb-6">
        `;

        if (firstPost) {
            const excerpt = firstPost.excerpt ?
                firstPost.excerpt.substring(0, 100) + '...' :
                (firstPost.content ? firstPost.content.replace(/<[^>]*>/g, '').substring(0, 100) + '...' : '');
            const date = formatJakartaDate(firstPost.date);

            html += `
                    <a href="${readUrl}/${firstPost.slug}" class="lg:col-span-5 rounded-2xl overflow-hidden no-underline block relative">
                        <img src="${firstPost.featured_image?.url || 'https://images.unsplash.com/photo-1470770841072-f978cf4d019e?w=1200&h=630&fit=crop'}"
                             alt="${firstPost.title}"
                             class="w-full h-[240px] sm:h-[280px] object-cover rounded-2xl"
                             loading="lazy">
                        <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
                        <div class="absolute bottom-3 left-3 right-3">
                            <h3 class="text-xl sm:text-2xl font-bold text-white leading-tight">${firstPost.title}</h3>
                            <div class="flex gap-3 items-center text-white/80 text-xs mt-2">
                                <span>${firstPost.author?.display_name || 'Redaksi'}</span>
                                <span class="w-1 h-1 bg-white/60 rounded-full"></span>
                                <span>${date}</span>
                            </div>
                            <p class="text-sm text-white/90 mt-2">${excerpt}</p>
                        </div>
                    </a>
            `;
        }

        html += `
                    <div class="lg:col-span-7">
        `;
        let items = '';

        otherPosts.forEach(post => {
            const date = formatJakartaDate(post.date);

            items += `
                            <a href="${readUrl}/${post.slug}" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                                <img src="${post.featured_image?.url || 'https://images.unsplash.com/photo-1510936111840-65e151ad71bb?w=200&h=200&fit=crop'}"
                                     alt="${post.title}"
                                     class="w-20 h-20 object-cover rounded-lg"
                                     loading="lazy">
                                <div class="flex-1">
                                    <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">${post.title}</div>
                                    <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                        <span>${post.author?.display_name || 'Redaksi'}</span>
                                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                        <span>${date}</span>
                                    </div>
                                </div>
                            </a>
            `;
        });

        html += `
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            ${items}
                        </div>
                    </div>
                </div>
            </section>
        `;

        // Add AdSense after every 2 categories
        if (adsEnabled && (index + 1) % 2 === 0 && adsensePublisherId && adsensePublisherId.startsWith('ca-pub-')) {
            const adUniqueId = `adsense-category-${index}-${Date.now()}`;

            // Console log ONLY for development/localhost
            if (isLocalhost && typeof console !== 'undefined') {
                console.log('%c[AdSense Category Ad]', 'background: #4285f4; color: white; padding: 4px 8px; border-radius: 4px;', {
                    categoryIndex: index,
                    categoryName: category.name,
                    uniqueId: adUniqueId,
                    publisherId: adsensePublisherId,
                    isLocalhost: isLocalhost
                });
            }

            if (isLocalhost) {
                // Development Mode: Show placeholder UI
                html += `
                    <div class="my-8" style="width: 100%; max-width: 100%; background: #facc15; border-radius: 8px; padding: 1.5rem; text-align: center; position: relative; overflow: hidden;">
                        <div style="position: relative; z-index: 1; color: #1f2937;">
                            <div style="margin-bottom: 0.75rem;">
                                <svg style="width: 48px; height: 48px; margin: 0 auto; opacity: 0.9;" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                                </svg>
                            </div>
                            <h3 style="font-size: 1.125rem; font-weight: 700; margin: 0 0 0.5rem 0;">
                                📢 Advertisement Space
                            </h3>
                            <p style="font-size: 0.875rem; margin: 0 0 1rem 0; opacity: 0.9;">
                                <span style="font-weight: 600;">Category Ad</span> - After ${category.name}
                            </p>
                            <div style="background: rgba(255,255,255,0.5); backdrop-filter: blur(10px); border-radius: 6px; padding: 0.75rem 1rem; margin: 0 auto; max-width: 400px; border: 1px solid rgba(255,255,255,0.5);">
                                <p style="font-size: 0.75rem; margin: 0; line-height: 1.5; opacity: 0.95;">
                                    ⚠️ <strong>Development Mode:</strong> Google AdSense does not work on localhost.
                                </p>
                                <p style="font-size: 0.75rem; margin: 0.5rem 0 0 0; line-height: 1.5; opacity: 0.95;">
                                    ✅ Ads will appear on <strong>production domain</strong>
                                </p>
                            </div>
                        </div>
                    </div>
                `;
            } else {
                // Production Mode: Real AdSense
                html += `
                    <div class="my-8" style="width: 100%; max-width: 100%; overflow: hidden;">
                        <ins id="${adUniqueId}"
                             class="adsbygoogle"
                             style="display:block; min-width:250px; min-height:90px;"
                             data-ad-client="${adsensePublisherId}"
                             data-ad-format="auto"
                             data-full-width-responsive="true"></ins>
                    </div>
                `;

                // Initialize AdSense ad after DOM is ready and element has width
                setTimeout(() => {
                    if (window.adsbygoogle) {
                        if (isLocalhost && typeof console !== 'undefined') {
                            console.log('%c✓ AdSense script loaded for category:', 'color: #34a853;', category.name);
                        }

                        const adElement = document.getElementById(adUniqueId);
                        if (!adElement) {
                            if (isLocalhost && typeof console !== 'undefined') {
                                console.warn('%c✗ Ad element not found:', 'color: #ea4335;', adUniqueId);
                            }
                            return;
                        }

                        // Check if already initialized
                        if (adElement.getAttribute('data-adsbygoogle-status')) {
                            if (isLocalhost && typeof console !== 'undefined') {
                                console.log('%c○ Ad already initialized:', 'color: #fbbc04;', adUniqueId);
                            }
                            return;
                        }

                        // Check if element has width
                        const rect = adElement.getBoundingClientRect();
                        if (isLocalhost && typeof console !== 'undefined') {
                            console.log('%c[AdSense Category Dimensions]', 'color: #4285f4;', {
                                category: category.name,
                                width: rect.width,
                                height: rect.height
                            });
                        }

                        if (rect.width === 0) {
                            if (isLocalhost && typeof console !== 'undefined') {
                                console.warn('%c⚠ Element has no width, retrying...', 'color: #fbbc04;');
                            }
                            // Retry if no width yet
                            setTimeout(() => {
                                if (window.adsbygoogle && !adElement.getAttribute('data-adsbygoogle-status')) {
                                    try {
                                        (window.adsbygoogle = window.adsbygoogle || []).push({});
                                        if (isLocalhost && typeof console !== 'undefined') {
                                            console.log('%c✓ Ad pushed after retry:', 'color: #34a853;', category.name);
                                        }
                                    } catch (e) {
                                        if (isLocalhost && typeof console !== 'undefined') {
                                            console.warn('AdSense push error:', e.message);
                                        }
                                    }
                                }
                            }, 500);
                            return;
                        }

                        // Push ad
                        try {
                            if (isLocalhost && typeof console !== 'undefined') {
                                console.log('%c⟳ Pushing ad for category:', 'color: #4285f4;', category.name);
                            }
                            (window.adsbygoogle = window.adsbygoogle || []).push({});

                            if (isLocalhost && typeof console !== 'undefined') {
                                console.warn('%c⚠ Running on localhost - Category ads may not appear (403 error is normal)', 'color: #fbbc04; font-size: 12px;');
                            }
                        } catch (e) {
                            if (isLocalhost && typeof console !== 'undefined') {
                                console.warn('AdSense push error:', e.message);
                            }
                        }
                    } else {
                        if (isLocalhost && typeof console !== 'undefined') {
                            console.warn('%c✗ AdSense script not loaded for category:', 'color: #ea4335;', category.name);
                        }
                    }
                }, 300);
            }
        }

    return html;
    }

    // Function to create skeleton loader
    function createSkeleton() {
        const template = document.getElementById('category-skeleton');
        return template.content.cloneNode(true);
    }

    // Function to load category posts via AJAX
    async function loadCategoryPosts(categorySlug) {
        try {
            const url = `${postsApiEndpoint}?slug=${encodeURIComponent(categorySlug)}&limit=5`;
            console.log('Fetching posts from:', url);

            const response = await fetch(url);

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();
            console.log('Posts API Response for', categorySlug, ':', data);

            if (!data.success) {
                console.warn('API returned unsuccessful response');
                return [];
            }

            const posts = data.data.posts || [];
            console.log('Posts fetched successfully:', posts.length);
            return posts;

        } catch (error) {
            console.error('Error loading category posts:', error);
            return [];
        }
    }

    // Function to load next batch of categories
    async function loadNextBatch() {
        if (loadedCount >= allCategories.length || isLoading) {
            console.log('Load skipped:', {
                loadedCount,
                total: allCategories.length,
                isLoading
            });
            return;
        }

        isLoading = true;
        console.log('Starting load for categories:', loadedCount, 'to', Math.min(loadedCount + categoriesPerBatch, allCategories.length) - 1);

        const container = document.getElementById('categories-container');
        if (!container) {
            console.error('Container not found');
            isLoading = false;
            return;
        }

        try {
            const categoriesToLoad = Math.min(categoriesPerBatch, allCategories.length - loadedCount);

            for (let i = 0; i < categoriesToLoad; i++) {
                const currentIndex = loadedCount + i;
                const category = allCategories[currentIndex];

                console.log(`Loading category ${i + 1}/${categoriesToLoad}:`, category.slug);

                // Show skeleton
                const skeleton = createSkeleton();
                container.appendChild(skeleton);

                // Load posts via AJAX
                const posts = await loadCategoryPosts(category.slug);
                console.log(`Posts loaded for ${category.slug}:`, posts.length);

                // Remove skeleton with animation
                skeletonSection = container.querySelector('.skeleton-section');
                if (skeletonSection) {
                    skeletonSection.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                    skeletonSection.style.opacity = '0';
                    skeletonSection.style.transform = 'translateY(-10px)';

                    await new Promise(resolve => setTimeout(resolve, 300));
                    skeletonSection.remove();
                    console.log(`Skeleton removed for ${category.slug}`);
                }

                // Check if we have posts
                if (!posts || posts.length === 0) {
                    console.warn('No posts found for category:', category.slug);
                    continue;
                }

                // Create and append category section
                const categoryHTML = createCategoryHTML(category, posts, currentIndex);
                container.insertAdjacentHTML('beforeend', categoryHTML);
                console.log(`Category HTML added for ${category.slug}`);

                // Add fade-in animation
                const newSection = container.lastElementChild;
                if (newSection && newSection.classList.contains('category-section')) {
                    newSection.style.opacity = '0';
                    newSection.style.transform = 'translateY(30px) scale(0.98)';

                    await new Promise(resolve => setTimeout(resolve, 50));

                    newSection.offsetHeight; // Trigger reflow

                    newSection.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
                    newSection.style.opacity = '1';
                    newSection.style.transform = 'translateY(0) scale(1)';
                    console.log(`Animation applied for ${category.slug}`);
                }
            }

            loadedCount += categoriesToLoad;
            console.log('Batch load completed. Total loaded:', loadedCount);

        } catch (error) {
            console.error('Error in loadNextBatch:', error);

            // Remove all skeletons
            const skeletonSections = container.querySelectorAll('.skeleton-section');
            skeletonSections.forEach(s => s.remove());
        } finally {
            isLoading = false;
            console.log('Loading flag reset');

            // Attach error handlers to new images
            container.querySelectorAll('img').forEach(img => {
                img.addEventListener('error', () => {
                    img.src = FALLBACK_IMG;
                }, { once: true });
            });
        }
    }

    // Check if user is near bottom of page
    function isNearBottom() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;

        return (scrollTop + windowHeight) >= (documentHeight - 200);
    }

    // Handle scroll event for lazy loading
    function handleScroll() {
        if (loadedCount < allCategories.length && isNearBottom() && !isLoading) {
            loadNextBatch();
        }
    }

    // Initialize: Fetch categories and load first batch
    async function init() {
        await fetchCategories();

        if (allCategories.length > 0) {
            // Load first batch immediately
            await loadNextBatch();

            // Add scroll event listener for lazy loading
            window.addEventListener('scroll', handleScroll, { passive: true });
        }
    }

    // Start the app
    init();

    // Carousel functionality
    let currentSlide = 0;
    const slides = document.querySelectorAll('#carouselContainer > div');
    const totalSlides = slides.length;
    const container = document.getElementById('carouselContainer');
    const dotsContainer = document.getElementById('carouselDots');

    // Create dots
    for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement('div');
        dot.className = 'w-2 h-2 bg-white/50 rounded-full cursor-pointer transition-all' + (i === 0 ? ' bg-yellow-450 w-6' : '');
        dot.onclick = () => goToSlide(i);
        dotsContainer.appendChild(dot);
    }

    function updateCarousel() {
        if (!container) return;
        container.style.transform = `translateX(-${currentSlide * 100}%)`;

        if (dotsContainer) {
            const dots = dotsContainer.children;
            for (let i = 0; i < dots.length; i++) {
                dots[i].className = 'w-2 h-2 bg-white/50 rounded-full cursor-pointer transition-all' + (i === currentSlide ? ' bg-yellow-450 w-6' : '');
            }
        }
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        updateCarousel();
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
        updateCarousel();
    }

    function goToSlide(index) {
        currentSlide = index;
        updateCarousel();
    }

    if (container && totalSlides > 0) {
        setInterval(nextSlide, 5000);
    }

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({ behavior: 'smooth' });
            }
        });
    });

    let featuredCurrent = 0;
    const featuredContainer = document.getElementById('featuredSliderContainer');
    const featuredDotsContainer = document.getElementById('featuredDots');
    const featuredTitleEl = document.getElementById('featuredTitle');
    const featuredAuthorEl = document.getElementById('featuredAuthor');
    const featuredDateEl = document.getElementById('featuredDate');
    const featuredChannelEl = document.getElementById('featuredChannel');
    const featuredLinkEl = document.getElementById('featuredLink');
    const readUrl = '{{ url('/artikel') }}';

    // Store post data from server-side rendered slides
    const featuredData = @if (isset($featuredPosts) && count($featuredPosts) > 0)
        {!! json_encode(collect($featuredPosts)->map(function ($post) {
            return [
                'title' => $post['title'] ?? '',
                'author' => $post['author']['display_name'] ?? 'Redaksi',
                'date' => $post['date'] ? \Carbon\Carbon::parse($post['date'])->setTimezone('Asia/Jakarta')->format('d/m, H.i') : '',
                'channel' => $post['metadata']['_channel'] ?? 'Artikel',
                'slug' => $post['slug'] ?? ''
            ];
        })->values()->toArray()) !!}
    @else
        []
    @endif;

    const featuredTotal = featuredData.length;

    function updateFeaturedSlider() {
        if (!featuredContainer || featuredTotal === 0) return;

        // Update slide position
        featuredContainer.style.transform = `translateX(-${featuredCurrent * 100}%)`;

        // Update text content and link
        if (featuredData[featuredCurrent]) {
            const d = featuredData[featuredCurrent];
            if (featuredTitleEl) featuredTitleEl.textContent = d.title;
            if (featuredAuthorEl) featuredAuthorEl.textContent = d.author;
            if (featuredDateEl) featuredDateEl.textContent = d.date;
            if (featuredChannelEl) featuredChannelEl.textContent = d.channel;
            if (featuredLinkEl) featuredLinkEl.href = `${readUrl}/${d.slug}`;
        }

        // Update dots
        if (featuredDotsContainer) {
            const dots = featuredDotsContainer.children;
            for (let i = 0; i < dots.length; i++) {
                dots[i].className = 'w-2 h-2 bg-gray-300/70 rounded-full cursor-pointer transition-all' + (i === featuredCurrent ? ' bg-yellow-450 w-6' : '');
            }
        }
    }

    function featuredNext() {
        if (featuredTotal === 0) return;
        featuredCurrent = (featuredCurrent + 1) % featuredTotal;
        updateFeaturedSlider();
    }

    function featuredPrev() {
        if (featuredTotal === 0) return;
        featuredCurrent = (featuredCurrent - 1 + featuredTotal) % featuredTotal;
        updateFeaturedSlider();
    }

    function featuredGoTo(index) {
        if (featuredTotal === 0) return;
        featuredCurrent = index;
        updateFeaturedSlider();
    }

    // Initialize dots
    if (featuredDotsContainer && featuredTotal > 0) {
        for (let i = 0; i < featuredTotal; i++) {
            const dot = document.createElement('div');
            dot.className = 'w-2 h-2 bg-gray-300/70 rounded-full cursor-pointer transition-all' + (i === 0 ? ' bg-yellow-450 w-6' : '');
            dot.onclick = () => featuredGoTo(i);
            featuredDotsContainer.appendChild(dot);
        }
    }

    // Auto-slide
    if (featuredTotal > 1) {
        setInterval(featuredNext, 7000);
    }

    // Initial update
    if (featuredTotal > 0) {
        updateFeaturedSlider();
    }

    // Fallback image handler
    Array.from(document.querySelectorAll('img')).forEach(img => {
        img.addEventListener('error', () => {
            img.src = FALLBACK_IMG;
        }, { once: true });
    });

    // ============================================================
    // ADSENSE DEBUG CONSOLE - Development Mode ONLY
    // ============================================================
    (function() {
        const adsEnabled = {{ config('ads.enabled') ? 'true' : 'false' }};
        const adsensePublisherId = '{{ config('ads.adsense_publisher_id') }}';
        const currentHost = window.location.hostname;
        const isLocalhost = currentHost === 'localhost' || currentHost === '127.0.0.1';

        // ONLY show debug console in localhost/development
        if (!isLocalhost) return; // ← Exit silently if production

        if (typeof console === 'undefined') return;

        console.group('%c🎯 Google AdSense Debug Info', 'background: linear-gradient(90deg, #4285f4, #34a853, #fbbc04, #ea4335); color: white; padding: 8px 12px; border-radius: 4px; font-size: 14px; font-weight: bold;');
        console.log('%cEnvironment:', 'color: #4285f4; font-weight: bold;', {
            currentHost: currentHost,
            isLocalhost: isLocalhost,
            environment: isLocalhost ? 'Development (Localhost)' : 'Production'
        });
        console.log('%cConfiguration:', 'color: #34a853; font-weight: bold;', {
            adsEnabled: adsEnabled,
            publisherId: adsensePublisherId,
            publisherIdValid: adsensePublisherId && adsensePublisherId.startsWith('ca-pub-')
        });
        console.log('%cAd Elements Found:', 'color: #fbbc04; font-weight: bold;', document.querySelectorAll('.adsbygoogle').length);
        console.log('%cAdSense Script:', 'color: #ea4335; font-weight: bold;', window.adsbygoogle ? '✓ Loaded' : '✗ Not loaded');

        console.group('%c⚠️ Localhost Warning', 'color: #fbbc04; font-weight: bold;');
        console.log('%cGoogle AdSense does NOT work on localhost!', 'color: #ea4335; font-size: 12px; font-weight: bold;');
        console.log('403 errors are NORMAL when testing on localhost.');
        console.log('Ads will only appear on production domains that are:');
        console.log('  1. Added to your AdSense account');
        console.log('  2. Verified by Google');
        console.log('  3. Using HTTPS');
        console.groupEnd();

        console.group('%c📋 What to Expect:', 'color: #4285f4; font-weight: bold;');
        console.log('❌ Blank/Empty ad spaces');
        console.log('❌ 403 Forbidden errors in network tab');
        console.log('✅ AdSense script loaded');
        console.log('✅ Ad elements created with correct attributes');
        console.log('✅ Console logs showing initialization steps');
        console.log('\n%c→ All of the above are NORMAL for localhost!', 'color: #34a853; font-weight: bold;');
        console.groupEnd();

        console.groupEnd();

        // Summary log
        setTimeout(() => {
            const adElements = document.querySelectorAll('.adsbygoogle');
            console.log('%c📊 Final Summary:', 'background: #4285f4; color: white; padding: 4px 8px; border-radius: 4px;', {
                totalAdElements: adElements.length,
                adsInitialized: Array.from(adElements).filter(el => el.getAttribute('data-adsbygoogle-status')).length,
                readyForProduction: !isLocalhost && adsensePublisherId && adsensePublisherId.startsWith('ca-pub-')
            });
        }, 2000);
    })();
    // ============================================================
</script>
@endpush
