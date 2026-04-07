@extends('layouts.app')

@section('title', 'Contact - Trademark USP')

@section('content')

<section class="contact-methods-section">
    <div class="container">

        <header class="contact-header">
            <h2>Get in touch and let us know how we can help</h2>
        </header>

        <div class="contact-grid">
            
            <div class="contact-card" id="openLiveChat">
                <div class="icon-wrapper chat-icon">
                    <img src="./imagees/comment.png" alt="Chat Icon">
                </div>
                <h3 class="card-title">Live Chat</h3>
                <p class="card-description">
                    We'd love to talk about how we can help you.
                    <a href="#" class="contact-link">Click here to live chat now</a>
                </p>
            </div>

            <div class="contact-card">
                <div class="icon-wrapper phone-call-icon">
                    <img src="./imagees/phone-call (2).png" alt="Phone Icon">
                </div>
                <h3 class="card-title">Phone</h3>
                <p class="card-description">
                    Call us Mon-Fri 9AM-6PM CST <a href="tel:+1 (650) 384-0370" class="contact-link">
                        <span class="phone-number-text"> +1 (650) 384-0370</span></a>
                </p>
            </div>

            <div class="contact-card">
                <div class="icon-wrapper email-icon">
                    <img src="./imagees/mail (1).png" alt="Email Icon">
                </div>
                <h3 class="card-title">Email</h3>
                <p class="card-description">
                    You can also email us anytime. Send your email to:
                    <a href="mailto:Legal@trademarkusp.com" class="contact-link email-link">Legal@trademarkusp.com</a>
                </p>
            </div>
        </div>
    </div>
</section>

<section class="faqs-section">
    <div class="section-header-wrapper">
        <h2>Trademark USP FAQs</h2>
        <p class="faqs-subtext">
            Still have questions? Call +1 (650) 384-0370 or LIVE CHAT with us for real-time support.
        </p>
    </div>

    <div class="accordion-container">

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-1">
                Why run a search for similar trademarks?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-1" hidden="">

                <p>Conducting a search of your mark before starting the registration process may help avoid obvious duplications of pre-existing marks and the expenditure of nonrefundable applications fees.

                    Newer companies may more easily make name changes while they are getting off the ground than years later and after substantial investment in a brand and associated goodwill.

                    Running searches with the USPTO does not guarantee superior rights to a particular mark. There could be someone already using a similar mark, but who did not register it with the USPTO. In that case, a registration could be subject to challenge by the owner of the earlier-used mark based on of common law trademark rights.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-2">
                What comes with each search?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-2" hidden="">
                <p>Our Trademark USP Federal Trademark Search reviews the USPTO data base and is limited to direct matches, phonetically similar, similar in terms of translation, or appearance by way of design.

                    Our Trademark USP Federal, State & Common Law Search reviews the USPTO database, the databases of all 50 states, a business registry and the database of domain names. It is limited to direct matches, phonetically similar, similar in terms of translation, or appearance by way of design.

                    Our Trademark USP Global Search reviews the USPTO database, the databases of all 50 states, a business registry, the database of domain names, the World Intellectual Property Organization (“WIPO”) database, the Canadian Federal Trademark database, the European Community database, the France Federal database and the German federal database. It is limited to direct matches, phonetically similar, similar in terms of translation, or appearance by way of design.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-3">
                Why you may need to search more than just exact matches with the USPTO?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-3" hidden="">
                <p>Running searches just with the USPTO does not mean you will automatically have superior rights to the mark. There could be someone out there already using a similar mark, but who did not register it with the USPTO. In that case, you may get a registration, but it is subject to challenge by the owner of the earlier-used mark who has because of common law trademark rights. Someone could have filed only with the state meaning your later-filed USPTO registration does not grant you rights in that state.</p>

            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-4">
                What is a common law trademark and why bother to register a mark?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-4" hidden="">
                <p>Under U.S. law, a “common law trademark” is generally established when someone uses a company name, logo or slogan in commerce, even if it is not registered. So, why pay to register a trademark when a common law trademark may already exist? Common law rights ordinarily are limited to the geographic area where the mark is used as opposed to the nationwide protection customarily obtained when a mark is registered with the USPTO. So, unless registered, the use of a mark can be geographically limited, which hampers the ability to expand the brand. On the other hand, a person using a mark in a limited geographic area could be boxed in by someone else who offensively registers a similar mark. In addition, registration of a trademark can give the person holding the registered trademark a leg up in court as to the validity of the mark and the date of usage in later trademark infringement litigation, if it comes to that. There are also favorable remedies available to registered trademark owners in the event of litigation. Finally, once a trademark is accepted by the USPTO, it will be maintained in the USPTO database, which can discourage others from using the mark in the future. Future companies should be on notice that the mark is already spoken for, which should in turn help avoid at least some disputes.</p>

            </div>
        </div>
        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-4">
                Am I guaranteed to get clearance on my trademark if I run a search and it comes up relatively clean?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-4" hidden="">
                <p>Unfortunately not. We use proprietary commercially reasonable methods to identify marks that may be matches to the ones you seek to use. We, however, cannot guarantee that your mark will make it through and be approved even if you use our search services. There may be a number of reasons the USPTO rejects your mark and there are circumstances where an automated search may not identify a mark the USPTO identifies as a reason to reject your mark.

                    Likewise, when your order covers common law mark searches, we use commercially reasonable methods to identify marks that may be matches to the ones you seek to use. We, however, cannot guarantee that your mark will be free of or prevail to all claims or challenges made by holders of common law rights to all marks. There are circumstances where an automated search may not identify a common law mark that may be similar to your mark.</p>
            </div>
        </div>

    </div>
</section>

<section class="final-cta-section">
    <div class="cta-content-wrapper">
        <h4 class="cta-headline">WHAT YOU MUST KNOW BEFORE CONTACTING US</h4>

        <p class="cta-subtext">
            Trademark USP is not a law firm and none of the information on this website constitutes or is intended to convey legal advice. Likewise, our customer service representatives are here to assist you, but they may not provide any legal advice to you. General information about the law is not the same as advice about the application of the law in a particular factual or legal situation. Individual facts and circumstances as well as legal principles including but not limited to the ones referenced on this website can affect the outcome of any given situation. Trademark USP cannot and does not guarantee that an application will be approved by the USPTO, that a mark will be protected from infringement under common US trademark law, or that any ensuing litigation or dispute will lead to a favorable outcome. If you want or have an interest in obtaining legal advice with respect to a specific situation or set of circumstances, you should consult with the lawyer of your choice.
        </p>

        <!-- <a href="#" class="cta-button-primary">Register my trademark</a> -->
    </div>
</section>

@include('sections.cta-section')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const chatLink = document.querySelector('.contact-link');

    if (chatLink) {
        chatLink.addEventListener('click', function (e) {
            e.preventDefault();

            if (typeof Tawk_API !== 'undefined') {
                Tawk_API.maximize();
            }
        });
    }
});
</script>


@endsection