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
                <span class="uppercase tracking-wider text-xs text-white/80">{{ $about['title'] ?? 'Tentang Kami' }}</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-bold leading-tight">{{ $about['hero_title'] ?? 'Cerdas Memaknai' }}</h1>
            <p class="mt-3 text-white/90 text-sm sm:text-base">Platform media digital yang membantu publik menavigasi kompleksitas isu-isu kontemporer melalui <span class="font-bold text-green-600">jurnalisme data yang humanis</span>.</p>
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
                    @foreach($heroParagraphs as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                    @if(empty($heroParagraphs))
                        <p>Naramakna.id adalah platform media digital yang lahir dari kebutuhan akan ruang dialog yang lebih bermakna di era informasi yang serba cepat. Kami hadir bukan hanya sebagai penyampai berita, melainkan sebagai katalis perubahan sosial yang mendorong masyarakat untuk berpikir lebih kritis dan mendalam.</p>
                        <p>Di tengah tsunami informasi digital yang sering kali membingungkan, kami berperan sebagai kompas intelektual yang membantu pembaca menavigasi kompleksitas isu-isu kontemporer. Kami percaya bahwa setiap peristiwa memiliki lapisan makna yang lebih dalam, yang layak untuk dieksplorasi bersama.</p>
                        <p>Melalui pendekatan <span class="font-bold text-green-600">jurnalisme data yang humanis</span>, kami menyajikan fakta dalam kemasan yang tidak hanya informatif, tetapi juga inspiratif. Setiap artikel yang kami terbitkan melewati proses kurasi yang ketat untuk memastikan akurasi, relevansi, dan dampak positif bagi masyarakat.</p>
                        <p>Dengan tagline <span class="font-bold text-orange-600">"Cerdas Memaknai"</span>, kami berkomitmen menjadi bagian dari ekosistem media yang sehat, di mana kebenaran, empati, dan dialog konstruktif menjadi fondasi utama dalam setiap karya jurnalistik kami.</p>
                    @endif
                    <div class="relative rounded-2xl shadow-sm ring-1 ring-gray-200 bg-gradient-to-r from-orange-50 via-white to-blue-50">
                        <span class="absolute left-0 top-0 bottom-0 w-1 rounded-l-2xl bg-orange-500"></span>
                        <div class="px-5 py-4 text-center italic text-gray-600">
                            "Media bukan sekadar jendela informasi, tetapi cermin yang merefleksikan kedalaman pemahaman kita terhadap dunia."
                        </div>
                    </div>
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
                <img src="{{ asset('assets/images/istockphoto-1492377092-612x612.jpg') }}" alt="Siapa Kami" class="w-full h-[240px] sm:h-[320px] object-cover rounded-2xl">
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
            <h2 class="text-2xl font-bold text-gray-900">Visi dan Misi Kami</h2>
        </div>
    </div>
    <div class="grid lg:grid-cols-12 gap-8 items-center">
        <div class="lg:col-span-6">
            @if($about && !empty($about['vision_content']))
                {!! $about['vision_content'] !!}
            @else
                <p class="text-gray-700">Kami hadir sebagai kompas intelektual di tengah derasnya informasi. Setiap artikel melalui proses kurasi untuk memastikan akurasi, relevansi, dan dampak sosial yang positif.</p>
            @endif
            <div class="grid grid-cols-2 gap-4 mt-6">
                @foreach($missionItems as $index => $item)
                    @if($index < 4)
                        <div class="rounded-xl border border-gray-200 p-4 bg-white">
                            <div class="text-sm font-semibold text-gray-900">{{ $item['title'] }}</div>
                            <div class="text-xs text-gray-600 mt-1">{{ $item['description'] }}</div>
                        </div>
                    @endif
                @endforeach
                @if(empty($missionItems))
                    <div class="rounded-xl border border-gray-200 p-4 bg-white">
                        <div class="text-sm font-semibold text-gray-900">Jurnalisme Data Humanis</div>
                        <div class="text-xs text-gray-600 mt-1">Menghadirkan fakta yang informatif dan inspiratif.</div>
                    </div>
                    <div class="rounded-xl border border-gray-200 p-4 bg-white">
                        <div class="text-sm font-semibold text-gray-900">Kurasi Ketat</div>
                        <div class="text-xs text-gray-600 mt-1">Menjaga kualitas, akurasi, dan relevansi.</div>
                    </div>
                    <div class="rounded-xl border border-gray-200 p-4 bg-white">
                        <div class="text-sm font-semibold text-gray-900">Dialog Konstruktif</div>
                        <div class="text-xs text-gray-600 mt-1">Mendorong empati dan diskusi yang sehat.</div>
                    </div>
                    <div class="rounded-xl border border-gray-200 p-4 bg-white">
                        <div class="text-sm font-semibold text-gray-900">Dampak Sosial</div>
                        <div class="text-xs text-gray-600 mt-1">Berpihak pada kebenaran dan kemaslahatan publik.</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="lg:col-span-6">
            <div class="relative rounded-2xl overflow-hidden">
                <img src="{{ asset('assets/images/c5b37387-5d3f-4cfc-ad0f-92656880d1e0_169.jpeg') }}" alt="Misi Naramakna" class="w-full h-[280px] sm:h-[360px] object-cover rounded-2xl">
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
        @foreach($valueItems as $index => $item)
            @if($index < 3)
                <div class="rounded-2xl border border-gray-200 p-6 bg-white">
                    <div class="flex items-center gap-4">
                        @if($index === 0)
                            <div class="w-16 h-16 rounded-xl bg-gradient-to-b from-orange-500 to-orange-600 text-white shadow-md ring-1 ring-white/20 flex items-center justify-center">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                    <path d="M6 16V11M12 16V8M18 16V13" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                    <path d="M4 16h16" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        @elseif($index === 1)
                            <div class="w-16 h-16 rounded-xl bg-gradient-to-b from-blue-500 to-blue-600 text-white shadow-md ring-1 ring-white/20 flex items-center justify-center">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                    <path d="M8 4h8a2 2 0 0 1 2 2v6l-6 6H8a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                    <path d="M12 8l3 3-5 5" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                        @else
                            <div class="w-16 h-16 rounded-xl bg-gradient-to-b from-green-500 to-green-600 text-white shadow-md ring-1 ring-white/20 flex items-center justify-center">
                                <svg width="26" height="26" viewBox="0 0 24 24" fill="none">
                                    <path d="M4 6h7v12H4z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                    <path d="M13 6h7v12h-7z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                    <path d="M11 6v12" stroke="white" stroke-width="2" stroke-linecap="round"/>
                                </svg>
                            </div>
                        @endif
                        <div>
                            <div class="text-sm font-semibold text-gray-900">{{ $item['title'] }}</div>
                            <div class="text-xs text-gray-600">{{ $about['values_title'] ?? 'Layanan Unggulan' }}</div>
                        </div>
                    </div>
                    <div class="mt-3 text-xs text-gray-600">{{ $item['description'] }}</div>
                </div>
            @endif
        @endforeach
        @if(empty($valueItems))
            <div class="rounded-2xl border border-gray-200 p-6 bg-white">
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
            <div class="rounded-2xl border border-gray-200 p-6 bg-white">
                <div class="flex items-center gap-4 ">
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
            <div class="rounded-2xl border border-gray-200 p-6 bg-white">
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
        @endif
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-14">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
            <h2 class="text-2xl font-bold text-gray-900">{{ $about['team_title'] ?? 'Dewan Redaksi' }}</h2>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        @foreach($teamMembers as $index => $member)
            <div class="rounded-2xl border border-gray-200 p-6 bg-white">
                <div class="flex items-center gap-4">
                    <img class="w-16 h-16 rounded-xl object-cover"
                         src="/assets/images/dummy-person.png"
                         alt="{{ $member['name'] }}"
                         onerror="this.src='https://via.placeholder.com/150x150/6366f1/ffffff?text={{ substr($member['name'], 0, 1) }}'">
                    <div>
                        <div class="text-sm font-semibold text-gray-900">{{ $member['role'] }}</div>
                        <div class="text-xs text-gray-600">{{ $member['name'] }}</div>
                    </div>
                </div>
                <div class="mt-3 text-xs text-gray-600">
                    @if(str_contains($member['role'], 'Pemimpin Redaksi'))
                        Memimpin arah editorial, menjaga kualitas jurnalisme, dan membangun ekosistem diskusi publik yang sehat.
                    @elseif(str_contains($member['role'], 'Dewan Redaksi'))
                        Menentukan arah kebijakan editorial dan menjaga standar jurnalisme.
                    @elseif(str_contains($member['role'], 'Pendiri'))
                        Pendiri dan visionary di balik Naramakna.
                    @elseif(str_contains($member['role'], 'Jurnalis'))
                        Meliputi dan melaporkan berita dengan akurasi dan integritas.
                    @elseif(str_contains($member['role'], 'Editor Multimedia'))
                        Mengelola konten multimedia untuk pengalaman visual yang optimal.
                    @elseif(str_contains($member['role'], 'Riset') || str_contains($member['role'], 'Analisis'))
                        Melakukan riset mendalam dan analisis data untuk mendukung berita.
                    @elseif(str_contains($member['role'], 'Komunikasi') || str_contains($member['role'], 'Pemasaran'))
                        Mengelola komunikasi pemasaran dan strategi iklan.
                    @else
                        Kontributor profesional di bidang {{ $member['role'] }}.
                    @endif
                </div>
            </div>
        @endforeach
        @if(empty($teamMembers))
            <!-- Fallback static content -->
            <div class="rounded-2xl border border-gray-200 p-6 bg-white">
                <div class="flex items-center gap-4">
                    <img class="w-16 h-16 rounded-xl object-cover" src="{{ asset('assets/images/dummy-person.png') }}" alt="Pemimpin Redaksi">
                    <div>
                        <div class="text-sm font-semibold text-gray-900">Pemimpin Redaksi</div>
                        <div class="text-xs text-gray-600">Nama Person</div>
                    </div>
                </div>
                <div class="mt-3 text-xs text-gray-600">Memimpin arah editorial, menjaga kualitas jurnalisme, dan membangun ekosistem diskusi publik yang sehat.</div>
            </div>
        @endif
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-12">
    <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-600 text-white p-8 sm:p-10 shadow-xl">
        <div class="text-center">
            <h2 class="text-2xl sm:text-3xl font-bold">Mari Bersama Membangun Narasi yang Bermakna</h2>
            <p class="mt-2 text-white/90 text-sm sm:text-base">Bergabunglah dengan komunitas pembaca cerdas yang peduli akan kualitas informasi dan kedalaman makna</p>
            <div class="mt-6 flex justify-center gap-3">
                <a href="https://www.instagram.com/naramakna.id?igsh=ejNla2VjeDdwaWd5" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/80 text-white no-underline hover:bg-white/10">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect x="4" y="4" width="16" height="16" rx="4" stroke="currentColor" stroke-width="2"/>
                        <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2"/>
                    </svg>
                    <span class="text-sm font-medium">Ikuti Konten Kami</span>
                </a>
                <a href="https://api.whatsapp.com/send/?phone=628979132802&text&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/80 text-white no-underline hover:bg-white/10">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
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
    const FALLBACK_IMG = 'data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" width="1200" height="630"><rect width="100%" height="100%" fill="%23e5e7eb"/><text x="50%" y="50%" dominant-baseline="middle" text-anchor="middle" fill="%236b7280" font-family="sans-serif" font-size="24">Image unavailable</text></svg>';
    Array.from(document.querySelectorAll('img')).forEach(img => {
        img.addEventListener('error', () => {
            img.src = FALLBACK_IMG;
        }, { once: true });
    });
</script>
@endpush