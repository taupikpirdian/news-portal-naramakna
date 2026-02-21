@extends('layouts.app')

@php
$imageUrl = 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=630&fit=crop';
if (isset($post['featured_image'])) {
if (is_array($post['featured_image']) && isset($post['featured_image']['url'])) {
$imageUrl = $post['featured_image']['url'];
} elseif (is_string($post['featured_image'])) {
$imageUrl = $post['featured_image'];
}
}

$authorName = $post['author']['display_name'] ?? 'Redaksi';
$date = isset($post['date']) ? \Carbon\Carbon::parse($post['date'])->setTimezone('Asia/Jakarta') : now()->setTimezone('Asia/Jakarta');
$category = $post['categories'][0]['name'] ?? 'Artikel';
$categorySlug = $post['categories'][0]['slug'] ?? 'artikel';
$description = $post['metadata']['_aioseo_description'] ?? $post['excerpt'] ?? Str::limit(strip_tags($post['content']),
150);
@endphp

@section('content')
<div class="grid grid-cols-12 gap-8">
    <div class="hidden lg:block col-span-1">
        <div class="sticky top-[140px] flex flex-col items-center gap-2">
            <div class="text-xs font-medium text-gray-600">Bagikan</div>
            <a id="sVerticalFacebook"
                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                title="Bagikan di Facebook" aria-label="Bagikan di Facebook"
                class="w-9 h-9 rounded-full bg-[#1877F2] text-white flex items-center justify-center no-underline">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                </svg>
            </a>
            <a id="sVerticalWhatsApp"
                href="https://api.whatsapp.com/send/?text={{ urlencode($post['title']) }}%20{{ urlencode(request()->url()) }}"
                target="_blank" title="Bagikan di WhatsApp" aria-label="Bagikan di WhatsApp"
                class="w-9 h-9 rounded-full bg-[#25D366] text-white flex items-center justify-center no-underline">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M20.52 3.48A11.94 11.94 0 0012 0C5.37 0 0 5.37 0 12c0 2.1.55 4.06 1.52 5.77L0 24l6.4-1.68A12 12 0 0012 24c6.63 0 12-5.37 12-12 0-3.2-1.25-6.22-3.48-8.52zM12 21.6c-1.86 0-3.6-.5-5.12-1.44l-.36-.22-3.8 1 1.02-3.7-.24-.38A9.6 9.6 0 1121.6 12c0 5.3-4.3 9.6-9.6 9.6zm5.44-6.68c-.3-.16-1.77-.87-2.05-.97-.27-.1-.47-.16-.68.16-.2.3-.78.96-.95 1.16-.18.2-.35.23-.65.08-.3-.16-1.27-.47-2.42-1.49-.9-.8-1.5-1.78-1.67-2.08-.17-.3-.02-.46.13-.62.14-.14.3-.34.46-.52.15-.18.2-.3.3-.5.1-.2.05-.38-.02-.54-.08-.16-.68-1.64-.94-2.25-.25-.6-.5-.52-.68-.53l-.58-.01c-.2 0-.53.08-.82.38-.28.3-1.08 1.06-1.08 2.58s1.11 2.98 1.27 3.18c.16.2 2.18 3.33 5.3 4.6.74.32 1.32.51 1.77.65.74.24 1.42.21 1.96.13.6-.09 1.77-.72 2.02-1.41.25-.68.25-1.26.18-1.38-.07-.12-.26-.2-.56-.36z" />
                </svg>
            </a>
        </div>
    </div>

    <article itemscope itemtype="https://schema.org/Article"
        class="col-span-12 lg:col-span-8 bg-white rounded-2xl shadow-sm p-6">
        <header class="mb-6">
            <a href="{{ route('category', ['slug' => $categorySlug]) }}"
                class="inline-block px-3 py-1.5 bg-yellow-450 text-white text-xs font-semibold rounded-full no-underline">{{
                $category }}</a>
            <h1 itemprop="headline" class="text-3xl sm:text-4xl font-bold text-gray-900 mt-4 leading-tight">{{
                $post['title'] }}</h1>
            <div class="flex flex-wrap gap-3 items-center text-gray-600 text-sm mt-3">
                <span itemprop="author">{{ $authorName }}</span>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <time itemprop="datePublished" datetime="{{ $date->toIso8601String() }}">{{ $date->format('d/m, H.i')
                    }}</time>
                <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                <span>{{ $category }}</span>
            </div>
        </header>

        <figure class="mb-6">
            <img src="{{ $imageUrl }}" alt="{{ $post['title'] }}" class="w-full rounded-xl object-cover max-h-[520px]"
                onerror="this.onerror=null;this.src='{{ $imageUrl }}';">
            @if(isset($post['featured_image']['caption']))
            <figcaption class="text-xs text-gray-500 mt-2">{{ $post['featured_image']['caption'] }}</figcaption>
            @endif
        </figure>

        <section itemprop="articleBody"
            class="prose prose-lg max-w-none prose-headings:font-bold prose-headings:text-gray-900 prose-p:text-gray-700 prose-p:leading-loose prose-p:text-left prose-p:mb-8 prose-a:text-yellow-600 prose-a:no-underline hover:prose-a:underline prose-img:rounded-xl prose-img:shadow-md prose-img:w-full prose-blockquote:border-l-4 prose-blockquote:border-yellow-450 prose-blockquote:bg-gray-50 prose-blockquote:py-2 prose-blockquote:px-4 prose-blockquote:italic prose-blockquote:text-gray-700">
            {!! $post['content'] !!}
        </section>

        @if(isset($post['tags']) && is_array($post['tags']) && count($post['tags']) > 0)
        <div class="flex flex-wrap items-center gap-2 mt-8">
            <span class="text-sm text-gray-600">Tag:</span>
            @foreach($post['tags'] as $tag)
            <a href="#" class="px-3 py-1.5 text-xs font-medium rounded-full no-underline bg-gray-100 text-gray-700">{{
                $tag }}</a>
            @endforeach
        </div>
        @endif

        <div class="mt-10 bg-gray-50 border border-gray-200 rounded-2xl p-8 text-center">
            <h4 class="text-base font-semibold text-gray-900">Ikuti Naramakna.id di Media Sosial</h4>
            <p class="text-sm text-gray-600 mt-2">Dapatkan update berita terbaru dan konten menarik lainnya</p>
            <div class="flex justify-center items-center gap-5 mt-4 text-gray-600">
                <a href="https://www.instagram.com/naramakna.id?igsh=ejNla2VjeDdwaWd5" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-gray-700 flex items-center justify-center no-underline text-white transition-all hover:bg-yellow-450 hover:text-white">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                    </svg>
                </a>
                <a href="https://www.tiktok.com/@naramakna.id" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-gray-700 flex items-center justify-center no-underline text-white transition-all hover:bg-yellow-450 hover:text-white"> <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"> <path d="M16.5 3c.4 2.2 2.1 3.9 4.3 4.3v3.1c-1.6 0-3.2-.5-4.6-1.5v5.3c0 3.8-3.1 6.8-6.8 6.8S2.6 18 2.6 14.2s3.1-6.8 6.8-6.8c.4 0 .8 0 1.2.1v3.5c-.4-.1-.8-.2-1.2-.2-1.9 0-3.4 1.5-3.4 3.4S7.5 18 9.4 18s3.4-1.5 3.4-3.4V3h3.7z"/> </svg> </a>
                <a href="https://www.youtube.com/@cerdasmemaknai" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-gray-700 flex items-center justify-center no-underline text-white transition-all hover:bg-yellow-450 hover:text-white">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
                <a href="https://www.facebook.com/people/Naramaknaid/61582515249969" target="_blank" rel="noopener noreferrer" class="w-9 h-9 rounded-full bg-gray-700 flex items-center justify-center no-underline text-white transition-all hover:bg-yellow-450 hover:text-white">
                    <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
            </div>
        </div>
    </article>

    <aside class="col-span-12 lg:col-span-3">
        @if(isset($latestPosts) && count($latestPosts) > 0)
        <div class="bg-white rounded-2xl shadow-sm p-4 mb-6">
            <h3 class="text-base font-semibold text-gray-900 mb-3">Artikel Terbaru</h3>
            <div class="space-y-3">
                @foreach($latestPosts as $lPost)
                @php
                $lImg = 'https://images.unsplash.com/photo-1530587191325-3db32d826c18?w=120&h=120&fit=crop';
                if (isset($lPost['featured_image'])) {
                if (is_array($lPost['featured_image']) && isset($lPost['featured_image']['url'])) {
                $lImg = $lPost['featured_image']['url'];
                } elseif (is_string($lPost['featured_image'])) {
                $lImg = $lPost['featured_image'];
                }
                }
                $lDate = isset($lPost['date']) ? \Carbon\Carbon::parse($lPost['date'])->setTimezone('Asia/Jakarta') : now()->setTimezone('Asia/Jakarta');
                $lAuthor = $lPost['author']['display_name'] ?? 'Redaksi';
                $lSlug = $lPost['slug'] ?? '#';
                @endphp
                <a href="{{ route('detail', ['slug' => $lSlug]) }}"
                    class="flex gap-3 no-underline rounded-xl p-2 hover:bg-gray-50">
                    <img src="{{ $lImg }}" alt="{{ $lPost['title'] }}" class="w-16 h-16 object-cover rounded-lg"
                        onerror="this.onerror=null;this.src='{{ $lImg }}';">
                    <div class="flex-1">
                        <div class="text-sm font-semibold text-gray-800 leading-snug line-clamp-2">{{ $lPost['title'] }}
                        </div>
                        <div class="flex items-center gap-2 text-xs text-gray-500 mt-1">
                            <span>{{ $lAuthor }}</span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span>{{ $lDate->format('d/m, H.i') }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
        @endif
    </aside>
</div>

@if(isset($relatedPosts) && count($relatedPosts) > 0)
<section class="mt-10 mb-6">
    <h3 class="text-xl font-bold text-gray-900 mb-4">Artikel Terkait</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        @foreach($relatedPosts as $rPost)
        @php
        $rImg = 'https://images.unsplash.com/photo-1511632765486-a01980e01a18?w=400&h=300&fit=crop';
        if (isset($rPost['featured_image'])) {
        if (is_array($rPost['featured_image']) && isset($rPost['featured_image']['url'])) {
        $rImg = $rPost['featured_image']['url'];
        } elseif (is_string($rPost['featured_image'])) {
        $rImg = $rPost['featured_image'];
        }
        }
        $rDate = isset($rPost['date']) ? \Carbon\Carbon::parse($rPost['date'])->setTimezone('Asia/Jakarta') : now()->setTimezone('Asia/Jakarta');
        $rAuthor = $rPost['author']['display_name'] ?? 'Redaksi';
        $rCategory = $rPost['categories'][0]['name'] ?? 'Artikel';
        $rSlug = $rPost['slug'] ?? '#';
        @endphp
        <a href="{{ route('detail', ['slug' => $rSlug]) }}"
            class="bg-white rounded-xl overflow-hidden no-underline transition-all shadow-sm hover:shadow-xl hover:-translate-y-1 group">
            <div class="relative">
                <img src="{{ $rImg }}" alt="{{ $rPost['title'] }}" class="w-full h-[200px] object-cover"
                    onerror="this.onerror=null;this.src='{{ $rImg }}';">
                <span
                    class="absolute top-3 left-3 px-2.5 py-1 bg-yellow-450 text-white text-xs font-semibold rounded-full">{{
                    $rCategory }}</span>
            </div>
            <div class="p-4">
                <h4
                    class="text-base font-semibold text-gray-800 mb-2 leading-snug line-clamp-2 group-hover:text-yellow-450">
                    {{ $rPost['title'] }}</h4>
                <div class="flex gap-2 items-center text-xs text-gray-500">
                    <span>{{ $rAuthor }}</span>
                    <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                    <span>{{ $rDate->format('d/m, H.i') }}</span>
                </div>
            </div>
        </a>
        @endforeach
    </div>
</section>
@endif

@endsection

@push('scripts')
@verbatim
<script>
    (function () {
        // Track analytics when user views the article (client-side)
        const trackAnalytics = async () => {
            const postId = '{{ $postId }}';
            const analyticsUrl = 'https://api.naramakna.id/api/analytics/track';

            try {
                await fetch(analyticsUrl, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': '*/*'
                    },
                    body: JSON.stringify({
                        content_id: postId,
                        content_type: 'post',
                        event_type: 'view'
                    }),
                    keepalive: true // Ensure request completes even if user navigates away
                });
            } catch (error) {
                // Silently fail to not disrupt user experience
                console.warn('Analytics tracking failed:', error);
            }
        };

        // Track immediately when page loads
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', trackAnalytics);
        } else {
            trackAnalytics();
        }
    })();
</script>

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "headline": "{{ $post['title'] }}",
  "image": [
    "{{ $imageUrl }}"
   ],
  "datePublished": "{{ $date->toIso8601String() }}",
  "dateModified": "{{ $date->toIso8601String() }}",
  "author": [{
      "@type": "Person",
      "name": "{{ $authorName }}"
    }]
}
</script>
@endverbatim
@endpush