@props([
    'posts' => []
])

<div class="bg-gradient-to-br from-purple-50 via-pink-50 to-yellow-50 rounded-2xl p-6 border border-gray-200">
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
        @foreach($posts as $post)
            <a href="{{ $post['url'] ?? '#' }}" class="group relative aspect-square rounded-xl overflow-hidden no-underline">
                <img src="{{ $post['image'] }}" alt="Instagram post" class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110">
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <div class="absolute bottom-2 left-2 right-2 flex items-center gap-3 text-white text-xs">
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/>
                            </svg>
                            {{ $post['likes'] ?? '0' }}
                        </span>
                        <span class="flex items-center gap-1">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-4 6V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10c.55 0 1-.45 1-1z"/>
                            </svg>
                            {{ $post['comments'] ?? '0' }}
                        </span>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
</div>
