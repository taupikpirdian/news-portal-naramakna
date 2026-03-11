@props([
    'limit' => 12,
])

@php
    $apiUrl = config('app.url') . '/api/instagram/media?limit=' . $limit;
@endphp

@if(config('ads.instagram_feed_enabled'))
<section class="mb-16">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
            <h2 class="flex items-center gap-2">
                <svg class="w-6 h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
                Instagram Feed
            </h2>
        </div>
        <a href="https://www.instagram.com/naramakna.id?igsh=ejNla2VjeDdwaWd5" target="_blank" rel="noopener noreferrer"
            class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
            @naramakna_id
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
            </svg>
        </a>
    </div>

    <div class="bg-gradient-to-br from-purple-50 via-pink-50 to-yellow-50 rounded-2xl p-6 border border-gray-200">
        <!-- Loading State -->
        <div id="instagram-loading" class="flex items-center justify-center py-12">
            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-purple-600"></div>
        </div>

        <!-- Error State -->
        <div id="instagram-error" class="hidden text-center py-12">
            <p class="text-red-600 mb-2">Gagal memuat feed Instagram</p>
            <p class="text-gray-500 text-sm">Silakan refresh halaman atau coba lagi nanti</p>
        </div>

        <!-- Instagram Grid -->
        <div id="instagram-grid" class="hidden grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
            <!-- Posts will be injected here by JavaScript -->
        </div>

        <!-- Follow Button -->
        <div class="mt-6 text-center">
            <a href="https://www.instagram.com/naramakna.id?igsh=ejNla2VjeDdwaWd5" target="_blank"
                rel="noopener noreferrer"
                class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 via-pink-600 to-orange-500 text-white font-semibold rounded-full no-underline transition-all hover:shadow-lg hover:scale-105">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                </svg>
                Ikuti Kami di Instagram
            </a>
        </div>
    </div>
</section>
@endif

<script>
(function() {
    const apiUrl = '{{ $apiUrl }}';
    const loadingEl = document.getElementById('instagram-loading');
    const errorEl = document.getElementById('instagram-error');
    const gridEl = document.getElementById('instagram-grid');

    console.log('[Instagram Feed] Initializing...');
    console.log('[Instagram Feed] API URL:', apiUrl);

    async function fetchInstagramPosts() {
        try {
            console.log('[Instagram Feed] Fetching posts...');

            const response = await fetch(apiUrl);
            const data = await response.json();

            console.log('[Instagram Feed] Response:', data);

            if (!data.success || !data.data || data.data.length === 0) {
                console.warn('[Instagram Feed] No posts found');
                showError();
                return;
            }

            // Hide loading, show grid
            loadingEl.classList.add('hidden');
            gridEl.classList.remove('hidden');

            // Render posts
            data.data.forEach((post, index) => {
                const postElement = createPostElement(post, index);
                gridEl.appendChild(postElement);
            });

            console.log(`[Instagram Feed] ✅ Loaded ${data.data.length} posts`);

        } catch (error) {
            console.error('[Instagram Feed] ❌ Error:', error);
            showError();
        }
    }

    function createPostElement(post, index) {
        const a = document.createElement('a');
        a.href = post.permalink || '#';
        a.target = '_blank';
        a.rel = 'noopener noreferrer';
        a.className = 'group relative aspect-square rounded-xl overflow-hidden no-underline';

        const img = document.createElement('img');
        img.src = post.media_url || post.thumbnail_url;
        img.alt = post.caption ? post.caption.substring(0, 50) + '...' : `Instagram post ${index + 1}`;
        img.className = 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-110';
        img.loading = 'lazy';

        const overlay = document.createElement('div');
        overlay.className = 'absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300';

        const stats = document.createElement('div');
        stats.className = 'absolute bottom-2 left-2 right-2 flex items-center gap-3 text-white text-xs';

        // Likes
        const likesSpan = document.createElement('span');
        likesSpan.className = 'flex items-center gap-1';
        likesSpan.innerHTML = `
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
            </svg>
            ${formatNumber(post.like_count || 0)}
        `;

        // Comments
        const commentsSpan = document.createElement('span');
        commentsSpan.className = 'flex items-center gap-1';
        commentsSpan.innerHTML = `
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z" />
            </svg>
            ${formatNumber(post.comments_count || 0)}
        `;

        stats.appendChild(likesSpan);
        stats.appendChild(commentsSpan);
        overlay.appendChild(stats);
        a.appendChild(img);
        a.appendChild(overlay);

        return a;
    }

    function formatNumber(num) {
        if (num >= 1000) {
            return (num / 1000).toFixed(1) + 'k';
        }
        return num.toString();
    }

    function showError() {
        loadingEl.classList.add('hidden');
        errorEl.classList.remove('hidden');
    }

    // Fetch posts when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', fetchInstagramPosts);
    } else {
        fetchInstagramPosts();
    }
})();
</script>
