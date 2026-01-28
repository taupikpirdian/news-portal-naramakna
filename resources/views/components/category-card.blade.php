@props([
    'name' => '',
    'description' => '',
    'icon' => '',
    'color' => 'gray',
    'url' => '#'
])

@php
$colorClasses = [
    'purple' => 'from-purple-50 to-purple-100 border-purple-200 bg-purple-500',
    'pink' => 'from-pink-50 to-pink-100 border-pink-200 bg-pink-500',
    'orange' => 'from-orange-50 to-orange-100 border-orange-200 bg-orange-500',
    'teal' => 'from-teal-50 to-teal-100 border-teal-200 bg-teal-500',
    'indigo' => 'from-indigo-50 to-indigo-100 border-indigo-200 bg-indigo-500',
    'yellow' => 'from-yellow-50 to-yellow-100 border-yellow-200 bg-yellow-500',
    'blue' => 'from-blue-50 to-blue-100 border-blue-200 bg-blue-500',
    'green' => 'from-green-50 to-green-100 border-green-200 bg-green-500',
];

$classes = $colorClasses[$color] ?? $colorClasses['gray'];
@endphp

<a href="{{ $url }}" class="bg-gradient-to-br {{ $classes }} rounded-xl p-6 border no-underline hover:shadow-lg transition-shadow">
    <div class="flex items-center gap-3 mb-3">
        <div class="w-10 h-10 rounded-full {{ explode(' ', $classes)[2] ?? 'bg-gray-500' }} text-white flex items-center justify-center font-bold">{{ $icon }}</div>
        <h3 class="text-lg font-semibold text-gray-800">{{ $name }}</h3>
    </div>
    @if($description)
        <p class="text-sm text-gray-600">{{ $description }}</p>
    @endif
</a>
