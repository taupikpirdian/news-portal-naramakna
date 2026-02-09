@extends('layouts.app')

@section('content')
<section class="relative -mx-[calc(50%-50vw)] bg-gray-900">
    <div class="absolute inset-0 bg-gradient-to-r from-black/60 via-black/30 to-black/10"></div>
    <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-16 sm:py-22">
        <div class="max-w-3xl text-white">
            <div class="inline-flex items-center gap-2 mb-4">
                <span class="w-1 h-7 bg-yellow-450 rounded-full"></span>
                <span class="uppercase tracking-wider text-xs text-white/80">Bantuan</span>
            </div>
            <h1 class="text-3xl sm:text-4xl font-bold leading-tight">Pusat Bantuan</h1>
            <p class="mt-2 text-white/90 text-sm sm:text-base">Temukan jawaban dan panduan penggunaan platform Naramakna.id</p>
        </div>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-12">
    <div class="grid lg:grid-cols-12 gap-6 items-start">
        <aside class="lg:col-span-4">
            <div class="rounded-2xl border border-gray-200 bg-white p-4 shadow-sm">
                <div class="text-sm font-semibold text-gray-800 px-2 mb-2">Kategori Bantuan</div>
                <div class="space-y-2" id="help-categories">
                    <button data-cat="umum" class="w-full flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 bg-orange-500 text-white shadow-sm transition-all duration-200 ease-out hover:bg-orange-500/90 hover:shadow-md hover:-translate-y-0.5 cursor-pointer">
                        <span class="w-8 h-8 rounded-full bg-orange-600/10 text-orange-600 flex items-center justify-center">?</span>
                        <span class="text-sm font-medium">Pertanyaan Umum</span>
                    </button>
                    <button data-cat="akun" class="w-full flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 transition-all duration-200 ease-out hover:shadow-sm hover:-translate-y-0.5 cursor-pointer">
                        <span class="w-8 h-8 rounded-full bg-gray-100 text-gray-700 flex items-center justify-center">🔒</span>
                        <span class="text-sm text-gray-800 font-medium">Akun & Login</span>
                    </button>
                    <button data-cat="konten" class="w-full flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 transition-all duration-200 ease-out hover:shadow-sm hover:-translate-y-0.5 cursor-pointer">
                        <span class="w-8 h-8 rounded-full bg-gray-100 text-gray-700 flex items-center justify-center">✎</span>
                        <span class="text-sm text-gray-800 font-medium">Artikel & Konten</span>
                    </button>
                    <button data-cat="teknis" class="w-full flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 transition-all duration-200 ease-out hover:shadow-sm hover:-translate-y-0.5 cursor-pointer">
                        <span class="w-8 h-8 rounded-full bg-gray-100 text-gray-700 flex items-center justify-center">⚙️</span>
                        <span class="text-sm text-gray-800 font-medium">Masalah Teknis</span>
                    </button>
                </div>
            </div>
        </aside>

        <section class="lg:col-span-8">
            <div class="rounded-2xl border border-gray-200 bg-white p-6 sm:p-8 shadow-sm">
                <div class="text-center mb-6">
                    <h2 id="panel-title" class="text-2xl font-bold text-gray-900">Pertanyaan Umum</h2>
                    <p id="panel-desc" class="mt-1 text-sm text-gray-600">Temukan jawaban untuk pertanyaan seputar pertanyaan umum</p>
                </div>
                <div id="faq-list" class="space-y-3">
                    <!-- items injected by script -->
                </div>
            </div>
        </section>
    </div>
</section>

<section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 xl:px-10 2xl:px-12 py-12">
    <div class="rounded-3xl bg-gradient-to-r from-orange-500 to-orange-600 text-white p-8 sm:p-10 shadow-xl">
        <div class="text-center">
            <h2 class="text-2xl sm:text-3xl font-bold">Masih Perlu Bantuan?</h2>
            <p class="mt-2 text-white/90 text-sm sm:text-base">Hubungi tim kami, atau kunjungi alamat kantor kami di Bandung</p>
            <div class="mt-4 text-white/90 text-xs">Jl. Sanggar Kencana Utama No. 1C, Sanggar Hurip Estate, Jatisari, Buahbatu, Kota Bandung, Jawa Barat 40286</div>
            <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-3">
                <a href="https://api.whatsapp.com/send/?phone=628979132802&text&type=phone_number&app_absent=0" target="_blank" rel="noopener noreferrer" class="no-underline rounded-xl border border-white/80 px-4 py-3 text-white hover:bg-white/10">
                    <div class="flex flex-col items-center gap-2">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                            <path d="M16.5 14.5c-.5-.25-1.5-.75-1.75-.85-.25-.1-.4-.1-.55.1-.15.2-.6.7-.75.85-.15.15-.3.15-.5.05-.2-.1-.85-.3-1.6-.95-.6-.55-1.05-1.23-1.17-1.43-.12-.2-.01-.31.09-.41.1-.1.2-.24.3-.36.1-.12.14-.21.21-.35.07-.14.03-.26-.02-.37-.05-.11-.49-1.16-.67-1.59-.18-.41-.36-.36-.49-.37h-.42c-.15 0-.39.06-.59.26-.2.2-.78.74-.78 1.8 0 1.06.8 2.09.91 2.24.11.15 1.58 2.35 3.83 3.29.54.22.95.36 1.27.46.53.17 1.02.14 1.4.09.43-.06 1.31-.53 1.5-1.04.19-.51.19-.95.13-1.04-.06-.09-.2-.15-.45-.27z" fill="currentColor"/>
                        </svg>
                        <div class="text-sm font-semibold">WhatsApp</div>
                    </div>
                    <div class="mt-1 text-xs text-white/80 text-center">Hubungi tim support langsung via WhatsApp</div>
                </a>
                <a href="#" class="no-underline rounded-xl border border-white/80 px-4 py-3 text-white hover:bg-white/10">
                    <div class="flex flex-col items-center gap-2">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                            <path d="M3 5h18v14H3V5zm9 6L3 5h18l-9 6z" stroke="currentColor" stroke-width="2" stroke-linejoin="round"/>
                        </svg>
                        <div class="text-sm font-semibold">Email</div>
                    </div>
                    <div class="mt-1 text-xs text-white/80 text-center">Kirim email ke tim support kami</div>
                </a>
                <a href="https://www.instagram.com/naramakna.id?igsh=ejNla2VjeDdwaWd5" target="_blank" rel="noopener noreferrer" class="no-underline rounded-xl border border-white/80 px-4 py-3 text-white hover:bg-white/10">
                    <div class="flex flex-col items-center gap-2">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                            <rect x="4" y="4" width="16" height="16" rx="4" stroke="currentColor" stroke-width="2"/>
                            <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <div class="text-sm font-semibold">Instagram</div>
                    </div>
                    <div class="mt-1 text-xs text-white/80 text-center">DM kami di instagram untuk bantuan</div>
                </a>
                <a href="https://www.facebook.com/naramakna.id/?_rdr" target="_blank" rel="noopener noreferrer" class="no-underline rounded-xl border border-white/80 px-4 py-3 text-white hover:bg-white/10">
                    <div class="flex flex-col items-center gap-2">
                        <svg width="32" height="32" viewBox="0 0 24 24" fill="none">
                            <circle cx="12" cy="12" r="9" stroke="currentColor" stroke-width="2"/>
                            <path d="M13 9h2V7h-2c-1.657 0-3 1.343-3 3v2H8v2h2v5h2v-5h2l1-2h-3V10c0-.552.448-1 1-1z" fill="currentColor"/>
                        </svg>
                        <div class="text-sm font-semibold">Facebook</div>
                    </div>
                    <div class="mt-1 text-xs text-white/80 text-center">Hubungi kami melalu Facebook</div>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
@verbatim
<script>
    const data = {
        umum: {
            title: 'Pertanyaan Umum',
            desc: 'Temukan jawaban untuk pertanyaan seputar pertanyaan umum',
            items: [
                { q: 'Apa itu Naramakna.id?', a: 'Naramakna.id adalah platform media digital yang menyajikan konten berkualitas dengan tagline "Cerdas Memaknai". Kami fokus pada jurnalisme data yang humanis dan konten yang mendalam.' },
                { q: 'Bagaimana cara menggunakan platform ini?', a: 'Anda bisa membaca artikel, berpartisipasi dalam polling, menonton video story, dan berinteraksi dengan konten lainnya. Untuk fitur lengkap, daftar dan login ke akun Anda.' },
                { q: 'Apakah konten di sini gratis?', a: 'Ya, semua konten di Naramakna.id dapat diakses secara gratis. Kami berkomitmen memberikan informasi berkualitas tanpa biaya kepada pembaca.' },
            ],
        },
        akun: {
            title: 'Akun & Login',
            desc: 'Temukan jawaban untuk pertanyaan seputar akun & login',
            items: [
                { q: 'Bagaimana cara mendaftar akun?', a: 'Klik tombol "Daftar" di pojok kanan atas, isi form registrasi dengan data lengkap, verifikasi email yang dikirim, dan login dengan akun yang sudah dibuat.' },
                { q: 'Lupa password, bagaimana?', a: 'Klik "Lupa Password" di halaman login, masukkan email yang terdaftar, dan ikuti instruksi reset password yang dikirim ke email Anda.' },
                { q: 'Bisa ganti email yang terdaftar?', a: 'Ya, Anda bisa mengubah email di pengaturan profil. Pastikan email baru aktif dan belum terdaftar di platform lain.' },
            ],
        },
        konten: {
            title: 'Artikel & Konten',
            desc: 'Temukan jawaban untuk pertanyaan seputar artikel & konten',
            items: [
                { q: 'Bagaimana cara menulis artikel?', a: 'Setelah login, klik "Tulis Artikel" di dashboard, pilih kategori yang sesuai, tulis konten, upload gambar pendukung, dan submit untuk review admin.' },
                { q: 'Berapa lama artikel dipublish?', a: 'Proses review artikel biasanya memakan waktu 24–48 jam kerja. Tim admin akan meninjau kualitas konten dan memberikan feedback jika diperlukan.' },
                { q: 'Bisa edit artikel yang sudah dipublish?', a: 'Ya, Anda bisa mengedit artikel yang sudah dipublish melalui dashboard penulis. Perubahan akan direview ulang sebelum dipublish.' },
            ],
        },
        teknis: {
            title: 'Masalah Teknis',
            desc: 'Temukan jawaban untuk pertanyaan seputar masalah teknis',
            items: [
                { q: 'Website tidak bisa diakses, kenapa?', a: 'Cek koneksi internet Anda, clear cache browser, atau coba akses dari browser lain. Jika masih bermasalah, hubungi tim support kami.' },
                { q: 'Gambar tidak muncul, bagaimana?', a: 'Pastikan koneksi internet stabil, refresh halaman, atau coba akses dari device lain. Jika masalah berlanjut, laporkan ke tim support.' },
                { q: 'Aplikasi mobile tidak berfungsi?', a: 'Update aplikasi ke versi terbaru, restart aplikasi, atau reinstall jika diperlukan. Pastikan device Anda mendukung versi aplikasi.' },
            ],
        }
    };

    const categories = document.querySelectorAll('#help-categories button');
    const faqList = document.getElementById('faq-list');
    const panelTitle = document.getElementById('panel-title');
    const panelDesc = document.getElementById('panel-desc');

    function renderFAQ(catKey) {
        const cat = data[catKey];
        panelTitle.textContent = cat.title;
        panelDesc.textContent = cat.desc;
        faqList.innerHTML = '';
        cat.items.forEach((item, idx) => {
            const card = document.createElement('div');
            card.className = 'rounded-xl border border-gray-200 p-4';
            const header = document.createElement('button');
            header.className = 'w-full flex items-center justify-between gap-3 text-left cursor-pointer';
            const title = document.createElement('div');
            title.className = 'text-sm font-medium text-gray-900';
            title.textContent = item.q;
            const icon = document.createElement('span');
            icon.className = 'text-gray-400';
            icon.textContent = '▾';
            header.appendChild(title);
            header.appendChild(icon);
            const body = document.createElement('div');
            body.className = 'mt-2 text-xs text-gray-600 overflow-hidden max-h-0 opacity-0 transition-all duration-300 ease-out';
            body.textContent = item.a;
            body.dataset.open = 'false';
            header.addEventListener('click', () => {
                const isOpen = body.dataset.open === 'true';
                if (isOpen) {
                    body.style.maxHeight = '0px';
                    body.style.opacity = '0';
                    icon.textContent = '▾';
                    body.dataset.open = 'false';
                } else {
                    body.style.maxHeight = body.scrollHeight + 'px';
                    body.style.opacity = '1';
                    icon.textContent = '▴';
                    body.dataset.open = 'true';
                }
            });
            card.appendChild(header);
            card.appendChild(body);
            faqList.appendChild(card);
        });
    }

    categories.forEach(btn => {
        btn.addEventListener('click', () => {
            categories.forEach(b => b.classList.remove('bg-orange-500', 'text-white', 'shadow-sm'));
            categories.forEach(b => b.classList.add('border', 'border-gray-200'));
            btn.classList.add('bg-orange-500', 'text-white', 'shadow-sm');
            renderFAQ(btn.dataset.cat);
        });
    });

    renderFAQ('umum');
</script>
@endverbatim
@endpush