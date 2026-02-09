@php
    // Default SEO values
    $defaultSeo = [
        'title' => 'Naramakna - Cerdas Memaknai',
        'description' => 'Naramakna adalah portal berita terpercaya yang menyajikan berita terbaru, artikel mendalam, dan analisis tajam dari berbagai kategori.',
        'keywords' => 'naramakna, berita indonesia, berita terbaru, artikel, news portal, media online',
        'og_title' => 'Naramakna - Cerdas Memaknai',
        'og_description' => 'Naramakna adalah portal berita terpercaya yang menyajikan berita terbaru, artikel mendalam, dan analisis tajam.',
        'og_image' => 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=1200&h=630&fit=crop',
        'og_url' => url()->current(),
        'canonical' => url()->current(),
        'robots' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
        'article' => false,
        'article_published_time' => null,
        'article_modified_time' => null,
        'article_section' => null,
        'article_author' => null,
    ];

    // Merge with SEO data from controller if exists
    $seo = isset($seo) ? array_merge($defaultSeo, $seo) : $defaultSeo;
@endphp

<title>{{ $seo['title'] }}</title>
<meta name="description" content="{{ $seo['description'] }}">
@if(isset($seo['keywords']))
<meta name="keywords" content="{{ $seo['keywords'] }}">
@endif
<meta name="robots" content="{{ $seo['robots'] }}">
<link rel="canonical" href="{{ $seo['canonical'] }}">

<!-- Open Graph / Facebook -->
<meta property="og:type" content="{{ $seo['article'] ? 'article' : 'website' }}">
<meta property="og:title" content="{{ $seo['og_title'] }}">
<meta property="og:description" content="{{ $seo['og_description'] }}">
<meta property="og:image" content="{{ $seo['og_image'] }}">
<meta property="og:url" content="{{ $seo['og_url'] }}">

@if($seo['article'])
<!-- Article Specific Meta Tags -->
<meta property="article:published_time" content="{{ $seo['article_published_time'] }}">
<meta property="article:modified_time" content="{{ $seo['article_modified_time'] }}">
<meta property="article:section" content="{{ $seo['article_section'] }}">
<meta property="article:author" content="{{ $seo['article_author'] }}">
@endif

<!-- Twitter -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ $seo['og_title'] }}">
<meta name="twitter:description" content="{{ $seo['og_description'] }}">
<meta name="twitter:image" content="{{ $seo['og_image'] }}">

<!-- Additional SEO Meta Tags -->
<meta name="theme-color" content="#2563eb">
<meta name="msapplication-TileColor" content="#2563eb">
<meta name="application-name" content="Naramakna">

<!-- RSS Feed -->
<link rel="alternate" type="application/rss+xml" title="Naramakna - RSS Feed" href="{{ url('/feed') }}">
