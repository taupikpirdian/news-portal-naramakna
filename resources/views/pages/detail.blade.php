@extends('layouts.app')
@section('title', 'Naramakna - Cerdas Memaknai')
@section('content')
<div class="grid grid-cols-12 gap-8">
    <div class="hidden lg:block col-span-1">
    <div class="sticky top-[140px] flex flex-col items-center gap-2">
        <div class="text-xs font-medium text-gray-600">Bagikan</div>
        <a id="sVerticalTwitter" href="#" title="Bagikan di Twitter" aria-label="Bagikan di Twitter" class="w-9 h-9 rounded-full bg-[#1DA1F2] text-white flex items-center justify-center no-underline">
        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
            <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
        </svg>
        </a>
        <a id="sVerticalWhatsApp" href="#" title="Bagikan di WhatsApp" aria-label="Bagikan di WhatsApp" class="w-9 h-9 rounded-full bg-[#25D366] text-white flex items-center justify-center no-underline">
        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
            <path d="M20.52 3.48A11.94 11.94 0 0012 0C5.37 0 0 5.37 0 12c0 2.1.55 4.06 1.52 5.77L0 24l6.4-1.68A12 12 0 0012 24c6.63 0 12-5.37 12-12 0-3.2-1.25-6.22-3.48-8.52zM12 21.6c-1.86 0-3.6-.5-5.12-1.44l-.36-.22-3.8 1 1.02-3.7-.24-.38A9.6 9.6 0 1121.6 12c0 5.3-4.3 9.6-9.6 9.6zm5.44-6.68c-.3-.16-1.77-.87-2.05-.97-.27-.1-.47-.16-.68.16-.2.3-.78.96-.95 1.16-.18.2-.35.23-.65.08-.3-.16-1.27-.47-2.42-1.49-.9-.8-1.5-1.78-1.67-2.08-.17-.3-.02-.46.13-.62.14-.14.3-.34.46-.52.15-.18.2-.3.3-.5.1-.2.05-.38-.02-.54-.08-.16-.68-1.64-.94-2.25-.25-.6-.5-.52-.68-.53l-.58-.01c-.2 0-.53.08-.82.38-.28.3-1.08 1.06-1.08 2.58s1.11 2.98 1.27 3.18c.16.2 2.18 3.33 5.3 4.6.74.32 1.32.51 1.77.65.74.24 1.42.21 1.96.13.6-.09 1.77-.72 2.02-1.41.25-.68.25-1.26.18-1.38-.07-.12-.26-.2-.56-.36z"/>
        </svg>
        </a>
        <a id="sVerticalFacebook" href="#" title="Bagikan di Facebook" aria-label="Bagikan di Facebook" class="w-9 h-9 rounded-full bg-[#1877F2] text-white flex items-center justify-center no-underline">
        <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
        </svg>
        </a>
    </div>
    </div>

    <article itemscope itemtype="https://schema.org/Article" class="col-span-12 lg:col-span-8 bg-white rounded-2xl shadow-sm p-6">
    <header class="mb-6">
        <a id="badgeCategory" href="#" class="inline-block px-3 py-1.5 bg-yellow-450 text-white text-xs font-semibold rounded-full no-underline">Kategori</a>
        <h1 id="articleTitle" itemprop="headline" class="text-3xl sm:text-4xl font-bold text-gray-900 mt-4 leading-tight">Judul Artikel</h1>
        <div class="flex flex-wrap gap-3 items-center text-gray-600 text-sm mt-3">
        <span id="articleAuthor" itemprop="author">Penulis</span>
        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
        <time id="articleDate" itemprop="datePublished" datetime="">Tanggal</time>
        <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
        <span id="articleCategory">Kategori</span>
        </div>
    </header>

    <figure class="mb-6">
        <img id="featuredImage" src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=630&fit=crop" alt="Featured" class="w-full rounded-xl object-cover max-h-[520px]">
        <figcaption id="imageCaption" class="text-xs text-gray-500 mt-2">Keterangan gambar</figcaption>
    </figure>

    <section id="articleContent" itemprop="articleBody" class="prose prose-lg max-w-none text-gray-800">
        <p>Paragraf pembuka yang kuat untuk mengajak pembaca memahami konteks cerita.</p>
        <p>Paragraf lanjutan dengan ritme yang nyaman dibaca, memperkuat argumen dan narasi.</p>
        <h2>Subjudul</h2>
        <p>Bagian isi dengan penekanan tertentu, kalimat yang tidak terlalu panjang dan tetap fokus pada inti.</p>
        <blockquote class="border-l-4 border-yellow-450 pl-4 italic text-gray-700">Kutipan yang relevan untuk memperkuat gagasan utama.</blockquote>
        <ul>
        <li>Poin penting pertama</li>
        <li>Poin penting kedua</li>
        <li>Poin penting ketiga</li>
        </ul>
    </section>

    <div class="flex flex-wrap items-center gap-2 mt-8">
        <span class="text-sm text-gray-600">Tag:</span>
        <a href="#" class="px-3 py-1.5 text-xs font-medium rounded-full no-underline bg-gray-100 text-gray-700">Kebijakan</a>
        <a href="#" class="px-3 py-1.5 text-xs font-medium rounded-full no-underline bg-gray-100 text-gray-700">Lingkungan</a>
        <a href="#" class="px-3 py-1.5 text-xs font-medium rounded-full no-underline bg-gray-100 text-gray-700">Ekonomi</a>
    </div>

    <div class="mt-10 bg-gray-50 border border-gray-200 rounded-2xl p-8 text-center">
        <h4 class="text-base font-semibold text-gray-900">Ikuti Naramakna.id di Media Sosial</h4>
        <p class="text-sm text-gray-600 mt-2">Dapatkan update berita terbaru dan konten menarik lainnya</p>
        <div class="flex justify-center items-center gap-5 mt-4 text-gray-600">
        <a href="#" aria-label="Instagram" class="no-underline hover:text-yellow-450 transition-colors">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor" stroke-width="2"/><circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2"/><circle cx="17.5" cy="6.5" r="1.5" fill="currentColor"/></svg>
        </a>
        <a href="#" aria-label="Facebook" class="no-underline hover:text-yellow-450 transition-colors">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987H8.078v-2.89h2.36V9.845c0-2.33 1.392-3.617 3.523-3.617 1.021 0 2.09.182 2.09.182v2.297h-1.178c-1.162 0-1.523.72-1.523 1.458v1.75h2.59l-.414 2.89h-2.176v6.987C18.343 21.128 22 16.991 22 12z" fill="currentColor"/></svg>
        </a>
        <a href="#" aria-label="Twitter" class="no-underline hover:text-yellow-450 transition-colors">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M23 3.5a9.5 9.5 0 01-2.74.75A4.76 4.76 0 0022.4 2a9.43 9.43 0 01-3 1.14A4.74 4.74 0 0016.04 2c-2.63 0-4.76 2.19-4.76 4.88 0 .38.04.76.12 1.12A13.4 13.4 0 013 3.05a4.92 4.92 0 00-.64 2.45 4.9 4.9 0 002.1 4.07 4.64 4.64 0 01-2.16-.62v.06c0 2.41 1.67 4.42 3.88 4.88a4.7 4.7 0 01-2.15.09 4.76 4.76 0 004.44 3.35A9.51 9.51 0 012 19.54 13.35 13.35 0 009.29 22c8.3 0 12.85-7.1 12.85-13.26 0-.2 0-.39-.01-.59A9.3 9.3 0 0023 3.5z" fill="currentColor"/></svg>
        </a>
        <a href="#" aria-label="YouTube" class="no-underline hover:text-yellow-450 transition-colors">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><rect x="2" y="6" width="20" height="12" rx="3" stroke="currentColor" stroke-width="2"/><path d="M10 9l6 3-6 3V9z" fill="currentColor"/></svg>
        </a>
        <a href="#" aria-label="TikTok" class="no-underline hover:text-yellow-450 transition-colors">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none"><path d="M14 3v4.5a5.5 5.5 0 005 0V10a7.5 7.5 0 01-5-1.5V14a4 4 0 11-3-3.87V7.5A6.5 6.5 0 008 7a6 6 0 106 6V3z" fill="currentColor"/></svg>
        </a>
        </div>
    </div>
    </article>

    <aside class="col-span-12 lg:col-span-3">
    <div class="bg-white rounded-2xl shadow-sm p-4 mb-6">
        <h3 class="text-base font-semibold text-gray-900 mb-3">Artikel Populer</h3>
        <div class="space-y-3">
        <a href="#" class="flex gap-3 no-underline rounded-xl p-2 hover:bg-gray-50">
            <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=120&h=120&fit=crop" alt="" class="w-16 h-16 object-cover rounded-lg">
            <div class="flex-1">
            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Spesies Baru Ditemukan dari Lini Masa</div>
            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                <span>Khaerunnisa</span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span>27/01, 05.00</span>
            </div>
            </div>
        </a>
        <a href="#" class="flex gap-3 no-underline rounded-xl p-2 hover:bg-gray-50">
            <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?w=120&h=120&fit=crop" alt="" class="w-16 h-16 object-cover rounded-lg">
            <div class="flex-1">
            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Sentuhan Orang Indonesia Dalam Lagu Kebangsaan Malaysia</div>
            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                <span>Yosal Iriantara</span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span>27/01, 02.00</span>
            </div>
            </div>
        </a>
        </div>
    </div>
    <div class="bg-white rounded-2xl shadow-sm p-4">
        <h3 class="text-base font-semibold text-gray-900 mb-3">Artikel Terbaru</h3>
        <div class="space-y-3">
        <a href="#" class="flex gap-3 no-underline rounded-xl p-2 hover:bg-gray-50">
            <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=120&h=120&fit=crop" alt="" class="w-16 h-16 object-cover rounded-lg">
            <div class="flex-1">
            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Naluri Melindungi Keluarga Berujung Masalah</div>
            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                <span>Khaerunnisa</span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span>26/01, 01.00</span>
            </div>
            </div>
        </a>
        <a href="#" class="flex gap-3 no-underline rounded-xl p-2 hover:bg-gray-50">
            <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=120&h=120&fit=crop" alt="" class="w-16 h-16 object-cover rounded-lg">
            <div class="flex-1">
            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">Belajar Mendaki Di Pangradinan</div>
            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                <span>Yosal Iriantara</span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span>25/01, 19.00</span>
            </div>
            </div>
        </a>
        </div>
    </div>
    </aside>
</div>

<section class="mt-10 mb-6">
    <h3 class="text-xl font-bold text-gray-900 mb-4">Artikel Terkait</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
    <a href="#" class="bg-white rounded-xl overflow-hidden no-underline transition-all shadow-sm hover:shadow-xl hover:-translate-y-1 group">
        <div class="relative">
        <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=400&h=300&fit=crop" alt="Artikel" class="w-full h-[200px] object-cover">
        <span class="absolute top-3 left-3 px-2.5 py-1 bg-yellow-450 text-white text-xs font-semibold rounded-full">Horison</span>
        </div>
        <div class="p-4">
        <h4 class="text-base font-semibold text-gray-800 mb-2 leading-snug line-clamp-2 group-hover:text-yellow-450">Naluri Melindungi Keluarga Berujung Masalah</h4>
        <div class="flex gap-2 items-center text-xs text-gray-500">
            <span>Khaerunnisa</span>
            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
            <span>26/01, 01.00</span>
        </div>
        </div>
    </a>
    <a href="#" class="bg-white rounded-xl overflow-hidden no-underline transition-all shadow-sm hover:shadow-xl hover:-translate-y-1 group">
        <div class="relative">
        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=400&h=300&fit=crop" alt="Artikel" class="w-full h-[200px] object-cover">
        <span class="absolute top-3 left-3 px-2.5 py-1 bg-yellow-450 text-white text-xs font-semibold rounded-full">Horison</span>
        </div>
        <div class="p-4">
        <h4 class="text-base font-semibold text-gray-800 mb-2 leading-snug line-clamp-2 group-hover:text-yellow-450">Belajar Mendaki Di Pangradinan</h4>
        <div class="flex gap-2 items-center text-xs text-gray-500">
            <span>Yosal Iriantara</span>
            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
            <span>25/01, 19.00</span>
        </div>
        </div>
    </a>
    <a href="#" class="bg-white rounded-xl overflow-hidden no-underline transition-all shadow-sm hover:shadow-xl hover:-translate-y-1 group">
        <div class="relative">
        <img src="https://images.unsplash.com/photo-1493612276216-ee3925520721?w=400&h=300&fit=crop" alt="Artikel" class="w-full h-[200px] object-cover">
        <span class="absolute top-3 left-3 px-2.5 py-1 bg-yellow-450 text-white text-xs font-semibold rounded-full">Horison</span>
        </div>
        <div class="p-4">
        <h4 class="text-base font-semibold text-gray-800 mb-2 leading-snug line-clamp-2 group-hover:text-yellow-450">Sentuhan Orang Indonesia Dalam Lagu Kebangsaan Malaysia</h4>
        <div class="flex gap-2 items-center text-xs text-gray-500">
            <span>Yosal Iriantara</span>
            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
            <span>27/01, 02.00</span>
        </div>
        </div>
    </a>
    <a href="#" class="bg-white rounded-xl overflow-hidden no-underline transition-all shadow-sm hover:shadow-xl hover:-translate-y-1 group">
        <div class="relative">
        <img src="https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=400&h=300&fit=crop" alt="Artikel" class="w-full h-[200px] object-cover">
        <span class="absolute top-3 left-3 px-2.5 py-1 bg-yellow-450 text-white text-xs font-semibold rounded-full">Horison</span>
        </div>
        <div class="p-4">
        <h4 class="text-base font-semibold text-gray-800 mb-2 leading-snug line-clamp-2 group-hover:text-yellow-450">Spesies Baru Ditemukan dari Lini Masa</h4>
        <div class="flex gap-2 items-center text-xs text-gray-500">
            <span>Khaerunnisa</span>
            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
            <span>27/01, 05.00</span>
        </div>
        </div>
    </a>
    </div>
</section>
@endsection

@push('scripts')
<script type="application/ld+json" id="articleJsonLd">{}</script>
@verbatim
<script>
const params = new URLSearchParams(location.search);
const slug = params.get('id') || 'contoh-artikel';
const data = window.__ARTICLE__ || {
    title: 'Tubuh Warga Kecil Dipaksa Bicara',
    author: 'Khaerunnisa',
    date: '2026-01-27T08:00:00+07:00',
    date_display: '27/01, 08.00',
    category: 'Horison',
    category_slug: 'horison',
    image: 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=630&fit=crop',
    image_caption: 'Ilustrasi berita harian',
    description: 'Bacaan mendalam tentang warga kecil yang dipaksa bicara.',
    tags: ['Kebijakan','Lingkungan','Ekonomi'],
    content: [
    'Paragraf pembuka yang kuat untuk mengajak pembaca memahami konteks cerita.',
    'Paragraf lanjutan dengan ritme yang nyaman dibaca, memperkuat argumen dan narasi.',
    'Bagian isi dengan penekanan tertentu, kalimat yang tidak terlalu panjang dan tetap fokus pada inti.'
    ]
};

function populateArticle(d) {
    document.title = `${d.title} — Naramakna`;
    const titleEl = document.getElementById('articleTitle');
    const authorEl = document.getElementById('articleAuthor');
    const dateEl = document.getElementById('articleDate');
    const categoryEl = document.getElementById('articleCategory');
    const badgeEl = document.getElementById('badgeCategory');
    const crumbCategory = document.getElementById('crumbCategory');
    const crumbTitle = document.getElementById('crumbTitle');
    const imgEl = document.getElementById('featuredImage');
    const imgCap = document.getElementById('imageCaption');
    const contentEl = document.getElementById('articleContent');

    titleEl.textContent = d.title;
    authorEl.textContent = d.author;
    dateEl.textContent = d.date_display;
    dateEl.setAttribute('datetime', d.date);
    categoryEl.textContent = d.category;
    badgeEl.textContent = d.category;
    crumbCategory.textContent = d.category;
    crumbTitle.textContent = d.title;
    imgEl.src = d.image;
    imgEl.alt = d.title;
    imgCap.textContent = d.image_caption || '';

    contentEl.innerHTML = '';
    d.content.forEach(p => {
    const para = document.createElement('p');
    para.textContent = p;
    contentEl.appendChild(para);
    });

    const shareUrl = encodeURIComponent(location.href);
    const shareText = encodeURIComponent(d.title);
    document.getElementById('shareTwitter').href = `https://twitter.com/intent/tweet?url=${shareUrl}&text=${shareText}`;
    document.getElementById('shareWhatsApp').href = `https://wa.me/?text=${shareText}%20${shareUrl}`;
    document.getElementById('shareFacebook').href = `https://www.facebook.com/sharer/sharer.php?u=${shareUrl}`;
    const sTw = document.getElementById('sVerticalTwitter');
    const sWa = document.getElementById('sVerticalWhatsApp');
    const sFb = document.getElementById('sVerticalFacebook');
    if (sTw) sTw.href = `https://twitter.com/intent/tweet?url=${shareUrl}&text=${shareText}`;
    if (sWa) sWa.href = `https://wa.me/?text=${shareText}%20${shareUrl}`;
    if (sFb) sFb.href = `https://www.facebook.com/sharer/sharer.php?u=${shareUrl}`;

    const ld = {
    '@context': 'https://schema.org',
    '@type': 'Article',
    'headline': d.title,
    'datePublished': d.date,
    'dateModified': d.date,
    'author': {'@type':'Person','name': d.author},
    'image': d.image,
    'articleSection': d.category,
    'description': d.description,
    'mainEntityOfPage': location.href
    };
    document.getElementById('articleJsonLd').textContent = JSON.stringify(ld);
    document.querySelector('meta[name="description"]').setAttribute('content', d.description);
    document.querySelector('meta[property="og:title"]').setAttribute('content', d.title);
    document.querySelector('meta[property="og:description"]').setAttribute('content', d.description);
    document.querySelector('meta[property="og:image"]').setAttribute('content', d.image);
    document.querySelector('meta[property="og:url"]').setAttribute('content', location.href);
}

populateArticle(data);
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