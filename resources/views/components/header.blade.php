<header class="bg-white border-b border-gray-200 sticky top-0 z-[1000]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between gap-4 py-4 flex-wrap">
            <a href="/" class="text-2xl font-bold no-underline">
                <div><span class="text-gray-800">nara</span><span class="text-yellow-450">makna</span></div>
                <div class="text-xs text-gray-500 tracking-wider">Cerdas Memaknai</div>
            </a>
            <div class="flex items-center gap-3 flex-1 max-w-[600px] w-full order-3 lg:order-2">
                <div class="relative flex-1">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                    <input type="text" class="w-full py-2.5 pl-10 pr-4 border border-gray-300 rounded-lg outline-none focus:border-yellow-450 focus:ring-2 focus:ring-yellow-450/20 transition-all" placeholder="Cari berita terbaru...">
                </div>
                <button type="button" aria-label="Buka Menu" onclick="openMoreSidebar()" class="sm:hidden p-2.5 rounded-lg border border-gray-300 bg-white text-gray-700 hover:bg-gray-50 transition-all inline-flex items-center justify-center">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" y1="6" x2="21" y2="6"/>
                        <line x1="3" y1="12" x2="21" y2="12"/>
                        <line x1="3" y1="18" x2="21" y2="18"/>
                    </svg>
                </button>
                <a href="https://naramakna.id/login" class="hidden sm:inline-flex px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 bg-white rounded-lg hover:bg-gray-50 transition-all no-underline cursor-pointer">Masuk</a>
                <a href="https://naramakna.id/tulis" class="hidden sm:inline-flex px-4 py-2 text-sm font-medium text-white bg-yellow-450 rounded-lg hover:bg-yellow-550 transition-all no-underline cursor-pointer">Buat Tulisan</a>
            </div>
        </div>
        <nav class="border-t border-gray-200 py-3 overflow-x-auto -mx-4 px-4 md:overflow-visible md:mx-0 md:px-0 scroll-smooth">
            <ul class="flex gap-6 list-none flex-nowrap snap-x snap-mandatory md:flex-wrap">
                @if(isset($headerCategories))
                    @foreach($headerCategories as $category)
                    <li class="snap-start shrink-0 flex-none"><a href="{{ route('category', ['slug' => $category['slug']]) }}" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">{{ $category['name'] }}</a></li>
                    @endforeach
                @else
                    {{-- Fallback if categories fail to load --}}
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Narapandang</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Pelakon</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Laga & Gaya</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Wahana</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Olah Bola</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Cerita Rasa</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Horison</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Jagat Kita</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="text-gray-700 no-underline text-sm font-medium hover:text-yellow-450 transition-colors whitespace-nowrap">Mata Elang</a></li>
                @endif
                <li class="snap-start shrink-0 flex-none">
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
        <div class="bg-gray-50 border-t border-gray-200 py-2 overflow-x-auto -mx-4 px-4 md:overflow-visible md:mx-0 md:px-0 scroll-smooth">
            <ul class="flex flex-nowrap gap-3 list-none snap-x snap-mandatory md:flex-wrap">
                <li class="snap-start shrink-0 flex-none"><a href="{{ route('index') }}" class="px-4 py-1.5 text-xs font-medium rounded-full no-underline bg-red-100 text-red-800 whitespace-nowrap">Index Berita</a></li>
                {{-- <li><a href="#" class="px-4 py-1.5 text-xs font-medium rounded-full no-underline bg-blue-100 text-blue-800">Video Story</a></li> --}}
                {{-- <li><a href="#" class="px-4 py-1.5 text-xs font-medium rounded-full no-underline bg-green-100 text-green-800">Polling</a></li> --}}
                @if(isset($subHeaderCategories))
                    @foreach($subHeaderCategories as $category)
                    <li class="snap-start shrink-0 flex-none"><a href="{{ route('category', ['slug' => $category['slug']]) }}" class="px-4 py-1.5 text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">{{ $category['name'] }}</a></li>
                    @endforeach
                @else
                    {{-- Fallback --}}
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="px-4 py-1.5 text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Budaya</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="px-4 py-1.5 text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Pendidikan</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="px-4 py-1.5 text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Teknologi</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="px-4 py-1.5 text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Data Bicara</a></li>
                    <li class="snap-start shrink-0 flex-none"><a href="#" class="px-4 py-1.5 text-xs font-medium rounded-full no-underline text-gray-600 whitespace-nowrap">Liputan Khusus</a></li>
                @endif
            </ul>
        </div>
    </div>
</header>
