@extends('layouts.app')

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
        <div>
            <div class="flex items-center gap-2">
                <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
                <h2 class="text-2xl font-bold text-gray-900">Dewan Redaksi</h2>
            </div>
            <div class="mt-2 text-xs text-gray-600" style="font-size: 14px;">Menentukan arah kebijakan editorial dan menjaga standar jurnalisme.</div>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-gray-200 p-6 bg-white">
            <div class="flex items-center gap-4">
                <svg class="w-16 h-16 text-gray-800" fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                </svg>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Waska Warta</div>
                    <div class="text-xs text-gray-600">Dewan Redaksi</div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 p-6 bg-white">
            <div class="flex items-center gap-4">
                <svg class="w-16 h-16 text-gray-800" fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                </svg>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Yosal Iriantara</div>
                    <div class="text-xs text-gray-600">Dewan Redaksi</div>
                </div>
            </div>
        </div>

        <div class="rounded-2xl border border-gray-200 p-6 bg-white">
            <div class="flex items-center gap-4">
                <svg class="w-16 h-16 text-gray-800" fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                </svg>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Tansah Rahmatullah</div>
                    <div class="text-xs text-gray-600">Dewan Redaksi</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
    <div class="flex items-center justify-between mb-6">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
                <h2 class="text-2xl font-bold text-gray-900">Pemimpin Redaksi</h2>
            </div>
            <div class="mt-2 text-xs text-gray-600" style="font-size: 14px;">Memimpin arah editorial, menjaga kualitas jurnalisme, dan membangun ekosistem diskusi publik yang sehat.</div>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-gray-200 p-6 bg-white">
            <div class="flex items-center gap-4">
                <svg class="w-16 h-16 text-gray-800" fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                </svg>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Yosal Iriantara</div>
                    <div class="text-xs text-gray-600">Pemimpin Redaksi</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-14">
    <div class="flex items-center justify-between mb-6">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
                <h2 class="text-2xl font-bold text-gray-900">Riset dan Analisis</h2>
            </div>
            <div class="mt-2 text-xs text-gray-600" style="font-size: 14px;">Melakukan riset mendalam dan analisis data untuk mendukung berita.</div>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-gray-200 p-6 bg-white">
            <div class="flex items-center gap-4">
                <svg class="w-16 h-16 text-gray-800" fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                </svg>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Wahdi Suardi</div>
                    <div class="text-xs text-gray-600">Riset dan Analisis</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
    <div class="flex items-center justify-between mb-6">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
                <h2 class="text-2xl font-bold text-gray-900">Jurnalis</h2>
            </div>
            <div class="mt-2 text-xs text-gray-600" style="font-size: 14px;">Meliputi dan melaporkan berita dengan akurasi dan integritas.</div>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-gray-200 p-6 bg-white">
            <div class="flex items-center gap-4">
                <svg class="w-16 h-16 text-gray-800" fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                </svg>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Khaerunnisa</div>
                    <div class="text-xs text-gray-600">Jurnalis</div>
                </div>
            </div>
        </div>
        <div class="rounded-2xl border border-gray-200 p-6 bg-white">
            <div class="flex items-center gap-4">
                <svg class="w-16 h-16 text-gray-800" fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                </svg>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Dadi Kurnia</div>
                    <div class="text-xs text-gray-600">Jurnalis</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-14">
    <div class="flex items-center justify-between mb-6">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
                <h2 class="text-2xl font-bold text-gray-900">Editor Multimedia</h2>
            </div>
            <div class="mt-2 text-xs text-gray-600" style="font-size: 14px;">Mengelola konten multimedia untuk pengalaman visual yang optimal.</div>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-gray-200 p-6 bg-white">
            <div class="flex items-center gap-4">
                <svg class="w-16 h-16 text-gray-800" fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363 h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                </svg>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Aas Fauziah</div>
                    <div class="text-xs text-gray-600">Editor Multimedia</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12">
    <div class="flex items-center justify-between mb-6">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
                <h2 class="text-2xl font-bold text-gray-900">Account Executive</h2>
            </div>
            <div class="mt-2 text-xs text-gray-600" style="font-size: 14px;">Mengelola konten multimedia untuk pengalaman visual yang optimal.</div>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-gray-200 p-6 bg-white">
            <div class="flex items-center gap-4">
                <svg class="w-16 h-16 text-gray-800" fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363 h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                </svg>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Dadi Kurnia</div>
                    <div class="text-xs text-gray-600">Account Executive</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-14">
    <div class="flex items-center justify-between mb-6">
        <div>
            <div class="flex items-center gap-2">
                <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
                <h2 class="text-2xl font-bold text-gray-900">Pemasaran dan Kerja Sama</h2>
            </div>
            <div class="mt-2 text-xs text-gray-600" style="font-size: 14px;">Mengelola komunikasi pemasaran dan strategi iklan.</div>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-gray-200 p-6 bg-white">
            <div class="flex items-center gap-4">
                <svg class="w-16 h-16 text-gray-800" fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M16 15.503A5.041 5.041 0 1 0 16 5.42a5.041 5.041 0 0 0 0 10.083zm0 2.215c-6.703 0-11 3.699-11 5.5v3.363 h22v-3.363c0-2.178-4.068-5.5-11-5.5z"/>
                </svg>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Syamsul Ma'arif</div>
                    <div class="text-xs text-gray-600">Pemasaran dan Kerja Sama</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-14">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-2">
            <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
            <h2 class="text-2xl font-bold text-gray-900">Kunjungi Kami</h2>
        </div>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
        <div class="rounded-2xl border border-gray-200 p-6 bg-white hover:shadow-lg transition-all">
            <div class="flex items-center gap-4">
                <svg class="w-14 h-14 text-gray-800" viewBox="0 0 1024 1024" class="icon"  version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M531.8 385v483.3h0.1V385h-0.1z" fill="#343535" /><path d="M670.9 497.1h86v16h-86zM670.9 625.1h86v16h-86zM233.9 241.1h86v16h-86zM384 241.1h86v16h-86zM233.9 369h86v16h-86zM384 369h86v16h-86zM234 497.5h86v16h-86zM384 497.2h86v16h-86z" fill="#39393A" /><path d="M398.3 704.4c-11.9-11.9-28.4-19.3-46.5-19.3-36.2 0-65.8 29.6-65.8 65.8v117.4h20V750.9c0-12.2 4.8-23.6 13.5-32.3 8.7-8.7 20.2-13.5 32.3-13.5 12.2 0 23.6 4.8 32.3 13.5 8.7 8.7 13.5 20.2 13.5 32.3v117.4h20V750.9c0-18.1-7.4-34.5-19.3-46.5z" fill="#E73B37" /><path d="M575.8 429v437.9h0.1V429h-0.1zM286.2 868.3h131.6-131.6z" fill="#343535" /><path d="M896 868.3V385H575.9V111.6H128v756.7H64v44h896v-44h-64z m-364.1 0H172V155.6h359.9v712.7z m320.1-1.5H575.8V429H852v437.8z" fill="#39393A" /></svg>
                <div>
                    <div class="text-sm font-semibold text-gray-900">Perusahaan</div>
                </div>
            </div>
            <div class="text-xs text-gray-700 leading-relaxed py-4">
                PT. Solusi Komunikasi Terapan<br>
                SK. Menkumham RI Nomor: AHU-0083380.AH.01.01.Tahun 2023
            </div>
        </div>
        <div class="rounded-2xl border border-gray-200 p-6 bg-white hover:shadow-lg transition-all">
            <div class="flex items-center gap-3 mb-3">
                <div class="flex items-center gap-4">
                    <svg class="w-14 h-14 text-gray-800" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" fill="currentColor" aria-hidden="true">
                        <path d="M607.7 64.2c-102.9 0-186.3 83.4-186.3 186.3 0 30 15.9 66.6 38.3 103.3 15.2 24.8 33.3 49.7 51.7 72.6C559 486 607.7 533 607.7 533s17.7-17.1 42.3-43.8c14-15.3 30.3-33.6 46.7-53.8 47.9-58.7 97.3-132 97.3-184.9 0-102.9-83.4-186.3-186.3-186.3z m77.8 353.2c-8 10-16.1 19.6-23.9 28.6-7.8 9-15.4 17.5-22.5 25.3-12.5 13.7-23.4 25.1-31.4 33.3-12.5-12.8-32.3-33.5-53.8-58.5-7.8-9-15.8-18.5-23.8-28.5-13.5-16.7-25.5-32.7-36.1-48-10.1-14.6-18.8-28.4-26.1-41.5-17.6-31.6-26.6-57.8-26.6-77.8 0-44.4 17.3-86.2 48.7-117.6C521.4 101.3 563.2 84 607.6 84c44.4 0 86.2 17.3 117.6 48.7 31.4 31.4 48.7 73.2 48.7 117.6 0 20-8.9 46.1-26.5 77.6-14.8 26.9-35.6 56.9-61.9 89.5z"/>
                        <path d="M607.7 183.1c36.9 0 67 30.1 67 67s-30.1 67-67 67-67-30.1-67-67 30-67 67-67m0-20c-48 0-87 38.9-87 87 0 48 38.9 87 87 87 48 0 87-38.9 87-87s-39-87-87-87z"/>
                        <path d="M927.9 352.4l-195.7 70.3-35.6 12.8c-16.4 20.1-32.7 38.5-46.7 53.8l1.9 0.9v416.6l-12.7-5.9-46.3-21.6-212.2-98.9-8.6-4v-415l139.4 65c-18.4-23-36.5-47.8-51.7-72.6l-77.6-36.2-3.7-1.7-8.6-4-7.8-3.7-2.2 0.8L64 415.3v511.8L362 820l230.8 107.6 46.3 21.6 22.7 10.6L960 852.7V340.9l-32.1 11.5zM352 776.9l-4.9 1.8L108 864.6V446.2l244-87.7v418.4z m564 44.9l-244.2 87.7V491.1l5.1-1.8L916 403.4v418.4z"/>
                    </svg>
                    <div>
                        <div class="text-sm font-semibold text-gray-900">Alamat Kantor</div>
                    </div>
                </div>
            </div>
            <div class="text-xs text-gray-700 leading-relaxed">
                Jl. Kawaluyaan Indah VI No. 6-B, Istana Kawaluyaan,<br>
                Jatisari, Buahbatu, Kota Bandung, 40286
            </div>
        </div>
        <div class="rounded-2xl border border-gray-200 p-6 bg-white hover:shadow-lg transition-all">
            <div class="flex items-center gap-3 mb-3">
                <div class="flex items-center gap-4">
                    <svg width="55" height="55" class="text-gray-800" fill="currentColor" viewBox="0 0 72 72" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <g>
                        <path d="M56.068,4H15.932C12.104,4,9,7.104,9,10.932v50.136C9,64.896,12.104,68,15.932,68h40.136C59.896,68,63,64.896,63,61.068
                            V10.932C63,7.104,59.896,4,56.068,4z M37.993,8h10v15.844l-4.563-2.188c-0.138-0.066-0.283-0.099-0.43-0.099
                            s-0.3,0.033-0.436,0.099l-4.571,2.188V8z M13,61.068V10.932C13,9.313,14.313,8,15.932,8H22v56h-6.068
                            C14.313,64,13,62.688,13,61.068z M59,61.068C59,62.688,57.688,64,56.068,64H24V8h11.993v17.432c0,0.344,0.18,0.663,0.471,0.847
                            c0.291,0.183,0.658,0.205,0.968,0.055L43,23.666l5.568,2.667c0.137,0.067,0.285,0.099,0.432,0.099c0.186,0,0.368-0.052,0.529-0.153
                            c0.289-0.184,0.464-0.503,0.464-0.847V8h6.075C57.688,8,59,9.313,59,10.932V61.068z"/>
                        <path d="M56,51c-0.553,0-1,0.447-1,1v3.184C55,58.109,53.105,60,51.527,60H35.125c-0.553,0-1,0.447-1,1s0.447,1,1,1h16.402
                            C54.32,62,57,59.325,57,55.184V52C57,51.447,56.553,51,56,51z"/>
                        <path d="M55.245,47.951c0.26,0,0.521-0.102,0.71-0.29c0.18-0.19,0.29-0.44,0.29-0.71c0-0.262-0.111-0.521-0.302-0.71
                            c-0.368-0.37-1.039-0.36-1.408,0c-0.182,0.188-0.29,0.448-0.29,0.71c0,0.27,0.108,0.529,0.29,0.71
                            C54.725,47.85,54.975,47.951,55.245,47.951z"/>
                    </g>
                    </svg>
                    <div>
                        <div class="text-sm font-semibold text-gray-900">Kontak</div>
                    </div>
                </div>
            </div>
            <div class="text-xs text-gray-700 space-y-1 leading-relaxed">
                <div>Tlp./WA: <a href="https://wa.me/628978132802" target="_blank" rel="noopener noreferrer" class="no-underline text-gray-700 hover:text-yellow-450">0897-8132-802</a></div>
                <div>Email: <a href="mailto:naramaknaskt@gmail.com" class="no-underline text-gray-700 hover:text-yellow-450">naramaknaskt@gmail.com</a></div>
            </div>
            <div class="text-sm font-semibold text-gray-900 mt-4 mb-2">Media Sosial</div>
            <div class="flex flex-wrap gap-2">
                <a href="https://www.instagram.com/naramakna.id?igsh=ejNla2VjeDdwaWd5" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-gray-700 flex items-center justify-center no-underline transition-all hover:bg-yellow-450">
                    <svg width="20" height="20" fill="#ffffff" viewBox="0 0 24 24">
                        <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                    </svg>
                </a>
                <a href="https://www.tiktok.com/@naramakna.id" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-gray-700 flex items-center justify-center no-underline transition-all hover:bg-yellow-450"> <svg width="20" height="20" fill="#ffffff" viewBox="0 0 24 24"> <path d="M16.5 3c.4 2.2 2.1 3.9 4.3 4.3v3.1c-1.6 0-3.2-.5-4.6-1.5v5.3c0 3.8-3.1 6.8-6.8 6.8S2.6 18 2.6 14.2s3.1-6.8 6.8-6.8c.4 0 .8 0 1.2.1v3.5c-.4-.1-.8-.2-1.2-.2-1.9 0-3.4 1.5-3.4 3.4S7.5 18 9.4 18s3.4-1.5 3.4-3.4V3h3.7z"/> </svg> </a>
                <a href="https://www.youtube.com/@cerdasmemaknai" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-gray-700 flex items-center justify-center no-underline transition-all hover:bg-yellow-450">
                    <svg width="20" height="20" fill="#ffffff" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
                <a href="https://www.facebook.com/people/Naramaknaid/61582515249969" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-gray-700 flex items-center justify-center no-underline transition-all hover:bg-yellow-450">
                    <svg width="20" height="20" fill="#ffffff" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
            </div>
        </div>
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
