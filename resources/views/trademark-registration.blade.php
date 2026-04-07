@extends('layouts.app')

@section('title', 'Trademark Registration - Trademark USP')

@section('content')

<!-- hero section  -->

<section class="cta-section">
    <div class="cta-card">
        <h2 class="cta-headline">Register your name, slogan, or logo today.</h2>

        <p class="cta-protection-text">
            Protect your brand online in just minutes with Trademark USP. Starting at $49 + applicable fees.
        </p>

        <ul class="cta-stats">
            <li><span class="bullet-red"></span> 120,000+ trademarks filed since 2016</li>
            <li><span class="bullet-red"></span> 35,000+ five-star reviews</li>
            <li><span class="bullet-red"></span> Rated 4.8 by Forbes Advisor</li>
        </ul>

        <a href="javascript:void(0)" class="cta-button-orange fcmp-trigger-button">Register my trademark</a>

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
<!-- how it work section start -->

<section class="pricing-section">
    <div class="container">
        <div class="section-header white-text">
            <h2>Start protecting your business today</h2>
            <p class="subtitle">Choose the package that best suits your needs and let our experienced legal team guide you through the trademark registration process with professionalism and care.</p>
        </div>

        <div class="pricing-container">

            <div class="pricing-card basic-package one">
                <div class="card-header">
                    <h3>Basic Package</h3>
                    <p class="tagline">I only need what it takes to file</p>
                    <div class="price-block">
                        <span class="price-value">$49</span>
                        <p class="fees">+ applicable fees</p>
                    </div>
                    <a href="javascript:void(0)">
                        <button class="cta-button basic-btn fcmp-trigger-button">Choose Basic</button>
                    </a>
                </div>

                <div class="card-body">
                    <p class="includes-title">Includes:</p>
                    <ul class="feature-list">
                        <li>
                            <span class="check-icon">✓</span> Direct-Hit Search of the Federal USPTO Database: Ensure your trademark is unique and available.
                        </li>
                        <li>
                            <span class="check-icon">✓</span> Customer Trademark Classification: Using the USPTO’s ID manual, our attorneys will devise a class and description of goods and services that best matches what you seek to protect with your trademark registration.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pricing-card standard-package two">
                <div class="card-header">
                    <h3>Standard Package</h3>
                    <p class="tagline">I want legal care to protect my trademark</p>
                    <div class="price-block">
                        <span class="price-value">$299</span>
                        <p class="fees">+ applicable fees</p>
                    </div>
                    <a href="javascript:void(0)">
                        <button class="cta-button standard-btn fcmp-trigger-button">Choose Standard</button>
                    </a>
                </div>

                <div class="card-body">
                    <p class="includes-title">Includes basic package, plus:</p>
                    <ul class="feature-list">
                        <li>
                            <span class="check-icon">✓</span> One-on-One Consultation with a Trademark Lawyer: 15-minute session to address your specific needs.
                        </li>
                        <li>
                            <span class="check-icon">✓</span> Cease and Desist Letter: Take action against potential infringements
                        </li>
                    </ul>
                </div>
            </div>


            <div class="pricing-card premium-package highlight-card three">
                <div class="card-header">
                    <h3>Premium Package</h3>
                    <p class="tagline">I want premium legal support for best success</p>
                    <div class="price-block">
                        <span class="price-value">$539</span>
                        <p class="fees">+ applicable fees</p>
                    </div>
                    <a href="javascript:void(0)">
                        <button class="cta-button premium-btn fcmp-trigger-button">Choose Premium</button>
                    </a>
                </div>

                <div class="card-body">
                    <p class="includes-title">Includes standard package, plus:</p>
                    <ul class="feature-list">
                        <li>
                            <span class="star-icon">★</span> One-on-One Consultation with a Trademark Lawyer: Extended 1-hour session for in-depth assistance.
                        </li>
                        <li>
                            <span class="star-icon">★</span> Rush Processing: Priority 48-hour processing
                        </li>
                        <li>
                            <span class="star-icon">★</span>Trademark Monitoring infringement alerts (free trial*)
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="how-it-works-section">
    <div class="container">
        <div class="section-header">
            <p class="subtitle">Don't just take our word for it</p>
            <h2>Trademark USP is rated 4.5 out of 5 based on 31,500 reviews.</h2>
        </div>

        <!-- <div class="steps-container">

            <div class="step-card">
                <div class="step-icon-wrapper">
                    <span class="step-icon">🔍</span> 
                </div>
                <h3 class="step-title">1. Define Your Mark</h3>
                <p class="step-description">
                    Answer a few guided questions about your business and brand assets. Regardless of your chosen support level, a qualified attorney will review your details to ensure the optimal trademark classification.
                </p>
            </div>

            <div class="step-card">
                <div class="step-icon-wrapper">
                    <span class="step-icon">💬</span> 
                </div>
                <h3 class="step-title">2. Comprehensive Search & Application Prep:</h3>
                <p class="step-description">
                    Our expert legal team performs a thorough trademark availability search to verify brand exclusivity and drastically minimize the risk of a costly USPTO rejection.
                </p>
            </div>

            <div class="step-card">
                <div class="step-icon-wrapper">
                    <span class="step-icon">👍</span> 
                </div>
                <h3 class="step-title">3. Official USPTO Filing</h3>
                <p class="step-description">
                    Your fully compiled trademark application is professionally filed with the U.S. Patent and Trademark Office, officially beginning your journey toward nationwide legal protection.
                </p>
            </div>

        </div> -->
    </div>
</section>

<!-- counter section  -->
<section class="trademark-benefits-section">
    <div class="section-wrapper">

        <div class="image-side">
            <div class="visual-placeholder">
                <img src="./imagees/Trademark-Registration/blue-left.png" alt="Trademark search visual">
            </div>
        </div>

        <div class="content-side trademark-benefits-content">
            <h2>Why get a trademark?</h2>

            <p>
                Most of the brands, logos and slogans you love, know and trust have been registered. A registered mark gives you a presumption of ownership and a presumed right to use the brand nationwide giving you broader protection in courts. Once registered, present yourself as an established and serious business with the ® symbol after your name, logo or slogan. Other benefits include:
            </p>

            <ul class="benefits-list">
                <li><span class="red-bullet"></span> Presumed validity of the mark if you have to sue</li>
                <li><span class="red-bullet"></span> Additional remedies in court</li>
                <li><span class="red-bullet"></span> May increase the value of your company</li>
            </ul>
        </div>

    </div>
</section>

<!-- white backgroung with clock  section  -->

<section class="trademark-search-section">
    <div class="section-wrapper">

        <div class="content-side trademark-search-content">
            <h2>Why run a search for similar marks?</h2>

            <p>
                Before spending your time and money filing an application, you should do a search to see if your mark is already in use or registered by someone else. A search will help avoid obvious duplications of pre-existing marks. If the USPTO rejects your application, the fees to Trademark USP and the USPTO are not refundable. If your company is just beginning, it’s better to make name changes now rather than invest in building a brand only to learn that you have to change the name and lose all of your goodwill.<br> <b>All packages include a free, federal direct-hit search.</b> We also offer more comprehensive searches that will include wider searches on the federal, state, common law, and global levels. Enjoy a better peace of mind while your trademark application is pending with the USPTO.
            </p>
        </div>

        <div class="image-side search-visual">
            <img src="./imagees/Trademark-Registration/white-right.webp" alt="Visual representation of time and dates">
        </div>

    </div>
</section>

<!-- testimonials section  -->
<section class="r9k3-section">
    <h2>Customer Reviews & Testimonials</h2>
    <p>See why others are choosing Trademark USP!</p>

    @include('sections.testimonials')
</section>

<!-- Accourdiant sectionb  -->
<section class="faqs-section">
    <div class="section-header-wrapper">
        <h2>Federal Trademark Registration FAQs</h2>
        <p class="faqs-subtext">
            Still have questions? Call+1 (650) 384-0370 or LIVE CHAT with us for real-time support.
        </p>
    </div>

    <div class="accordion-container">

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-1">
                What is a trademark and what does it do?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-1" hidden>
                <p>One way to understand a trademark is that it is a word, phrase, symbol, and/or design that identifies and distinguishes the source of the goods of one party from those of another party. A “service” mark distinguishes the source of a service, rather than a good, but the two are typically simply referred to as a “trademark” or “mark”. In more general terms, getting a trademark protects a brand. Many of the well-known brands, logos and slogans you love, know and trust have been registered with the United States Patent and Trademark Office.

                    Generally, the registration of a trademark entitles the registrant to a presumption of ownership of the brand on a national level and a presumed right to use the brand nationwide. It may help prevent someone from registering a confusingly similar mark later and may also help the registrant bring a case in federal court if someone infringes on the brand. Once registered, a registrant can typically start using the ® symbol after the name, logo or slogan.

                    After a mark is properly registered and used for a five-year period, Trademark USP can also help file a “Declaration of Incontestability.” Considered by some the greatest protection under U.S. trademark law, this may help prevent others from contesting a trademark on the following grounds: (1) the mark is not inherently distinctive; (2) it is confusingly similar to another mark that someone else began using first; or (3) the mark is simply functional as opposed to identifying the source of the goods or services.

                    Please also read WHAT YOU MUST KNOW BEFORE USING THIS WEBSITE.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-2">
                What is a common law trademark and why bother to register a mark?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-2" hidden>
                <p>Under U.S. law, a “common law trademark” is generally established when someone uses a company name, logo or slogan in commerce, even if it is not registered. So, why pay to register a trademark when a common law trademark may already exist? Common law rights ordinarily are limited to the geographic area where the mark is used as opposed to the nationwide protection customarily obtained when a mark is registered with the USPTO. So, unless registered, the use of a mark can be geographically limited, which hampers the ability to expand the brand. On the other hand, a person using a mark in a limited geographic area could be boxed in by someone else who offensively registers a similar mark. In addition, registration of a trademark can give the person holding the registered trademark a leg up in court as to the validity of the mark and the date of usage in later trademark infringement litigation, if it comes to that. There are also favorable remedies available to registered trademark owners in the event of litigation. Finally, once a trademark is accepted by the USPTO, it will be maintained in the USPTO database, which can discourage others from using the mark in the future. Future companies should be on notice that the mark is already spoken for, which should in turn help avoid at least some disputes..</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-1">
                Should companies trademark their name or logo?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-1" hidden>
                <p>There may be advantages to registering both a name and an associated logo. But bear in mind, each filing requires its own application, government filing fees and processing fees to Swyft Legal. Even if you were to apply on your own, it would cost at least $700.</p>

                <p>A more budget-friendly option could involve registering just the name trademark. Wrongful use of names seems to be more common than wrongful use of logos. Trademarking a name generally provides broader protection because it prevents any use of the name that causes confusion, even if someone tries to use the name within a unique logo.</p>

                <p>A mark for a logo typically protects the shape, orientation, stylization and sometimes color in that particular logo. Registering ordinarily prevents others from using that logo or something confusingly similar to the logo. Even if a company name is in the logo, registering the logo may only protect the use of that name in the particular way it is used in the logo and not the use of the name more generally. Moreover, amended or redesigned logos usually require a new application for the new logo. As may be expected, logo changes seem to be more common than name changes.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-2">
                A company has a domain name, so why does it need a trademark?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-2" hidden>
                <p>Much like how the availability of a corporate name in a given state does not necessarily provide superior trademark rights to use the name in commerce, the availability of the domain name is not an an indication either. A company could have a trademark name on a product or service, but not have acquired the domain name.</p>

                <p>The availability of the domain name should be one part of a comprehensive search, which Trademark USP offers, to help evaluate the strength of a brand name or slogan and the likelihood of a trademark being approved. Using a domain name as part of a brand that sells goods or services may establish common law trademark rights. A “common law” trademark can be established when a name, logo or slogan is used in commerce, even if it is not registered. Common law rights, however, are limited to the geographic area where the mark is actually used as opposed to the nationwide protection typically established by registration of a mark with the USPTO.</p>

                <p>The geographic limitations of an unregistered mark can make it difficult to expand a business. On the other hand, a person using a mark in a limited geographic area could be boxed in by someone else who offensively registers a similar mark. In addition, registration of a trademark customarily gives the person holding the registered trademark a leg up in court as to the validity of the mark and the date of usage in later trademark infringement litigation, if it comes to that. There are also favorable remedies available to registered trademark owners in the event of litigation. Finally, once a trademark is accepted by the USPTO, it should be maintained in the USPTO database, which can discourage others from using the mark in the future. Future companies should be on notice that the mark is already spoken for, which should in turn help avoid at least some disputes.</p>

                <p>General benefits to registering a mark:</p>
                <ul>
                    <li>Nationwide protection</li>
                    <li>Presumed right to the exclusive use of the mark nationwide</li>
                    <li>Presumed validity of the mark in a lawsuit</li>
                    <li>Additional remedies in court</li>
                    <li>May increase the value of the company</li>
                    <li>You can record the mark with the U.S. Customs and Border Protection, which may help stop importation of infringing or counterfeit goods into the U.S.</li>
                    <li>The right to use the ® symbol</li>
                </ul>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-3">
                What about my slogan, do companies usually register that?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-3" hidden>
                <p>If investing heavily in a marketing campaign with a slogan, a company might consider registering that slogan in connection with the goods or services they offer well.</p>

                <p>Like all trademarks, a slogan you wish to register should be inherently distinctive and creative or have developed a secondary meaning. In other words, “really good pizza” probably can’t be trademarked unless that saying has become so famous that most consumers associate it with a certain pizza brand.</p>
            </div>
        </div>
        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-4">
                What information will I need?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-4" hidden>
                <p>Initiating the process will usually take anywhere from 5 to 10 minutes on the Trademark USP website. For a typical application, be prepared to provide at least the following:</p>

                <ul>
                    <li>The actual mark you want to use.</li>
                    <li>The full legal name and address of the owner of the mark.</li>
                    <li>(If your mark is "In Use") A copy of the specimen which is an example that shows you are using the mark in commerce. This could be a picture of your product or a website advertising your service.</li>
                    <li>A category of the goods or services where you are using your mark from our drop down menu and a description of your goods or services.</li>
                    <li>(If your mark is "In Use") The date you first used the mark in commerce and the date you first shared the mark anywhere.</li>
                </ul>
            </div>
        </div>

    </div>
</section>

@include('sections.cta-section-2')

@endsection