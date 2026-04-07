@extends('layouts.app')

@section('title', 'Guarantee - Trademark USP')

@section('content')

<section style="background-image: url(./imagees/Guarentee/guarantee-background.png);" class="legal-hero-section">
    <div class="legal-hero-wrapper">

        <nav class="legal-hero-breadcrumbs">
            <a href="{{ route('home') }}" class="legal-hero-breadcrumb-link">Home</a>
            <span class="legal-hero-separator">/</span>
            <span class="legal-hero-current">Legal</span>
        </nav>

        <h1 class="legal-hero-headline">Trademark USP Guarantee</h1>

    </div>
</section>

<section style="background-color: white;" class="legal-layout-section">
    <div class="legal-layout-wrapper">

        <aside class="legal-layout-sidebar">
            <div class="legal-layout-nav-fixed">
                <h3 class="legal-layout-nav-title">In this notice</h3>

                <ul class="legal-layout-nav-list">
                    <!-- <li><a href="#terms-service" class="legal-layout-nav-link legal-layout-active-link">Trademark USP Terms Of Service</a></li> -->
                    <li><a href="{{ route('privacy-policy') }}" class="legal-layout-nav-link">Trademark USP Privacy Policy</a></li>
                    <li><a href="{{ route('guarantee') }}" class="legal-layout-nav-link">Trademark USP Guarantee</a></li>
                    <!-- <li><a href="#user-obligations" class="legal-layout-nav-link">User Obligations</a></li> -->
                    <li><a href="{{ route('term-of-service') }}" class="legal-layout-nav-link">Trademark USP Terms of Service</a></li>
                </ul>
            </div>
        </aside>

        <main class="legal-layout-content">

            <p>Trademark USP is focused on providing small business owners
                a simple, fast, and economical approach to protecting their
                brand and business worldwide.</p>

            <p>The Trademark USP strives to meet the trademark needs of our customers in a professional, courteous and efficient manner. We want every customer to be satisfied, so we will work with any customer who has any questions or concerns about their filings. Our customer service team is made up of dedicated trademark representatives with one goal - to meet each client's needs in a friendly, caring, and efficient manner. If you do not think we have met this goal, let us know and we will be happy to make every effort to resolve the issue(s). If we make an error on your filing, we will make the changes needed as soon as we can at no additional cost to you.</p>

            <p>All refund requests must be processed by one of our phone customer service representatives. Please note only Trademark USP fees are refundable; all government fees involved in your filing services are non-refundable.</p>


        </main>
    </div>
</section>

@endsection