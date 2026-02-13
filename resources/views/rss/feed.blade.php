@php echo '
<?xml version="1.0" encoding="UTF-8"?>'; @endphp
<rss version="2.0"
     xmlns:content="http://purl.org/rss/1.0/modules/content/"
     xmlns:dc="http://purl.org/dc/elements/1.1/"
     xmlns:atom="http://www.w3.org/2005/Atom">
    <channel>
        <title>Naramakna - Cerdas Memaknai</title>
        <description>Naramakna adalah portal berita terpercaya yang menyajikan berita terbaru, artikel mendalam, dan analisis tajam dari berbagai kategori.</description>
        <link>{{ url('/') }}</link>
        <atom:link href="{{ url('/sitemap.rss') }}" rel="self" type="application/rss+xml" />
        <language>id</language>
        <lastBuildDate>{{ \Carbon\Carbon::now()->toRssString() }}</lastBuildDate>

        @foreach($posts as $post)
        <item>
            <title>{{ htmlspecialchars($post['title'] ?? '') }}</title>
            <link>{{ url('/artikel/' . ($post['slug'] ?? '')) }}</link>
            <description>{{ htmlspecialchars(strip_tags($post['excerpt'] ?? $post['content'] ?? '')) }}</description>
            <content:encoded><![CDATA[{!! $post['content'] ?? '' !!}]]></content:encoded>
            <category>{{ $post['category']['name'] ?? 'Berita' }}</category>
            <dc:creator>{{ $post['author']['display_name'] ?? 'Redaksi' }}</dc:creator>
            <pubDate>{{ isset($post['published_at']) ? \Carbon\Carbon::parse($post['published_at'])->toRssString() : \Carbon\Carbon::now()->toRssString() }}</pubDate>
            <guid>{{ url('/read/' . ($post['slug'] ?? '')) }}</guid>
        </item>
        @endforeach
    </channel>
</rss>