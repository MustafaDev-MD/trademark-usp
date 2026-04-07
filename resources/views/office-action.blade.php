@extends('layouts.app')

@section('title', 'Office Action - Trademark USP')

@section('content')

<!-- hero section  -->

<section style="background-image: url('./imagees/Office-action/office-action-bg.jpg'); background-repeat: no-repeat;" class="oa-response-hero-section">
    <div class="hero-bg-visual">
        </div>
    
    <div class="oa-content-card">
        <h1 class="oa-headline">USPTO Office Action Response</h1>
        
        <p class="oa-subtext">
            If you received an Office Action to your trademark application, we may be able to help you. Don't delay. Starting at $599
        </p>
        
        <ul class="oa-stats-list">
            <li><span class="bullet-red"></span> 35,000+ five-star reviews</li>
            <li><span class="bullet-red"></span> Rated 4.8 by Forbes Advisor</li>
            <li><span class="bullet-red"></span> Rated 4.5 on Trust Pilot</li>
        </ul>
        
        <a href="javascript:void(0)" class="oa-button-orange fcmp-trigger-button">Respond to My Office Action</a>
    </div>

    <!-- <div class="oa-bottom-text-bar">
        98% of customers recommend our Extension Filing service
    </div> -->
</section>

<!-- Responding to Office Actions section -->

<section class="oa-responding-section">
    <div class="section-wrapperr">
        
        <div class="oa-responding-main-content">
            <h2 class="section-headline">Responding to Office Actions</h2>
            
            <p>
                An examining attorney will issue an office action when they find an error or other legal deficiency in your trademark application. The issues raised in an Office Action have to be addressed or you risk the abandonment of your registration. Pursuant to your request, a Swyft Legal attorney will review your office action to help you determine the best course of action for your trademark registration. Whether you have a simple clerical matter to be corrected, or you need a legal argument submitted, don’t delay and act today.
            </p>
        </div>

        <div class="oa-process-steps-container">
            
            <div class="oa-step-card">
                <div class="oa-icon-wrapper">
                    <img src="./imagees/Office-action/ICONS 3 new-01.png" alt="Hand icon" class="oa-step-icon">
                </div>
                <p class="oa-step-description">
                    Provide us some basic information about your mark
                </p>
            </div>

            <div class="oa-step-card">
                <div class="oa-icon-wrapper">
                    <img src="./imagees/Office-action/ICONS 3 new-02.png" alt="Phone icon" class="oa-step-icon">
                </div>
                <p class="oa-step-description">
                    Your information and Office Action is reviewed to confirm engagement
                </p>
            </div>

            <div class="oa-step-card">
                <div class="oa-icon-wrapper">
                    <img src="./imagees/Office-action/ICONS 3 new-03.png" alt="Bell icon" class="oa-step-icon">
                </div>
                <p class="oa-step-description">
                    You will sign off on the response a few days later
                </p>
            </div>
            
        </div>
        
    </div>
</section>

<!-- pricing section  -->

<section class="oa-pricing-section">
    <div class="oa-pricing-wrapper">
        
        <div class="oa-pricing-card">
            <p class="oa-pricing-label">Office Action Responses</p>
            <div class="oa-pricing-value">$599</div>
            
            <a href="javascript:void(0)" class="oa-pricing-button fcmp-trigger-button">Get Started</a>

            <div class="oa-pricing-features">
                <h4 class="oa-feature-title">Simple Process</h4>
                <p class="oa-feature-description">Answer a few quick questions to get started.</p>

                <h4 class="oa-feature-title">Review and Preparation</h4>
                <p class="oa-feature-description">If eligible, your information will be reviewed and a response will be composed.</p>

                <h4 class="oa-feature-title">Consult and Approve</h4>
                <p class="oa-feature-description">You will consult with your attorney and approve the response for filing.</p>
            </div>
        </div>

        <div class="oa-pricing-text-content">
            <p class="oa-pricing-tag">PRICING</p>
            <h2 class="oa-pricing-headline">Receive an Office Action? It's OK. We May Be Able to Help.</h2>
            
            <p class="oa-pricing-body">
                Over 60% of trademark applications receive Office Actions from the USPTO. Although it may seem distressing, it doesn't have to be. Many Office Actions can be cleared up with some clerical fixes and agreeing to some changes proposed by the USPTO. You shouldn't give up your application because of this hurdle.
            </p>
        </div>

    </div>
</section>

@include('sections.cta-section-2')

@endsection