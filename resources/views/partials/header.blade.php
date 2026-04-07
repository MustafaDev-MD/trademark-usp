<header class="main-nav-header">
    <div class="main-nav-wrapper">

        <a href="{{ route('home') }}" class="main-nav-logo">
            <img src="{{ asset('imagees/logo-new-BIG.png') }}" alt="Trademark USP Logo" class="main-nav-logo-image">
        </a>

        <button class="main-nav-hamburger-btn">☰</button>

        <nav class="main-nav-links-container">
            <ul class="main-nav-list">

                <li class="main-nav-item main-nav-dropdown">
                    <a href="#" class="main-nav-link">
                        Our Services
                        <span class="main-nav-arrow-icon">
                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <div class="main-nav-dropdown-content">
                        <div class="main-nav-dropdown-services">
                            <h4 class="main-nav-dropdown-title">
                                <span class="nav-icon">📋</span> Our Services
                            </h4>
                            <ul class="main-nav-dropdown-list main-nav-col-left">
                                <li><a href="{{ route('trademark-registration') }}">Trademark Registration</a></li>
                                <li><a href="{{ route('trademark-monitoring') }}">Trademark Monitoring</a></li>
                                <li><a href="{{ route('trademark-renewal') }}">Trademark Renewal</a></li>
                                <li><a href="{{ route('office-action') }}">Office Action Response</a></li>
                                <li><a href="{{ route('statement-of-use-extension') }}">Filing an Extension</a></li>
                            </ul>
                            <ul class="main-nav-dropdown-list main-nav-col-right">
                                <li><a href="{{ route('comprehensive-search') }}">Comprehensive Trademark Search</a></li>
                                <li><a href="{{ route('trademark-search') }}">Free Trademark Search</a></li>
                                <li><a href="{{ route('copyright-registration') }}">Copyright Registration</a></li>
                                <li><a href="{{ route('statement-of-use') }}">Statement of Use</a></li>
                                <li><a href="{{ route('dmca-takedown-service') }}">DMCA Takedown </a></li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class="main-nav-item main-nav-dropdown">
                    <a href="#" class="main-nav-link">
                        Resources
                        <span class="main-nav-arrow-icon">
                            <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                    <div class="main-nav-dropdown-content">
                        <div class="main-nav-dropdown-services">
                            <h4 class="main-nav-dropdown-title">
                                <span class="nav-icon">📋</span>Resources
                            </h4>
                            <ul class="main-nav-dropdown-list main-nav-col-left">
                                <li><a href="{{ route('blog') }}">Blogs</a></li>

                            </ul>
                            <ul class="main-nav-dropdown-list main-nav-col-right">
                                <li><a href="{{ route('trademark-faqs') }}">Trademark FAQS</a></li>
                                <li><a href="{{ route('copyrights-faqs') }}">Copyright FAQS</a></li>

                            </ul>
                        </div>
                    </div>
                </li>

                <li class="main-nav-item">
                    <a href="{{ route('about-us') }}" class="main-nav-link">About us</a>
                </li>
            </ul>

            <div class="main-nav-cta-group mobile-only-ctas">
                <a href="javascript:void(0)" class="main-nav-button primary-cta fcmp-trigger-button">Register my trademark</a>
                <a href="{{ route('login') }}" class="second-nav-button primary-cta">Login</a>
            </div>

        </nav>

        <div class="main-nav-cta-group desktop-only-ctas">
            <a href="javascript:void(0)" class="main-nav-button primary-cta fcmp-trigger-button">Register my trademark</a>
            <a href="{{ route('login') }}" class="second-nav-button primary-cta">Login</a>
        </div>

    </div>
</header>

<!-- <div class="right-ribbon"> -->

<div class="right-ribbon-container">

    <!-- CALL -->
    <div class="ribbon-item">
        <a href="tel:(650) 384-0370">
            <div class="hover-area hover-call">
                <span class="icon">
                    <i class="fa-solid fa-phone"></i>
                </span>

                <span class="ribbon-text">
                    <p class="live-chat">Call</p>
                    <!--<p class="get-advice">(650) 384-0370</p>-->
                </span>
            </div>
        </a>
    </div>

    <!-- CHAT -->
    <div class="ribbon-item">
        <div class="hover-area chat hover-chat" id="openLiveChat">
            <span class="icon">💬</span>
            <span class="ribbon-text">
                <p class="live-chat">Live Chat</p>
                <!--<p class="get-advice">Get Advice From Expert</p>-->
            </span>
        </div>
    </div>

    <!-- FORM -->
    <div class="ribbon-item ribbon-form">
    <div class="hover-area hover-form vertical" id="ribbonForm">

        <!-- VERTICAL TEXT (default) -->
        <div class="ribbon-collapsed">
            <span class="text-vertical step-title">
                Free Legal Consultation
            </span>
        </div>

        <!-- FORM (hidden by default) -->
        <div class="ribbon-expanded">
            <span class="close-ribbon">&times;</span>
            
            <a href="{{ route('home') }}" class="main-nav-logo">
                <img src="{{ asset('imagees/logo-new-BIG.png') }}" alt="Trademark USP Logo" class="main-nav-logo-image form-logo">
            </a>

            <h4>Free Legal Consultation</h4>

            <form method="POST" action="{{ route('modal.form.submit') }}" id="ribbonFormForm">
                @csrf

                <!--<div class="fld-input">-->
                    <input type="text" id="ribbonName" name="customer_full_name" placeholder="Name" required>
                    <small class="text-danger"></small>
                <!--</div>-->

                <!--<div class="fld-input">-->
                    <input type="email" id="ribbonEmail" name="customer_email" placeholder="Email Address" required>
                    <small class="text-danger"></small>
                <!--</div>-->

                <!--<div class="fld-input">-->
                    <input type="text" id="ribbonPhone" name="customer_phone" placeholder="Phone Number" required>
                    <small class="text-danger"></small>
                <!--</div>-->

                <!--<div class="fld-input">-->
                    <textarea class="comments form-control" name="comment" placeholder="What are you looking to protect? (e.g. Name, Logo and Slogan)" required></textarea>
                    <small class="text-danger"></small>
                <!--</div>-->

                <div class="fld-btn packageformsubmit">
                    <button type="submit" id="ribbonSubmitBtn" disabled>Get Started Now</button>
                </div>
            </form>
        </div>

    </div>
</div>



</div>

<script>
    const ribbon = document.querySelector('.ribbon-form');
    const closeBtn = document.querySelector('.close-ribbon');

    ribbon.addEventListener('click', () => {
        ribbon.classList.add('active');
    });

    closeBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        ribbon.classList.remove('active');
    });
    
    document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("ribbonFormForm");
    const submitBtn = document.getElementById("ribbonSubmitBtn");
    const inputs = form.querySelectorAll("input[required], textarea[required]");
    const phoneInput = document.getElementById("ribbonPhone");
    const loader = document.getElementById("global-loader");
    const touched = new Set();

    if(loader) loader.style.display = "none";

    // ===== Custom Phone Formatting (650 384 0370) =====
    phoneInput.addEventListener("input", function () {
        let value = this.value.replace(/\D/g, ""); // remove non-digits
        if (value.length > 10) value = value.slice(0, 10); // max 10 digits

        let formatted = "";
        if (value.length > 0) formatted += value.slice(0, 3);
        if (value.length >= 4) formatted += " " + value.slice(3, 6);
        if (value.length >= 7) formatted += " " + value.slice(6, 10);

        this.value = formatted;
    });

    // ===== Field Validation =====
    function validateField(input) {
        const value = input.value.trim();
        const errorEl = input.nextElementSibling;
        let valid = true;

        errorEl.textContent = "";
        input.classList.remove("input-error");

        if (!touched.has(input)) return true;

        if (!value) {
            valid = false;
            errorEl.textContent = "This field is required";
            input.classList.add("input-error");
        } else if (input.type === "email") {
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(value)) {
                valid = false;
                errorEl.textContent = "Enter a valid email address";
                input.classList.add("input-error");
            }
        } else if (input.name === "customer_phone") {
            const digits = value.replace(/\s/g, ""); // remove spaces
            if (!/^[0-9]{10}$/.test(digits)) {
                valid = false;
                errorEl.textContent = "Phone must be exactly 10 digits";
                input.classList.add("input-error");
            }
        }

        return valid;
    }

    function checkSubmitButton() {
        let allValid = true;
        inputs.forEach(input => {
            if (!input.value.trim() || input.classList.contains("input-error")) allValid = false;
        });
        submitBtn.disabled = !allValid;
    }

    inputs.forEach(input => {
        input.addEventListener("focus", () => touched.add(input));
        input.addEventListener("input", () => { validateField(input); checkSubmitButton(); });
        input.addEventListener("blur", () => { validateField(input); checkSubmitButton(); });
    });

    submitBtn.disabled = true;

    // ===== Form Submission (AJAX + reCAPTCHA v3) =====
    form.addEventListener("submit", function (e) {
        e.preventDefault();

        // Remove spaces from phone input before sending
        let phone = phoneInput.value.replace(/\s/g, "");
        if (!phone.startsWith("0")) phone = "0" + phone; // prepend 0 to match backend
        phoneInput.value = phone;

        // Validate fields
        let formValid = true;
        inputs.forEach(input => { if (!validateField(input)) formValid = false; });
        if (!formValid) return;

        submitBtn.disabled = true;
        if(loader) loader.style.display = "flex";

        grecaptcha.ready(function () {
            grecaptcha.execute('{{ env("NOCAPTCHA_SITEKEY") }}', { action: 'ribbon_form' })
            .then(function (token) {
                let recaptchaInput = document.createElement("input");
                recaptchaInput.type = "hidden";
                recaptchaInput.name = "g-recaptcha-response";
                recaptchaInput.value = token;
                form.appendChild(recaptchaInput);

                fetch(form.action, {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
                        "Accept": "application/json"
                    },
                    body: new FormData(form)
                })
                .then(res => res.json())
                .then(data => {
                    if(loader) loader.style.display = "none";

                    if(data.success) {
                        window.location.href = data.redirect;
                    } else {
                        Toastify({
                            text: data.message || "Server error. Please try again.",
                            duration: 5000,
                            gravity: "top",
                            position: "center",
                            close: true,
                            style: {
                                background: "#F97555",
                                color: "#FFF4E7",
                                border: "2px solid #475676",
                                borderRadius: "10px"
                            }
                        }).showToast();
                        submitBtn.disabled = false;
                    }
                })
                .catch(err => {
                    if(loader) loader.style.display = "none";
                    Toastify({
                        text: "Server error. Please try again.",
                        duration: 5000,
                        gravity: "top",
                        position: "center",
                        close: true,
                        style: {
                            background: "#F97555",
                            color: "#FFF4E7",
                            border: "2px solid #475676",
                            borderRadius: "10px"
                        }
                    }).showToast();
                    submitBtn.disabled = false;
                });

            });
        });
    });

});
</script>

<style>
.input-error {
    border: 1px solid red !important;
    background-color: transparent !important;
}

.text-danger {
    color: red;
    font-size: 13px;
    margin-top: 2px;
    display: block;
}

#ribbonSubmitBtn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}


</style>



<!-- </div> -->