@extends('layouts.app')

@section('title', 'Statement Of Use Extension - Trademark USP')

@section('content')

<!-- hero section  -->
<section style="background-image: url('./imagees/Filing-an-extention/filing-extention-img.jpg');" class="cta-section">
    <div class="cta-card">
        <h2 class="cta-headline">Statement of use extension</h2>

        <p class="cta-protection-text">
            Need more time to file your Trademark Statement of Use Extension with the USPTO? Let us help you extend your deadline for another six months.
        </p>

        <ul class="cta-stats">
            <li><span class="bullet-red"></span>35,000+ five-star reviews</li>
            <li><span class="bullet-red"></span>Rated 4.8 by Forbes Advisor</li>
            <li><span class="bullet-red"></span>Rated 4.5+ on Trust Pilot</li>
        </ul>

        <a href="javascript:void(0)" class="cta-button-orange fcmp-trigger-button">Start my Extension Filing</a>

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
<section class="how-it-works-section">
    <div class="section-header-wrapper">
        <h2 class="section-title">Fast and Easy 3 Steps</h2>
        <p class="section-subtext">
            You’ve worked hard to protect your brand. Don’t let it lapse.
        </p>
    </div>

    <div class="steps-container">
        <div class="step-card">
            <img src="./imagees/comprehensive-search/how-itswork1.png" alt="Icon of a laptop with checks" class="step-icon">
            <h3 class="step-title">Answer a few question</h3>
            <p class="step-description">
                Whether you know your serial number or not, in less than five minutes you can answer the questions needed to start the process.
            </p>
        </div>

        <div class="step-card">
            <img src="./imagees/Filing-an-extention/statement2.png" alt="Icon of a magnifying glass over document" class="step-icon">
            <h3 class="step-title">Review your Application</h3>
            <p class="step-description">
                We will send your application to you for your review and signature.
            </p>
        </div>

        <div class="step-card">
            <img src="./imagees/comprehensive-search/how-itswork3.png" alt="Icon of an envelope with report" class="step-icon">
            <h3 class="step-title">Application Filed</h3>
            <p class="step-description">
                We will file the application and pay your fees so you can focus on building your brand.
            </p>
        </div>
    </div>
</section>



<!-- counter section  -->
<section class="trademark-benefits-section">
    <div class="section-wrapper">

        <div class="image-side">
            <div class="visual-placeholder">
                <img src="./imagees/Filing-an-extention/why-use.png" alt="Trademark search visual">
            </div>
        </div>

        <div class="content-side trademark-benefits-content">
            <h2>Why use Trademark USP for your Statement of Use Extension?</h2>

            <!-- <p>
                Most of the brands, logos and slogans you love, know and trust have been registered. A registered mark gives you a presumption of ownership and a presumed right to use the brand nationwide giving you broader protection in courts. Once registered, present yourself as an established and serious business with the ® symbol after your name, logo or slogan. Other benefits include:
            </p> -->

            <ul class="benefits-list">
                <li><span class="red-bullet"></span> With or without your serial number, we can make sure your filing is complete and done right.</li>
                <li><span class="red-bullet"></span> Our questionnaire includes step-by-step instructions to help you.</li>
                <li><span class="red-bullet"></span>You will have a chance to review and sign the filing before it is filed</li>
                <li><span class="red-bullet"></span>Access to your cloud-based account for all documents, status updates and deadlines.</li>
                <li><span class="red-bullet"></span>Full customer service support via phone, email or chat.</li>
            </ul>
        </div>

    </div>
</section>

<!-- pricing section  -->
<section class="oa-pricing-section">
    <div class="oa-pricing-wrapper">

        <div class="oa-pricing-text-content">
            <!-- <p class="oa-pricing-tag">PRICING</p> -->
            <h2 class="oa-pricing-headline">Complete the Process with a Few Clicks of the Mouse</h2>

            <p class="oa-pricing-body">
                If you filed an Intent to Use application, you already got your place in line before you were actually using your mark. If you haven’t quite started using your mark in commerce yet, it’s OK. The USPTO allows up to five six-month extensions. Request your extension today to hold you place in line.
            </p>
        </div>

        <div class="oa-pricing-card">
            <p class="oa-pricing-label">Statement of Use Extension</p>
            <div class="oa-pricing-value">$99</div>

            <a href="javascript:void(0)" class="oa-pricing-button fcmp-trigger-button">Get Started</a>

        </div>

    </div>
</section>

<!-- testimonials -->

<section class="r9k3-section">
    <h2>Customer Reviews &amp; Testimonials</h2>
    <p>See why others are choosing Trademark USP!</p>

    @include('sections.testimonials')
</section>

<!-- Accourdiant sectionb  -->
<section class="faqs-section">
    <div class="section-header-wrapper">
        <h2>Statement of Use Extension Filing FAQs</h2>
        <p class="faqs-subtext">

            Still have questions? Call +1 (650) 384-0370 with us for real-time support.
        </p>
    </div>

    <div class="accordion-container">

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-1">
                What is the deadline to request an extension or file a Statement of Use?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-1" hidden>
                <p>A Statement of Use is generally due within six months from when the USPTO issued the Notice of Allowance, or within six months of a previously granted extension. Generally, missing the deadline means the application will be considered “abandoned.” Future efforts to register the trademark will typically require the applicant to start all over including payment of new USPTO filing fees. Learn more about our Statement of Use filing services.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-2">
                What if an applicant has not started using its mark in the six-month period since the Notice of Allowance was issued?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-2" hidden>
                <p>Applicants who are not using the mark in commerce within six months after filing an Intent to Use application may need to file an extension request and the required fee(s) to avoid abandonment. The USPTO generally allows applicants to file up to five six-month extensions.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-3">
                What is the cost for the Statement of Use Extension?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-3" hidden>
                <p>In addition to Trademark Engine’s service fee, the USPTO charges $150 per class, which is the USPTO filing fee.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-4">
                What if someone who filed an intent to use is now using the mark as to one class, but not another?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-4" hidden>
                <p>Under such circumstances, an applicant can do what is referred to as “dividing an application.” There are additional UPSTO fees to do this because it creates what the USPTO calls a “child” and “parent” application. There is also a slightly increased Trademark Engine service fee because of the extra processing. But, dividing an application is an option that some companies choose in order to register a mark as one class of goods while preserving rights on another. This can allow extension of the six-month deadline for the class of goods not yet in use, but register for the class of goods or service that are already in use.</p>
            </div>
        </div>
        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-4">
                What if someone who filed an intent to use is now using the mark as to one class, but not another?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-4" hidden>
                <p>Under such circumstances, an applicant can do what is referred to as “dividing an application.” There are additional UPSTO fees to do this because it creates what the USPTO calls a “child” and “parent” application. There is also a slightly increased Trademark Engine service fee because of the extra processing. But, dividing an application is an option that some companies choose in order to register a mark as one class of goods while preserving rights on another. This can allow extension of the six-month deadline for the class of goods not yet in use, but register for the class of goods or service that are already in use.</p>
            </div>
        </div>
        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-27">
                What is a Statement of Use?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-27" hidden>
                <p>If trademark applicants aren’t using their mark in commerce, the applicant can file an Intent to Use Application and generally, if all goes well, receive a Notice of Allowance.</p>

                <p>Within six months of being granted the Notice of Allowance, the applicant generally has to prove that it is now using the mark or request up to five six-month extensions. The USPTO requires a specimen to prove use in commerce when a Statement of Use is filed.</p>
            </div>
        </div>
        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-28">
                What are the requirements for a Statement of Use?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-28" hidden>
                <p>The requirements for filing a Statement of Use with the USPTO typically include:</p>

                <ul>
                    <li>A $150 per class USPTO fee.</li>
                    <li>A specimen of the mark showing that it is actually in use in commerce.</li>
                    <li>Verification that the mark is in use as indicated on the application.</li>
                </ul>
            </div>
        </div>
        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-29">
                What does it mean to use the mark in commerce?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-29" hidden>
                <p>According to 15 U.S.C. § 1127, a mark is considered “in commerce” when used in the following ways:</p>

                <p><strong>With regard to goods:</strong></p>
                <p>Use in commerce generally occurs when the mark:</p>
                <ul>
                    <li>(A) is placed in any manner on the goods or their containers, the displays associated therewith or on the tags or labels affixed thereto (if the nature of the goods makes such placement impracticable, then on documents associated with the goods or their sale), and</li>
                    <li>(B) the goods are sold or transported in commerce.</li>
                </ul>

                <p><strong>With regard to service:</strong></p>
                <p>Use in commerce generally occurs when the mark is:</p>
                <ul>
                    <li>used or displayed in the sale or advertising of services and the services are rendered in commerce, or</li>
                    <li>the services are rendered in more than one State or in the United States and a foreign country and the person rendering the services is engaged in commerce in connection with the services.</li>
                </ul>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-30">
                What is a valid specimen?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-30" hidden>
                <p>Typically, a specimen is a real-world sample of how the mark is actually in use with the goods and/or services identified in the application. It is what the consumers actually see when they are purchasing the goods or services.</p>

                <p>Here are some more detailed tips from the USPTO:</p>

                <h3>Specimens for Goods (Products)</h3>
                <p>A specimen for goods usually shows the mark on the actual goods, on labels/tags affixed to the goods, on packaging, or in a product display for the goods (like a window display). Advertising materials are generally not acceptable as a specimen for goods, nor are materials used to carry out your daily business (e.g., invoices, packing slips, etc.).</p>

                <p>The USPTO typically accepts the following specimens for goods:</p>
                <ul>
                    <li>A photograph of the product showing the mark directly on the product (e.g., the bottom of a coffee mug)</li>
                    <li>Product labels and tags showing the mark (e.g., the label on a t-shirt)</li>
                    <li>Product packaging showing the mark (e.g., detergent soap packaging)</li>
                    <li>Signage used in a product display at a store (e.g., a photograph of the display)</li>
                    <li>A webpage showing or describing the product near the mark and with purchasing information (e.g., a webpage showing a photograph of a computer laptop, the mark for the laptop appearing above the photograph, the price appearing below the photograph, and a shopping cart button/link appearing on the page)</li>
                    <li>For downloadable software, copies of the instruction manual and screen printouts from (1) web pages showing the mark in connection with ordering or purchasing information or information sufficient to download the software, (2) the actual program that shows the mark in the title bar, or (3) launch screens that show the mark in an introductory message box that appears after opening the program</li>
                </ul>

                <h3>Specimens for Services</h3>
                <p>A specimen for services generally shows the mark used in the sale, rendering, or advertising of the services. A consumer should be able to directly associate your mark with the services you identified in the application on the specimen.</p>

                <p>The USPTO typically accepts the following specimens for services:</p>
                <ul>
                    <li>Print or Internet advertising</li>
                    <li>Brochures and leaflets</li>
                    <li>Menus for restaurants</li>
                    <li>Business cards and letterhead</li>
                    <li>Marketing and promotional materials</li>
                    <li>A photograph of business signage and billboards</li>
                    <li>A photograph of a musical band performing with the band's name displayed during the performance (e.g., on the band's drum)</li>
                </ul>
                <p>*Specimens consisting of advertising, marketing, and/or promotional materials must show a direct association between the mark and the services. However, if your mark itself references the services, the specimen would show a sufficient direct association (e.g., ABC MEDICAL for a medical clinic).</p>
            </div>
        </div>
        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-31">
                What if the applicant no longer wants to pursue a trademark as to one class of goods, but wants to proceed with another?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-31" hidden>
                <p>If an applicant is granted a Notice of Allowance for multiple classes, but decides not to pursue a registration for one or more of those classes, the applicant may simply disclaim the unwanted class when filing the Statement of Use.</p>

                <p>By disclaiming a class, the USPTO will generally treat the application as abandoned as to that class while proceeding with the class or classes still being pursued.</p>
            </div>
        </div>
        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-32">
                What if the applicant is only selling some of the goods or services within the class in the Intent to Use application?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-32" hidden>
                <p>To understand this, let’s look at the common example of clothing. Many people file an Intent to Use under Class 25 for clothing and then list, shirts, pants and shoes. In this example, let’s say the applicant is selling shirts, but not pants or shoes.</p>

                <p>Just like with a class, any description of goods within a class not included in the Statement of Use generally will be permanently deleted from the trademark registration. The applicant will have to file a new trademark application to cover any of the items left off of the Statement of Use.</p>

                <p>While the USPTO may request a specimen showing the use for one type of good or service only within the class (for our example, a shirt), the applicant will have to state, subject to perjury, that it actually is using the mark for all of the goods listed on the Allegation of Use.</p>

                <p>Therefore, an applicant only selling some of the items within a class may want to file an extension or divide the application.</p>
            </div>
        </div>

    </div>
</section>

<section class="final-cta-section">
    <div class="cta-content-wrapper">
        <h2 class="cta-headline">File your Extension today..</h2>

        <p class="cta-subtext">
            Thousands have relied on Trademark Engine to handle trademark filings needs.Thousands have relied on Trademark Engine to handle trademark filings needs.
        </p>

        <a href="javascript:void(0)" class="cta-button-primary fcmp-trigger-button">Start My Statement of Use Extension</a>
    </div>
</section>

@endsection