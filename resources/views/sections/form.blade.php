<div id="fcmp-modal-wrapper" style="display:none" role="dialog" aria-modal="true" aria-labelledby="inquiry-title" aria-describedby="inquiry-summary">
<div id="fcmp-modal" tabindex="-1">
<button id="fcmp-close" type="button" aria-label="Close inquiry">&times;</button>
<div class="modal-content"><div class="modal-header"><h2 id="inquiry-title">Request filing support</h2></div>
<div class="modal-body">
<p id="inquiry-summary">Send an inquiry to our team. No payment is taken and no order is placed by this form.</p>
<p id="selected-package" aria-live="polite"></p>
<p>Service fees exclude government fees and optional extras. A complete quote and any separate attorney agreement must be reviewed before purchase.</p>
<form method="POST" action="{{ route('modal.form.submit') }}" id="modalForm">
@csrf
<input type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true" style="display:none">
<input type="hidden" name="selected_plan" id="inquiry-plan">
<input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
@foreach (['customer_full_name'=>'Full name', 'customer_phone'=>'Phone number', 'customer_email'=>'Email address'] as $field=>$label)
<div class="fld-input"><label for="inquiry-{{ $field }}">{{ $label }}</label><input id="inquiry-{{ $field }}" type="{{ $field === 'customer_email' ? 'email' : ($field === 'customer_phone' ? 'tel' : 'text') }}" name="{{ $field }}" required autocomplete="{{ $field === 'customer_email' ? 'email' : ($field === 'customer_phone' ? 'tel' : 'name') }}" aria-describedby="error-{{ $field }}"><small id="error-{{ $field }}" class="text-danger"></small></div>
@endforeach
<div class="fld-input"><label for="inquiry-comment">What would you like to protect?</label><textarea id="inquiry-comment" name="comment" maxlength="1000" required aria-describedby="error-comment"></textarea><small id="error-comment" class="text-danger"></small></div>
<p>Read our <a href="{{ route('privacy-policy') }}">Privacy Policy</a> and <a href="{{ route('term-of-service') }}">Terms of Service</a> before sending your inquiry.</p>
<p id="inquiry-status" role="status" aria-live="polite"></p>
<div class="fld-btn"><button type="submit" id="modalSubmitBtn">Send inquiry - no payment</button></div>
</form>
<p><a id="application-start" href="{{ route('register') }}">Continue to application and review pricing</a></p>
<p>To place an order, create or sign into your account, complete the application and review the amount before checkout. This is separate from sending an inquiry.</p>
</div></div></div></div>
<script src="https://www.google.com/recaptcha/api.js?render={{ config('captcha.sitekey') }}" async defer></script>
<script>window.inquiryConfig = {sitekey: @json(config('captcha.sitekey')), packages: @json(config('packages')), startUrl: @json(url('/start-application')), registerUrl: @json(route('register'))};</script>
