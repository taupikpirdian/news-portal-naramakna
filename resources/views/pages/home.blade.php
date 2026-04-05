@extends('layouts.app')

@section('content')
<!-- Artikel Terbaru -->
<section class="mb-16">
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
            <div class="relative rounded-2xl overflow-hidden bg-white shadow-lg">
                <div class="flex h-[300px] sm:h-[380px] lg:h-[420px] transition-transform duration-500 ease-out"
                    id="featuredSliderContainer">
                    @if(isset($featuredPosts) && count($featuredPosts) > 0)
                    @foreach($featuredPosts as $index => $post)
                    <div class="min-w-full h-full relative flex-shrink-0" data-index="{{ $index }}">
                        <a href="{{ url('/artikel') }}/{{ $post['slug'] }}" class="block h-full">
                            <img src="{{ $post['featured_image']['url'] ?? 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=600&fit=crop' }}"
                                alt="{{ $post['title'] }}" class="w-full h-full object-cover" loading="lazy">
                            <div
                                class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent pointer-events-none">
                            </div>
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
                <span id="featuredChannel"
                    class="absolute top-4 left-4 px-3 py-1.5 bg-yellow-450 text-white text-xs font-semibold rounded-full z-30 shadow-md backdrop-blur-sm">
                    {{ $featuredPosts[0]['metadata']['_channel'] ?? 'Artikel' }}
                </span>
                <button onclick="featuredPrev()"
                    class="absolute top-1/2 left-2 -translate-y-1/2 bg-white shadow-lg border-0 rounded-full flex items-center justify-center cursor-pointer z-50 transition-all duration-200 select-none outline-none p-0 m-0 hover:scale-105 hover:bg-gray-100 active:scale-95 group"
                    style="width: 40px; height: 40px; min-width: 40px; min-height: 40px;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600 w-5 h-5 group-hover:text-white transition-colors duration-200 flex-shrink-0" style="width: 20px; height: 20px; min-width: 20px; min-height: 20px;">
                        <polyline points="15 18 9 12 15 6"></polyline>
                    </svg>
                </button>
                <button onclick="featuredNext()"
                    class="absolute top-1/2 right-2 -translate-y-1/2 bg-white shadow-lg border-0 rounded-full flex items-center justify-center cursor-pointer z-50 transition-all duration-200 select-none outline-none p-0 m-0 hover:scale-105 hover:bg-gray-100 active:scale-95 group"
                    style="width: 40px; height: 40px; min-width: 40px; min-height: 40px;">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="text-gray-600 w-5 h-5 group-hover:text-white transition-colors duration-200 flex-shrink-0" style="width: 20px; height: 20px; min-width: 20px; min-height: 20px;">
                        <polyline points="9 18 15 12 9 6"></polyline>
                    </svg>
                </button>
                <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex gap-2 z-20 pointer-events-none" id="featuredDots"></div>
                <div class="absolute left-4 right-4 bottom-20 text-white z-10 pointer-events-none">
                    <a href="" id="featuredLink" class="no-underline pointer-events-none">
                        <h3 id="featuredTitle"
                            class="text-xl sm:text-2xl font-bold hover:text-yellow-450 transition-colors"></h3>
                        <div class="flex gap-3 items-center text-white/90 text-sm mt-2">
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
                            alt="{{ $post['title'] }}" class="w-20 h-20 object-cover rounded-lg" loading="lazy">
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

{{-- Above Instagram Feed Ad - PRIORITY LOADING --}}
{{-- @if(config('ads.enabled') && config('ads.adsense_publisher_id')) --}}
    {{-- <div class="my-8">
        <div class="ad-article"
             style="width: 100%; min-width: 300px; height: 90px; background:#facc15; border-radius:8px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
            <div style="text-align:center; color:#1f2937; font-size:0.75rem; font-weight:600;">
                article<br><small style="opacity:0.8">300px x 90px</small>
            </div>
        </div>
    </div> --}}
{{-- @endif --}}

{{-- Instagram Feed - Real Posts from API --}}
<x-instagram-feed :limit="12" />

{{-- In-Article Ad between Instagram and Categories - PRIORITY LOADING --}}
@if(config('ads.enabled') && config('ads.adsense_publisher_id'))
    <div class="my-8">
        <x-google-ads type="article" :priority="true" />
    </div>
@endif

{{-- List Berita Berdasarkan Kategori --}}
<div id="categories-container">
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
    const adsensePublisherId = "{{ config('ads.adsense_publisher_id') }}";
    const adsEnabled = {{ config('ads.enabled') ? 'true' : 'false' }};

    let allCategories = [];
    let loadedCount = 0;
    let isLoading = false;
    let batchCount = 0; // Track how many batches have been loaded
    const categoriesPerBatch = 2;

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

            const response = await fetch(url);

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();

            if (!data.success) {
                return [];
            }

            allCategories = data.data.categories || [];
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
        const readUrl = "{{ url('/artikel') }}";
        const categoryUrl = "{{ url('/kategori') }}";

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

            const response = await fetch(url);

            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }

            const data = await response.json();

            if (!data.success) {
                return [];
            }

            const posts = data.data.posts || [];
            return posts;

        } catch (error) {
            console.error('Error loading category posts:', error);
            return [];
        }
    }

    // Function to create ad HTML
    function createAdHTML(localhost = false) {
        var publisherId = @json(config('ads.adsense_publisher_id'));

        if (!publisherId) {
            return '';
        }

        // Add ca-pub- prefix if not present
        if (publisherId && !publisherId.startsWith('ca-pub-')) {
            publisherId = 'ca-pub-' + publisherId;
        }

        // Generate unique ID for each ad instance
        var adId = 'ad-' + Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);

        if(localhost) {
            return `
                <div class="my-8 ad-section">
                    <div id="${adId}-wrapper" class="ad-wrapper" style="width: 100%; min-width: 300px;">
                        <div class="ad-article"
                            style="width: 100%; min-width: 300px; height: 90px; background:#facc15; border-radius:8px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                            <div style="text-align:center; color:#1f2937; font-size:0.75rem; font-weight:600;">
                                article<br><small style="opacity:0.8">300px x 90px</small>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }

        // Production ad HTML - matching google-ads.blade.php priority mode
        return `
            <div class="my-8 ad-section">
                <div id="${adId}-wrapper" class="ad-wrapper" style="width: 100%; min-width: 300px;">
                    <ins class="adsbygoogle ad-article"
                         style="display: block; width: 100%; min-width: 300px; min-height: 90px;"
                         data-ad-client="${publisherId}"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                </div>
            </div>
        `;
    }

    // Function to initialize ad after insertion (call AFTER HTML is in DOM)
    function initializeAd() {
        if (typeof adsbygoogle !== 'undefined') {
            try {
                (window.adsbygoogle = window.adsbygoogle || []).push({});
            } catch (e) {
                console.error('Error initializing ad:', e);
            }
        }
    }

    // Function to load next batch of categories
    async function loadNextBatch() {
        if (loadedCount >= allCategories.length || isLoading) {
            return;
        }

        isLoading = true;
        const container = document.getElementById('categories-container');
        if (!container) {
            isLoading = false;
            return;
        }

        try {
            const categoriesToLoad = Math.min(categoriesPerBatch, allCategories.length - loadedCount);

            for (let i = 0; i < categoriesToLoad; i++) {
                const currentIndex = loadedCount + i;
                const category = allCategories[currentIndex];
                // Show skeleton
                const skeleton = createSkeleton();
                container.appendChild(skeleton);

                try {
                    // Load posts via AJAX
                    const posts = await loadCategoryPosts(category.slug);

                    // Remove skeleton with animation
                    let skeletonSection = container.querySelector('.skeleton-section');
                    if (skeletonSection) {
                        skeletonSection.style.transition = 'opacity 0.3s ease, transform 0.3s ease';
                        skeletonSection.style.opacity = '0';
                        skeletonSection.style.transform = 'translateY(-10px)';

                        await new Promise(resolve => setTimeout(resolve, 300));
                        skeletonSection.remove();
                    }

                    // Check if we have posts
                    if (!posts || posts.length === 0) {
                        continue;
                    }

                    // Create and append category section
                    const categoryHTML = createCategoryHTML(category, posts, currentIndex);
                    container.insertAdjacentHTML('beforeend', categoryHTML);

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
                    }
                } catch (error) {
                    console.error(`Error loading category ${category.slug}:`, error);

                    // Remove skeleton if exists
                    const skeletonSection = container.querySelector('.skeleton-section');
                    if (skeletonSection) {
                        skeletonSection.remove();
                    }
                }
            }

            loadedCount += categoriesToLoad;
            batchCount++;
            // Insert ad after every 2 batches (2x load more)
            if (batchCount === 2) {
                const isLocalhost = @json(app()->environment('local'));
                const adHTML = createAdHTML(isLocalhost);
                // const adHTML = "<h2 class='text-center text-gray-500 text-sm my-4'>Iklan</h2>";
                if (adHTML) {
                    container.insertAdjacentHTML('beforeend', adHTML);

                    const adSection = container.lastElementChild;
                    if (adSection && adSection.classList.contains('ad-section')) {
                        adSection.style.opacity = '0';
                        adSection.style.transform = 'translateY(20px)';

                        await new Promise(resolve => setTimeout(resolve, 50));

                        adSection.offsetHeight;
                        adSection.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                        adSection.style.opacity = '1';
                        adSection.style.transform = 'translateY(0)';

                        // Initialize the ad
                        initializeAd();
                    }
                }
            }

        } catch (error) {
            console.error('Error in loadNextBatch:', error);

            // Remove all skeletons
            const skeletonSections = container.querySelectorAll('.skeleton-section');
            skeletonSections.forEach(s => s.remove());
        } finally {
            isLoading = false;

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

        return (scrollTop + windowHeight) >= (documentHeight - 300);
    }

    // Handle scroll event for lazy loading
    let scrollThrottleTimer = null;
    function handleScroll() {
        // Throttle scroll events to improve performance
        if (scrollThrottleTimer) return;

        scrollThrottleTimer = setTimeout(() => {
            scrollThrottleTimer = null;

            const shouldLoad = loadedCount < allCategories.length && isNearBottom() && !isLoading;
            if (shouldLoad) {
                loadNextBatch();
            }
        }, 200);
    }

    // Initialize: Fetch categories and load first batch
    async function init() {
        try {
            await fetchCategories();

            if (allCategories.length > 0) {
                await loadNextBatch();
                window.addEventListener('scroll', handleScroll, { passive: true });
            }
        } catch (error) {
            console.error('Error during initialization:', error);
        }
    }

    // ==========================================
    // FEATURED SLIDER - MUST BE DEFINED BEFORE INIT()
    // ==========================================

    let featuredCurrent = 0;
    const featuredContainer = document.getElementById('featuredSliderContainer');
    const featuredDotsContainer = document.getElementById('featuredDots');
    const featuredTitleEl = document.getElementById('featuredTitle');
    const featuredAuthorEl = document.getElementById('featuredAuthor');
    const featuredDateEl = document.getElementById('featuredDate');
    const featuredChannelEl = document.getElementById('featuredChannel');
    const featuredLinkEl = document.getElementById('featuredLink');
    const articleUrl = "{{ url('/artikel') }}";

    // Store post data from server-side rendered slides
    const featuredData = {!! json_encode(
        collect($featuredPosts ?? [])
            ->map(function ($post) {
                return [
                    'title' => $post['title'] ?? '',
                    'author' => $post['author']['display_name'] ?? 'Redaksi',
                    'date' => $post['date'] ? \Carbon\Carbon::parse($post['date'])->setTimezone('Asia/Jakarta')->format('d/m, H.i') : '',
                    'channel' => $post['metadata']['_channel'] ?? 'Artikel',
                    'slug' => $post['slug'] ?? ''
                ];
            })
            ->values()
            ->toArray()
    ) !!};

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
            if (featuredLinkEl) featuredLinkEl.href = `${articleUrl}/${d.slug}`;
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

    // ==========================================
    // START THE APP
    // ==========================================

    // Start the app
    init();

    // Fallback image handler
    Array.from(document.querySelectorAll('img')).forEach(img => {
        img.addEventListener('error', () => {
            img.src = FALLBACK_IMG;
        }, { once: true });
    });
</script>
@endpush
