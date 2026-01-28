@props([
    'title' => '',
    'excerpt' => '',
    'image' => '',
    'author' => '',
    'date' => '',
    'url' => '#',
    'category' => null,
    'variant' => 'default' // default, compact, side
])

@if($variant === 'compact')
    <a href="{{ $url }}" class="flex gap-3 no-underline rounded-xl px-2 pt-0.5 pb-1.5 hover:bg-gray-50">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-20 h-20 object-cover rounded-lg">
        <div class="flex-1">
            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">{{ $title }}</div>
            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                <span>{{ $author }}</span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span>{{ $date }}</span>
            </div>
        </div>
    </a>
@elseif($variant === 'side')
    <a href="{{ $url }}" class="flex gap-3 no-underline rounded-xl p-2 hover:bg-gray-50">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-16 h-16 object-cover rounded-lg">
        <div class="flex-1">
            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">{{ $title }}</div>
            <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                <span>{{ $author }}</span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span>{{ $date }}</span>
            </div>
        </div>
    </a>
@else
    <a href="{{ $url }}" class="bg-white rounded-xl overflow-hidden border border-gray-200 no-underline hover:shadow-lg transition-shadow">
        <img src="{{ $image }}" alt="{{ $title }}" class="w-full h-48 object-cover">
        <div class="p-4">
            @if($category)
                <span class="inline-block px-2 py-1 bg-yellow-100 text-yellow-800 text-xs font-semibold rounded-full mb-2">{{ $category }}</span>
            @endif
            <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2 mb-2">{{ $title }}</div>
            @if($excerpt)
                <div class="text-sm text-gray-600 line-clamp-2 mb-2">{{ $excerpt }}</div>
            @endif
            <div class="flex items-center gap-2 text-xs text-gray-500">
                <span>{{ $author }}</span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span>{{ $date }}</span>
            </div>
        </div>
    </a>
@endif
