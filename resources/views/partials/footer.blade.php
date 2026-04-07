<footer class="main-footer">
    <div class="container footer-content">

        <div class="footer-col footer-info">
            <div class="logo">
                <img src="{{ asset('imagees/tt logo-02.webp') }}" alt="Trademark USP Logo" class="logo-img">
                <!-- <span>Trademark USP</span> -->
            </div>

            <p class="footer-mission">Any Questions?</p>
            <p class="footer-description">Use the Live Chat for any immediate assistance.</p>

            <div class="call-us-block">
                <div class="call-text">
                    <a href="tel:+1 (650) 384-0370" class="call-text">
                        <span class="phone-icon">
                            <img src="{{ asset('imagees/phone-call.png') }}" alt="Phone Icon" class="custom-phone-img">
                        </span>
                        <div>
                            <p class="call-number">Call Us</p>
                            <p class="phone-number"> +1 (650) 384-0370</p>
                            <p class="hours">Mon-Fri 9AM-5PM CST</p>
                        </div>
                    </a>
                </div>
                <div class="call-text">
                    <a href="mailto:Legal@trademarkusp.com" class="call-text">
                        <span class="phone-icon">
                            <img src="{{ asset('imagees/mail.png') }}" alt="Phone Icon" class="custom-phone-img">
                        </span>
                        <div>
                            <p class="call-number">Email</p>
                            <p class="phone-number">Legal@trademarkusp.com</p>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-col footer-legal-links">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="{{ route('trademark-registration') }}">Trademark Registration</a></li>
                <li><a href="{{ route('comprehensive-search') }}">Comprehensive Search</a></li>
                <li><a href="{{ route('trademark-monitoring') }}">Trademark Monitoring</a></li>
                <li><a href="{{ route('trademark-search') }}">Free Trademark Search</a></li>
                <li><a href="{{ route('copyright-registration') }}">Copyright Registration</a></li>
                <li><a href="{{ route('office-action') }}">Office Action Response</a></li>
                <!-- <h4 class="ft">Company</h4> <ul>
                <li><a href="./About-us.html">About Us</a></li>
                <li><a href="./careers.html">Careers</a></li>
                <li><a href="./guarantee.html">Our Guarantee</a></li>
                <li><a href="./privacy-policy.html">Privacy Settings</a></li> -->
            </ul>

            </ul>
        </div>
        <div class="footer-col footer-legal-links">
            <h4>Company</h4>
            <ul>
                <li><a href="{{ route('about-us') }}">About Us</a></li>
                <li><a href="{{ route('careers') }}">Careers</a></li>
                <li><a href="{{ route('guarantee') }}">Our Guarantee</a></li>
                <li><a href="{{ route('privacy-policy') }}">Privacy Settings</a></li>
            </ul>
        </div>

        <div class="footer-col footer-connect">
            <h4>Connect With Us</h4>
            <ul>
                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                <li><a href="{{ route('blog') }}">Blog</a></li>
            </ul>

            <h4 class="follow-title">Follow Us</h4>
            <div class="social-links">
                <a href="#"><img src="{{ asset('imagees/linkdin.png') }}" alt="LinkedIn"></a>
                <a href="#"><img src="{{ asset('imagees/instagram.png') }}" alt="Twitter"></a>
                <a href="#"><img src="{{ asset('imagees/facebook.png') }}" alt="Facebook"></a>
            </div>
            <!-- <div class="call-us-block">
                <div class="call-text">
                    <a href="tel:+1 (650) 384-0370" class="call-text">
                        <span class="phone-icon">
                            <img src="./imagees/phone-call.png" alt="Phone Icon" class="custom-phone-img">
                        </span>
                        <div>
                            <p class="call-number">Call Us</p>
                            <p class="phone-number"> +1 (650) 384-0370
                            </p>
                            <p class="hours">Mon-Fri 9AM-5PM CST</p>
                        </div>
                    </a>
                </div>
                <div class="call-text">
                    <a href="mailto:Legal@trademarkusp.com" class="call-text">
                        <span class="phone-icon">
                            <img src="./imagees/mail.png" alt="Phone Icon" class="custom-phone-img">
                        </span>
                        <div>
                            <p class="call-number">Email</p>
                            <p class="phone-number">Legal@trademarkusp.com</p>
                        </div>
                    </a>
                </div>
            </div> -->
        </div>

    </div>

    <div class="container footer-separator"></div>

    <div class="footer-bottom">
        <div class="container footer-legal">
            <div class="legal-info">
                <p class="privacy-policy-title">Disclaimer</p>
                <p class="legal-text"> The goal of Trademark USP is to offer companies the most dependable, efficient, and reasonably priced trademark protection services possible. Our first priority is quality. Copyright 2025 USP of Trademarks, LLC. Only software and information are offered by Trademark USP. Trademark USP does not offer legal advice or take involved in any kind of legal representation; it is not a "lawyer referral service". Please refer to our <a href="{{ route('term-of-service') }}">Terms of Service</a> and <a href="{{ route('privacy-policy') }}">Privacy Policy</a> before using Trademark USP. </p>
            </div>

            <div class="payment-copyright">
                <div class="payment-icons">
                    <img src="{{ asset('imagees/Visa_Logo_83d9074ab9.svg') }}" alt="Visa">
                    <img src="{{ asset('imagees/Mastercard_Logo_9db9877556.svg') }}" alt="Mastercard">
                    <img src="{{ asset('imagees/AE_Logo_0f30048c26.svg') }}" alt="American Express">
                    <img src="{{ asset('imagees/Discover_Card_Logo_e5a28a3aeb.svg') }}" alt="Discover">
                </div>
                <p class="copyright-text">© Copyright 2025 Trademark USP, LLC</p>
            </div>
        </div>
    </div>
</footer>

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script> -->