@extends('layouts.app')

@section('title', 'Blogs - Trademark USP')

@section('content')

<!-- hero section  -->
<section class="blog-hero-section">
    <div class="blog-hero-wrapper">
        
        <nav class="blog-hero-breadcrumbs">
            <a href="/" class="blog-hero-breadcrumb-link">Home</a>
            <span class="blog-hero-separator">/</span>
            <a href="/blog" class="blog-hero-breadcrumb-link">Blog</a>
            <span class="blog-hero-separator">/</span>
            <!-- <span class="blog-hero-current">Can I Trademark the Logo I Made with AI?</span> -->
        </nav>

        <span class="blog-hero-category-tag">Copyrights</span>

        <h1 class="blog-hero-headline">The Top 5 Reasons to Copyright Your Work</h1>

        <p class="blog-hero-subtitle">
            Copyright protection starts when you create something original, but the actual registration gives you the power to prove ownership, take legal action, and even monetize your work. Here are the top five reasons it pays to make it official.
        </p>

        <div class="blog-hero-meta">
            <span class="blog-hero-meta-item">
                <span class="icon">🗓️</span>
                <span class="text">November 06, 2025</span>
            </span>
            <span class="blog-hero-meta-separator">|</span>
            <span class="blog-hero-meta-item">
                <span class="text">Travis Crabtree</span>
            </span>
            <span class="blog-hero-meta-separator">|</span>
            <span class="blog-hero-meta-item">
                <span class="icon">⏱️</span>
                <span class="text">3 minute read</span>
            </span>
        </div>
        
    </div>
</section>

<!-- blog page blog setion -->
<section style="background-color: #ffffff;" class="blog-layout-section">
    <div class="blog-layout-wrapper">
        
        <aside class="blog-layout-sidebar">
            
            <div class="blog-sidebar-categories">
                <h3 class="blog-sidebar-title">Blog Categories</h3>
               <ul class="blog-sidebar-list">
                    <li><a href="{{ route('blog') }}" class="blog-sidebar-category-link ">View All</a></li>
                    <li><a href="{{ route('b-copyright') }}" class="blog-sidebar-category-link is-active">Copyrights</a></li>
                    <li><a href="{{ route('b-guides') }}" class="blog-sidebar-category-link ">Guides</a></li>
                    <li><a href="{{ route('b-trademark') }}" class="blog-sidebar-category-link ">Trademarks</a></li>
                </ul>
            </div>
            
            <hr class="blog-sidebar-divider">

            <div class="blog-sidebar-search">
                <h3 class="blog-sidebar-title">Search the blog</h3>
                <form class="blog-sidebar-search-form">
                    <input type="search" placeholder="Search..." class="blog-sidebar-search-input">
                    <button type="submit" class="blog-sidebar-search-button">
                        <span class="search-icon">🔍</span>
                    </button>
                </form>
            </div>
        </aside>

        <main class="blog-layout-main-content">
            
            <!-- <h1 class="blog-content-header-title">Everything you need to know about starting your business.</h1> -->
            <!-- <p class="blog-content-header-subtitle">
                Each and every one of our customers is assigned a personal Business Specialist. You have their direct phone number and email. Have questions? Just call your personal Business Specialist. No need to wait in a pool of phone calls.
            </p> -->
            
            <div class="blog-content-list">
                
                <div class="blog-card-item">
                    <div class="blog-card-image-container">
                        <img src="./imagees/Blogs-img/copyrights-images.jpeg" alt="A person working on a logo design." class="blog-card-image">
                    </div>
                    <div class="blog-card-info">
                        <span class="blog-card-tag">Copyrights</span>
                        <h2 class="blog-card-title">The Top 5 Reasons to Copyright Your Work</h2>
                        <p class="blog-card-summary">
                            Copyright protection starts when you create something original, but the actual registration gives you the power to prove ownership, take legal action, and even monetize your work. Here are the top five reasons it pays to make it official.
                        </p>
                        <a href="{{ route('blog-page2') }}" class="blog-card-read-more">Read More &rarr;</a>
                    </div>
                </div>

                <div class="blog-card-item">
                    <div class="blog-card-image-container">
                        <img src="./imagees/Blogs-img/copyright-2-img.jpeg" alt="Musician playing guitar." class="blog-card-image">
                    </div>
                    <div class="blog-card-info">
                        <span class="blog-card-tag">Copyrights</span>
                        <h2 class="blog-card-title">3 Cautionary Tales of Copyright Infringement </h2>
                        <p class="blog-card-summary">
                           What might happen if your business infringes on somebody’s copyright? Discover the potential consequences with the real-life cases examined in this article.
                        </p>
                        <a href="{{ route('blog-page3') }}" class="blog-card-read-more">Read More &rarr;</a>
                    </div>
                </div>
                  <div class="blog-card-item">
                    <div class="blog-card-image-container">
                        <img src="./imagees/Blogs-img/blog_fallback.png" alt="A person working on a logo design." class="blog-card-image">
                    </div>
                    <div class="blog-card-info">
                        <span class="blog-card-tag">Trademarks</span>
                        <h2 class="blog-card-title">How To Protect Your Business From Copyright Infringement</h2>
                        <p class="blog-card-summary">
                          It’s not enough to ensure that nobody infringes on your company’s copyright. You also need to avoid infringing on other people’s rights.
                        </p>
                        <a href="{{ route('blog-page4') }}" class="blog-card-read-more">Read More &rarr;</a>
                    </div>
                </div>
                </div>
        </main>
    </div>
</section>

@endsection