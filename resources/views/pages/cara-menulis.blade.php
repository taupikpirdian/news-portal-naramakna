@extends('layouts.app')
@section('title', 'Cara Menulis di Naramakna - Platform Media Digital Terdepan Indonesia')

@push('styles')
<!-- Tailwind CSS CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<script src="https://unpkg.com/lucide@latest"></script>

<style>
    /* Fix search icon position */
    .search-icon-fix {
        top: 70% !important;
        transform: translateY(-50%) !important;
    }

    /* Custom animations */
    @keyframes blob {
        0% {
            transform: translate(0px, 0px) scale(1);
        }
        33% {
            transform: translate(30px, -50px) scale(1.1);
        }
        66% {
            transform: translate(-20px, 20px) scale(0.9);
        }
        100% {
            transform: translate(0px, 0px) scale(1);
        }
    }

    .animate-blob {
        animation: blob 7s infinite;
    }

    .animation-delay-2000 {
        animation-delay: 2s;
    }

    /* Smooth scroll */
    html {
        scroll-behavior: smooth;
    }

    /* Custom scrollbar */
    ::-webkit-scrollbar {
        width: 10px;
    }

    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
        background: #f97316;
        border-radius: 5px;
    }

    ::-webkit-scrollbar-thumb:hover {
        background: #ea580c;
    }

    /* Tab content transition */
    .tab-content {
        opacity: 0;
        animation: fadeIn 0.5s forwards;
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }

    /* Accordion styles */
    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .accordion-content.active {
        max-height: 500px;
    }
</style>
@endpush
@section('content')

<!-- Hero Section -->
<section class="relative py-20 overflow-hidden" style="background-color: #f3f4f6;">
    <div class="absolute top-20 right-10 w-72 h-72 bg-orange-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
    <div class="absolute bottom-20 left-10 w-72 h-72 bg-blue-200 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-4xl mx-auto">
            <!-- Icon Badge -->
            <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-2xl shadow-lg mb-6 transform hover:scale-110 transition-transform">
                <i data-lucide="book-open" class="w-8 h-8 text-orange-500"></i>
            </div>
            
            <!-- Title -->
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-6 leading-tight">
                Cara Menulis di <span class="text-orange-500">Naramakna</span>
            </h1>
            
            <!-- Description -->
            <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
                Ikuti langkah-langkah berikut untuk menjadi penulis di platform media digital terdepan Indonesia
            </p>
        </div>
    </div>
</section>

<!-- Tabs Section -->
<section class="py-16" style="background-color: #f3f4f6;">
    <div class="container mx-auto px-4">
        <!-- Tab Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button onclick="switchTab(1)" id="tab-btn-1" class="tab-button flex items-center gap-3 px-6 py-3 rounded-full font-medium transition-all duration-300 transform hover:scale-105 bg-blue-500 text-white shadow-lg">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-white/20">
                    <span class="font-bold text-white">1</span>
                </div>
                <span class="whitespace-nowrap">Login & Registrasi</span>
            </button>
            <button onclick="switchTab(2)" id="tab-btn-2" class="tab-button flex items-center gap-3 px-6 py-3 rounded-full font-medium transition-all duration-300 transform hover:scale-105 bg-white text-gray-600 hover:shadow-md border border-gray-200">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-green-50">
                    <span class="font-bold text-green-600">2</span>
                </div>
                <span class="whitespace-nowrap">Lengkapi Profile</span>
            </button>
            <button onclick="switchTab(3)" id="tab-btn-3" class="tab-button flex items-center gap-3 px-6 py-3 rounded-full font-medium transition-all duration-300 transform hover:scale-105 bg-white text-gray-600 hover:shadow-md border border-gray-200">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-purple-50">
                    <span class="font-bold text-purple-600">3</span>
                </div>
                <span class="whitespace-nowrap">Mulai Menulis</span>
            </button>
            <button onclick="switchTab(4)" id="tab-btn-4" class="tab-button flex items-center gap-3 px-6 py-3 rounded-full font-medium transition-all duration-300 transform hover:scale-105 bg-white text-gray-600 hover:shadow-md border border-gray-200">
                <div class="flex items-center justify-center w-8 h-8 rounded-full bg-orange-50">
                    <span class="font-bold text-orange-600">4</span>
                </div>
                <span class="whitespace-nowrap">Review & Publish</span>
            </button>
        </div>

        <!-- Tab Content -->
        <div class="max-w-6xl mx-auto">
            <div class="overflow-hidden border-0 shadow-xl bg-white rounded-2xl">
                
                <!-- Tab 1: Login & Registrasi -->
                <div id="tab-content-1" class="tab-content p-8 md:p-12">
                    <div class="text-center mb-12">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-blue-500 rounded-full shadow-lg mb-6 transform hover:rotate-12 transition-transform">
                            <i data-lucide="user" class="w-10 h-10 text-white"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                            Login & Registrasi
                        </h2>
                        <p class="text-lg text-gray-600">
                            Buat akun dan login ke platform Naramakna
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Steps -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <div class="w-1 h-6 bg-blue-500 rounded-full"></div>
                                Langkah-langkah:
                            </h3>
                            <div class="space-y-4">
                                <div class="flex gap-4 p-4 rounded-xl bg-blue-50 border-blue-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-blue-500 text-white rounded-full font-bold text-sm">1</div>
                                    <p class="text-gray-700 leading-relaxed">Klik tombol "Daftar" di pojok kanan atas</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-blue-50 border-blue-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-blue-500 text-white rounded-full font-bold text-sm">2</div>
                                    <p class="text-gray-700 leading-relaxed">Isi form registrasi dengan data lengkap</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-blue-50 border-blue-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-blue-500 text-white rounded-full font-bold text-sm">3</div>
                                    <p class="text-gray-700 leading-relaxed">Verifikasi email yang dikirim</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-blue-50 border-blue-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-blue-500 text-white rounded-full font-bold text-sm">4</div>
                                    <p class="text-gray-700 leading-relaxed">Login dengan akun yang sudah dibuat</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tips -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <div class="w-1 h-6 bg-blue-500 rounded-full"></div>
                                Tips & Trik:
                            </h3>
                            <div class="bg-blue-50 border-2 border-blue-200 p-6 shadow-md rounded-xl">
                                <div class="space-y-4">
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-blue-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Gunakan email yang aktif dan mudah diakses</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-blue-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Password minimal 8 karakter dengan kombinasi huruf dan angka</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-blue-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Simpan informasi login dengan aman</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab 2: Lengkapi Profile -->
                <div id="tab-content-2" class="tab-content p-8 md:p-12 hidden">
                    <div class="text-center mb-12">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-green-500 rounded-full shadow-lg mb-6 transform hover:rotate-12 transition-transform">
                            <i data-lucide="user-circle" class="w-10 h-10 text-white"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                            Lengkapi Profile
                        </h2>
                        <p class="text-lg text-gray-600">
                            Isi data diri dan informasi penulis
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Steps -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <div class="w-1 h-6 bg-green-500 rounded-full"></div>
                                Langkah-langkah:
                            </h3>
                            <div class="space-y-4">
                                <div class="flex gap-4 p-4 rounded-xl bg-green-50 border-green-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-green-500 text-white rounded-full font-bold text-sm">1</div>
                                    <p class="text-gray-700 leading-relaxed">Upload foto profile yang profesional</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-green-50 border-green-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-green-500 text-white rounded-full font-bold text-sm">2</div>
                                    <p class="text-gray-700 leading-relaxed">Isi bio dan deskripsi diri</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-green-50 border-green-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-green-500 text-white rounded-full font-bold text-sm">3</div>
                                    <p class="text-gray-700 leading-relaxed">Pilih kategori penulisan yang diminati</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-green-50 border-green-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-green-500 text-white rounded-full font-bold text-sm">4</div>
                                    <p class="text-gray-700 leading-relaxed">Tambahkan portfolio atau karya sebelumnya</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tips -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <div class="w-1 h-6 bg-green-500 rounded-full"></div>
                                Tips & Trik:
                            </h3>
                            <div class="bg-green-50 border-2 border-green-200 p-6 shadow-md rounded-xl">
                                <div class="space-y-4">
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-green-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Foto profile sebaiknya formal dan profesional</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-green-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Bio yang menarik dan menjelaskan keahlian</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-green-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Portfolio menunjukkan kredibilitas penulis</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab 3: Mulai Menulis -->
                <div id="tab-content-3" class="tab-content p-8 md:p-12 hidden">
                    <div class="text-center mb-12">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-purple-500 rounded-full shadow-lg mb-6 transform hover:rotate-12 transition-transform">
                            <i data-lucide="pen-tool" class="w-10 h-10 text-white"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                            Mulai Menulis
                        </h2>
                        <p class="text-lg text-gray-600">
                            Buat artikel pertama dan publish
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Steps -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <div class="w-1 h-6 bg-purple-500 rounded-full"></div>
                                Langkah-langkah:
                            </h3>
                            <div class="space-y-4">
                                <div class="flex gap-4 p-4 rounded-xl bg-purple-50 border-purple-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-purple-500 text-white rounded-full font-bold text-sm">1</div>
                                    <p class="text-gray-700 leading-relaxed">Klik tombol "Tulis Artikel" di dashboard</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-purple-50 border-purple-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-purple-500 text-white rounded-full font-bold text-sm">2</div>
                                    <p class="text-gray-700 leading-relaxed">Pilih kategori dan sub-kategori yang sesuai</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-purple-50 border-purple-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-purple-500 text-white rounded-full font-bold text-sm">3</div>
                                    <p class="text-gray-700 leading-relaxed">Tulis artikel dengan format yang baik</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-purple-50 border-purple-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-purple-500 text-white rounded-full font-bold text-sm">4</div>
                                    <p class="text-gray-700 leading-relaxed">Upload gambar pendukung dan submit untuk review</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tips -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <div class="w-1 h-6 bg-purple-500 rounded-full"></div>
                                Tips & Trik:
                            </h3>
                            <div class="bg-purple-50 border-2 border-purple-200 p-6 shadow-md rounded-xl">
                                <div class="space-y-4">
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-purple-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Proses review biasanya 1-2 hari kerja</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-purple-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Pastikan artikel sesuai dengan guidelines</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-purple-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Jika ada revisi, ikuti feedback dari admin</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab 4: Review & Publish -->
                <div id="tab-content-4" class="tab-content p-8 md:p-12 hidden">
                    <div class="text-center mb-12">
                        <div class="inline-flex items-center justify-center w-20 h-20 bg-orange-500 rounded-full shadow-lg mb-6 transform hover:rotate-12 transition-transform">
                            <i data-lucide="check-circle" class="w-10 h-10 text-white"></i>
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                            Review & Publish
                        </h2>
                        <p class="text-lg text-gray-600">
                            Admin akan review tulisan sebelum publish
                        </p>
                    </div>

                    <div class="grid md:grid-cols-2 gap-8">
                        <!-- Steps -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <div class="w-1 h-6 bg-orange-500 rounded-full"></div>
                                Langkah-langkah:
                            </h3>
                            <div class="space-y-4">
                                <div class="flex gap-4 p-4 rounded-xl bg-orange-50 border-orange-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-orange-500 text-white rounded-full font-bold text-sm">1</div>
                                    <p class="text-gray-700 leading-relaxed">Submit artikel untuk review admin</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-orange-50 border-orange-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-orange-500 text-white rounded-full font-bold text-sm">2</div>
                                    <p class="text-gray-700 leading-relaxed">Admin akan check kualitas dan konten</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-orange-50 border-orange-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-orange-500 text-white rounded-full font-bold text-sm">3</div>
                                    <p class="text-gray-700 leading-relaxed">Jika ada revisi, admin akan memberikan feedback</p>
                                </div>
                                <div class="flex gap-4 p-4 rounded-xl bg-orange-50 border-orange-200 border transition-all hover:shadow-md hover:-translate-y-1">
                                    <div class="flex-shrink-0 flex items-center justify-center w-8 h-8 bg-orange-500 text-white rounded-full font-bold text-sm">4</div>
                                    <p class="text-gray-700 leading-relaxed">Setelah approved, artikel akan dipublish</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tips -->
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center gap-2">
                                <div class="w-1 h-6 bg-orange-500 rounded-full"></div>
                                Tips & Trik:
                            </h3>
                            <div class="bg-orange-50 border-2 border-orange-200 p-6 shadow-md rounded-xl">
                                <div class="space-y-4">
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-orange-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Mulai dengan topik yang dikuasai</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-orange-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Gunakan bahasa yang mudah dipahami</p>
                                    </div>
                                    <div class="flex gap-3">
                                        <div class="flex-shrink-0 w-1.5 h-1.5 bg-orange-500 rounded-full mt-2"></div>
                                        <p class="text-gray-700 leading-relaxed">Tambahkan gambar yang relevan dan berkualitas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16 mb-10" style="background-color: #f3f4f6;">
    <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
            <!-- Section Header -->
            <div class="text-center mb-12">
                <div class="inline-flex items-center justify-center w-16 h-16 bg-white rounded-2xl shadow-lg mb-4 transform hover:scale-110 transition-transform">
                    <i data-lucide="help-circle" class="w-8 h-8 text-orange-500"></i>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-3">
                    Pertanyaan Umum
                </h2>
                <p class="text-lg text-gray-600">
                    Temukan jawaban untuk pertanyaan yang sering diajukan
                </p>
            </div>

            <!-- FAQ Accordion -->
            <div class="space-y-4">
                <!-- FAQ 1 -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <button onclick="toggleAccordion(1)" class="w-full text-left px-6 py-5 font-semibold text-gray-900 hover:text-orange-600 transition-colors flex justify-between items-center">
                        <span>Berapa lama proses review?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transform transition-transform accordion-icon-1"></i>
                    </button>
                    <div id="accordion-1" class="accordion-content px-6">
                        <p class="text-gray-600 leading-relaxed pb-5">
                            Proses review artikel biasanya memakan waktu 24-48 jam kerja. Tim admin akan review kualitas konten dan memberikan feedback jika diperlukan.
                        </p>
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <button onclick="toggleAccordion(2)" class="w-full text-left px-6 py-5 font-semibold text-gray-900 hover:text-orange-600 transition-colors flex justify-between items-center">
                        <span>Apakah ada syarat khusus?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transform transition-transform accordion-icon-2"></i>
                    </button>
                    <div id="accordion-2" class="accordion-content px-6">
                        <p class="text-gray-600 leading-relaxed pb-5">
                            Tidak ada syarat khusus, yang penting adalah keinginan untuk berbagi pengetahuan dan menulis konten yang berkualitas.
                        </p>
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <button onclick="toggleAccordion(3)" class="w-full text-left px-6 py-5 font-semibold text-gray-900 hover:text-orange-600 transition-colors flex justify-between items-center">
                        <span>Bisa menulis dalam bahasa apa?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transform transition-transform accordion-icon-3"></i>
                    </button>
                    <div id="accordion-3" class="accordion-content px-6">
                        <p class="text-gray-600 leading-relaxed pb-5">
                            Saat ini platform mendukung penulisan dalam Bahasa Indonesia dan Bahasa Inggris untuk menjangkau pembaca yang lebih luas.
                        </p>
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm hover:shadow-md transition-shadow">
                    <button onclick="toggleAccordion(4)" class="w-full text-left px-6 py-5 font-semibold text-gray-900 hover:text-orange-600 transition-colors flex justify-between items-center">
                        <span>Bagaimana jika artikel ditolak?</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 transform transition-transform accordion-icon-4"></i>
                    </button>
                    <div id="accordion-4" class="accordion-content px-6">
                        <p class="text-gray-600 leading-relaxed pb-5">
                            Jika artikel ditolak, admin akan memberikan feedback dan saran perbaikan. Penulis bisa merevisi dan submit ulang artikel tersebut.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-16" style="background-color: #f3f4f6;">
    <div class="container mx-auto px-4">
        <div class="max-w-5xl mx-auto">
            <div class="relative overflow-hidden rounded-3xl bg-orange-500 p-12 md:p-16 shadow-2xl">
                <!-- Decorative elements -->
                <div class="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full -translate-y-1/2 translate-x-1/2 blur-3xl"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/10 rounded-full translate-y-1/2 -translate-x-1/2 blur-3xl"></div>
                
                <div class="relative z-10 text-center">
                    <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">
                        Siap Menjadi Penulis?
                    </h2>
                    <p class="text-lg md:text-xl text-orange-50 mb-8 max-w-2xl mx-auto leading-relaxed">
                        Bergabunglah dengan komunitas penulis berkualitas dan bagikan pengetahuan Anda kepada ribuan pembaca
                    </p>
                    
                    <div class="flex flex-wrap justify-center gap-4">
                        <button class="inline-flex items-center gap-2 px-6 py-3 bg-white text-orange-600 rounded-lg hover:bg-orange-50 shadow-lg hover:shadow-xl transition-all hover:scale-105 font-semibold">
                            <i data-lucide="message-circle" class="w-5 h-5"></i>
                            Hubungi Kami
                        </button>
                        <button class="inline-flex items-center gap-2 px-6 py-3 bg-transparent text-white border-2 border-white rounded-lg hover:bg-white hover:text-orange-600 shadow-lg hover:shadow-xl transition-all hover:scale-105 font-semibold">
                            <i data-lucide="user-plus" class="w-5 h-5"></i>
                            Daftar Sekarang
                        </button>
                        <button class="inline-flex items-center gap-2 px-6 py-3 bg-white/10 text-white border-2 border-white/30 rounded-lg hover:bg-white hover:text-orange-600 backdrop-blur-sm shadow-lg hover:shadow-xl transition-all hover:scale-105 font-semibold">
                            <i data-lucide="log-in" class="w-5 h-5"></i>
                            Sudah Punya Akun? Login
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    // Fix search icon position
    document.addEventListener('DOMContentLoaded', function() {
        const searchIcon = document.querySelector('.relative.flex-1 svg');
        if (searchIcon) {
            searchIcon.classList.add('search-icon-fix');
        }
    });

    // Initialize Lucide icons
    lucide.createIcons();

    // Tab switching function
    function switchTab(tabNumber) {
        // Hide all tab contents
        for (let i = 1; i <= 4; i++) {
            document.getElementById(`tab-content-${i}`).classList.add('hidden');
            const btn = document.getElementById(`tab-btn-${i}`);
            
            // Reset button styles
            btn.classList.remove('bg-blue-500', 'bg-green-500', 'bg-purple-500', 'bg-orange-500', 'text-white', 'shadow-lg');
            btn.classList.add('bg-white', 'text-gray-600', 'border', 'border-gray-200');
            
            // Reset number badge
            const badge = btn.querySelector('div');
            badge.classList.remove('bg-white/20');
            const number = badge.querySelector('span');
            number.classList.remove('text-white');
        }

        // Show selected tab content
        document.getElementById(`tab-content-${tabNumber}`).classList.remove('hidden');
        
        // Update button styles
        const activeBtn = document.getElementById(`tab-btn-${tabNumber}`);
        activeBtn.classList.remove('bg-white', 'text-gray-600', 'border', 'border-gray-200');
        activeBtn.classList.add('text-white', 'shadow-lg');
        
        // Apply color based on tab number
        const colors = ['blue', 'green', 'purple', 'orange'];
        const color = colors[tabNumber - 1];
        activeBtn.classList.add(`bg-${color}-500`);
        
        // Update number badge
        const activeBadge = activeBtn.querySelector('div');
        activeBadge.classList.add('bg-white/20');
        const activeNumber = activeBadge.querySelector('span');
        activeNumber.classList.add('text-white');
        activeNumber.classList.remove(`text-${color}-600`);
        
        // Reinitialize icons
        lucide.createIcons();
    }

    // Accordion toggle function
    function toggleAccordion(number) {
        const content = document.getElementById(`accordion-${number}`);
        const icon = document.querySelector(`.accordion-icon-${number}`);
        
        if (content.classList.contains('active')) {
            content.classList.remove('active');
            icon.style.transform = 'rotate(0deg)';
        } else {
            // Close all accordions
            document.querySelectorAll('.accordion-content').forEach(item => {
                item.classList.remove('active');
            });
            document.querySelectorAll('[class*="accordion-icon-"]').forEach(item => {
                item.style.transform = 'rotate(0deg)';
            });
            
            // Open clicked accordion
            content.classList.add('active');
            icon.style.transform = 'rotate(180deg)';
        }
    }

    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
@endpush
