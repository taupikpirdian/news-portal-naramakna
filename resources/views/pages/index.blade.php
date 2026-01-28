@extends('layouts.app')
@section('title', 'Naramakna')

@section('content')
<div class="py-10">
    <div class="grid grid-cols-12 gap-8">
        <section class="col-span-12 lg:col-span-8">
            <div class="mb-8">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
                    <h2 class="text-xl font-bold">Headline</h2>
                </div>
                <a href="{{ url('/artikel?id=headline-utama') }}" class="group block no-underline">
                    <div class="relative rounded-2xl overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=630&fit=crop" alt="Headline" class="w-full h-[320px] sm:h-[380px] object-cover">
                        <span class="absolute top-4 left-4 px-3 py-1.5 bg-yellow-450 text-white text-xs font-semibold rounded-full">Horison</span>
                    </div>
                    <h3 class="text-2xl sm:text-3xl font-bold text-gray-900 mt-4 leading-tight group-hover:text-yellow-450">Pemerintah Dorong Ekonomi Hijau Lewat Regulasi Baru</h3>
                    <div class="text-sm text-gray-600 line-clamp-2 mt-1">Ringkasan kebijakan baru untuk mendorong transisi ekonomi hijau dan dampaknya bagi pelaku usaha.</div>
                    <div class="flex gap-3 items-center text-gray-600 text-sm mt-2">
                        <span>Khaerunnisa</span>
                        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                        <span>27/01, 08.00</span>
                    </div>
                </a>
            </div>

            <div class="mb-6">
                <div class="flex items-center gap-2 mb-3">
                    <div class="w-1 h-8 bg-yellow-450 rounded-full"></div>
                    <h2 class="text-xl font-bold">Berita Terbaru</h2>
                </div>
                <div class="divide-y divide-gray-200 bg-white rounded-2xl shadow-sm">
                    <a href="{{ url('/artikel?id=terbaru-1') }}" class="flex gap-4 p-4 no-underline hover:bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=240&h=240&fit=crop" alt="" class="w-24 h-24 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-base font-semibold text-gray-800 leading-snug line-clamp-2">Spesies Baru Ditemukan dari Lini Masa</div>
                            <div class="text-sm text-gray-600 line-clamp-2 mt-1">Rangkuman penemuan spesies baru yang menarik dari berbagai lini masa dan implikasinya.</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>Khaerunnisa</span><span class="w-1 h-1 bg-gray-300 rounded-full"></span><span>27/01, 05.00</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/artikel?id=terbaru-2') }}" class="flex gap-4 p-4 no-underline hover:bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?w=240&h=240&fit=crop" alt="" class="w-24 h-24 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-base font-semibold text-gray-800 leading-snug line-clamp-2">Sentuhan Orang Indonesia Dalam Lagu Kebangsaan Malaysia</div>
                            <div class="text-sm text-gray-600 line-clamp-2 mt-1">Kisah kontribusi kreator Indonesia dalam simbol kebangsaan Malaysia.</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>Yosal Iriantara</span><span class="w-1 h-1 bg-gray-300 rounded-full"></span><span>27/01, 02.00</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/artikel?id=terbaru-3') }}" class="flex gap-4 p-4 no-underline hover:bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=240&h=240&fit=crop" alt="" class="w-24 h-24 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-base font-semibold text-gray-800 leading-snug line-clamp-2">Belajar Mendaki Di Pangradinan</div>
                            <div class="text-sm text-gray-600 line-clamp-2 mt-1">Pengalaman mendaki dengan tips jalur dan keselamatan di Pangradinan.</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>Yosal Iriantara</span><span class="w-1 h-1 bg-gray-300 rounded-full"></span><span>25/01, 19.00</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/artikel?id=terbaru-4') }}" class="flex gap-4 p-4 no-underline hover:bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=240&h=240&fit=crop" alt="" class="w-24 h-24 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-base font-semibold text-gray-800 leading-snug line-clamp-2">Naluri Melindungi Keluarga Berujung Masalah</div>
                            <div class="text-sm text-gray-600 line-clamp-2 mt-1">Potret keputusan emosional yang berdampak pada hukum dan sosial.</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>Khaerunnisa</span><span class="w-1 h-1 bg-gray-300 rounded-full"></span><span>26/01, 01.00</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="mt-4 flex items-center justify-between">
                    <a id="paginationPrev" href="?page=1" class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 bg-white rounded-lg hover:bg-gray-50 no-underline">‹ Sebelumnya</a>
                    <div class="flex gap-2">
                        <a href="?page=1" data-page="1" class="pagination-link px-3 py-2 text-sm font-medium rounded-lg no-underline border border-gray-300 bg-white text-gray-700 hover:bg-yellow-50 hover:text-yellow-700">1</a>
                        <a href="?page=2" data-page="2" class="pagination-link px-3 py-2 text-sm font-medium rounded-lg no-underline border border-gray-300 bg-white text-gray-700 hover:bg-yellow-50 hover:text-yellow-700">2</a>
                        <a href="?page=3" data-page="3" class="pagination-link px-3 py-2 text-sm font-medium rounded-lg no-underline border border-gray-300 bg-white text-gray-700 hover:bg-yellow-50 hover:text-yellow-700">3</a>
                    </div>
                    <a id="paginationNext" href="?page=2" class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 bg-white rounded-lg hover:bg-gray-50 no-underline">Berikutnya ›</a>
                </div>
            </div>
        </section>

        <aside class="col-span-12 lg:col-span-4">
            <div class="bg-white rounded-2xl shadow-sm p-4 mb-6">
                <h3 class="text-base font-semibold text-gray-900 mb-3">Kategori</h3>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="px-3 py-1.5 text-xs font-medium rounded-full no-underline bg-gray-100 text-gray-700 hover:bg-yellow-50 hover:text-yellow-700">Horison</a>
                    <a href="#" class="px-3 py-1.5 text-xs font-medium rounded-full no-underline bg-gray-100 text-gray-700 hover:bg-yellow-50 hover:text-yellow-700">Narapandang</a>
                    <a href="#" class="px-3 py-1.5 text-xs font-medium rounded-full no-underline bg-gray-100 text-gray-700 hover:bg-yellow-50 hover:text-yellow-700">Laga & Gaya</a>
                    <a href="#" class="px-3 py-1.5 text-xs font-medium rounded-full no-underline bg-gray-100 text-gray-700 hover:bg-yellow-50 hover:text-yellow-700">Cerita Rasa</a>
                    <a href="#" class="px-3 py-1.5 text-xs font-medium rounded-full no-underline bg-gray-100 text-gray-700 hover:bg-yellow-50 hover:text-yellow-700">Wahana</a>
                </div>
            </div>
            <div class="bg-white rounded-2xl shadow-sm p-4">
                <h3 class="text-base font-semibold text-gray-900 mb-3">Trending</h3>
                <div class="space-y-3">
                    <a href="{{ url('/artikel?id=trend-1') }}" class="flex gap-3 no-underline rounded-xl p-2 hover:bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=120&h=120&fit=crop" alt="" class="w-16 h-16 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Gas Tertawa dan Hidup yang Terlalu Cepat</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>Khaerunnisa</span><span class="w-1 h-1 bg-gray-300 rounded-full"></span><span>26/01, 23.00</span>
                            </div>
                        </div>
                    </a>
                    <a href="{{ url('/artikel?id=trend-2') }}" class="flex gap-3 no-underline rounded-xl p-2 hover:bg-gray-50">
                        <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?w=120&h=120&fit=crop" alt="" class="w-16 h-16 object-cover rounded-lg">
                        <div class="flex-1">
                            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Sentuhan Orang Indonesia Dalam Lagu Kebangsaan Malaysia</div>
                            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                                <span>Yosal Iriantara</span><span class="w-1 h-1 bg-gray-300 rounded-full"></span><span>27/01, 02.00</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </aside>
    </div>
</div>
@endsection

@push('scripts')
@verbatim
<script type="application/ld+json" id="itemListJsonLd">{}</script>
<script>
    const items = [
        { title: 'Pemerintah Dorong Ekonomi Hijau Lewat Regulasi Baru', url: location.origin + '/artikel?id=headline-utama' },
        { title: 'Spesies Baru Ditemukan dari Lini Masa', url: location.origin + '/artikel?id=terbaru-1' },
        { title: 'Sentuhan Orang Indonesia Dalam Lagu Kebangsaan Malaysia', url: location.origin + '/artikel?id=terbaru-2' },
        { title: 'Belajar Mendaki Di Pangradinan', url: location.origin + '/artikel?id=terbaru-3' },
        { title: 'Naluri Melindungi Keluarga Berujung Masalah', url: location.origin + '/artikel?id=terbaru-4' }
    ];
    const ld = {
        '@context': 'https://schema.org',
        '@type': 'ItemList',
        'itemListElement': items.map((it, i) => ({
            '@type': 'ListItem',
            'position': i + 1,
            'url': it.url,
            'name': it.title
        }))
    };
    document.getElementById('itemListJsonLd').textContent = JSON.stringify(ld);

    const totalPages = 5;
    const params = new URLSearchParams(location.search);
    const currentPage = parseInt(params.get('page') || '1', 10);
    const pageLinks = document.querySelectorAll('.pagination-link');
    pageLinks.forEach(link => {
        const p = parseInt(link.dataset.page, 10);
        link.href = `?page=${p}`;
        if (p === currentPage) {
            link.className = 'pagination-link px-3 py-2 text-sm font-medium rounded-lg no-underline border border-yellow-450 bg-yellow-450 text-white';
            link.setAttribute('aria-current', 'page');
        }
    });
    const prevEl = document.getElementById('paginationPrev');
    const nextEl = document.getElementById('paginationNext');
    if (prevEl) {
        if (currentPage > 1) {
            prevEl.href = `?page=${currentPage - 1}`;
        } else {
            prevEl.classList.add('opacity-50', 'pointer-events-none');
        }
    }
    if (nextEl) {
        if (currentPage < totalPages) {
            nextEl.href = `?page=${currentPage + 1}`;
        } else {
            nextEl.classList.add('opacity-50', 'pointer-events-none');
        }
    }
    function openMoreSidebar() {
        const el = document.getElementById('moreSidebar');
        const panel = document.getElementById('moreSidebarPanel');
        if (!el || !panel) return;
        el.classList.remove('hidden');
        requestAnimationFrame(() => {
            el.classList.add('opacity-100');
            panel.classList.remove('translate-x-full');
        });
    }
    function closeMoreSidebar() {
        const el = document.getElementById('moreSidebar');
        const panel = document.getElementById('moreSidebarPanel');
        if (!el || !panel) return;
        el.classList.remove('opacity-100');
        panel.classList.add('translate-x-full');
        setTimeout(() => el.classList.add('hidden'), 300);
    }
    const FALLBACK_IMG = 'data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630"><rect width="100%" height="100%" fill="%23e5e7eb"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="%236b7280" font-family="sans-serif" font-size="24">Image unavailable</text></svg>';
    Array.from(document.querySelectorAll('img')).forEach(img => {
        img.addEventListener('error', () => {
            img.src = FALLBACK_IMG;
        }, { once: true });
    });
</script>
@endverbatim
@endpush
