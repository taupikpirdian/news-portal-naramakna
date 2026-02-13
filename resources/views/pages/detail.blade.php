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
            <a id="sVerticalTwitter"
                href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($post['title']) }}"
                target="_blank" title="Bagikan di Twitter" aria-label="Bagikan di Twitter"
                class="w-9 h-9 rounded-full bg-[#1DA1F2] text-white flex items-center justify-center no-underline">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                </svg>
            </a>
            <a id="sVerticalWhatsApp"
                href="https://api.whatsapp.com/send/?phone=628979132802&text={{ urlencode($post['title']) }}%20{{ urlencode(request()->url()) }}&type=phone_number&app_absent=0"
                target="_blank" title="Bagikan di WhatsApp" aria-label="Bagikan di WhatsApp"
                class="w-9 h-9 rounded-full bg-[#25D366] text-white flex items-center justify-center no-underline">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M20.52 3.48A11.94 11.94 0 0012 0C5.37 0 0 5.37 0 12c0 2.1.55 4.06 1.52 5.77L0 24l6.4-1.68A12 12 0 0012 24c6.63 0 12-5.37 12-12 0-3.2-1.25-6.22-3.48-8.52zM12 21.6c-1.86 0-3.6-.5-5.12-1.44l-.36-.22-3.8 1 1.02-3.7-.24-.38A9.6 9.6 0 1121.6 12c0 5.3-4.3 9.6-9.6 9.6zm5.44-6.68c-.3-.16-1.77-.87-2.05-.97-.27-.1-.47-.16-.68.16-.2.3-.78.96-.95 1.16-.18.2-.35.23-.65.08-.3-.16-1.27-.47-2.42-1.49-.9-.8-1.5-1.78-1.67-2.08-.17-.3-.02-.46.13-.62.14-.14.3-.34.46-.52.15-.18.2-.3.3-.5.1-.2.05-.38-.02-.54-.08-.16-.68-1.64-.94-2.25-.25-.6-.5-.52-.68-.53l-.58-.01c-.2 0-.53.08-.82.38-.28.3-1.08 1.06-1.08 2.58s1.11 2.98 1.27 3.18c.16.2 2.18 3.33 5.3 4.6.74.32 1.32.51 1.77.65.74.24 1.42.21 1.96.13.6-.09 1.77-.72 2.02-1.41.25-.68.25-1.26.18-1.38-.07-.12-.26-.2-.56-.36z" />
                </svg>
            </a>
            <a id="sVerticalFacebook"
                href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}" target="_blank"
                title="Bagikan di Facebook" aria-label="Bagikan di Facebook"
                class="w-9 h-9 rounded-full bg-[#1877F2] text-white flex items-center justify-center no-underline">
                <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
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
            class="prose prose-lg max-w-none prose-headings:font-bold prose-headings:text-gray-900 prose-p:text-gray-700 prose-p:leading-loose prose-p:text-justify prose-p:mb-8 prose-a:text-yellow-600 prose-a:no-underline hover:prose-a:underline prose-img:rounded-xl prose-img:shadow-md prose-img:w-full prose-blockquote:border-l-4 prose-blockquote:border-yellow-450 prose-blockquote:bg-gray-50 prose-blockquote:py-2 prose-blockquote:px-4 prose-blockquote:italic prose-blockquote:text-gray-700">
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
                <a href="https://www.instagram.com/naramakna.id?igsh=ejNla2VjeDdwaWd5" target="_blank"
                    rel="noopener noreferrer" aria-label="Instagram"
                    class="no-underline hover:text-yellow-450 transition-colors">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                        <rect x="2" y="2" width="20" height="20" rx="5" stroke="currentColor" stroke-width="2" />
                        <circle cx="12" cy="12" r="4" stroke="currentColor" stroke-width="2" />
                        <circle cx="17.5" cy="6.5" r="1.5" fill="currentColor" />
                    </svg>
                </a>
                <a href="https://www.facebook.com/naramakna.id/?_rdr" target="_blank" rel="noopener noreferrer"
                    aria-label="Facebook" class="no-underline hover:text-yellow-450 transition-colors">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987H8.078v-2.89h2.36V9.845c0-2.33 1.392-3.617 3.523-3.617 1.021 0 2.09.182 2.09.182v2.297h-1.178c-1.162 0-1.523.72-1.523 1.458v1.75h2.59l-.414 2.89h-2.176v6.987C18.343 21.128 22 16.991 22 12z"
                            fill="currentColor" />
                    </svg>
                </a>
                <a href="https://x.com/apcomsolutions?s=21" target="_blank" rel="noopener noreferrer"
                    aria-label="Twitter" class="no-underline hover:text-yellow-450 transition-colors">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M23 3.5a9.5 9.5 0 01-2.74.75A4.76 4.76 0 0022.4 2a9.43 9.43 0 01-3 1.14A4.74 4.74 0 0016.04 2c-2.63 0-4.76 2.19-4.76 4.88 0 .38.04.76.12 1.12A13.4 13.4 0 013 3.05a4.92 4.92 0 00-.64 2.45 4.9 4.9 0 002.1 4.07 4.64 4.64 0 01-2.16-.62v.06c0 2.41 1.67 4.42 3.88 4.88a4.7 4.7 0 01-2.15.09 4.76 4.76 0 004.44 3.35A9.51 9.51 0 012 19.54 13.35 13.35 0 009.29 22c8.3 0 12.85-7.1 12.85-13.26 0-.2 0-.39-.01-.59A9.3 9.3 0 0023 3.5z"
                            fill="currentColor" />
                    </svg>
                </a>
                <a href="#" aria-label="YouTube" class="no-underline hover:text-yellow-450 transition-colors">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                        <rect x="2" y="6" width="20" height="12" rx="3" stroke="currentColor" stroke-width="2" />
                        <path d="M10 9l6 3-6 3V9z" fill="currentColor" />
                    </svg>
                </a>
                <a href="#" aria-label="TikTok" class="no-underline hover:text-yellow-450 transition-colors">
                    <svg width="28" height="28" viewBox="0 0 24 24" fill="none">
                        <path
                            d="M14 3v4.5a5.5 5.5 0 005 0V10a7.5 7.5 0 01-5-1.5V14a4 4 0 11-3-3.87V7.5A6.5 6.5 0 008 7a6 6 0 106 6V3z"
                            fill="currentColor" />
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