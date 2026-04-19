<header class="bg-white border-b border-gray-200 sticky top-0 z-[1000]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 py-4 flex-wrap">
            <a href="{{ url('/') }}" class="no-underline flex items-center">
                <picture>
                    <source media="(min-width: 768px)" srcset="{{ $logoWebBase64 }}">
                    <img src="{{ $logoWebBase64 }}" alt="Naramakna" class="h-8 w-auto" loading="lazy">
                </picture>
            </a>
            <div class="flex items-center gap-3 flex-1 max-w-[600px] w-full order-3 lg:order-2">
                <div class="relative flex-1" id="search-wrapper">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400 z-10" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <input type="text" id="live-search-input"
                        class="w-full py-2.5 pl-10 pr-4 border border-gray-300 rounded-lg outline-none focus:border-yellow-450 focus:ring-2 focus:ring-yellow-450/20 transition-all"
                        placeholder="Cari berita terbaru..." autocomplete="off">
                    {{-- Loading spinner --}}
                    <div id="search-spinner" class="hidden absolute right-3 top-1/2 -translate-y-1/2">
                        <svg class="animate-spin h-4 w-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                            <path class="opacity-75" fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z" />
                        </svg>
                    </div>
                    {{-- Dropdown Results --}}
                    <div id="search-dropdown"
                        class="hidden absolute top-full left-0 right-0 mt-2 bg-white rounded-lg border-2 border-white shadow-lg shadow-black/10 overflow-hidden z-50 max-h-[420px] overflow-y-auto">
                        <div id="search-results"></div>
                        <div id="search-no-results" class="hidden px-5 py-6 text-center">
                            <svg class="mx-auto mb-2 w-10 h-10 text-gray-300" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                    d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-sm text-gray-400 font-medium">Tidak ada artikel yang cocok</p>
                        </div>
                    </div>
                </div>
                <a href="https://naramakna.id/login"
                    class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 bg-white rounded-lg hover:bg-gray-50 transition-all no-underline cursor-pointer">Masuk</a>
                <a href="https://naramakna.id/tulis"
                    class="px-4 py-2 text-sm font-medium text-white bg-yellow-450 rounded-lg hover:bg-yellow-550 transition-all no-underline cursor-pointer">Buat
                    Tulisan</a>
            </div>
        </div>
        <nav class="border-t border-gray-200 py-3 overflow-y-hidden">
            <ul
                class="flex list-none gap-3 md:gap-6 flex-nowrap md:flex-wrap overflow-x-auto overflow-y-hidden md:overflow-visible -mx-4 px-4 snap-x snap-mandatory">
                @if(isset($headerCategories))
                    @foreach($headerCategories as $category)
                        <li class="shrink-0 snap-start"><a href="{{ route('category', ['slug' => $category['slug']]) }}"
                                class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">{{ $category['name'] }}</a>
                        </li>
                    @endforeach
                @else
                    {{-- Fallback if categories fail to load --}}
                    <li class="shrink-0 snap-start"><a href="#"
                            class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Narapandang</a>
                    </li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Pelakon</a>
                    </li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Laga
                            & Gaya</a></li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Wahana</a>
                    </li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Olah
                            Bola</a></li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Cerita
                            Rasa</a></li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Horison</a>
                    </li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Jagat
                            Kita</a></li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Mata
                            Elang</a></li>
                @endif
                <li class="shrink-0 snap-start">
                    <a href="#" onclick="openMoreSidebar()"
                        class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors inline-flex items-center gap-1 whitespace-nowrap">
                        <span>Lainnya</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12" />
                            <line x1="3" y1="6" x2="21" y2="6" />
                            <line x1="3" y1="18" x2="21" y2="18" />
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="bg-gray-50 border-t border-gray-200 py-2.5 min-h-[56px] overflow-y-hidden">
            <ul
                class="flex list-none gap-2 md:gap-3 flex-nowrap md:flex-wrap overflow-x-auto overflow-y-hidden md:overflow-visible -mx-4 px-4 snap-x snap-mandatory h-[48px] md:h-auto items-center">
                <li class="shrink-0 snap-start"><a href="{{ route('index') }}"
                        class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline bg-red-100 text-red-800 whitespace-nowrap">Index
                        Berita</a></li>
                {{-- <li><a href="#"
                        class="px-4 py-1.5 text-xs font-medium rounded-full no-underline bg-blue-100 text-blue-800">Video
                        Story</a></li> --}}
                {{-- <li><a href="#"
                        class="px-4 py-1.5 text-xs font-medium rounded-full no-underline bg-green-100 text-green-800">Polling</a>
                </li> --}}
                @if(isset($subHeaderCategories))
                    @foreach($subHeaderCategories as $category)
                        <li class="shrink-0 snap-start"><a href="{{ route('category', ['slug' => $category['slug']]) }}"
                                class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">{{ $category['name'] }}</a>
                        </li>
                    @endforeach
                @else
                    {{-- Fallback --}}
                    <li class="shrink-0 snap-start"><a href="#"
                            class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Budaya</a>
                    </li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Pendidikan</a>
                    </li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Teknologi</a>
                    </li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Data
                            Bicara</a></li>
                    <li class="shrink-0 snap-start"><a href="#"
                            class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Liputan
                            Khusus</a></li>
                @endif
            </ul>
        </div>
    </div>

    {{-- Live Search Styles --}}
    <style>
        .search-item {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 12px 20px;
            border-bottom: 1px solid #f3f4f6;
            text-decoration: none;
            transition: background-color 0.15s ease;
            cursor: pointer;
        }

        .search-item:last-child {
            border-bottom: none;
        }

        .search-item:hover {
            background-color: #fefce8;
        }

        .search-item-thumb {
            width: 60px;
            height: 60px;
            min-width: 60px;
            border-radius: 8px;
            object-fit: cover;
            background-color: #f3f4f6;
        }

        .search-item-info {
            flex: 1;
            min-width: 0;
        }

        .search-item-title {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
            line-height: 1.4;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .search-item-category {
            font-size: 11px;
            font-weight: 600;
            color: #ca8a04;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 3px;
        }

        #search-dropdown::-webkit-scrollbar {
            width: 5px;
        }

        #search-dropdown::-webkit-scrollbar-track {
            background: transparent;
        }

        #search-dropdown::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 10px;
        }
    </style>

    {{-- Live Search Script --}}
    <script>
        (function () {
            // Mock Data
            const mockArticles = [
                { title: 'Pemilu 2024: Hasil Rekapitulasi Suara Nasional', category: 'Narapandang', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+1' },
                { title: 'Timnas Indonesia Lolos ke Babak Semifinal Piala AFF', category: 'Olah Bola', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+2' },
                { title: 'Startup Lokal Raih Pendanaan Seri B Senilai $50 Juta', category: 'Teknologi', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+3' },
                { title: 'Resep Rendang Padang Autentik yang Menggugah Selera', category: 'Cerita Rasa', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+4' },
                { title: 'Film Indonesia Masuk Nominasi Festival Internasional Cannes', category: 'Laga & Gaya', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+5' },
                { title: 'Kebijakan Pendidikan Kurikulum Merdeka Belajar Tahap 2', category: 'Pendidikan', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+6' },
                { title: 'Pelaku UMKM Digital Meningkat 40% di Tahun 2024', category: 'Pelakon', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+7' },
                { title: 'Festival Budaya Nusantara Digelar di Taman Mini Indonesia', category: 'Budaya', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+8' },
                { title: 'Perubahan Iklim: Dampak Kenaikan Permukaan Air Laut', category: 'Jagat Kita', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+9' },
                { title: 'Data Bicara: Statistik Ekonomi Kreatif Indonesia', category: 'Data Bicara', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+10' },
                { title: 'Wahana Wisata Baru di Bali Menjadi Destinasi Viral', category: 'Wahana', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+11' },
                { title: 'Teknologi AI Generatif Mengubah Landscape Industri Kreatif', category: 'Teknologi', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+12' },
                { title: 'Liputan Khusus: Kehidupan Nelayan Pesisir Pulau Flores', category: 'Liputan Khusus', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+13' },
                { title: 'Horison: Eksplorasi Dunia Astronomi dan Luar Angkasa', category: 'Horison', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+14' },
                { title: 'Mata Elang: Panduan Investasi Saham untuk Pemula', category: 'Mata Elang', image: 'https://placehold.co/120x120/e2e8f0/64748b?text=News+15' },
            ];

            const input = document.getElementById('live-search-input');
            const dropdown = document.getElementById('search-dropdown');
            const resultsContainer = document.getElementById('search-results');
            const noResults = document.getElementById('search-no-results');
            const spinner = document.getElementById('search-spinner');
            const wrapper = document.getElementById('search-wrapper');

            let debounceTimer = null;

            function highlightMatch(text, query) {
                if (!query) return text;
                const regex = new RegExp('(' + query.replace(/[.*+?^${}()|[\]\\]/g, '\\$&') + ')', 'gi');
                return text.replace(regex, '<mark class="bg-yellow-200 text-yellow-900 rounded px-0.5">$1</mark>');
            }

            function showDropdown() {
                dropdown.classList.remove('hidden');
            }

            function hideDropdown() {
                dropdown.classList.add('hidden');
            }

            function renderResults(articles, query) {
                resultsContainer.innerHTML = '';

                if (articles.length === 0) {
                    noResults.classList.remove('hidden');
                    showDropdown();
                    return;
                }

                noResults.classList.add('hidden');

                articles.forEach(function (article) {
                    const item = document.createElement('a');
                    item.href = '#';
                    item.className = 'search-item';
                    item.innerHTML =
                        '<img src="' + article.image + '" alt="" class="search-item-thumb" loading="lazy">' +
                        '<div class="search-item-info">' +
                        '<div class="search-item-title">' + highlightMatch(article.title, query) + '</div>' +
                        '<div class="search-item-category">' + article.category + '</div>' +
                        '</div>';

                    item.addEventListener('click', function (e) {
                        e.preventDefault();
                        // In production, navigate to article URL
                        // window.location.href = article.url;
                    });

                    resultsContainer.appendChild(item);
                });

                showDropdown();
            }

            function performSearch(query) {
                spinner.classList.add('hidden');

                if (query.length < 2) {
                    hideDropdown();
                    return;
                }

                const lowerQuery = query.toLowerCase();
                const filtered = mockArticles.filter(function (article) {
                    return article.title.toLowerCase().includes(lowerQuery) ||
                        article.category.toLowerCase().includes(lowerQuery);
                });

                renderResults(filtered, query);
            }

            input.addEventListener('input', function () {
                const query = this.value.trim();

                clearTimeout(debounceTimer);
                hideDropdown();

                if (query.length < 2) return;

                spinner.classList.remove('hidden');

                debounceTimer = setTimeout(function () {
                    performSearch(query);
                }, 300);
            });

            input.addEventListener('focus', function () {
                const query = this.value.trim();
                if (query.length >= 2) {
                    performSearch(query);
                }
            });

            // Close dropdown on outside click
            document.addEventListener('click', function (e) {
                if (!wrapper.contains(e.target)) {
                    hideDropdown();
                }
            });

            // Close on Escape key
            input.addEventListener('keydown', function (e) {
                if (e.key === 'Escape') {
                    hideDropdown();
                    input.blur();
                }
            });
        })();
    </script>
</header>