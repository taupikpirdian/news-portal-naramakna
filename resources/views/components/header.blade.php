<header class="bg-white border-b border-gray-200 sticky top-0 z-[1000]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 py-4 flex-wrap">
            <a href="{{ url('/') }}" class="no-underline flex items-center">
                <picture>
                    <source media="(min-width: 768px)" srcset="{{ $logoWebBase64 }}">
                    <img src="{{ $logoWebBase64 }}" alt="Naramakna" class="h-8 w-auto">
                </picture>
            </a>
            <div class="flex items-center gap-3 flex-1 max-w-[600px] w-full order-3 lg:order-2">
                <div class="relative flex-1">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" class="w-full py-2.5 pl-10 pr-4 border border-gray-300 rounded-lg outline-none focus:border-yellow-450 focus:ring-2 focus:ring-yellow-450/20 transition-all" placeholder="Cari berita terbaru...">
                </div>
                <a href="https://naramakna.id/login" class="px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 bg-white rounded-lg hover:bg-gray-50 transition-all no-underline cursor-pointer">Masuk</a>
                <a href="https://naramakna.id/tulis" class="px-4 py-2 text-sm font-medium text-white bg-yellow-450 rounded-lg hover:bg-yellow-550 transition-all no-underline cursor-pointer">Buat Tulisan</a>
            </div>
        </div>
        <nav class="border-t border-gray-200 py-3 overflow-y-hidden">
            <ul class="flex list-none gap-3 md:gap-6 flex-nowrap md:flex-wrap overflow-x-auto overflow-y-hidden md:overflow-visible -mx-4 px-4 snap-x snap-mandatory">
                @if(isset($headerCategories))
                    @foreach($headerCategories as $category)
                    <li class="shrink-0 snap-start"><a href="{{ route('category', ['slug' => $category['slug']]) }}" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">{{ $category['name'] }}</a></li>
                    @endforeach
                @else
                    {{-- Fallback if categories fail to load --}}
                    <li class="shrink-0 snap-start"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Narapandang</a></li>
                    <li class="shrink-0 snap-start"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Pelakon</a></li>
                    <li class="shrink-0 snap-start"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Laga & Gaya</a></li>
                    <li class="shrink-0 snap-start"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Wahana</a></li>
                    <li class="shrink-0 snap-start"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Olah Bola</a></li>
                    <li class="shrink-0 snap-start"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Cerita Rasa</a></li>
                    <li class="shrink-0 snap-start"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Horison</a></li>
                    <li class="shrink-0 snap-start"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Jagat Kita</a></li>
                    <li class="shrink-0 snap-start"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Mata Elang</a></li>
                @endif
                <li class="shrink-0 snap-start">
                    <a href="#" onclick="openMoreSidebar()" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors inline-flex items-center gap-1 whitespace-nowrap">
                        <span>Lainnya</span>
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="3" y1="12" x2="21" y2="12"/>
                            <line x1="3" y1="6" x2="21" y2="6"/>
                            <line x1="3" y1="18" x2="21" y2="18"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="bg-gray-50 border-t border-gray-200 py-2.5 min-h-[56px] overflow-y-hidden">
            <ul class="flex list-none gap-2 md:gap-3 flex-nowrap md:flex-wrap overflow-x-auto overflow-y-hidden md:overflow-visible -mx-4 px-4 snap-x snap-mandatory h-[48px] md:h-auto items-center">
                <li class="shrink-0 snap-start"><a href="{{ route('index') }}" class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline bg-red-100 text-red-800 whitespace-nowrap">Index Berita</a></li>
                {{-- <li><a href="#" class="px-4 py-1.5 text-xs font-medium rounded-full no-underline bg-blue-100 text-blue-800">Video Story</a></li> --}}
                {{-- <li><a href="#" class="px-4 py-1.5 text-xs font-medium rounded-full no-underline bg-green-100 text-green-800">Polling</a></li> --}}
                @if(isset($subHeaderCategories))
                    @foreach($subHeaderCategories as $category)
                <li class="shrink-0 snap-start"><a href="{{ route('category', ['slug' => $category['slug']]) }}" class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">{{ $category['name'] }}</a></li>
                    @endforeach
                @else
                    {{-- Fallback --}}
                <li class="shrink-0 snap-start"><a href="#" class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Budaya</a></li>
                <li class="shrink-0 snap-start"><a href="#" class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Pendidikan</a></li>
                <li class="shrink-0 snap-start"><a href="#" class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Teknologi</a></li>
                <li class="shrink-0 snap-start"><a href="#" class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Data Bicara</a></li>
                <li class="shrink-0 snap-start"><a href="#" class="px-4 h-8 inline-flex items-center text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Liputan Khusus</a></li>
                @endif
            </ul>
        </div>
    </div>
</header>
