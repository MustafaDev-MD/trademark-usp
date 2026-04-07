@extends('layouts.app')

@section('title', 'Blogs - Trademark USP')

@section('content')

<section class="blog-hero-section">
    <div class="blog-hero-wrapper">
        
        <nav class="blog-hero-breadcrumbs">
            <a href="/" class="blog-hero-breadcrumb-link">Home</a>
            <span class="blog-hero-separator">/</span>
            <a href="/blog" class="blog-hero-breadcrumb-link">Blog</a>
            <span class="blog-hero-separator">/</span>
            <!-- <span class="blog-hero-current">Can I Trademark the Logo I Made with AI?</span> -->
        </nav>

        <span class="blog-hero-category-tag">Guides</span>

        <h1 class="blog-hero-headline">Receiving Your Trademark or Copyright — What Comes Next?</h1>

        <p class="blog-hero-subtitle">
           Do you know what to do after receiving your trademark or copyright? Discover how to protect and maintain your registration.
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
                    <li><a href="{{ route('b-copyright') }}" class="blog-sidebar-category-link ">Copyrights</a></li>
                    <li><a href="{{ route('b-guides') }}" class="blog-sidebar-category-link is-active">Guides</a></li>
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
                        <img src="./imagees/Blogs-img/guide-img-1.jpeg" alt="A person working on a logo design." class="blog-card-image">
                    </div>
                    <div class="blog-card-info">
                        <span class="blog-card-tag">Guides</span>
                        <h2 class="blog-card-title">Receiving Your Trademark or Copyright — What Comes Next?</h2>
                        <p class="blog-card-summary">
                           Do you know what to do after receiving your trademark or copyright? Discover how to protect and maintain your registration.
                        </p>
                        <a href="{{ route('blog-page5') }}" class="blog-card-read-more">Read More &rarr;</a>
                    </div>
                </div>

                <div class="blog-card-item">
                    <div class="blog-card-image-container">
                        <img src="./imagees/Blogs-img/guide-img-2.jpeg" alt="Musician playing guitar." class="blog-card-image">
                    </div>
                    <div class="blog-card-info">
                        <span class="blog-card-tag">Guides</span>
                        <h2 class="blog-card-title">Tips & Tricks for Using Your Logo on Instagram </h2>
                        <p class="blog-card-summary">
                           Need help making your company logo look good on Instagram? Let Trademark USP walk you step by step through the process of successful logo design for Instagram.
                        </p>
                        <a href="{{ route('blog-page6') }}" class="blog-card-read-more">Read More &rarr;</a>
                    </div>
                </div>
                  <div class="blog-card-item">
                    <div class="blog-card-image-container">
                        <img src="./imagees/Blogs-img/How_Musicians_and_Artists_Can_Protect_Their_Work_Blog_Image_f2f0cee9d0.jpeg" alt="Musician playing guitar." class="blog-card-image">
                    </div>
                    <div class="blog-card-info">
                        <span class="blog-card-tag">Guides</span>
                        <h2 class="blog-card-title">How Musicians and Artists Can Protect Their Work</h2>
                        <p class="blog-card-summary">
                            If you worked hard and created something, no one should be allowed to profit from it except you. Find out how...
                        </p>
                        <a href="{{ route('blog-page7') }}" class="blog-card-read-more">Read More →</a>
                    </div>
                </div>

               
               

               
                
                </div>

        </main>
        
    </div>
</section>
@endsection