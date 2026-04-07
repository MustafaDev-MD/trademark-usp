@extends('layouts.app')

@section('title', 'DMCA Takedown Service - Trademark USP')

@section('content')

<!-- hero section  -->

<section style="background-image: url('./imagees/dmca-takedown-service/dmca-takedown-service-img.jpg');" class="cta-section">
    <div class="cta-card">
        <h2 class="cta-headline">Keep Copyright Content Thieves at Bay</h2>

        <p class="cta-protection-text">
            Don’t let organizations or individuals steal your content and claim it as their own. Trademark USP’s DMCA Takedown service helps you safeguard your copyrighted materials with confidence.
        </p>

        <ul class="cta-stats">
            <li><span class="bullet-red"></span>35,000+ five-star reviews</li>
            <li><span class="bullet-red"></span>Rated 4.8 by Forbes Advisor</li>
            <li><span class="bullet-red"></span>Rated 4.5+ on Trust Pilot</li>
        </ul>

        <a href="javascript:void(0)" class="cta-button-orange fcmp-trigger-button">Start Your DMCA Takedown Today</a>

        <div class="cta-proof-row">
            <div class="proof-item reviews">
                <p class="score">4.8</p>
                <div class="advisor-logo">Forbes Advisor</div>
                <div class="stars">★★★★★</div>
            </div>

            <div class="proof-item inc-logo-box">
                <img src="./imagees/Trademark-Registration/hero-side.svg" alt="Inc 5000 Logo" class="inc-logo">
                <!-- <p class="inc-text">America's Fastest-Growing Private Companies</p> -->
            </div>
        </div>

        <div class="card-separator"></div>
    </div>

    <!-- <div class="cta-image-right">
        <img src="path/to/smiling-woman-image.jpg" alt="Business owner smiling">
    </div> -->

</section>

<!-- how it work section  -->

<section style="background-color: white;" class="how-it-works-section">


    <div class="steps-container">
        <div class="step-card">
            <img src="./imagees/comprehensive-search/how-itswork1.png" alt="Icon of a laptop with checks" class="step-icon">
            <h3 class="step-title">Answer a brief questionnaire about the stolen work.</h3>
            <!-- <p class="step-description">
                Fill out our simple online questionnaire that will take a few minutes with helpful information every step of the way.
            </p> -->
        </div>

        <div class="step-card">
            <img src="./imagees/Filing-an-extention/statement2.png" alt="Icon of a magnifying glass over document" class="step-icon">
            <h3 class="step-title">We’ll craft a DMCA takedown notice for you.</h3>
            <!-- <p class="step-description">
                We will review the information you provided and correct any common errors or gaps in your application.
            </p> -->
        </div>

        <div class="step-card">
            <img src="./imagees/comprehensive-search/how-itswork3.png" alt="Icon of an envelope with report" class="step-icon">
            <h3 class="step-title">You protect your copyright worry-free!</h3>
            <!-- <p class="step-description">
                We will file your application and give you access to your own secure on-line account with 24/7 access to all of your documents and your deadlines.
            </p> -->
        </div>
    </div>
</section>

<section class="final-cta-section">
    <div class="cta-content-wrapper">
        <!-- <h2 class="cta-headline">Take action to protect your name today.</h2> -->

        <p class="cta-subtext">
            If someone is using your images, video, audio, or products without your permission, we’re here to help. Take down your stolen content today for $65, or get unlimited takedowns for only $4.99/month. It’s affordable, fast, and easier than hiring a lawyer.

            Don’t wait — protect your copyright today!
        </p>

        <a href="javascript:void(0)" class="cta-button-primary fcmp-trigger-button">Register my trademark</a>
    </div>
</section>

<!-- testimonials -->

<section class="r9k3-section">
    <!-- <h2>Customer Reviews &amp; Testimonials</h2> -->
    <!-- <p>See why others are choosing Trademark USP!</p> -->

    @include('sections.testimonials')
</section>

<!-- Accordian section  -->

@include('sections.cta-section-2')

@endsection