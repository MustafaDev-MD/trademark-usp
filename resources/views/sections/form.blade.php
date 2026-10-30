<div id="fcmp-modal-wrapper" style="display:none" aria-hidden="true">
    <div id="fcmp-modal" role="dialog" aria-modal="true" aria-labelledby="inquiry-title" tabindex="-1">
        <button type="button" id="fcmp-close" aria-label="Close form">&times;</button>
        <div class="modal-content">
            <div class="modal-header"><img src="{{ asset('imagees/logo-new-BIG.png') }}" alt="Trademark USP"><h2 id="inquiry-title">Start Your Trademark Application</h2><p>Tell us what you want to protect. Our team will review your details and explain the next steps.</p></div>
            <form method="POST" action="{{ route('modal.form.submit') }}" id="modalForm" enctype="multipart/form-data" novalidate>
                @csrf
                <input type="text" name="website" style="display:none" tabindex="-1" autocomplete="off" aria-hidden="true">
                <input type="hidden" name="selected_plan" id="modal-selected-plan">
                <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                <div class="popup-name-row">
                    <div class="fld-input"><label for="inquiry-first-name">First name</label><input id="inquiry-first-name" name="first_name" placeholder="First Name" autocomplete="given-name" maxlength="100" required><small class="text-danger" data-error="first_name"></small></div>
                    <div class="fld-input"><label for="inquiry-last-name">Last name</label><input id="inquiry-last-name" name="last_name" placeholder="Last Name" autocomplete="family-name" maxlength="100" required><small class="text-danger" data-error="last_name"></small></div>
                </div>
                <div class="fld-input"><label for="inquiry-email">Email address</label><input id="inquiry-email" type="email" name="customer_email" placeholder="Your Email" autocomplete="email" maxlength="255" required><small class="text-danger" data-error="customer_email"></small></div>
                <div class="fld-input"><label for="phoneNum2">Phone number</label><input id="phoneNum2" type="tel" name="customer_phone" autocomplete="tel" required><small class="text-danger" data-error="customer_phone"></small></div>
                <fieldset class="popup-trademark-types"><legend>What would you like to trademark?</legend><p>Select one or more options.</p><div class="popup-type-options">
                    <label class="trademark-choice">
                        <input type="checkbox" name="trademark_types[]" value="name">
                        <span class="trademark-choice-card"><span class="trademark-choice-check" aria-hidden="true">✓</span><svg class="trademark-choice-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M4 21V7l8-4 8 4v14M9 21v-5h6v5M8 9h1m6 0h1M8 12h1m6 0h1M2 21h20"/></svg><span class="trademark-choice-title">Business Name</span></span>
                    </label>
                    <label class="trademark-choice">
                        <input type="checkbox" name="trademark_types[]" value="logo">
                        <span class="trademark-choice-card"><span class="trademark-choice-check" aria-hidden="true">✓</span><svg class="trademark-choice-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="4"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="m3 17 5-5 4 4 3-3 6 6"/></svg><span class="trademark-choice-title">Logo</span></span>
                    </label>
                    <label class="trademark-choice">
                        <input type="checkbox" name="trademark_types[]" value="slogan">
                        <span class="trademark-choice-card"><span class="trademark-choice-check" aria-hidden="true">✓</span><svg class="trademark-choice-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M8 10H4v6h6v-6H8V8a3 3 0 0 1 3-3M18 10h-4v6h6v-6h-2V8a3 3 0 0 1 3-3"/></svg><span class="trademark-choice-title">Slogan</span></span>
                    </label>
                </div><small class="text-danger" data-error="trademark_types"></small></fieldset>
                <div class="fld-input" data-trademark-field="name" hidden><label for="trademark-name">Trademark name</label><input id="trademark-name" name="trademark_name" placeholder="Enter Your Brand Name" maxlength="255" disabled><small class="text-danger" data-error="trademark_name"></small></div>
                <div class="fld-input" data-trademark-field="slogan" hidden><label for="trademark-slogan">Trademark slogan</label><input id="trademark-slogan" name="trademark_slogan" placeholder="Enter Your Slogan" maxlength="500" disabled><small class="text-danger" data-error="trademark_slogan"></small></div>
                <div class="fld-input" data-trademark-field="logo" hidden><label for="trademark-logo">Upload your logo</label><input id="trademark-logo" type="file" name="logo" accept=".jpg,.jpeg,.png,.webp" aria-describedby="logo-help" disabled><p id="logo-help">JPG, PNG or WebP. Maximum 5 MB.</p><small class="text-danger" data-error="logo"></small></div>
                <div class="fld-input"><label for="inquiry-message">Brand name or message</label><textarea id="inquiry-message" name="comment" maxlength="2000" rows="3" placeholder="Your Message"></textarea><small class="text-danger" data-error="comment"></small></div>
                <p class="popup-help">Any questions? <a href="javascript:void(0)" onclick="triggerChat()">Chat with our team</a>.</p>
                <p class="popup-policy-links"><a href="{{ route('term-of-service') }}" target="_blank" rel="noopener">Terms of Service</a> · <a href="{{ route('privacy-policy') }}" target="_blank" rel="noopener">Privacy Policy</a></p>
                <p id="modal-form-status" role="status" aria-live="polite"></p>
                <div class="fld-btn packageformsubmit"><button type="submit" id="modalSubmitBtn" disabled>Get Started Now</button><a id="modalPayNowBtn" class="modal-pay-now second-nav-button primary-cta" target="_blank" rel="noopener" style="display:none">Pay Now</a></div>
            </form>
        </div>
    </div>
</div>
<link rel="stylesheet" href="{{ asset('vendor/intl-tel-input/css/intlTelInput.css') }}">
<script type="application/json" id="popup-form-config">{!! json_encode(['sitekey'=>config('captcha.sitekey'), 'utilsUrl'=>asset('vendor/intl-tel-input/js/utils.js'), 'phoneMetadataUrl'=>asset('vendor/intl-tel-input/phone-country-lengths.json')], JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT) !!}</script>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.sitekey') }}" async defer></script>
<script src="{{ asset('vendor/intl-tel-input/js/intlTelInput.min.js') }}"></script>
<script src="{{ asset('js/popup-form.js') }}?v={{ filemtime(public_path('js/popup-form.js')) }}"></script>
