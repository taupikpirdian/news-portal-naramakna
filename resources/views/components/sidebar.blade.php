<div id="moreSidebar" class="fixed inset-0 z-[1100] hidden opacity-0 transition-opacity duration-300">
    <div class="absolute inset-0 bg-black/40" onclick="closeMoreSidebar()"></div>
    <div id="moreSidebarPanel" class="absolute right-0 top-0 h-full w-[420px] max-w-[90vw] bg-white shadow-2xl p-6 rounded-l-2xl translate-x-full transition-transform duration-300">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Lainnya</h3>
            <button class="w-8 h-8 rounded-full bg-gray-100 text-gray-700" onclick="closeMoreSidebar()">×</button>
        </div>
        
        <div class="space-y-6 overflow-y-auto h-[calc(100%-3rem)]">
            <div>
                <div class="text-sm font-semibold text-gray-700 mb-3">Informasi</div>
                <div class="grid grid-cols-2 gap-3">
                    <a href="{{ route('tentangKami') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs">T</span>
                        <span class="text-sm text-gray-800 font-medium">Tentang Kami</span>
                    </a>
                    <a href="{{ route('caraMenulis') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center text-xs">C</span>
                        <span class="text-sm text-gray-800 font-medium">Cara Menulis</span>
                    </a>
                    <a href="{{ route('kerjaSama') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs">K</span>
                        <span class="text-sm text-gray-800 font-medium">Informasi Kerja sama</span>
                    </a>
                    <a href="{{ route('bantuan') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-red-100 text-red-600 flex items-center justify-center text-xs">B</span>
                        <span class="text-sm text-gray-800 font-medium">Bantuan</span>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-200"></div>
            <div>
                <div class="text-sm font-semibold text-gray-700 mb-3">Kategori</div>
                <div class="grid grid-cols-2 gap-3">
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center text-xs">N</span>
                        <span class="text-sm text-gray-800 font-medium">Narapandang</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center text-xs">P</span>
                        <span class="text-sm text-gray-800 font-medium">Pelakon</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center text-xs">L</span>
                        <span class="text-sm text-gray-800 font-medium">Laga & Gaya</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-teal-100 text-teal-600 flex items-center justify-center text-xs">W</span>
                        <span class="text-sm text-gray-800 font-medium">Wahana</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center text-xs">O</span>
                        <span class="text-sm text-gray-800 font-medium">Olah Bola</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center text-xs">C</span>
                        <span class="text-sm text-gray-800 font-medium">Cerita Rasa</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center text-xs">H</span>
                        <span class="text-sm text-gray-800 font-medium">Horison</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-green-100 text-green-600 flex items-center justify-center text-xs">J</span>
                        <span class="text-sm text-gray-800 font-medium">Jagat Kita</span>
                    </a>
                    <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-lg border border-gray-200 hover:bg-gray-50 no-underline">
                        <span class="w-8 h-8 rounded-full bg-rose-100 text-rose-600 flex items-center justify-center text-xs">M</span>
                        <span class="text-sm text-gray-800 font-medium">Mata Elang</span>
                    </a>
                </div>
            </div>
            <div class="border-t border-gray-200"></div>
        </div>
    </div>
</div>
