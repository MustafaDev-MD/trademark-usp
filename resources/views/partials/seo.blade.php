@php
    $path = trim(request()->path(), '/');
    $meta = config('seo')[$path] ?? config('seo')[''] ;
    $indexable = array_key_exists($path, config('seo'));
    $canonical = rtrim(config('app.url'), '/').($path ? '/'.$path : '/');
    $title = trim($__env->yieldContent('title', $meta['title']));
    $schemaJson = json_encode([
        '@'.'context' => 'https://schema.org',
        '@'.'type' => 'WebPage',
        'name' => $title,
        'description' => $meta['description'],
        'url' => $canonical,
    ], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_UNESCAPED_SLASHES | JSON_THROW_ON_ERROR);
@endphp
<meta name="description" content="{{ $meta['description'] }}">
<meta name="robots" content="{{ $indexable ? 'index, follow' : 'noindex, follow' }}">
<link rel="canonical" href="{{ $canonical }}">
<meta property="og:type" content="{{ str_starts_with($path, 'blog-page') ? 'article' : 'website' }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $meta['description'] }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:site_name" content="Trademark USP">
<meta property="og:image" content="{{ rtrim(config('app.url'), '/') }}/imagees/logo-new-BIG.png">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:description" content="{{ $meta['description'] }}">
<script type="application/ld+json">{!! $schemaJson !!}</script>
