@extends('layouts.app')
@section('title', 'Naramakna - Cerdas Memaknai')
@section('content')
<!-- Artikel Terbaru -->
<section class="mb-16">
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
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2">
            <div class="relative rounded-2xl overflow-hidden bg-white">
                <div class="flex h-[300px] sm:h-[380px] lg:h-[420px] transition-transform duration-500 ease" id="featuredSliderContainer">
                    <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=600&fit=crop" alt="Unggulan 1" class="min-w-full h-full object-cover">
                    <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=1200&h=600&fit=crop" alt="Unggulan 2" class="min-w-full h-full object-cover">
                    <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?w=1200&h=600&fit=crop" alt="Unggulan 3" class="min-w-full h-full object-cover">
                </div>
                <span class="absolute top-4 left-4 px-3 py-1.5 bg-yellow-450 text-white text-xs font-semibold rounded-full">Horison</span>
                <button class="absolute top-1/2 -translate-y-1/2 left-4 w-10 h-10 bg-white/60 backdrop-blur-sm border-none rounded-full text-gray-800 text-2xl cursor-pointer z-20 hover:bg-white">
                    <span onclick="featuredPrev()">‹</span>
                </button>
                <button class="absolute top-1/2 -translate-y-1/2 right-4 w-10 h-10 bg-white/60 backdrop-blur-sm border-none rounded-full text-gray-800 text-2xl cursor-pointer z-20 hover:bg-white">
                    <span onclick="featuredNext()">›</span>
                </button>
                <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex gap-2 z-10" id="featuredDots"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent pointer-events-none"></div>
                <div class="absolute left-4 right-4 bottom-16 text-white">
                    <h3 id="featuredTitle" class="text-xl sm:text-2xl font-bold">Tubuh Warga Kecil Dipaksa Bicara</h3>
                    <div class="flex gap-3 items-center text-white/80 text-sm mt-2">
                        <span id="featuredAuthor">Khaerunnisa</span>
                        <span class="w-2 h-2 bg-white/50 rounded-full"></span>
                        <span id="featuredDate">27/01, 08.00</span>
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div>
                <h4 class="text-base font-semibold text-gray-900 mb-4">Terbaru</h4>
                <div class="space-y-2">
                    <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=200&h=200&fit=crop" alt="Populer 1" class="w-20 h-20 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Spesies Baru Ditemukan dari Lini Masa</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>Khaerunnisa</span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span>27/01, 05.00</span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?w=200&h=200&fit=crop" alt="Populer 2" class="w-20 h-20 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Sentuhan Orang Indonesia Dalam Lagu Kebangsaan Malaysia</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>Yosal Iriantara</span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span>27/01, 02.00</span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=200&h=200&fit=crop" alt="Populer 3" class="w-20 h-20 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Mendapatkan Uang Dalam Karung</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>Yosal Iriantara</span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span>26/01, 05.00</span>
                            </div>
                        </div>
                    </a>
                    <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=200&h=200&fit=crop" alt="Populer 3" class="w-20 h-20 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Mendapatkan Uang Dalam Karung</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>Yosal Iriantara</span>
                                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                                <span>26/01, 05.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
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

<section class="mb-16">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
            <h2>Narapandang</h2>
        </div>
        <a href="#" class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
            Artikel Lainnya
            <span>›</span>
        </a>
    </div>
    <div class="grid lg:grid-cols-12 gap-4 items-start mb-8">
        <a href="#" class="lg:col-span-5 rounded-2xl overflow-hidden no-underline block relative">
            <img src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?w=1200&h=630&fit=crop" alt="Artikel" class="w-full h-[240px] sm:h-[280px] object-cover rounded-2xl">
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-3 left-3 right-3">
                <h3 class="text-xl sm:text-2xl font-bold text-white leading-tight">Ketahanan Sosial di Tengah Perubahan</h3>
                <div class="flex gap-3 items-center text-white/80 text-xs mt-2">
                    <span>Redaksi</span>
                    <span class="w-1 h-1 bg-white/60 rounded-full"></span>
                    <span>27/01, 09.00</span>
                </div>
                <p class="text-sm text-white/90 mt-2">Ulasan perspektif warga terhadap kebijakan baru yang memengaruhi keseharian.</p>
            </div>
        </a>
        <div class="lg:col-span-7">
            <div class="grid grid-cols-2 gap-3">
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1510936111840-65e151ad71bb?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Warga Menilai Program Bantuan Tepat Sasaran?</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 08.45</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Dampak Ekonomi Mikro di Lingkungan Kota</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 08.10</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Komunitas Berperan dalam Edukasi Lingkungan</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 07.40</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1487014679447-9f8336841d58?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Ruang Publik Aman untuk Diskusi Warga</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 07.15</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="mb-16">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
            <h2>Olah Bola</h2>
        </div>
        <a href="#" class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
            Artikel Lainnya
            <span>›</span>
        </a>
    </div>
    <div class="grid lg:grid-cols-12 gap-4 items-start mb-8">
        <a href="#" class="lg:col-span-5 rounded-2xl overflow-hidden no-underline block relative">
            <img src="https://images.unsplash.com/photo-1508098682722-e99c43a406b2?w=1200&h=630&fit=crop" alt="Artikel" class="w-full h-[240px] sm:h-[280px] object-cover rounded-2xl">
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-3 left-3 right-3">
                <h3 class="text-xl sm:text-2xl font-bold text-white leading-tight">Strategi Baru Klub untuk Musim Panas</h3>
                <div class="flex gap-3 items-center text-white/80 text-xs mt-2">
                    <span>Redaksi</span>
                    <span class="w-1 h-1 bg-white/60 rounded-full"></span>
                    <span>27/01, 09.20</span>
                </div>
                <p class="text-sm text-white/90 mt-2">Analisis pergantian pemain dan pola permainan yang diusung pelatih.</p>
            </div>
        </a>
        <div class="lg:col-span-7">
            <div class="grid grid-cols-2 gap-3">
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1517649763962-0c623066013b?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Laporan Latihan Pramusim Klub Utama</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 08.50</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1521417531732-2030430fbb3c?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Prediksi Liga: Peluang Juara dan Kuda Hitam</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 08.05</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1512601091-8b2b1c49a2ee?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Peran Akademi dalam Pasokan Pemain Muda</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 07.35</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Efisiensi Anggaran Klub di Musim Transisi</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 07.05</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="mb-16">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
            <h2>Wahana</h2>
        </div>
        <a href="#" class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
            Artikel Lainnya
            <span>›</span>
        </a>
    </div>
    <div class="grid lg:grid-cols-12 gap-4 items-start mb-8">
        <a href="#" class="lg:col-span-5 rounded-2xl overflow-hidden no-underline block relative">
            <img src="https://images.unsplash.com/photo-1515847049296-a281d6401047?w=1200&h=630&fit=crop" alt="Artikel" class="w-full h-[240px] sm:h-[280px] object-cover rounded-2xl">
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-3 left-3 right-3">
                <h3 class="text-xl sm:text-2xl font-bold text-white leading-tight">Transportasi Publik: Rute dan Kenyamanan Baru</h3>
                <div class="flex gap-3 items-center text-white/80 text-xs mt-2">
                    <span>Redaksi</span>
                    <span class="w-1 h-1 bg-white/60 rounded-full"></span>
                    <span>27/01, 09.10</span>
                </div>
                <p class="text-sm text-white/90 mt-2">Menguji layanan baru pada rute utama dan dampaknya bagi mobilitas warga.</p>
            </div>
        </a>
        <div class="lg:col-span-7">
            <div class="grid grid-cols-2 gap-3">
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1499346030926-9a72daac6c63?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Konektivitas Antar Moda Semakin Baik</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 08.40</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Uji Coba Tiket Terintegrasi</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 08.00</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1477587458883-47145ed94245?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Kenyamanan Stasiun Ditingkatkan</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 07.30</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Riset Pola Perjalanan Harian Warga</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 07.00</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="mb-16">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
            <h2>Cerita Rasa</h2>
        </div>
        <a href="#" class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
            Artikel Lainnya
            <span>›</span>
        </a>
    </div>
    <div class="grid lg:grid-cols-12 gap-4 items-start mb-8">
        <a href="#" class="lg:col-span-5 rounded-2xl overflow-hidden no-underline block relative">
            <img src="https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?w=1200&h=630&fit=crop" alt="Artikel" class="w-full h-[240px] sm:h-[280px] object-cover rounded-2xl">
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-3 left-3 right-3">
                <h3 class="text-xl sm:text-2xl font-bold text-white leading-tight">Jejak Rasa di Warung Pinggir Kota</h3>
                <div class="flex gap-3 items-center text-white/80 text-xs mt-2">
                    <span>Redaksi</span>
                    <span class="w-1 h-1 bg-white/60 rounded-full"></span>
                    <span>27/01, 09.05</span>
                </div>
                <p class="text-sm text-white/90 mt-2">Eksplorasi menu sederhana yang menyimpan cerita keluarga dan budaya.</p>
            </div>
        </a>
        <div class="lg:col-span-7">
            <div class="grid grid-cols-2 gap-3">
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1511690654501-1e8a65ea7e33?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Resep Rahasia Sambal Keluarga</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 08.30</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Kopi Lokal Menembus Pasar Dunia</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 08.00</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1540189549336-e6e99c3679fe?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Kuliner Jalanan Ramah Dompet</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 07.25</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1495197354-3980bd7b118d?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Mencicipi Varian Nusantara di Satu Meja</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 06.55</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="mb-16">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
            <h2>Jagat Kita</h2>
        </div>
        <a href="#" class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
            Artikel Lainnya
            <span>›</span>
        </a>
    </div>
    <div class="grid lg:grid-cols-12 gap-4 items-start mb-8">
        <a href="#" class="lg:col-span-5 rounded-2xl overflow-hidden no-underline block relative">
            <img src="https://images.unsplash.com/photo-1469474968028-56623f02e42e?w=1200&h=630&fit=crop" alt="Artikel" class="w-full h-[240px] sm:h-[280px] object-cover rounded-2xl">
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-3 left-3 right-3">
                <h3 class="text-xl sm:text-2xl font-bold text-white leading-tight">Gerakan Komunitas Menghijaukan Lingkungan</h3>
                <div class="flex gap-3 items-center text-white/80 text-xs mt-2">
                    <span>Redaksi</span>
                    <span class="w-1 h-1 bg-white/60 rounded-full"></span>
                    <span>27/01, 09.40</span>
                </div>
                <p class="text-sm text-white/90 mt-2">Aksi nyata warga dalam merawat ruang hijau dan kualitas udara.</p>
            </div>
        </a>
        <div class="lg:col-span-7">
            <div class="grid grid-cols-2 gap-3">
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1520971342614-5f8c1f3c3a2b?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Edukasi Daur Ulang di Sekolah</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 09.15</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1446776811953-b23d57bd21aa?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Bank Sampah Digital</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 08.50</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1470240731273-7821a6eeb6bd?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Pertanian Urban Memanfaatkan Lahan Sempit</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 08.20</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Jalur Sepeda Ramah Anak</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 07.55</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="mb-16">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
            <h2>Politik</h2>
        </div>
        <a href="#" class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
            Artikel Lainnya
            <span>›</span>
        </a>
    </div>
    <div class="grid lg:grid-cols-12 gap-4 items-start mb-8">
        <a href="#" class="lg:col-span-5 rounded-2xl overflow-hidden no-underline block relative">
            <img src="https://images.unsplash.com/photo-1529101091764-c3526daf38fe?w=1200&h=630&fit=crop" alt="Artikel" class="w-full h-[240px] sm:h-[280px] object-cover rounded-2xl">
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-3 left-3 right-3">
                <h3 class="text-xl sm:text-2xl font-bold text-white leading-tight">Masih Efektifkah Normalisasi Sungai Mengatasi Banjir Jakarta</h3>
                <div class="flex gap-3 items-center text-white/80 text-xs mt-2">
                    <span>Redaksi</span>
                    <span class="w-1 h-1 bg-white/60 rounded-full"></span>
                    <span>27/01, 09.30</span>
                </div>
                <p class="text-sm text-white/90 mt-2">Normalisasi tiga sungai menjadi cara pemerintah menangani banjir. Efektifkah?</p>
            </div>
        </a>
        <div class="lg:col-span-7">
            <div class="grid grid-cols-2 gap-3">
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1543269865-cbf427effbad?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Menkes: Hasil CKG Anak Terbanyak Masalah Gigi dan Hipertensi</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 08.20</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">DPR Sahkan 9 Anggota Ombudsman RI Periode 2026-2031</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 07.10</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1457296898342-cdd24585d095?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Tim SAR Evakuasi 47 Jenazah Korban Longsor Cisarua</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 06.30</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1516245834210-c4c142787335?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Kebijakan Baru Pengelolaan Sampah Perkotaan</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Redaksi</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>27/01, 06.00</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Ad Placeholder -->
<div class="bg-blue-100 border border-blue-300 rounded-lg py-8 text-center text-blue-800 text-sm font-medium my-12">AdSense</div>

<!-- Horison -->
<section class="mb-16">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
            <h2>Horison</h2>
        </div>
        <a href="#" class="text-yellow-450 no-underline text-sm font-medium flex items-center gap-1 hover:text-yellow-550">
            Artikel Lainnya
            <span>›</span>
        </a>
    </div>
    <div class="grid lg:grid-cols-12 gap-4 items-start mb-8">
        <a href="#" class="lg:col-span-5 rounded-2xl overflow-hidden no-underline block relative">
            <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=1200&h=630&fit=crop" alt="Artikel" class="w-full h-[240px] sm:h-[280px] object-cover rounded-2xl">
            <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>
            <div class="absolute bottom-3 left-3 right-3">
                <h3 class="text-xl sm:text-2xl font-bold text-white leading-tight">Naluri Melindungi Keluarga Berujung Masalah</h3>
                <div class="flex gap-3 items-center text-white/80 text-xs mt-2">
                    <span>Khaerunnisa</span>
                    <span class="w-1 h-1 bg-white/60 rounded-full"></span>
                    <span>27/01, 08.00</span>
                </div>
                <p class="text-sm text-white/90 mt-2">Normalisasi tiga sungai menjadi cara pemerintah menangani banjir. Efektifkah? Rangkuman perspektif dan data lapangan dalam satu bacaan.</p>
            </div>
        </a>
        <div class="lg:col-span-7">
            <div class="grid grid-cols-2 gap-3">
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Belajar Mendaki Di Pangradinan</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Yosal Iriantara</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>25/01, 19.00</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1579621970563-ebec7560ff3e?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Mendapatkan Uang Dalam Karung</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Yosal Iriantara</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>26/01, 05.00</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1487014679447-9f8336841d58?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Gaya Hidup Cepat Membuat Malas Berpikir</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Khaerunnisa</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>25/01, 23.00</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1510936111840-65e151ad71bb?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Tim SAR Evakuasi 47 Jenazah Korban Longsor Cisarua</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Khaerunnisa</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>26/01, 23.00</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1510936111840-65e151ad71bb?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Tim SAR Evakuasi 47 Jenazah Korban Longsor Cisarua</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Khaerunnisa</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>26/01, 23.00</span>
                        </div>
                    </div>
                </a>
                <a href="#" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
                    <img src="https://images.unsplash.com/photo-1510936111840-65e151ad71bb?w=200&h=200&fit=crop" alt="Artikel" class="w-20 h-20 object-cover rounded-lg">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Tim SAR Evakuasi 47 Jenazah Korban Longsor Cisarua</div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>Khaerunnisa</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>26/01, 23.00</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Ad Placeholder -->
<div class="bg-blue-100 border border-blue-300 rounded-lg py-8 text-center text-blue-800 text-sm font-medium my-12">AdSense</div>
@endsection

@push('scripts')
<script>
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
        container.style.transform = `translateX(-${currentSlide * 100}%)`;

        // Update dots
        const dots = dotsContainer.children;
        for (let i = 0; i < dots.length; i++) {
            dots[i].className = 'w-2 h-2 bg-white/50 rounded-full cursor-pointer transition-all' + (i === currentSlide ? ' bg-yellow-450 w-6' : '');
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

    // Auto-play carousel
    setInterval(nextSlide, 5000);

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

    const FALLBACK_IMG = 'data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630"><rect width="100%" height="100%" fill="%23e5e7eb"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="%236b7280" font-family="sans-serif" font-size="24">Image unavailable</text></svg>';
    Array.from(document.querySelectorAll('img')).forEach(img => {
        img.addEventListener('error', () => {
            img.src = FALLBACK_IMG;
        }, { once: true });
    });
</script>
@endpush
