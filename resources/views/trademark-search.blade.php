@extends('layouts.app')

@section('title', 'Trademark Search - Trademark USP')

@section('content')

<section class="trademark-search-section">
    <div class="container search-wrapper">

        <header class="search-header">
            <h2>Search millions of <br>Trademarks for Free</h2>
            <p class="search-subtitle">Search millions of trademarks that are live or pending with the USPTO</p>
        </header>

        <div class="search-div" style="max-width: 650px; margin: 0 auto;">

            <div class="search-wrapperr" style="display: flex; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08); border-radius: 8px; overflow: hidden; margin-bottom: 30px;">

                <div class="input-wrapper" style="flex-grow: 1; display: flex; align-items: center; background-color: white; padding: 10px 15px;">

                    <span style="font-size: 20px; color: #999; margin-right: 10px;">
                        <i class="fa fa-search"></i>
                    </span>

                    <input
                        type="text"
                        class="srch"
                        placeholder="Search for similar trademarks"
                        fdprocessedid="zu68q8"
                        style="flex-grow: 1; border: none; outline: none; font-size: 17px; padding: 5px 0;">
                </div>

                <a href="#" class="srch-btn"
                    style="
               background-color: #F85A32; /* Primary Orange Color */
               color: white; 
               font-size: 18px; 
               font-weight: 700; 
               padding: 15px 30px; 
               border: none; 
               cursor: pointer; 
               flex-shrink: 0; 
               text-decoration: none; 
               display: flex; 
               align-items: center; 
               text-transform: capitalize;
           ">
                    Search
                </a>
            </div>

            <div class="search-data table-responsive" style="display:none">
                <table class="table ">
                    <thead>
                        <tr>
                            <th>Trademark</th>
                            <th>Owner</th>
                            <th>Serial No</th>
                            <th>Filing Date</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>

        <!--<div class="search-data" style="display: none;">-->
        <!--    <h3>Search Results</h3>-->
        <!--    <table class="results-table">-->
        <!--        <thead>-->
        <!--            <tr>-->
        <!--                <th>Mark Name</th>-->
        <!--                <th>Owner</th>-->
        <!--                <th>Serial Number</th>-->
        <!--                <th>Filing Date</th>-->
        <!--            </tr>-->
        <!--        </thead>-->
        <!--        <tbody></tbody> -->
        <!--    </table>-->
        <!--</div>-->

        <div id="searchStatus" style="margin-top: 20px; color: blue;"></div>
        <div id="searchResultsContainer" style="margin-top: 30px;">
        </div>

    </div>
</section>

<section class="comprehensive-search-section">
    <div class="container">

        <header class="search-upsell-header">
            <h2>Know More. Do Better. Save Time and Money.</h2>
            <p class="upsell-subtitle">
                The free search only finds exact matches with the USPTO — Do you need more? Check out our Comprehensive Search Reports below.
            </p>
        </header>

        <div class="search-report-grid">

            <div class="report-card">
                <div class="icon-wrapper search-icon-sm">
                    <img src="./imagees/search/icon-nwe.png" alt="Search Icon">
                </div>

                <h3 class="report-title">Federal and State Search Only <span class="price-highlight">$149</span></h3>
                <p class="report-description">
                    Search for your name, slogan or logo with the USPTO and all 50 States and receive a full detailed report based on similar trademarks across multiple classes and subclasses.
                </p>
                <a href="#" class="learn-more-link">Learn more <span class="arrow-right">›</span></a>
            </div>

            <div class="report-card">
                <div class="icon-wrapper search-icon-sm">
                    <img src="./imagees/search/Federal-and-State-Search.png" alt="Document Icon">
                </div>

                <h3 class="report-title">Federal, State & Common Law Search Only <span class="price-highlight">$299</span></h3>
                <p class="report-description">
                    You need to know if someone is already using your mark even if they have not registered. Our Federal, State & Common Law search scours numerous sources to help you find it.
                </p>
                <a href="#" class="learn-more-link">Learn more <span class="arrow-right">›</span></a>
            </div>

            <div class="report-card">
                <div class="icon-wrapper search-icon-sm">
                    <img src="./imagees/search/Extension-Filing.png" alt="Globe Icon">
                </div>

                <h3 class="report-title">Global U.S. & International Search Only <span class="price-highlight">$499</span></h3>
                <p class="report-description">
                    Includes everything from the Federal, State and Common Law Search, but also searches international databases including Canada, the U.K., the E.U. and WIPO.
                </p>
                <a href="#" class="learn-more-link">Learn more <span class="arrow-right">›</span></a>
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
            <button class="accordion-header" aria-expanded="true" aria-controls="content-1">
                Why run a search for similar trademarks?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content is-open" id="content-1" style="max-height: 106px;">
                <p>Conducting a search of your mark before starting the registration process may help avoid obvious duplications of pre-existing marks and the expenditure of nonrefundable applications fees.

                    Newer companies may more easily make name changes while they are getting off the ground than years later and after substantial investment in a brand and associated goodwill.

                    Running searches with the USPTO does not guarantee superior rights to a particular mark. There could be someone already using a similar mark, but who did not register it with the USPTO. In that case, a registration could be subject to challenge by the owner of the earlier-used mark based on of common law trademark rights.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-2">
                Why you may need to search more than just exact matches with the USPTO?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-2" hidden="">
                <p>Running searches just with the USPTO does not mean you will automatically have superior rights to the mark. There could be someone out there already using a similar mark, but who did not register it with the USPTO. In that case, you may get a registration, but it is subject to challenge by the owner of the earlier-used mark who has because of common law trademark rights. Someone could have filed only with the state meaning your later-filed USPTO registration does not grant you rights in that state.</p>

            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-3">
                What comes with each search?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-3" hidden="">
                <p>Our Trademark USP Federal Trademark Search reviews the USPTO data base and is limited to direct matches, phonetically similar, similar in terms of translation, or appearance by way of design.

                    Our Trademark USP Federal, State & Common Law Search reviews the USPTO database, the databases of all 50 states, a business registry and the database of domain names. It is limited to direct matches, phonetically similar, similar in terms of translation, or appearance by way of design.

                    Our Trademark USP Global Search reviews the USPTO database, the databases of all 50 states, a business registry, the database of domain names, the World Intellectual Property Organization (“WIPO”) database, the Canadian Federal Trademark database, the European Community database, the France Federal database and the German federal database. It is limited to direct matches, phonetically similar, similar in terms of translation, or appearance by way of design.</p>

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

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-4">
                Can I perform a trademark search for free?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-4" hidden="">
                <p>Yes, you can perform a trademark search for free. Our free trademark search tool will complete a basic search; no card required. You can also search your trademark through the Trademark Search System, the USPTO’s trademark database.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-4">
                How long does it take to receive trademark search results?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-4" hidden="">
                <p>Most free basic search tools will return instant results, which can be sufficient for a preliminary search. If you want a comprehensive trademark search, be prepared to wait a few days for your results.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-4">
                How can I verify the ability to trademark a name?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-4" hidden="">
                <p>You can verify your desired trademark name by performing a trademark search. A basic trademark search will give you insights into direct name matches at the federal level. On the other hand, a comprehensive trademark search will also scan for existing marks that are even slightly similar and could cause confusion.</p>
            </div>
        </div>

        <div class="accordion-item">
            <button class="accordion-header" aria-expanded="false" aria-controls="content-4">
                How much does it cost to register my trademark?
                <span class="accordion-icon">+</span>
            </button>
            <div class="accordion-content" id="content-4" hidden="">
                <p>The cost of registering a trademark primarily depends on how many classes of goods and services you want to trademark and which filing option you use. Trademark registration is per class, so the more trademark classes you register, the more you’ll pay.

                    For filing options, if you utilize the entries of the Trademark ID Manual for the description of your goods/services, you’ll pay a filing fee of $350 per class. If you don’t use the Trademark ID manual for the description of your goods/services, the filing fee will be $550 per class.

                    Keep in mind that there also might be some additional fees if you submit an “Intent to Use” trademark application, ranging from $125 to $150 per class.</p>
            </div>
        </div>

    </div>
</section>

@include('sections.cta-section-2')

@endsection