@extends('layouts.app')

@section('content')
<section class="relative -mx-[calc(50%-50vw)] bg-gray-900">
    <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/20 to-black/10"></div>
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-16 sm:py-22">
        <div class="max-w-3xl">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
                <span class="uppercase tracking-wider text-xs text-white/80">Kerja Sama</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-bold leading-tight text-white">Informasi Kerja Sama</h1>
            <p class="mt-2 text-white/90 text-sm sm:text-base">Mari berkolaborasi untuk menciptakan konten berkualitas dan membangun ekosistem media yang sehat.</p>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-12">
    <div class="flex items-center gap-2 mb-2">
        <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
        <h2 class="text-2xl font-bold text-gray-900">Hubungi Tim Kami</h2>
    </div>
    <p class="text-sm text-gray-600">Kami siap mendiskusikan peluang kolaborasi yang menarik</p>
    <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
        <a href="https://www.instagram.com/naramakna.id?igsh=ejNla2VjeDdwaWd5" target="_blank" rel="noopener noreferrer" class="rounded-2xl no-underline p-5 min-h-[120px] flex flex-col items-center justify-center text-white bg-gradient-to-br from-pink-500 via-fuchsia-500 to-purple-600 shadow hover:opacity-95 transition">
            <div class="w-12 h-12 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center mb-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <rect x="4" y="4" width="16" height="16" rx="4" stroke="white" stroke-width="2"/>
                    <circle cx="12" cy="12" r="4" stroke="white" stroke-width="2"/>
                </svg>
            </div>
            <div class="text-sm font-semibold">Instagram</div>
        </a>
        <a href="https://www.tiktok.com/@naramakna.id" target="_blank" rel="noopener noreferrer" class="rounded-2xl no-underline p-5 min-h-[120px] flex flex-col items-center justify-center text-white bg-gradient-to-br from-gray-800 to-gray-900 shadow hover:opacity-95 transition">
            <div class="w-12 h-12 rounded-xl bg-white/10 backdrop-blur-sm flex items-center justify-center mb-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M16.5 3c.4 2.2 2.1 3.9 4.3 4.3v3.1c-1.6 0-3.2-.5-4.6-1.5v5.3c0 3.8-3.1 6.8-6.8 6.8S2.6 18 2.6 14.2s3.1-6.8 6.8-6.8c.4 0 .8 0 1.2.1v3.5c-.4-.1-.8-.2-1.2-.2-1.9 0-3.4 1.5-3.4 3.4S7.5 18 9.4 18s3.4-1.5 3.4-3.4V3h3.7z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="text-sm font-semibold">TikTok</div>
        </a>
        <a href="https://www.youtube.com/@cerdasmemaknai" target="_blank" rel="noopener noreferrer" class="rounded-2xl no-underline p-5 min-h-[120px] flex flex-col items-center justify-center text-white shadow hover:opacity-95 transition" style="background: #ff0034;">
            <div class="w-12 h-12 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center mb-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" fill="white"/>
                </svg>
            </div>
            <div class="text-sm font-semibold">YouTube</div>
        </a>
        <a href="https://www.facebook.com/people/Naramaknaid/61582515249969" target="_blank" rel="noopener noreferrer" class="rounded-2xl no-underline p-5 min-h-[120px] flex flex-col items-center justify-center text-white bg-gradient-to-br from-blue-500 to-indigo-600 shadow hover:opacity-95 transition">
            <div class="w-12 h-12 rounded-xl bg-white/15 backdrop-blur-sm flex items-center justify-center mb-3">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                    <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" fill="white"/>
                </svg>
            </div>
            <div class="text-sm font-semibold">Facebook</div>
        </a>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-14">
    <div class="flex items-center justify-between mb-2">
        <div class="flex items-center gap-2">
            <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
            <h2 class="text-2xl font-bold text-gray-900">Area Kerja Sama</h2>
        </div>
    </div>
    <p class="text-sm text-gray-600 mb-6">Berbagai peluang kolaborasi yang bisa kita eksplorasi bersama</p>
    <div class="grid md:grid-cols-3 gap-4">
        <div class="rounded-xl border border-gray-200 p-5 bg-white">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-b from-indigo-500 to-indigo-600 text-white shadow ring-1 ring-white/20 flex items-center justify-center">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path d="M4 10h16v8H4z" stroke="white" stroke-width="2" />
                        <path d="M6 10V6h4v4M14 10V6h4v4" stroke="white" stroke-width="2" />
                    </svg>
                </div>
                <div class="text-sm font-semibold text-gray-900">Pemerintah & Lembaga Publik</div>
            </div>
            <div class="text-xs text-gray-600">Kolaborasi kebijakan berbasis data, kampanye edukasi, dan transparansi publik.</div>
        </div>
        <div class="rounded-xl border border-gray-200 p-5 bg-white">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-b from-sky-500 to-sky-600 text-white shadow ring-1 ring-white/20 flex items-center justify-center">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path d="M4 6h16v12H4z" stroke="white" stroke-width="2"/>
                        <path d="M6 9h8M6 12h12M6 15h10" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="text-sm font-semibold text-gray-900">Media & Publisher</div>
            </div>
            <div class="text-xs text-gray-600">Produksi konten kolaboratif, sindikasi artikel, dan program editorial bersama.</div>
        </div>
        <div class="rounded-xl border border-gray-200 p-5 bg-white">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-b from-rose-500 to-rose-600 text-white shadow ring-1 ring-white/20 flex items-center justify-center">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path d="M12 21s-7-4.5-7-10a5 5 0 0110 0 5 5 0 0110 0c0 5.5-7 10-7 10" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="text-sm font-semibold text-gray-900">LSM/NGO</div>
            </div>
            <div class="text-xs text-gray-600">Advokasi isu publik, publikasi riset, dan kampanye kesadaran sosial.</div>
        </div>
        <div class="rounded-xl border border-gray-200 p-5 bg-white">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-b from-purple-500 to-purple-600 text-white shadow ring-1 ring-white/20 flex items-center justify-center">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path d="M4 18h16M8 18l4-12 4 12" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div>
                <div class="text-sm font-semibold text-gray-900">Kampus & Riset</div>
            </div>
            <div class="text-xs text-gray-600">Proyek riset bersama, publikasi ilmiah populer, dan kelas/bootcamp.</div>
        </div>
        <div class="rounded-xl border border-gray-200 p-5 bg-white">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-b from-orange-500 to-orange-600 text-white shadow ring-1 ring-white/20 flex items-center justify-center">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path d="M6 6h12v12H6z" stroke="white" stroke-width="2"/>
                        <path d="M9 9h6v6H9z" fill="white"/>
                    </svg>
                </div>
                <div class="text-sm font-semibold text-gray-900">Brand & Korporasi</div>
            </div>
            <div class="text-xs text-gray-600">Program konten berdampak, CSR berbasis data, dan edukasi publik.</div>
        </div>
        <div class="rounded-xl border border-gray-200 p-5 bg-white">
            <div class="flex items-center gap-3 mb-2">
                <div class="w-12 h-12 rounded-xl bg-gradient-to-b from-emerald-500 to-emerald-600 text-white shadow ring-1 ring-white/20 flex items-center justify-center">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                        <path d="M7 10a3 3 0 116 0 3 3 0 01-6 0z" stroke="white" stroke-width="2"/>
                        <path d="M3 20a7 7 0 1114 0H3z" stroke="white" stroke-width="2" stroke-linecap="round"/>
                    </svg>
                </div>
                <div class="text-sm font-semibold text-gray-900">Komunitas & Inisiatif Lokal</div>
            </div>
            <div class="text-xs text-gray-600">Gerakan akar rumput, pelatihan literasi media, dan lokakarya komunitas.</div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-14">
    <div class="flex items-center justify-between mb-2">
        <div class="flex items-center gap-2">
            <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
            <h2 class="text-2xl font-bold text-gray-900">Mengapa Bermitra dengan Kami?</h2>
        </div>
    </div>
    <p class="text-sm text-gray-600 mb-6">Keunggulan yang membuat Naramakna.id menjadi partner yang tepat</p>
    <div class="grid lg:grid-cols-12 gap-8 items-start">
        <div class="lg:col-span-12">
            <div class="grid md:grid-cols-3 gap-4">
                <div class="rounded-xl border border-gray-200 p-5 bg-white">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-b from-orange-500 to-orange-600 text-white shadow ring-1 ring-white/20 flex items-center justify-center">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                                <path d="M4 16h16M7 14l3-6 3 4 3-6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="text-sm font-semibold text-gray-900">Reach yang Luas</div>
                    </div>
                    <div class="text-xs text-gray-600">Jangkau ribuan pembaca aktif yang peduli akan kualitas konten</div>
                </div>
                <div class="rounded-xl border border-gray-200 p-5 bg-white">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-b from-blue-500 to-blue-600 text-white shadow ring-1 ring-white/20 flex items-center justify-center">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                                <path d="M12 4l7 4v6l-7 4-7-4V8l7-4z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                <path d="M9 12l2 2 4-4" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="text-sm font-semibold text-gray-900">Kredibilitas Tinggi</div>
                    </div>
                    <div class="text-xs text-gray-600">Standar jurnalistik yang ketat dan reputasi yang terpercaya</div>
                </div>
                <div class="rounded-xl border border-gray-200 p-5 bg-white">
                    <div class="flex items-center gap-3 mb-2">
                        <div class="w-12 h-12 rounded-xl bg-gradient-to-b from-purple-500 to-purple-600 text-white shadow ring-1 ring-white/20 flex items-center justify-center">
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none">
                                <path d="M7 11a5 5 0 0110 0v4H7v-4z" stroke="white" stroke-width="2" stroke-linejoin="round"/>
                                <path d="M5 18h14" stroke="white" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div class="text-sm font-semibold text-gray-900">Tim Profesional</div>
                    </div>
                    <div class="text-xs text-gray-600">Tim berpengalaman dengan keahlian di berbagai bidang</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-12">
    <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-600 text-white p-8 sm:p-10 shadow-xl">
        <div class="text-center">
            <h2 class="text-2xl sm:text-3xl font-bold">Siap Memulai Kolaborasi?</h2>
            <p class="mt-2 text-white/90 text-sm sm:text-base">Mari diskusikan ide dan peluang kerja sama yang bisa kita wujudkan bersama</p>
            <div class="mt-6 flex justify-center gap-3">
                <a href="https://api.whatsapp.com/send/?phone=628979132802&text&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/80 text-white no-underline hover:bg-white/10">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                        <path d="M16.5 14.5c-.5-.25-1.5-.75-1.75-.85-.25-.1-.4-.1-.55.1-.15.2-.6.7-.75.85-.15.15-.3.15-.5.05-.2-.1-.85-.3-1.6-.95-.6-.55-1.05-1.23-1.17-1.43-.12-.2-.01-.31.09-.41.1-.1.2-.24.3-.36.1-.12.14-.21.21-.35.07-.14.03-.26-.02-.37-.05-.11-.49-1.16-.67-1.59-.18-.41-.36-.36-.49-.37h-.42c-.15 0-.39.06-.59.26-.2.2-.78.74-.78 1.8 0 1.06.8 2.09.91 2.24.11.15 1.58 2.35 3.83 3.29.54.22.95.36 1.27.46.53.17 1.02.14 1.4.09.43-.06 1.31-.53 1.5-1.04.19-.51.19-.95.13-1.04-.06-.09-.2-.15-.45-.27z" fill="currentColor"/>
                    </svg>
                    <span class="text-sm font-medium">Hubungi via WhatsApp</span>
                </a>
                <a href="mailto:naramaknaskt@gmail.com" class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-white/80 text-white no-underline hover:bg-white/10">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M3 5h18v14H3V5zm9 6L3 5h18l-9 6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                    </svg>
                    <span class="text-sm font-medium">Kirim Email</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
@endpush