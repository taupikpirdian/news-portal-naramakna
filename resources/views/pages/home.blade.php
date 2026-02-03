@extends('layouts.app')
@section('title', 'Naramakna - Cerdas Memaknai')
@section('content')
<!-- Artikel Terbaru -->
<section class="mb-16" id="latest-posts-section">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
            <h2>Artikel Terbaru</h2>
        </div>
        <a href="#" class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
            Lihat lainnya
            <span>›</span>
        </a>
    </div>

    @if(isset($latestPosts) && count($latestPosts) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Featured Slider (left side - 2 columns) --}}
            <div class="lg:col-span-2">
                <div class="relative rounded-2xl overflow-hidden bg-white">
                    <div class="flex h-[300px] sm:h-[380px] lg:h-[420px] transition-transform duration-500 ease" id="featuredSliderContainer">
                        @php
                            $featuredPosts = array_slice($latestPosts, 0, 3);
                        @endphp
                        @foreach($featuredPosts as $index => $post)
                            <img src="{{ $post['featured_image']['url'] ?? 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=600&fit=crop' }}"
                                 alt="{{ $post['title'] }}"
                                 class="min-w-full h-full object-cover"
                                 data-index="{{ $index }}">
                        @endforeach
                    </div>
                    <span class="absolute top-4 left-4 px-3 py-1.5 bg-yellow-450 text-white text-xs font-semibold rounded-full">
                        {{ $featuredPosts[0]['metadata']['_channel'] ?? 'Artikel' }}
                    </span>
                    <button class="absolute top-1/2 -translate-y-1/2 left-4 w-10 h-10 bg-white/60 backdrop-blur-sm border-none rounded-full text-gray-800 text-2xl cursor-pointer z-20 hover:bg-white">
                        <span onclick="featuredPrev()">‹</span>
                    </button>
                    <button class="absolute top-1/2 -translate-y-1/2 right-4 w-10 h-10 bg-white/60 backdrop-blur-sm border-none rounded-full text-gray-800 text-2xl cursor-pointer z-20 hover:bg-white">
                        <span onclick="featuredNext()">›</span>
                    </button>
                    <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10" id="featuredDots"></div>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent pointer-events-none"></div>
                    <div class="absolute left-4 right-4 bottom-16 text-white">
                        <h3 id="featuredTitle" class="text-xl sm:text-2xl font-bold">{{ $featuredPosts[0]['title'] ?? '' }}</h3>
                        <div class="flex gap-3 items-center text-white/80 text-sm mt-2">
                            <span id="featuredAuthor">{{ $featuredPosts[0]['author']['display_name'] ?? 'Redaksi' }}</span>
                            <span class="w-2 h-2 bg-white/50 rounded-full"></span>
                            <span id="featuredDate">{{ $featuredPosts[0]['date'] ? \Carbon\Carbon::parse($featuredPosts[0]['date'])->format('d/m, H.i') : '' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Latest Posts List (right side - 1 column) --}}
            <div>
                <div>
                    <h4 class="text-base font-semibold text-gray-900 mb-4">Terbaru</h4>
                    <div class="space-y-2">
                        @php
                            $listPosts = array_slice($latestPosts, 3, 4);
                        @endphp
                        @foreach($listPosts as $post)
                            <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                                <img src="{{ $post['featured_image']['url'] ?? 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=200&h=200&fit=crop' }}"
                                     alt="{{ $post['title'] }}"
                                     class="w-20 h-20 object-cover rounded-lg">
                                <div class="flex-1">
                                    <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">{{ $post['title'] }}</div>
                                    <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                        <span>{{ $post['author']['display_name'] ?? 'Redaksi' }}</span>
                                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                        <span>{{ $post['date'] ? \Carbon\Carbon::parse($post['date'])->format('d/m, H.i') : '' }}</span>
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

<!-- TODO: Feed Instagram -->
<section class="mb-16">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
            <h2 class="flex items-center gap-2">
                <svg class="w-6 h-6 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
                Instagram Feed
            </h2>
        </div>
        <a href="#" class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
            @naramakna_id
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
            </svg>
        </a>
    </div>

    <div class="bg-gradient-to-br from-purple-50 via-pink-50 to-yellow-50 rounded-2xl p-6 border border-gray-200">
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
            <!-- Instagram Post 1 -->
            <a href="#" class="group relative aspect-square rounded-xl overflow-hidden no-underline">
                <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=400&h=400&fit=crop" alt="Instagram post 1" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-2 left-2 right-2 flex items-center gap-3 text-white text-xs">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            1.2k
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z"/>
                            </svg>
                            89
                        </span>
                    </div>
                </div>
            </a>

            <!-- Instagram Post 2 -->
            <a href="#" class="group relative aspect-square rounded-xl overflow-hidden no-underline">
                <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=400&h=400&fit=crop" alt="Instagram post 2" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-2 left-2 right-2 flex items-center gap-3 text-white text-xs">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            2.1k
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z"/>
                            </svg>
                            142
                        </span>
                    </div>
                </div>
            </a>

            <!-- Instagram Post 3 -->
            <a href="#" class="group relative aspect-square rounded-xl overflow-hidden no-underline">
                <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?w=400&h=400&fit=crop" alt="Instagram post 3" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-2 left-2 right-2 flex items-center gap-3 text-white text-xs">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            856
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z"/>
                            </svg>
                            67
                        </span>
                    </div>
                </div>
            </a>

            <!-- Instagram Post 4 -->
            <a href="#" class="group relative aspect-square rounded-xl overflow-hidden no-underline">
                <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=400&h=400&fit=crop" alt="Instagram post 4" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-2 left-2 right-2 flex items-center gap-3 text-white text-xs">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            1.5k
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z"/>
                            </svg>
                            98
                        </span>
                    </div>
                </div>
            </a>

            <!-- Instagram Post 5 -->
            <a href="#" class="group relative aspect-square rounded-xl overflow-hidden no-underline">
                <img src="https://images.unsplash.com/photo-1515847049296-a281d6401047?w=400&h=400&fit=crop" alt="Instagram post 5" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-2 left-2 right-2 flex items-center gap-3 text-white text-xs">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            3.2k
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z"/>
                            </svg>
                            234
                        </span>
                    </div>
                </div>
            </a>

            <!-- Instagram Post 6 -->
            <a href="#" class="group relative aspect-square rounded-xl overflow-hidden no-underline">
                <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=400&h=400&fit=crop" alt="Instagram post 6" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-2 left-2 right-2 flex items-center gap-3 text-white text-xs">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            1.8k
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z"/>
                            </svg>
                            156
                        </span>
                    </div>
                </div>
            </a>
        </div>

        <!-- Follow Button -->
        <div class="mt-6 text-center">
            <a href="#" class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 via-pink-600 to-orange-500 text-white font-semibold rounded-full no-underline transition-all hover:shadow-lg hover:scale-105">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                </svg>
                Ikuti Kami di Instagram
            </a>
        </div>
    </div>
</section>

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
                    @for($i = 0; $i < 4; $i++)
                        <div class="flex gap-3 rounded-xl px-2 pt-0.5 pb-1.5">
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

    const categoriesApiEndpoint = "{{ route('api.categories') }}";
    const postsApiEndpoint = "{{ route('api.category.posts') }}";

    let allCategories = [];
    let loadedCount = 0;
    let isLoading = false;
    const categoriesPerBatch = 2; // Load first 2 categories immediately

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

        let html = `
            <section class="mb-10 category-section fade-in-section" data-category-slug="${category.slug}" data-category-index="${index}">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center gap-2">
                        <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
                        <h2>${category.name}</h2>
                    </div>
                    <a href="#" class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
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
            const date = firstPost.date ? new Date(firstPost.date).toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', hour: '2-digit', minute: '2-digit' }) : '';

            html += `
                    <a href="#" class="lg:col-span-5 rounded-2xl overflow-hidden no-underline block relative">
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
                        <div class="grid grid-cols-2 gap-3">
        `;

        otherPosts.forEach(post => {
            const date = post.date ? new Date(post.date).toLocaleDateString('id-ID', { day: '2-digit', month: '2-digit', hour: '2-digit', minute: '2-digit' }) : '';

            html += `
                            <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
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
                        </div>
                    </div>
                </div>
            </section>
        `;

        // Add AdSense after every 2 categories
        if ((index + 1) % 2 === 0) {
            html += `
                <div class="bg-blue-100 border border-blue-300 rounded-lg py-6 text-center text-blue-800 text-sm font-medium my-8">AdSense</div>
            `;
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
            const url = `${postsApiEndpoint}?slug=${encodeURIComponent(categorySlug)}&limit=6`;
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

                // Scroll skeleton into view
                let skeletonSection = container.querySelector('.skeleton-section');
                if (skeletonSection) {
                    skeletonSection.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
                }

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
    const featuredTotal = featuredContainer ? featuredContainer.children.length : 0;
    const featuredDotsContainer = document.getElementById('featuredDots');
    const featuredTitleEl = document.getElementById('featuredTitle');
    const featuredAuthorEl = document.getElementById('featuredAuthor');
    const featuredDateEl = document.getElementById('featuredDate');
    const featuredData = [
        { title: 'Tubuh Warga Kecil Dipaksa Bicara', author: 'Khaerunnisa', date: '27/01, 08.00' },
        { title: 'Spesies Baru Ditemukan dari Lini Masa', author: 'Khaerunnisa', date: '27/01, 05.00' },
        { title: 'Sentuhan Orang Indonesia Dalam Lagu Kebangsaan Malaysia', author: 'Yosal Iriantara', date: '27/01, 02.00' }
    ];

    function updateFeaturedSlider() {
        if (!featuredContainer) return;
        featuredContainer.style.transform = `translateX(-${featuredCurrent * 100}%)`;
        if (featuredTitleEl && featuredAuthorEl && featuredDateEl) {
            const d = featuredData[featuredCurrent] || featuredData[0];
            featuredTitleEl.textContent = d.title;
            featuredAuthorEl.textContent = d.author;
            featuredDateEl.textContent = d.date;
        }
        if (featuredDotsContainer) {
            const dots = featuredDotsContainer.children;
            for (let i = 0; i < dots.length; i++) {
                dots[i].className = 'w-2 h-2 bg-gray-300/70 rounded-full cursor-pointer transition-all' + (i === featuredCurrent ? ' bg-yellow-450 w-6' : '');
            }
        }
    }

    function featuredNext() {
        if (!featuredContainer) return;
        featuredCurrent = (featuredCurrent + 1) % featuredTotal;
        updateFeaturedSlider();
    }

    function featuredPrev() {
        if (!featuredContainer) return;
        featuredCurrent = (featuredCurrent - 1 + featuredTotal) % featuredTotal;
        updateFeaturedSlider();
    }

    function featuredGoTo(index) {
        featuredCurrent = index;
        updateFeaturedSlider();
    }

    if (featuredDotsContainer && featuredTotal > 0) {
        for (let i = 0; i < featuredTotal; i++) {
            const dot = document.createElement('div');
            dot.className = 'w-2 h-2 bg-gray-300/70 rounded-full cursor-pointer transition-all' + (i === 0 ? ' bg-yellow-450 w-6' : '');
            dot.onclick = () => featuredGoTo(i);
            featuredDotsContainer.appendChild(dot);
        }
    }

    if (featuredTotal > 1) setInterval(featuredNext, 7000);
    updateFeaturedSlider();

    // Fallback image handler
    Array.from(document.querySelectorAll('img')).forEach(img => {
        img.addEventListener('error', () => {
            img.src = FALLBACK_IMG;
        }, { once: true });
    });
</script>
@endpush
