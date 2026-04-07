@extends('layouts.app')

@section('title', 'Careers - Trademark USP')

@section('content')

<section  style="background-color: white;" class="careers-hero-section">
    <div class="careers-hero-wrapper">
        
        <div class="careers-hero-content">
            <p class="careers-hero-tagline">Careers</p>
            <h1 class="careers-hero-headline">Come join us!</h1>
            <p class="careers-hero-subtext">
               Want to be part of a culture that values and appreciates its employees? Look no further!
            </p>
            <a href="#openings" class="careers-hero-cta-button">View Openings</a>
        </div>

        <div class="careers-hero-image-container">
            <img src="./imagees/Carrer/trademarkengine_careers_11bdae3e72.webp" alt="Team members collaborating in a modern office" class="careers-hero-image">
        </div>
        
    </div>
</section>

<section class="careers-working-section">
    <div class="careers-working-wrapper">
        
        <div class="careers-working-illustration-container">
            <img src="./imagees/Carrer/career_switchback_d631361b0f.png" 
                 alt="Illustration of the Trademark USP app interface with a magnifying glass" 
                 class="careers-working-illustration">
        </div>

        <div class="careers-working-content">
            <h2 class="careers-working-headline">Working at Trademark USP</h2>
            <p class="careers-working-text">
                Our small but mighty team has helped thousands of small business owners protect their names and brands worldwide. We're always looking for innovative, talented, and caring people to join us on our mission. Here's a look into how we run the show around here:
            </p>
            </div>
        
    </div>
</section>

<section style="background-color: #effaff;" class="careers-perks-section">
    <div class="careers-perks-wrapper">
        
        <div class="careers-perks-header">
            <h2 class="careers-perks-headline">Our Perks</h2>
            <p class="careers-perks-intro">
                Alongside our competitive salaries, our holistic benefits package is designed to support our employees' well-being in all aspects of their lives.
            </p>
        </div>

        <div class="careers-perks-grid careers-perks-grid-row-1">
            
            <div class="careers-perks-item">
                <h3 class="careers-perks-title">Medical, Dental, & Vision Insurance</h3>
                <p class="careers-perks-description">
                    We cover 100% of premiums for employee-only plans.
                </p>
            </div>

            <div class="careers-perks-item">
                <h3 class="careers-perks-title">Life & Disability Insurance</h3>
                <p class="careers-perks-description">
                    We offer free life insurance and low-cost short and long-term disability insurance.
                </p>
            </div>

            <div class="careers-perks-item">
                <h3 class="careers-perks-title">401(k) With Company Match</h3>
                <p class="careers-perks-description">
                    We'll help you save for retirement with a dollar-for-dollar match of up to 3%.
                </p>
            </div>

            <div class="careers-perks-item">
                <h3 class="careers-perks-title">Comprehensive PTO</h3>
                <p class="careers-perks-description">
                    Enjoy your time off with ample vacation time, floating holidays, and nine paid holidays.
                </p>
            </div>

            <div class="careers-perks-item">
                <h3 class="careers-perks-title">Home Office Stipend</h3>
                <p class="careers-perks-description">
                    Whether you want a second monitor or a workspace succulent, new employees receive $250 for a home office upgrade.
                </p>
            </div>

            <div class="careers-perks-item">
                <h3 class="careers-perks-title">Learning & Development Opportunities</h3>
                <p class="careers-perks-description">
                    We offer regular training sessions for employees to refresh, grow, and develop their skills.
                </p>
            </div>
            
        </div>

        <div class="careers-perks-grid careers-perks-grid-row-2">
            
            <div class="careers-perks-item careers-perks-item-half">
                <h3 class="careers-perks-title">Employee Rewards & Recognition</h3>
                <p class="careers-perks-description">
                    As an extra incentive, employees can earn gift cards and additional days off with our peer-to-peer recognition and rewards platform.
                </p>
            </div>

            <div class="careers-perks-item careers-perks-item-half">
                <h3 class="careers-perks-title">Parental Leave</h3>
                <p class="careers-perks-description">
                    We provide paid time off when the time comes to introduce a new bundle of joy to your family.
                </p>
            </div>
            
        </div>

    </div>
</section>


<section class="faqs-section">
    <div class="section-header-wrapper">
        <h2>FAQs</h2>
        <!-- <p class="faqs-subtext">
            Still have questions? Call  +1 (650) 384-0370 or LIVE CHAT with us for real-time support.
        </p> -->
    </div>

    <div class="accordion-container">

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-1">
               What is the interview process like?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-1" hidden="">
                <p>Our interview process typically involves a phone, video, and in-person interview. Certain positions may also include assessments during the hiring process.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-2">
                What occurs during the onboarding process?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-2" hidden="">
                <p>Your first day at Trademark Engine will include an introduction to the company, our policies, and our culture. Over the next few weeks, you’ll have the chance to meet with your coworkers, attend training sessions and meetings for your position, and receive tons of support from the Trademark Engine team.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-3">
                Can I work remotely?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-3" hidden="">
                <p>Many roles at Trademark Engine allow for remote or hybrid flexibility. Some positions may require new employees to attend in-office training.</p>
            </div>
        </div>
        
    </div>
</section>

@include('sections.cta-section')

@endsection