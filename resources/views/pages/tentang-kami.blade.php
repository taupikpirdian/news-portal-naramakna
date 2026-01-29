@extends('layouts.app')
@section('title', 'Naramakna - Cerdas Memaknai')
@section('content')
<section class="relative -mx-[calc(50%-50vw)] bg-gray-900">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=1600&h=900&fit=crop')] bg-cover bg-center"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/30 to-black/10"></div>
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-20 sm:py-28">
        <div class="max-w-3xl text-white">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
                <span class="uppercase tracking-wider text-xs text-white/80">Tentang Kami</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-bold leading-tight">Cerdas Memaknai</h1>
            <p class="mt-3 text-white/90 text-sm sm:text-base">Platform media digital yang membantu publik menavigasi kompleksitas isu-isu kontemporer melalui <span class="font-bold text-green-600">jurnalisme data yang humanis</span>.</p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="#misi" class="px-4 py-2 rounded-lg bg-yellow-450 text-gray-900 font-semibold no-underline">Misi Kami</a>
                <a href="#nilai" class="px-4 py-2 rounded-lg bg-white/10 border border-white/20 text-white font-medium no-underline backdrop-blur-sm">Nilai Inti</a>
            </div>
        </div>
    </div>
</section>

<section id="siapa-kami" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-14">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
            <h2 class="text-2xl font-bold text-gray-900">Siapa Kami?</h2>
        </div>
    </div>
    <div class="grid lg:grid-cols-12 gap-8 items-start">
        <div class="lg:col-span-7">
            <div class="rounded-2xl bg-white border border-gray-200 p-6 sm:p-7">
                <div class="space-y-4 text-gray-700 text-sm sm:text-base">
                    <p>Naramakna.id adalah platform media digital yang lahir dari kebutuhan akan ruang dialog yang lebih bermakna di era informasi yang serba cepat. Kami hadir bukan hanya sebagai penyampai berita, melainkan sebagai katalis perubahan sosial yang mendorong masyarakat untuk berpikir lebih kritis dan mendalam.</p>
                    <p>Di tengah tsunami informasi digital yang sering kali membingungkan, kami berperan sebagai kompas intelektual yang membantu pembaca menavigasi kompleksitas isu-isu kontemporer. Kami percaya bahwa setiap peristiwa memiliki lapisan makna yang lebih dalam, yang layak untuk dieksplorasi bersama.</p>
                    <p>Melalui pendekatan <span class="font-bold text-green-600">jurnalisme data yang humanis</span>, kami menyajikan fakta dalam kemasan yang tidak hanya informatif, tetapi juga inspiratif. Setiap artikel yang kami terbitkan melewati proses kurasi yang ketat untuk memastikan akurasi, relevansi, dan dampak positif bagi masyarakat.</p>
                    <p>Dengan tagline <span class="font-bold text-orange-600">"Cerdas Memaknai"</span>, kami berkomitmen menjadi bagian dari ekosistem media yang sehat, di mana kebenaran, empati, dan dialog konstruktif menjadi fondasi utama dalam setiap karya jurnalistik kami.</p>
                    <p>Di tengah tsunami informasi digital yang sering kali membingungkan, kami berperan sebagai kompas intelektual yang membantu pembaca menavigasi kompleksitas isu-isu kontemporer. Kami percaya bahwa setiap peristiwa memiliki lapisan makna yang lebih dalam, yang layak untuk dieksplorasi bersama.</p>
                    <div class="relative rounded-2xl shadow-sm ring-1 ring-gray-200 bg-gradient-to-r from-orange-50 via-white to-blue-50">
                        <span class="absolute left-0 top-0 bottom-0 w-1 rounded-l-2xl bg-orange-500"></span>
                        <div class="px-5 py-4 text-center italic text-gray-600">
                            "Media bukan sekadar jendela informasi, tetapi cermin yang merefleksikan kedalaman pemahaman kita terhadap dunia."
                        </div>
                    </div>
                    <p>Melalui pendekatan <span class="font-bold text-green-600">jurnalisme data yang humanis</span>, kami menyajikan fakta dalam kemasan yang tidak hanya informatif, tetapi juga inspiratif. Setiap artikel yang kami terbitkan melewati proses kurasi yang ketat untuk memastikan akurasi, relevansi, dan dampak positif bagi masyarakat.</p>
                    <p>Dengan tagline <span class="font-bold text-orange-600">"Cerdas Memaknai"</span>, kami berkomitmen menjadi bagian dari ekosistem media yang sehat, di mana kebenaran, empati, dan dialog konstruktif menjadi fondasi utama dalam setiap karya jurnalistik kami.</p>
                </div>
                <div class="grid md:grid-cols-3 gap-4 mt-6">
                    <div class="rounded-xl border border-gray-200 p-4">
                        <div class="text-sm font-semibold text-gray-900">Kurasi Ketat</div>
                        <div class="text-xs text-gray-600 mt-1">Akurasi dan relevansi menjadi standar utama.</div>
                    </div>
                    <div class="rounded-xl border border-gray-200 p-4">
                        <div class="text-sm font-semibold text-gray-900">Humanis & Data</div>
                        <div class="text-xs text-gray-600 mt-1">Fakta bertemu empati dalam setiap narasi.</div>
                    </div>
                    <div class="rounded-xl border border-gray-200 p-4">
                        <div class="text-sm font-semibold text-gray-900">Dialog Konstruktif</div>
                        <div class="text-xs text-gray-600 mt-1">Mendorong ekosistem media yang sehat.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-5">
            <div class="relative rounded-2xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1551836022-3d01e8d8ab1b?w=1200&h=800&fit=crop" alt="Siapa Kami" class="w-full h-[240px] sm:h-[320px] object-cover rounded-2xl">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
                <div class="absolute bottom-3 left-3 right-3 text-white">
                    <div class="text-sm font-semibold">Cerdas Memaknai</div>
                    <div class="text-xs text-white/80 mt-1"><span class="font-bold text-green-600">Jurnalisme data yang humanis</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="misi" class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-14">
    <div class="flex items-center justify-between">
        <div class="flex items-center gap-2">
            <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
            <h2 class="text-2xl font-bold text-gray-900">Misi Kami</h2>
        </div>
    </div>
    <div class="grid lg:grid-cols-12 gap-8 items-center">
        <div class="lg:col-span-6">
            <p class="text-gray-700">Kami hadir sebagai kompas intelektual di tengah derasnya informasi. Setiap artikel melalui proses kurasi untuk memastikan akurasi, relevansi, dan dampak sosial yang positif.</p>
            <div class="grid grid-cols-2 gap-4 mt-6">
                <div class="rounded-xl border border-gray-200 p-4">
                    <div class="text-sm font-semibold text-gray-900">Jurnalisme Data Humanis</div>
                    <div class="text-xs text-gray-600 mt-1">Menghadirkan fakta yang informatif dan inspiratif.</div>
                </div>
                <div class="rounded-xl border border-gray-200 p-4">
                    <div class="text-sm font-semibold text-gray-900">Kurasi Ketat</div>
                    <div class="text-xs text-gray-600 mt-1">Menjaga kualitas, akurasi, dan relevansi.</div>
                </div>
                <div class="rounded-xl border border-gray-200 p-4">
                    <div class="text-sm font-semibold text-gray-900">Dialog Konstruktif</div>
                    <div class="text-xs text-gray-600 mt-1">Mendorong empati dan diskusi yang sehat.</div>
                </div>
                <div class="rounded-xl border border-gray-200 p-4">
                    <div class="text-sm font-semibold text-gray-900">Dampak Sosial</div>
                    <div class="text-xs text-gray-600 mt-1">Berpihak pada kebenaran dan kemaslahatan publik.</div>
                </div>
            </div>
        </div>
        <div class="lg:col-span-6">
            <div class="relative rounded-2xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1556157382-97eda2d9520e?w=1200&h=800&fit=crop" alt="Misi Naramakna" class="w-full h-[280px] sm:h-[360px] object-cover rounded-2xl">
                <div class="absolute inset-0 rounded-2xl bg-gradient-to-t from-black/50 via-black/10 to-transparent"></div>
                <div class="absolute bottom-3 left-3 right-3 text-white">
                    <div class="text-sm font-semibold">“Media bukan sekadar jendela informasi, tetapi cermin pemahaman.”</div>
                    <div class="text-xs text-white/80 mt-1">Naramakna.id</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-14">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
            <h2 class="text-2xl font-bold text-gray-900">Layanan Unggulan Kami</h2>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-gray-200 p-6">
                <div class="flex items-center gap-4">
                    <div class="w-16 h-16 rounded-xl bg-gradient-to-b from-orange-500 to-orange-600 text-white shadow-md ring-1 ring-white/20 flex items-center justify-center">
                        <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                            <path d="M6 16V11M12 16V8M18 16V13" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            <path d="M4 16h16" stroke="white" stroke-width="2" stroke-linecap="round"/>
                        </svg>
                    </div>
                    <div>
                        <div class="text-sm font-semibold text-gray-900">Data Intelligence</div>
                        <div class="text-xs text-gray-600">Layanan Unggulan</div>
                    </div>
                </div>
                <div class="mt-3 text-xs text-gray-600">Riset data, analisis, dan visualisasi untuk keputusan yang lebih tajam.</div>
        </div>
        <div class="rounded-2xl border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-b from-blue-500 to-blue-600 text-white shadow-md ring-1 ring-white/20 flex items-center justify-center">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                        <path d="M8 4h8a2 2 0 0 1 2 2v6l-6 6H8a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M12 8l3 3-5 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Creative Storytelling</div>
                    <div class="text-xs text-gray-600">Layanan Unggulan</div>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-600">Narasi editorial, visual, dan infografik yang menggugah dan informatif.</div>
        </div>
        <div class="rounded-2xl border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <div class="w-16 h-16 rounded-xl bg-gradient-to-b from-green-500 to-green-600 text-white shadow-md ring-1 ring-white/20 flex items-center justify-center">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                        <path d="M4 6h7v12H4z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M13 6h7v12h-7z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                        <path d="M11 6v12" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Strategic Publishing</div>
                    <div class="text-xs text-gray-600">Layanan Unggulan</div>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-600">Distribusi multi-kanal, timing optimal, dan praktik SEO yang efektif.</div>
        </div>
        
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-14">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
            <h2 class="text-2xl font-bold text-gray-900">Dewan Redaksi</h2>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <img class="w-16 h-16 rounded-xl object-cover" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=600&h=600&fit=crop" alt="Pemimpin Redaksi">
                <div>
                    <div class="text-sm font-semibold text-gray-900">Pemimpin Redaksi</div>
                    <div class="text-xs text-gray-600">Nama Person</div>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-600">Memimpin arah editorial, menjaga kualitas jurnalisme, dan membangun ekosistem diskusi publik yang sehat.</div>
        </div>
        <div class="rounded-2xl border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <img class="w-16 h-16 rounded-xl object-cover" src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=600&h=600&fit=crop" alt="Wakil Pemimpin Redaksi">
                <div>
                    <div class="text-sm font-semibold text-gray-900">Wakil Pemimpin Redaksi</div>
                    <div class="text-xs text-gray-600">Nama Person</div>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-600">Mengawal proses kurasi, koordinasi liputan, serta memastikan relevansi dan dampak sosial.</div>
        </div>
        <div class="rounded-2xl border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <img class="w-16 h-16 rounded-xl object-cover" src="https://images.unsplash.com/photo-1527980965255-d3b416303d12?w=600&h=600&fit=crop" alt="Redaktur Pelaksana">
                <div>
                    <div class="text-sm font-semibold text-gray-900">Redaktur Pelaksana</div>
                    <div class="text-xs text-gray-600">Nama Person</div>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-600">Mengelola produksi harian, menyunting naskah, dan memastikan konsistensi gaya editorial.</div>
        </div>
        <div class="rounded-2xl border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <img class="w-16 h-16 rounded-xl object-cover" src="https://images.unsplash.com/photo-1547425260-76bcadfb4f2c?w=600&h=600&fit=crop" alt="Editor Data">
                <div>
                    <div class="text-sm font-semibold text-gray-900">Editor Data</div>
                    <div class="text-xs text-gray-600">Nama Person</div>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-600">Mengolah data, membuat visualisasi, dan memperkaya narasi dengan sudut pandang berbasis bukti.</div>
        </div>
        <div class="rounded-2xl border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <img class="w-16 h-16 rounded-xl object-cover" src="https://images.unsplash.com/photo-1544005315-4dc0b5a9fb16?w=600&h=600&fit=crop" alt="Editor Visual">
                <div>
                    <div class="text-sm font-semibold text-gray-900">Editor Visual</div>
                    <div class="text-xs text-gray-600">Nama Person</div>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-600">Merancang identitas visual, infografik, dan pengalaman membaca yang nyaman.</div>
        </div>
        <div class="rounded-2xl border border-gray-200 p-6">
            <div class="flex items-center gap-4">
                <img class="w-16 h-16 rounded-xl object-cover" src="https://images.unsplash.com/photo-1544723795-3fb6469f9f13?w=600&h=600&fit=crop" alt="Editor Publikasi">
                <div>
                    <div class="text-sm font-semibold text-gray-900">Editor Publikasi</div>
                    <div class="text-xs text-gray-600">Nama Person</div>
                </div>
            </div>
            <div class="mt-3 text-xs text-gray-600">Mengelola distribusi multi-kanal, optimasi SEO, dan jadwal publikasi strategis.</div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-12">
    <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-600 text-white p-8 sm:p-10 shadow-xl">
        <div class="text-center">
            <h2 class="text-2xl sm:text-3xl font-bold">Mari Bersama Membangun Narasi yang Bermakna</h2>
            <p class="mt-2 text-white/90 text-sm sm:text-base">Bergabunglah dengan komunitas pembaca cerdas yang peduli akan kualitas informasi dan kedalaman makna</p>
            <div class="mt-6 flex justify-center gap-3">
                <a href="#" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/80 text-white no-underline hover:bg-white/10">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                        <path d="M16.5 14.5c-.5-.25-1.5-.75-1.75-.85-.25-.1-.4-.1-.55.1-.15.2-.6.7-.75.85-.15.15-.3.15-.5.05-.2-.1-.85-.3-1.6-.95-.6-.55-1.05-1.23-1.17-1.43-.12-.2-.01-.31.09-.41.1-.1.2-.24.3-.36.1-.12.14-.21.21-.35.07-.14.03-.26-.02-.37-.05-.11-.49-1.16-.67-1.59-.18-.41-.36-.36-.49-.37h-.42c-.15 0-.39.06-.59.26-.2.2-.78.74-.78 1.8 0 1.06.8 2.09.91 2.24.11.15 1.58 2.35 3.83 3.29.54.22.95.36 1.27.46.53.17 1.02.14 1.4.09.43-.06 1.31-.53 1.5-1.04.19-.51.19-.95.13-1.04-.06-.09-.2-.15-.45-.27z" fill="currentColor"/>
                    </svg>
                    <span class="text-sm font-medium">Ikuti Konten Kami</span>
                </a>
                <a href="#" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/80 text-white no-underline hover:bg-white/10">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                        <path d="M16.5 14.5c-.5-.25-1.5-.75-1.75-.85-.25-.1-.4-.1-.55.1-.15.2-.6.7-.75.85-.15.15-.3.15-.5.05-.2-.1-.85-.3-1.6-.95-.6-.55-1.05-1.23-1.17-1.43-.12-.2-.01-.31.09-.41.1-.1.2-.24.3-.36.1-.12.14-.21.21-.35.07-.14.03-.26-.02-.37-.05-.11-.49-1.16-.67-1.59-.18-.41-.36-.36-.49-.37h-.42c-.15 0-.39.06-.59.26-.2.2-.78.74-.78 1.8 0 1.06.8 2.09.91 2.24.11.15 1.58 2.35 3.83 3.29.54.22.95.36 1.27.46.53.17 1.02.14 1.4.09.43-.06 1.31-.53 1.5-1.04.19-.51.19-.95.13-1.04-.06-.09-.2-.15-.45-.27z" fill="currentColor"/>
                    </svg>
                    <span class="text-sm font-medium">Hubungi Tim Kami</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
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
@endpush