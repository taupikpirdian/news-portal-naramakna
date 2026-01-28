@props([
    'title' => '',
    'image' => '',
    'author' => '',
    'date' => '',
    'url' => '#',
    'duration' => ''
])

<a href="{{ $url }}" class="bg-white rounded-xl overflow-hidden border border-gray-200 no-underline hover:shadow-lg transition-shadow">
    <div class="relative">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-48 object-cover">
        <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
            <div class="w-16 h-16 bg-white/90 rounded-full flex items-center justify-center">
                <svg class="w-8 h-8 text-gray-800 ml-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </div>
        </div>
        @if($duration)
            <span class="absolute bottom-2 right-2 px-2 py-1 bg-black/70 text-white text-xs rounded">{{ $duration }}</span>
        @endif
    </div>
    <div class="p-4">
        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2 mb-2">{{ $title }}</div>
        <div class="flex items-center gap-2 text-xs text-gray-500">
            <span>{{ $author }}</span>
            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
            <span>{{ $date }}</span>
        </div>
    </div>
</a>
