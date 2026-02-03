@extends('layouts.app')
@section('title', $title ?? 'Naramakna')

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
                <a href="{{ url('/detail?id=' . $firstPost['id']) }}" class="group block no-underline">
                    <div class="relative rounded-2xl overflow-hidden">
                        <img src="{{ $firstPost['featured_image'] ?? 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=630&fit=crop' }}" alt="{{ $firstPost['title'] }}" class="w-full h-[320px] sm:h-[380px] object-cover">
                        @if($category)
                        <span class="absolute top-4 left-4 px-3 py-1.5 bg-yellow-450 text-white text-xs font-semibold rounded-full">{{ $category['name'] ?? $slug }}</span>
                        @endif
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-4 leading-tight group-hover:text-yellow-450">{{ $firstPost['title'] }}</h3>
                    <div class="text-sm text-gray-600 line-clamp-2 mt-1">{{ $firstPost['excerpt'] }}</div>
                    <div class="flex gap-3 items-center text-gray-600 text-sm mt-2">
                        <span>{{ $firstPost['author_name'] }}</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span>{{ \Carbon\Carbon::parse($firstPost['date'])->format('d/m, H.i') }}</span>
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
    (function() {
        const slug = '{{ $slug }}';
        const apiBaseUrl = '{{ url('/api') }}';
        let currentOffset = 0;
        let limit = 10;
        let totalPages = 1;
        let currentPage = 1;

        // Function to fetch category posts
        async function fetchCategoryPosts(offset = 0) {
            try {
                const response = await fetch(`${apiBaseUrl}/category/${slug}/posts?limit=${limit}&offset=${offset}`);
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
                        total: 0,
                        limit: limit,
                        offset: offset,
                        hasMore: false
                    },
                    category: {
                        slug: slug,
                        name: slug
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
                    return result.data.categories;
                }
                return [];
            } catch (error) {
                console.error('Error fetching categories:', error);
                return [];
            }
        }

        // Function to render posts
        function renderPosts(posts, startIndex = 1) {
            const container = document.getElementById('posts-container');
            if (!posts || posts.length === 0) {
                container.innerHTML = '<div class="p-8 text-center"><p class="text-gray-500">Tidak ada berita ditemukan.</p></div>';
                return;
            }

            let html = '';
            posts.forEach((post, index) => {
                const date = new Date(post.date);
                const formattedDate = `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}, ${date.getHours().toString().padStart(2, '0')}.${date.getMinutes().toString().padStart(2, '0')}`;

                html += `
                    <a href="{{ url('/detail?id=') }}${post.id}" class="flex gap-4 p-4 no-underline hover:bg-gray-50">
                        <img src="${post.featured_image || 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=240&h=240&fit=crop'}" alt="${post.title}" class="w-24 h-24 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-base font-semibold text-gray-800 leading-snug line-clamp-2">${post.title}</div>
                            <div class="text-sm text-gray-600 line-clamp-2 mt-1">${post.excerpt || ''}</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>${post.author_name}</span><span class="w-1 h-1 bg-gray-300 rounded-full"></span><span>${formattedDate}</span>
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

            const total = pagination.total || 0;
            const limit = pagination.limit || 10;
            const hasMore = pagination.hasMore || false;
            totalPages = Math.ceil(total / limit);

            let html = '';

            // Previous button
            if (currentPage > 1) {
                html += `<a href="#" data-page="${currentPage - 1}" class="pagination-nav px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 bg-white rounded-lg hover:bg-gray-50 no-underline">‹ Sebelumnya</a>`;
            } else {
                html += `<span class="px-4 py-2 text-sm font-medium text-gray-400 border border-gray-300 bg-gray-50 rounded-lg">‹ Sebelumnya</span>`;
            }

            // Page numbers
            html += '<div class="flex gap-2">';
            for (let i = 1; i <= Math.min(totalPages, 5); i++) {
                if (i === currentPage) {
                    html += `<span class="px-3 py-2 text-sm font-medium rounded-lg border border-yellow-450 bg-yellow-450 text-white">${i}</span>`;
                } else {
                    html += `<a href="#" data-page="${i}" class="pagination-link px-3 py-2 text-sm font-medium rounded-lg no-underline border border-gray-300 bg-white text-gray-700 hover:bg-yellow-50 hover:text-yellow-700">${i}</a>`;
                }
            }
            html += '</div>';

            // Next button
            if (hasMore) {
                html += `<a href="#" data-page="${currentPage + 1}" class="pagination-nav px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 bg-white rounded-lg hover:bg-gray-50 no-underline">Berikutnya ›</a>`;
            } else {
                html += `<span class="px-4 py-2 text-sm font-medium text-gray-400 border border-gray-300 bg-gray-50 rounded-lg">Berikutnya ›</span>`;
            }

            container.innerHTML = html;

            // Add click handlers for pagination
            document.querySelectorAll('.pagination-link, .pagination-nav').forEach(link => {
                link.addEventListener('click', async (e) => {
                    e.preventDefault();
                    const page = parseInt(e.target.dataset.page, 10);
                    if (page && page !== currentPage) {
                        currentPage = page;
                        currentOffset = (page - 1) * limit;
                        await loadPosts();
                    }
                });
            });
        }

        // Function to render categories
        function renderCategories(categories) {
            const container = document.getElementById('categories-container');
            if (!categories || categories.length === 0) {
                container.innerHTML = '<p class="text-gray-500 text-sm">Tidak ada kategori.</p>';
                return;
            }

            let html = '';
            categories.forEach(cat => {
                html += `<a href="{{ url('/index/') }}${cat.slug}" class="px-3 py-1.5 text-xs font-medium rounded-full no-underline ${cat.slug === slug ? 'bg-yellow-450 text-white' : 'bg-gray-100 text-gray-700 hover:bg-yellow-50 hover:text-yellow-700'}">${cat.name}</a>`;
            });

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
            posts.slice(0, 2).forEach(post => {
                const date = new Date(post.date);
                const formattedDate = `${date.getDate().toString().padStart(2, '0')}/${(date.getMonth() + 1).toString().padStart(2, '0')}, ${date.getHours().toString().padStart(2, '0')}.${date.getMinutes().toString().padStart(2, '0')}`;

                html += `
                    <a href="{{ url('/detail?id=') }}${post.id}" class="flex gap-3 no-underline rounded-xl p-2 hover:bg-gray-50">
                        <img src="${post.featured_image || 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=120&h=120&fit=crop'}" alt="${post.title}" class="w-16 h-16 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">${post.title}</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>${post.author_name}</span><span class="w-1 h-1 bg-gray-300 rounded-full"></span><span>${formattedDate}</span>
                            </div>
                        </div>
                    </a>
                `;
            });

            container.innerHTML = html;
        }

        // Function to load posts
        async function loadPosts() {
            const data = await fetchCategoryPosts(currentOffset);
            if (data && data.posts) {
                // Start from index 1 (skip the first post as it's shown in headline)
                const posts = Array.isArray(data.posts) ? data.posts.slice(1) : [];
                renderPosts(posts);
                renderPagination(data.pagination);
            } else {
                renderPosts([]);
                renderPagination(null);
            }
        }

        // Initialize
        async function init() {
            // Load posts (skip first post)
            await loadPosts();

            // Load categories
            const categories = await fetchCategories();
            renderCategories(categories);

            // Load trending (use latest posts)
            const trendingData = await fetchCategoryPosts(0);
            if (trendingData && trendingData.posts && Array.isArray(trendingData.posts)) {
                renderTrending(trendingData.posts);
            } else {
                renderTrending([]);
            }

            // Image error handling
            const FALLBACK_IMG = 'data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630"><rect width="100%" height="100%" fill="%23e5e7eb"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="%236b7280" font-family="sans-serif" font-size="24">Image unavailable</text></svg>';
            Array.from(document.querySelectorAll('img')).forEach(img => {
                img.addEventListener('error', () => {
                    img.src = FALLBACK_IMG;
                }, { once: true });
            });
        }

        // Run initialization
        init();
    })();
</script>
@endpush
