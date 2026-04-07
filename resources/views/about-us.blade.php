@extends('layouts.app')

@section('title', 'About Us - Trademark USP')

@section('content')

<!-- hero section  -->
<section class="about-hero-section">
    <div class="about-hero-header-area">
        <p class="about-hero-tag">ABOUT US</p>
        <h1 class="about-hero-headline">Get to Know Trademark USP</h1>
        <p class="about-hero-subtext">
            You have a brand and business to protect, and we can help.
        </p>
        <a href="javascript:void(0)" class="about-hero-button-orange fcmp-trigger-button">Register Now</a>
    </div>

    <div class="about-hero-collage-wrapper">
        <img src="./imagees/About-us/About_us_Hero_Image.png" alt="Trademark USP team collage" class="about-hero-collage-image">
    </div>
</section>


<section class="about-timeline-section">
    <div class="about-timeline-wrapper">
        <h2 class="about-timeline-headline">Trademark USP Over the Years</h2>
        
        <div class="about-timeline-container">

            <div class="about-timeline-event about-timeline-event-left">
                <div class="about-timeline-point"></div>
                <div class="about-timeline-content">
                    <p class="about-timeline-date">AUGUST 2016</p>
                    <h3 class="about-timeline-title">Trademark USP was founded.</h3>
                    <p class="about-timeline-description">
                        An experienced team consisting of a lawyer and several technologists bring trademark filing services to consumers and small businesses.
                    </p>
                </div>
            </div>

            <div class="about-timeline-event about-timeline-event-right">
                <div class="about-timeline-point"></div>
                <div class="about-timeline-content">
                    <p class="about-timeline-date">MAY 2020</p>
                    <h3 class="about-timeline-title">Trademark USP launches a small business relief program.</h3>
                    <p class="about-timeline-description">
                        In the midst of the COVID-19 pandemic, we awarded $5,000 in COVID-19 relief to small businesses in need through our On Your Mark, Get Set, Thrive program.
                    </p>
                </div>
            </div>

            <div class="about-timeline-event about-timeline-event-left">
                <div class="about-timeline-point"></div>
                <div class="about-timeline-content">
                    <p class="about-timeline-date">AUGUST 2021</p>
                    <h3 class="about-timeline-title">Trademark USP debuts in the Inc. 5000 list.</h3>
                    <p class="about-timeline-description">
                        Years of hard work and dedication to customers resulted in the inclusion of Trademark USP in the Inc. 5000 list for the first time after helping more than 100,000 customers just like you.
                    </p>
                </div>
            </div>

            <div class="about-timeline-event about-timeline-event-right">
                <div class="about-timeline-point"></div>
                <div class="about-timeline-content">
                    <p class="about-timeline-date">FEBRUARY 2022</p>
                    <h3 class="about-timeline-title">Trademark USP hires its first CEO.</h3>
                    <p class="about-timeline-description">
                        Alan Godfrey became the company's first CEO after being hired by Trademark USP.
                    </p>
                </div>
            </div>
            
        </div>
    </div>
</section>

<section class="about-main-section">
    <div class="about-main-wrapper">
        
        <div class="about-main-text-content">
            <h2 class="about-main-headline">About Trademark USP</h2>
            
            <p class="about-main-paragraph">
                Trademark USP began as the brainchild of a lawyer and technologists who recognized the need for a trademark filing service for independent consumers and small businesses. Understanding that many entrepreneurs don't need or can't afford a full-service intellectual property attorney, our founders strove to create an efficient, affordable, and understandable process that allows anyone to obtain a trademark for their business.
            </p>
            
            <p class="about-main-paragraph">
                Although Trademark USP is not a law firm and doesn't provide legal advice, we can equip you with the power to obtain your own trademark. Our customer service team consists of dedicated trademark representatives with a shared goal — meeting customer needs in a friendly, caring, and efficient manner.
            </p>
            
            <p class="about-main-paragraph">
                Our team guarantees a streamlined process supported by experienced helpers that can help if you have questions. We stress that our services are not appropriate for those seeking bespoke legal services, but for those who need it, our team is ready to support your trademark registration needs.
            </p>
        </div>

        <div class="about-main-image-wrapper">
            <img src="./imagees/About-us/About_us_Switchback_Image.png" alt="Two team members working together on a laptop." class="about-main-image">
        </div>

    </div>
</section>

<!--  -->

<section class="renewal-products-section">
    <div class="renewal-products-wrapper">
        
        <div class="renewal-products-header">
            <h2 class="renewal-products-headline">Take Action to Protect Your Name Today</h2>
            <p class="renewal-products-intro">
                Trademark USP provides several ways to protect your brand nationwide.
            </p>
            <div class="renewal-products-cta-group">
                <a href="javascript:void(0)" class="renewal-products-button renewal-products-button-primary fcmp-trigger-button">Get Started</a>
                <a href="{{ route('trademark-search') }}" class="renewal-products-link-secondary">Free Trademark Search ></a>
            </div>
        </div>

        <div class="renewal-products-grid">
            
            <div class="renewal-products-card">
                <div class="renewal-products-icon-wrapper">
                    <img src="./imagees/About-us/Federal and State Search.png" alt="Federal Search Icon" class="renewal-products-icon-img">
                </div>
                <h3 class="renewal-products-card-title">Federal and State Search</h3>
                <p class="renewal-products-card-description">
                    Make sure your name, slogan, or logo isn't a direct or similar match with trademarks registered with the USPTO and across all 50 states...
                </p>
                <a href="{{ route('comprehensive-search') }}" class="renewal-products-read-more">Read More <span class="arrow">></span></a>
            </div>

            <div class="renewal-products-card">
                <div class="renewal-products-icon-wrapper">
                    <img src="./imagees/About-us/Trademark Renewal.png" alt="Trademark Renewal Icon" class="renewal-products-icon-img">
                </div>
                <h3 class="renewal-products-card-title">Trademark Renewal</h3>
                <p class="renewal-products-card-description">
                    Trademark law requires you to file maintenance documents at regular intervals. Let us assist you with these filings, including your Declaration of Use...
                </p>
                <a href="{{ route('trademark-renewal') }}" class="renewal-products-read-more">Read More <span class="arrow">></span></a>
            </div>

            <div class="renewal-products-card">
                <div class="renewal-products-icon-wrapper">
                    <img src="./imagees/About-us/DMCA Takedown Service.png" alt="DMCA Takedown Icon" class="renewal-products-icon-img">
                </div>
                <h3 class="renewal-products-card-title">DMCA Takedown Service</h3>
                <p class="renewal-products-card-description">
                    If someone uses your images, video, audio, or products without permission, our affordable and fast DMCA Takedown service can make it easier to stop them.
                </p>
                <a href="{{ route('dmca-takedown-service') }}" class="renewal-products-read-more">Read More <span class="arrow">></span></a>
            </div>

            <div class="renewal-products-card">
                <div class="renewal-products-icon-wrapper">
                    <img src="./imagees/About-us/Federal and State Search.png" alt="Extension Filing Icon" class="renewal-products-icon-img">
                </div>
                <h3 class="renewal-products-card-title">Extension Filing</h3>
                <p class="renewal-products-card-description">
                    If you need to extend the deadline for your Trademark Statement of Use Extension with the USPTO, we can help.
                </p>
                <a href="{{ route('statement-of-use-extension') }}" class="renewal-products-read-more">Read More <span class="arrow">></span></a>
            </div>

        </div>

    </div>
</section>



@include('sections.services-section')



<section class="about-commitment-section">
    <div class="about-commitment-wrapper">
        
        <div class="about-commitment-top-row">
            
            <div class="about-commitment-main-text">
                <h2 class="about-commitment-headline">Dedicated Trademark Representatives</h2>
                <p class="about-commitment-intro">
                    Our team is ready to meet your trademark needs in a professional, courteous, and efficient manner.
                </p>
                <a href="javascript:void(0)" class="about-commitment-cta-button fcmp-trigger-button">File My Trademark with Attorney Help</a>
            </div>

            <div class="about-commitment-feature-grid">
                
                <div class="about-commitment-feature-item">
                    <h4 class="about-commitment-feature-title">Fast & Reliable Service</h4>
                    <p class="about-commitment-feature-description">
                        Our quick and easy questionnaire lets you kickstart the trademark registration process in minutes. Simply answer the questions provided, and our team will take it from there. When a USPTO application is rejected, the fees you paid are nonrefundable.
                    </p>
                </div>

                <div class="about-commitment-feature-item">
                    <h4 class="about-commitment-feature-title">Avoid the Headaches</h4>
                    <p class="about-commitment-feature-description">
                        You don’t want to go through the trademark registration process only to hear that someone else has already registered your mark with the USPTO. When a USPTO application is rejected, the fees you paid are nonrefundable. That’s why we offer a free, direct-hit search that identifies direct matches when registering a trademark, plus more comprehensive searches for that extra layer of comfort.
                    </p>
                </div>

                <div class="about-commitment-feature-item">
                    <h4 class="about-commitment-feature-title">Experienced Team Members</h4>
                    <p class="about-commitment-feature-description">
                        Our team has filed thousands of trademark applications and helped hundreds of thousands of customers obtain a trademark for their name, logo, or slogan. Rest assured that they’ll file your USPTO paperwork correctly when you put that expertise to work for you.
                    </p>
                </div>
            </div>
        </div>

        <div class="about-commitment-bottom-text">
            <h4 class="about-commitment-focus-title">Focus on Your Passion</h4>
            <p class="about-commitment-focus-description">
                Time and money are at a premium when getting your business off the ground, and filing for a trademark incorrectly can cost you both. Avoid the risk and focus on your business by leveraging our trademark registration experts.
            </p>
        </div>
        
    </div>
</section>

@include('sections.cta-section')

@endsection