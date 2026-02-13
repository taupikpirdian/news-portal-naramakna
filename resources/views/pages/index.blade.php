@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="grid grid-cols-12 gap-8">
        <section class="col-span-12 lg:col-span-8">
            <!-- Headline Section (SSR) -->
            <div class="mb-8" id="headline-section">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
                    <h2 class="text-xl font-bold">Headline</h2>
                </div>
                @if($firstPost)
                <a href="{{ route('detail', ['slug' => $firstPost['slug']]) }}" class="group block no-underline">
                    <div class="relative rounded-2xl overflow-hidden">
                        @php
                        $featuredImage = is_array($firstPost['featured_image'] ?? null)
                        ? ($firstPost['featured_image']['url'] ??
                        'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=630&fit=crop')
                        : ($firstPost['featured_image'] ??
                        'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=630&fit=crop');
                        @endphp
                        <img src="{{ $featuredImage }}" alt="{{ $firstPost['title'] }}"
                            class="w-full h-[320px] sm:h-[380px] object-cover">
                        @if(!empty($firstPost['categories']))
                        <span
                            class="absolute top-4 left-4 px-3 py-1.5 bg-yellow-450 text-white text-xs font-semibold rounded-full">{{
                            $firstPost['categories'][0]['name'] ?? 'Berita' }}</span>
                        @endif
                    </div>
                    <h3
                        class="text-2xl sm:text-3xl font-bold text-gray-900 mt-4 leading-tight group-hover:text-yellow-450">
                        {{ $firstPost['title'] }}</h3>
                    <div class="text-sm text-gray-600 line-clamp-2 mt-1">{{ $firstPost['excerpt'] }}</div>
                    <div class="flex gap-3 items-center text-gray-600 text-sm mt-2">
                        <span>{{ $firstPost['author']['display_name'] ?? $firstPost['author_name'] ?? 'Redaksi'
                            }}</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span>{{ \Carbon\Carbon::parse($firstPost['date'])->setTimezone('Asia/Jakarta')->format('d/m, H.i') }}</span>
                    </div>
                </a>
                @else
                <div class="bg-gray-100 rounded-2xl p-8 text-center">
                    <p class="text-gray-500">No posts found for this category.</p>
                </div>
                @endif
            </div>

            <!-- Berita Terbaru Section (AJAX) -->
            <div class="mb-6">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
                    <h2 class="text-xl font-bold">Berita Terbaru</h2>
                </div>
                <div id="posts-container" class="divide-y divide-gray-200 bg-white rounded-2xl shadow-sm">
                    <!-- Posts will be loaded here via AJAX -->
                    <div class="p-8 text-center">
                        <div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-yellow-450"></div>
                        <p class="text-gray-500 mt-2">Memuat berita...</p>
                    </div>
                </div>
                <!-- Pagination -->
                <div class="mt-4 flex items-center justify-between" id="pagination-container">
                    <!-- Pagination will be rendered here via AJAX -->
                </div>
            </div>
        </section>

        <aside class="col-span-12 lg:col-span-4">
            <div class="bg-white rounded-2xl shadow-sm p-4 mb-6">
                <h3 class="text-base font-semibold text-gray-900 mb-3">Kategori</h3>
                <div class="flex flex-wrap gap-2" id="categories-container">
                    <!-- Categories will be loaded here via AJAX -->
                    <div class="inline-block animate-spin rounded-full h-4 w-4 border-b-2 border-gray-400"></div>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm p-4">
                <h3 class="text-base font-semibold text-gray-900 mb-3">Trending</h3>
                <div id="trending-container" class="space-y-3">
                    <!-- Trending posts will be loaded here via AJAX -->
                    <div class="inline-block animate-spin rounded-full h-4 w-4 border-b-2 border-gray-400"></div>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        const apiBaseUrl = '/api/v1';
        const slug = '{{ $slug ?? '' }}';
        let limit = 12;
        let currentPage = new URLSearchParams(window.location.search).get('page') || 1;

        function formatJakartaDateDisplay(input) {
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
                const datePart = new Intl.DateTimeFormat('id-ID', { day: '2-digit', month: '2-digit', timeZone: 'Asia/Jakarta' }).format(d);
                const timePart = new Intl.DateTimeFormat('id-ID', { hour: '2-digit', minute: '2-digit', hour12: false, timeZone: 'Asia/Jakarta' }).format(d).replace(':', '.');
                return `${datePart}, ${timePart}`;
            } catch (e) {
                return '';
            }
        }

        // Function to fetch feed posts
        async function fetchFeedPosts(page = 1) {
            try {
                const response = await fetch(`${apiBaseUrl}/feed?page=${page}&limit=${limit}`);
                const result = await response.json();

                if (result.success && result.data) {
                    return result.data;
                }
                return null;
            } catch (error) {
                console.error('Error fetching posts:', error);
                return {
                    posts: [],
                    pagination: {
                        currentPage: page,
                        totalPages: 0,
                        totalItems: 0,
                        itemsPerPage: limit
                    }
                };
            }
        }

        // Function to fetch categories
        async function fetchCategories() {
            try {
                const response = await fetch(`${apiBaseUrl}/categories?limit=12`);
                const result = await response.json();

                if (result.success && result.data) {
                    const categories = result.data.categories;
                    renderCategories(categories);
                }
            } catch (error) {
                console.error('Error fetching categories:', error);
            }
        }

        function renderCategories(categories) {
            const container = document.getElementById('categories-container');
            if (!categories || categories.length === 0) {
                container.innerHTML = '';
                return;
            }

            let html = '';
            categories.forEach(cat => {
                html += `<a href="{{ url('/kategori') }}/${cat.slug}" class="px-3 py-1.5 bg-gray-100 hover:bg-yellow-450 hover:text-white text-gray-700 text-sm rounded-full transition-colors no-underline">${cat.name}</a>`;
            });
            container.innerHTML = html;
        }

        // Function to render posts
        function renderPosts(posts) {
            const container = document.getElementById('posts-container');
            if (!posts || posts.length === 0) {
                container.innerHTML = '<div class="p-8 text-center"><p class="text-gray-500">Tidak ada berita ditemukan.</p></div>';
                return;
            }

            let html = '';
            posts.forEach((post) => {
                const formattedDate = formatJakartaDateDisplay(post.date);

                // Get author name - handle both old and new API response formats
                const authorName = post.author?.display_name || post.author_name || 'Admin';

                // Handle featured_image which can be array or string
                let featuredImage = 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=240&h=240&fit=crop';
                if (post.featured_image) {
                    if (typeof post.featured_image === 'object' && post.featured_image.url) {
                        featuredImage = post.featured_image.url;
                    } else if (typeof post.featured_image === 'string') {
                        featuredImage = post.featured_image;
                    }
                }

                html += `
                    <a href="{{ url('/artikel') }}/${post.slug}" class="flex gap-4 p-4 no-underline hover:bg-gray-50">
                        <img src="${featuredImage}" alt="${post.title}" class="w-24 h-24 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-base font-semibold text-gray-800 leading-snug line-clamp-2">${post.title}</div>
                            <div class="text-sm text-gray-600 line-clamp-2 mt-1">${post.excerpt || ''}</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>${authorName}</span><span class="w-1 h-1 bg-gray-300 rounded-full"></span><span>${formattedDate}</span>
                            </div>
                        </div>
                    </a>
                `;
            });

            container.innerHTML = html;
        }

        // Function to render pagination
        function renderPagination(pagination) {
            const container = document.getElementById('pagination-container');
            if (!pagination) {
                container.innerHTML = '';
                return;
            }

            const totalPages = pagination.totalPages || 1;

            // Get current page from URL to ensure it's always correct
            const urlParams = new URLSearchParams(window.location.search);
            const activePage = parseInt(urlParams.get('page')) || 1;

            if (totalPages <= 1) {
                container.innerHTML = '';
                return;
            }

            let html = '';

            // Previous button
            if (activePage > 1) {
                html += `<a href="?page=${activePage - 1}" class="pagination-nav px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 bg-white rounded-lg hover:bg-gray-50 no-underline">‹ Sebelumnya</a>`;
            } else {
                html += `<span class="px-4 py-2 text-sm font-medium text-gray-400 border border-gray-300 bg-gray-50 rounded-lg cursor-not-allowed">‹ Sebelumnya</span>`;
            }

            // Page numbers
            html += '<div class="flex gap-2">';

            let startPage = Math.max(1, activePage - 2);
            let endPage = Math.min(totalPages, startPage + 4);

            if (endPage - startPage < 4) {
                startPage = Math.max(1, endPage - 4);
            }

            if (startPage > 1) {
                html += `<a href="?page=1" class="pagination-link px-3 py-2 text-sm font-medium rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-yellow-50 hover:text-yellow-700 no-underline">1</a>`;
                if (startPage > 2) {
                    html += `<span class="px-3 py-2 text-sm font-medium text-gray-400">...</span>`;
                }
            }

            for (let i = startPage; i <= endPage; i++) {
                if (i === activePage) {
                    html += `<span class="px-3 py-2 text-sm font-medium rounded-lg border border-yellow-450 bg-yellow-450 text-white">${i}</span>`;
                } else {
                    html += `<a href="?page=${i}" class="pagination-link px-3 py-2 text-sm font-medium rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-yellow-50 hover:text-yellow-700 no-underline">${i}</a>`;
                }
            }

            if (endPage < totalPages) {
                if (endPage < totalPages - 1) {
                    html += `<span class="px-3 py-2 text-sm font-medium text-gray-400">...</span>`;
                }
                html += `<a href="?page=${totalPages}" class="pagination-link px-3 py-2 text-sm font-medium rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-yellow-50 hover:text-yellow-700 no-underline">${totalPages}</a>`;
            }

            html += '</div>';

            // Next button
            if (activePage < totalPages) {
                html += `<a href="?page=${activePage + 1}" class="pagination-nav px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 bg-white rounded-lg hover:bg-gray-50 no-underline">Berikutnya ›</a>`;
            } else {
                html += `<span class="px-4 py-2 text-sm font-medium text-gray-400 border border-gray-300 bg-gray-50 rounded-lg cursor-not-allowed">Berikutnya ›</span>`;
            }

            container.innerHTML = html;
        }

        // Function to render trending
        function renderTrending(posts) {
            const container = document.getElementById('trending-container');
            if (!posts || posts.length === 0) {
                container.innerHTML = '<p class="text-gray-500 text-sm">Tidak ada trending.</p>';
                return;
            }

            let html = '';
            posts.slice(0, 3).forEach(post => {
                const formattedDate = formatJakartaDateDisplay(post.date);

                // Get author name - handle both old and new API response formats
                const authorName = post.author?.display_name || post.author_name || 'Admin';

                let featuredImage = 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=120&h=120&fit=crop';
                if (post.featured_image) {
                    if (typeof post.featured_image === 'object' && post.featured_image.url) {
                        featuredImage = post.featured_image.url;
                    } else if (typeof post.featured_image === 'string') {
                        featuredImage = post.featured_image;
                    }
                }

                html += `
                    <a href="{{ url('/artikel') }}/${post.slug}" class="flex gap-3 no-underline rounded-xl p-2 hover:bg-gray-50">
                        <img src="${featuredImage}" alt="${post.title}" class="w-16 h-16 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">${post.title}</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>${authorName}</span><span class="w-1 h-1 bg-gray-300 rounded-full"></span><span>${formattedDate}</span>
                            </div>
                        </div>
                    </a>
                `;
            });

            container.innerHTML = html;
        }

        async function loadPosts(page) {
            const container = document.getElementById('posts-container');
            container.innerHTML = '<div class="p-8 text-center"><div class="inline-block animate-spin rounded-full h-8 w-8 border-b-2 border-yellow-450"></div><p class="text-gray-500 mt-2">Memuat berita...</p></div>';

            const data = await fetchFeedPosts(page);
            if (data && data.posts) {
                let postsToRender = data.posts;
                // If page 1, skip the first post because it's in the headline
                if (page === 1) {
                    postsToRender = postsToRender.slice(1);
                }
                renderPosts(postsToRender);
                renderPagination(data.pagination);

                // Render trending if page 1 (using the same data or fetch separate?)
                if (page === 1) {
                    renderTrending(data.posts);
                }

                // Scroll to headline section after content loads
                const headlineSection = document.getElementById('headline-section');
                if (headlineSection) {
                    // Smooth scroll with offset for better UX
                    const yOffset = -80; // Offset for fixed header if any
                    const y = headlineSection.getBoundingClientRect().top + window.pageYOffset + yOffset;
                    window.scrollTo({ top: y, behavior: 'smooth' });
                }
            } else {
                container.innerHTML = '<div class="p-8 text-center"><p class="text-gray-500">Tidak ada berita ditemukan.</p></div>';
                document.getElementById('pagination-container').innerHTML = '';
            }
        }

        // Initialize - load posts from query parameter
        loadPosts(currentPage);
        fetchCategories();

        // Image error handling
        const FALLBACK_IMG = 'data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630"><rect width="100%" height="100%" fill="%23e5e7eb"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="%236b7280" font-family="sans-serif" font-size="24">Image unavailable</text></svg>';
        document.addEventListener('error', function (e) {
            if (e.target.tagName.toLowerCase() === 'img') {
                e.target.src = FALLBACK_IMG;
            }
        }, true);
    })();
</script>
@endpush
