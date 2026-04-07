<div
    class="tm-wizard-wrapper step-{{ $step }}"
    x-data="{ selected: @entangle('trademark_type').live }"
    style="position: relative;">

    {{-- GLOBAL LOADER --}}
    <div
        id="global-loader"
        wire:loading.flex
        wire:target="
            next,
            back,
            selectPlanAndContinue,
            selectAddonAndContinue,
            selectPriorityAndContinue,
            checkout
        "
    >
        <!-- Spinner ring -->
        <div class="whirly-loader"></div>
    
        <!-- Center image (static) -->
        <img
            src="{{ asset('imagees/Icon-new-BIG.webp') }}"
            alt="Trademark USP Logo"
            class="loader-logo"
        >
    </div>



    {{-- ================= STEP 1 ================= --}}
    @if($step === 1)
         <!--LEFT SIDE -->
        <div class="tm-left">
            <h1>Let’s Protect Your Brand</h1>
            <p>Tell us what you want to trademark so we can guide you through the right registration process.</p>
        </div>
    
         <!--RIGHT SIDE -->
        <div class="tm-right">
            <h2>What are you trying to protect?</h2>
    
            <div class="tm-options">
    
                {{-- NAME --}}
                <button type="button"
                    class="tm-option"
                    :class="{ 'active': selected === 'name' }"
                    @click="selected = 'name'">
    
                    <div class="tm-option-row">
                        <div class="d-flex gap-3 col">
                            <input
                                type="radio"
                                id="trademark_name"
                                name="trademark_type"
                                value="name"
                                wire:model="trademark_type">
                            <label for="trademark_name">
                                <strong>Name</strong>
                                <p>Protects the words used to identify your brand.</p>
                            </label>
                        </div>
                        <div class="tm-selected-text">Name</div>
                    </div>
                </button>
    
                {{-- SLOGAN --}}
                <button type="button"
                    class="tm-option"
                    :class="{ 'active': selected === 'slogan' }"
                    @click="selected = 'slogan'">
    
                    <div class="tm-option-row">
                        <div class="d-flex gap-3 col">
                            <input
                                type="radio"
                                id="trademark_slogan"
                                name="trademark_type"
                                value="slogan"
                                wire:model="trademark_type">
                            <label for="trademark_slogan">
                                <strong>Slogan</strong>
                                <p>Protects a phrase or tagline tied to your brand.</p>
                            </label>
                        </div>
                        <div class="tm-selected-text">Slogan</div>
                    </div>
                </button>
    
                {{-- LOGO --}}
                <button type="button"
                    class="tm-option"
                    :class="{ 'active': selected === 'logo' }"
                    @click="selected = 'logo'">
    
                    <div class="tm-option-row">
                        <div class="d-flex gap-3 col">
                            <input
                                type="radio"
                                id="trademark_logo"
                                name="trademark_type"
                                value="logo"
                                wire:model="trademark_type">
                            <label for="trademark_logo">
                                <strong>Logo</strong>
                                <p>Protects your visual design or symbol.</p>
                            </label>
                        </div>
                        <div class="tm-selected-text">
                            <img src="{{ asset('imagees/amazon-logo.webp') }}" alt="Logo">
                        </div>
                    </div>
                </button>
            </div>
    
            @error('trademark_type')
            <p class="error">{{ $message }}</p>
            @enderror
    
            <div class="tm-actions">
                <!--<button type="button" class="btn-back" wire:click="back">Back</button>-->
                <button type="button" class="btn-continue" wire:click="next" wire:loading.attr="disabled" wire:target="next">Continue</button>
            </div>
        
        </div>
    @endif


    {{-- ================= STEP 2 ================= --}}
    @if($step === 2)
        <!--LEFT SIDE -->
        <div class="tm-left">
            @if($trademark_type === 'name')
                <h1>Enter Your<br> Brand Name</h1>
                <p>This is the exact name you want to protect. Make sure it’s spelled correctly, as it will be filed with the USPTO.</p>
            @endif
            @if($trademark_type === 'slogan')
                <h1>Slogan Protection</h1>
                <p>Enter the slogan you want to secure for your brand</p>
            @endif
            @if($trademark_type === 'logo')
                <h1>Logo Protection</h1>
                <p>Enter the logo you want<br> to protect as a trademark</p>
            @endif
        </div>
    
         <!--RIGHT SIDE -->
        <div class="tm-right">
            <h2>Enter the {{ ucfirst($trademark_type ?? 'Trademark') }} you want to protect</h2>
    
            @if($trademark_type === 'logo')
            <input
                type="text"
                id="logo_name"
                name="logo_name"
                wire:model.defer="logo_name"
                placeholder="Logo Name"
                class="mb-3">
    
            <textarea
                id="logo_description"
                name="logo_description"
                wire:model.defer="logo_description"
                placeholder="Describe your logo"
                style="resize: vertical; height: 150px;"></textarea>
            @else
            <input
                type="text"
                id="trademark_text"
                name="trademark_text"
                wire:model.defer="trademark_text"
                placeholder="e.g. Adidas {{ ucfirst($trademark_type) }}">
            @endif
    
            <div class="tm-actions">
                <button type="button" class="btn-back" wire:click="back">Back</button>
                <button type="button" class="btn-continue" wire:click="next" wire:loading.attr="disabled" wire:target="next">Continue</button>
            </div>
            
        </div>
    @endif

    {{-- ================= STEP 4 ================= --}}
    @if($step === 4)
        <!--LEFT SIDE -->
        <div class="tm-left">
            <h1>Select Your Filing Package</h1>
            <p>Compare plans and choose how hands-on you want the process to be</p>
        </div>
        
        <!--RIGHT SIDE -->
        <div class="tm-right">
            <h2>Choose Your Plan</h2>
    
            <div class="pricing-container">
    
                {{-- BASIC --}}
                <div class="pricing-card basic-package one {{ $plan === 'basic' ? 'active' : '' }}">
                    <div class="card-header">
                        <h3>Basic Package</h3>
                        <p class="tagline">I only need what it takes to file</p>
    
                        <div class="price-block">
                            <span class="price-value">${{ $plans['basic'] }}</span>
                            <p class="fees">+ applicable fees</p>
                        </div>
    
                        <button
                            type="button"
                            class="cta-button basic-btn"
                            wire:click="selectPlanAndContinue('basic')">
                            Continue with Basic
                        </button>
                    </div>
    
                    <div class="card-body">
                        <p class="includes-title">Includes:</p>
                        <ul class="feature-list">
                            <li>✓ Direct-Hit USPTO Search</li>
                            <li>✓ Trademark Classification</li>
                        </ul>
                    </div>
                </div>
    
                {{-- STANDARD --}}
                <div class="pricing-card standard-package two {{ $plan === 'standard' ? 'active' : '' }}">
                    <div class="card-header">
                        <h3>Standard Package</h3>
                        <p class="tagline">Enhanced and thorough process</p>
    
                        <div class="price-block">
                            <span class="price-value">${{ $plans['standard'] }}</span>
                            <p class="fees">+ applicable fees</p>
                        </div>
    
                        <button
                            type="button"
                            class="cta-button standard-btn"
                            wire:click="selectPlanAndContinue('standard')">
                            Continue with Standard
                        </button>
                    </div>
    
                    <div class="card-body">
                        <p class="includes-title">Includes basic, plus:</p>
                        <ul class="feature-list">
                            <li>✓ 15-min Lawyer Consultation</li>
                            <li>✓ Cease & Desist Letter</li>
                        </ul>
                    </div>
                </div>
    
                {{-- PREMIUM --}}
                <div class="pricing-card premium-package highlight-card three {{ $plan === 'premium' ? 'active' : '' }}">
                    <div class="card-header">
                        <h3>Premium Package</h3>
                        <p class="tagline">Premium legal support</p>
    
                        <div class="price-block">
                            <span class="price-value">${{ $plans['premium'] }}</span>
                            <p class="fees">+ applicable fees</p>
                        </div>
    
                        <button
                            type="button"
                            class="cta-button premium-btn"
                            wire:click="selectPlanAndContinue('premium')">
                            Continue with Premium
                        </button>
                    </div>
    
                    <div class="card-body">
                        <p class="includes-title">Includes standard, plus:</p>
                        <ul class="feature-list">
                            <li>★ 1-hour Lawyer Consultation</li>
                            <li>★ Rush Processing</li>
                            <li>★ Trademark Monitoring</li>
                        </ul>
                    </div>
                </div>
    
            </div>
    
            <div class="tm-actions">
                <button type="button" class="btn-back plan-back-btn" wire:click="back">Back</button>
            </div>
        </div>

    @endif

    {{-- ================= STEP 5 ================= --}}
    @if($step === 5)
    <!--LEFT SIDE -->
        <div class="tm-left">
            <h1>Select Your plan</h1>
            <p>Compare features and pricing to find the right balance of protection and support.</p>
        </div>
        
        <!--RIGHT SIDE -->
        <div class="tm-right">
    
            <h2 class="tm-title">Choose Your Plan</h2> 
    
            <div class="plans-container">
    
                <div class="plans-grid">
    
                    {{-- BASIC --}}
                    <div
                        class="plan-card {{ in_array('basic', $addons ?? []) ? 'active' : '' }}"
                        wire:click="selectAddonAndContinue('basic')">
                        <div class="card-inner-content">
                            <h3 class="plan-name">Basic</h3>
                            <p class="plan-price free">Free</p>
                        </div>
    
                        <div class="card-bottom-content">
    
                            <button type="button" class="plan-btn">
                                {{ in_array('basic', $addons) ? 'Selected' : 'Continue with Basic' }}
                            </button>
    
                            <div class="plan-benefits">
                                <p><strong>Benefits:</strong></p>
                                <ul>
                                    <li><i class="fa-solid fa-check"></i>Searches federal trademarks, business names, and domains.</li>
                                    <li><i class="fa-solid fa-check"></i>Finds exact and similar matches to flag possible conflicts.</li>
                                </ul>
                            </div>
    
                        </div>
                    </div>
    
    
                    {{-- STANDARD --}}
                    <div
                        class="plan-card popular {{ in_array('standard', $addons ?? []) ? 'active' : '' }}"
                        wire:click="selectAddonAndContinue('standard')">
    
                        <span class="badge">Popular</span>
    
                        <div class="card-inner-content">
                            <h3 class="plan-name">Standard</h3>
                            <p class="plan-price">$99</p>
                        </div>
    
                        <div class="card-bottom-content">
                            <button type="button" class="plan-btn">
                                {{ in_array('standard', $addons) ? 'Selected' : 'Continue with Standard' }}
                            </button>
    
                            <div class="plan-benefits">
                                <p><strong>Benefits:</strong></p>
                                <ul>
                                    <li><i class="fa-solid fa-check"></i>Everything in Basic.</li>
                                    <li><i class="fa-solid fa-check"></i>Adds state-level searches in all 50 states for extra protection.</li>
                                </ul>
                            </div>
                        </div>
    
                    </div>
    
    
                    {{-- PREMIUM --}}
    
                </div>
    
                <div
                    class="plan-card premium {{ in_array('premium', $addons ?? []) ? 'active' : '' }}"
                    wire:click="selectAddonAndContinue('premium')">
    
                    <span class="badge dark">Most comprehensive</span>
    
                    <div class="card-inner-content">
                        <h3 class="plan-name">Premium</h3>
                        <p class="plan-price">$149</p>
                    </div>
    
                    <div class="card-bottom-content">
    
                        <button type="button" class="plan-btn">
                            {{ in_array('premium', $addons) ? 'Selected' : 'Continue with Premium' }}
                        </button>
    
                        <div class="plan-benefits">
                            <p><strong>Benefits:</strong></p>
                            <ul>
                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    <p>Everything in Standard.</p>
                                </li>
                                <li>
                                    <i class="fa-solid fa-check"></i>
                                    <p>Adds international searches (European Union + WIPO).</p>
                                </li>
                            </ul>
                        </div>
    
                    </div>
                </div>
    
            </div>
    
            <div class="tm-actions">
                <button type="button" class="btn-back plan-back-btn" wire:click="back">Back</button>
            </div>
            
        </div>

    @endif

    {{-- ================= STEP 6 ================= --}}
    @if($step === 6)
    
        <!--LEFT SIDE -->
        <div class="tm-left">
            <h1>How Fast Do You Want It Filed?</h1>
            <p>Standard, Express, or Priority — pick the speed that matches your timeline and budget.</p>
        </div>
        
        <!--RIGHT SIDE -->
        <div class="tm-right">
            <h2 class="tm-title">Processing Time</h2>
    
            <div class="plans-container">
                <div class="plans-grid">
    
                    {{-- STANDARD --}}
                    <div
                        class="plan-card {{ $priority === 'standard' ? 'active' : '' }}"
                        wire:click="$set('priority','standard')">
    
                        <div class="card-inner-content">
    
                            <h3 class="plan-name">Standard</h3>
                            <p class="plan-price free">Free</p>
    
                        </div>
    
                        <div class="card-bottom-content">
    
                            <p class="plan-desc">Processes in 3 weeks</p>
    
                            <button
                                type="button"
                                class="plan-btn"
                                wire:click.stop="selectPriorityAndContinue('standard')">
                                {{ $priority === 'standard' ? 'Selected' : 'Continue with Standard' }}
                            </button>
    
                        </div>
                    </div>
    
                    {{-- EXPRESS --}}
                    <div
                        class="plan-card popular {{ $priority === 'express' ? 'active' : '' }}"
                        wire:click="$set('priority','express')">
    
                        <span class="badge">Recommended</span>
    
                        <div class="card-inner-content">
    
                            <h3 class="plan-name">Express</h3>
                            <p class="plan-price">$50</p>
    
                        </div>
    
                        <div class="card-bottom-content">
    
                            <p class="plan-desc">Processes in 5 days</p>
    
                            <button
                                type="button"
                                class="plan-btn"
                                wire:click.stop="selectPriorityAndContinue('express')">
                                {{ $priority === 'express' ? 'Selected' : 'Continue with Express' }}
                            </button>
    
                        </div>
                    </div>
    
                </div>
                {{-- PRIORITY --}}
                <div
                    class="plan-card premium {{ $priority === 'priority' ? 'active' : '' }}"
                    wire:click="$set('priority','priority')">
    
                    <div class="card-inner-content">
    
                        <h3 class="plan-name">Priority</h3>
                        <p class="plan-price">$100</p>
    
                    </div>
    
                    <div class="card-bottom-content">
    
                        <p class="plan-desc">Processes in 48 hours</p>
    
                        <button
                            type="button"
                            class="plan-btn"
                            wire:click.stop="selectPriorityAndContinue('priority')">
                            {{ $priority === 'priority' ? 'Selected' : 'Continue with Priority' }}
                        </button>
    
                    </div>
                </div>
    
            </div>
    
            <div class="tm-actions">
                <button type="button" class="btn-back plan-back-btn" wire:click="back">Back</button>
            </div>
        </div>

    @endif

    {{-- ================= STEP 7 ================= --}}
    @if($step === 7)
    
     <!--LEFT SIDE -->
        <div class="tm-left">
            <h1>Let’s Protect Your Brand</h1>
            <p>Tell us what you want to trademark so we can guide you through the right registration process.</p>
        </div>
        
        <!--RIGHT SIDE -->
        <div class="tm-right">
            <h2 class="tm-title">Review Your Order</h2>
    
            <div class="order-summary">
    
                {{-- ITEM --}}
                <div class="order-item">
                    <div class="item-left">
                         <!--<button class="edit-link" wire:click="$set('step',4)">Edit</button> -->
                        <button class="edit-link" wire:click="openModal('plan')">Edit</button>
                        <p class="item-title">
                            Trademark Registration – {{ ucfirst($plan) }} Package
                        </p>
                    </div>
                    <div class="item-price">${{ $plan_price }}</div>
                </div>
    
                {{-- ADDONS --}}
                @foreach($addons as $a)
                <div class="order-item">
                    <div class="item-left">
                         <!--<button class="edit-link" wire:click="$set('step',5)">Edit</button> -->
                        <button class="edit-link" wire:click="openModal('addon')">Edit</button>
    
                        <p class="item-title">
                            {{ $addonLabels[$a] ?? ucfirst($a) }}
                        </p>
                    </div>
    
                    <div class="item-price">
                        @if(($addonList[$a] ?? 0) > 0)
                        ${{ $addonList[$a] }}
                        @else
                        0$
                        @endif
                    </div>
                </div>
                @endforeach
    
    
                {{-- PRIORITY --}}
                <div class="order-item">
                    <div class="item-left">
                         <!--<button class="edit-link" wire:click="$set('step',6)">Edit</button> -->
                        <button class="edit-link" wire:click="openModal('priority')">Edit</button>
                        <p class="item-title">
                            {{ ucfirst($priority) }} Processing
                        </p>
                    </div>
                    <div class="item-price">${{ $priority_price }}</div>
                </div>
    
                {{-- PROMO --}}
                <div x-data="{ open: false }" class="promo-wrapper">
    
                    {{-- CLICK ROW --}}
                    <div
                        class="promo-row"
                        @click="open = !open">
                        <span>+ Add promo code</span>
                        <span x-text="open ? '−' : '+'"></span>
                    </div>
    
                    {{-- SLIDE FIELD --}}
                    <div
                        x-show="open"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 max-h-0"
                        x-transition:enter-end="opacity-100 max-h-40"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 max-h-40"
                        x-transition:leave-end="opacity-0 max-h-0"
                        class="promo-box">
    
                        <input
                            type="text"
                            placeholder="Enter promo code"
                            class="promo-input"
                            wire:model.defer="promoCode">
    
                        <button
                            type="button"
                            class="promo-apply-btn"
                            wire:click="applyPromo"
                            wire:loading.attr="disabled"
                            wire:target="applyPromo">
                            Apply
                        </button>
                    </div>
    
                </div>
    
                {{-- PROMO MESSAGE --}}
                @if($promoMessage)
                <div class="promo-message {{ $promoSuccess ? 'success' : 'error' }}">
                    {{ $promoMessage }}
                </div>
                @endif
                
                {{-- SMS CONSENT (REQUIRED) --}}
                <label class="tm-checkbox">
                    <input
                        type="checkbox"
                        wire:model="sms_consent">
                    <span class="checkmark"></span>
                    I agree to Trademark USP Terms of Services & Privacy Policy
                </label>
                @error('sms_consent') <span class="tm-error">{{ $message }}</span> @enderror
    
    
                {{-- TOTAL --}}
                <div class="order-total">
                    <span>My total</span>
                    <span>${{ $total }}</span>
                </div>
    
                <p class="fees-note">+ applicable fees*</p>
    
                {{-- ACTIONS --}}
                <div class="checkout-actions">
                    <button class="btn-back" wire:click="$set('step',4)">Back</button>
                    <button class="btn-continue" wire:click="checkout" wire:loading.attr="disabled" wire:target="checkout">
                        Continue
                    </button>
                </div>
    
            </div>
    
            @if($showPlanModal)
            <div class="tm-modal-overlay">
                <div class="tm-modal" style="position:relative"
                    x-data="{ selected: @entangle('tempPlan') }">
    
                    <span class="modal-close" wire:click="closeModal">&times;</span>
    
                    <h3>Trademark Packages</h3>
    
                    @foreach($plans as $key => $price)
                    <div
                        class="option-card"
                        :class="{ 'active': selected === '{{ $key }}' }"
                        @click="selected='{{ $key }}'">
    
                        <strong>{{ ucfirst($key) }}</strong>
                        <span>${{ $price }}</span>
                    </div>
                    @endforeach
    
                    <div class="modal-actions">
                        <button wire:click="closeModal">Cancel</button>
                        <button wire:click="updatePlan">Update Order</button>
                    </div>
                </div>
            </div>
            @endif
    
            @if($showAddonModal)
            <div class="tm-modal-overlay">
                <div class="tm-modal" style="position:relative"
                    x-data="{ selected: @entangle('tempAddon') }">
    
                    <span class="modal-close" wire:click="closeModal">&times;</span>
    
                    <h3>Search Package</h3>
    
                    @foreach($addonList as $key => $price)
                    <div
                        class="option-card"
                        :class="{ 'active': selected === '{{ $key }}' }"
                        @click="selected='{{ $key }}'">
    
                        <strong>{{ ucfirst(str_replace('_',' ',$key)) }}</strong>
                        <span>{{ $price == 0 ? 'Free' : '$'.$price }}</span>
                    </div>
                    @endforeach
    
                    <div class="modal-actions">
                        <button wire:click="closeModal">Cancel</button>
                        <button wire:click="updateAddon">Update Order</button>
                    </div>
                </div>
            </div>
            @endif
    
            @if($showPriorityModal)
            <div class="tm-modal-overlay">
                <div class="tm-modal" style="position:relative"
                    x-data="{ selected: @entangle('tempPriority') }">
    
                    <span class="modal-close" wire:click="closeModal">&times;</span>
    
                    <h3>Processing Speed</h3>
    
                    @foreach($priorities as $key => $price)
                    <div
                        class="option-card"
                        :class="{ 'active': selected === '{{ $key }}' }"
                        @click="selected='{{ $key }}'">
    
                        <strong>{{ ucfirst(str_replace('_',' ',$key)) }}</strong>
                        <span>{{ $price == 0 ? 'Free' : '$'.$price }}</span>
                    </div>
                    @endforeach
    
                    <div class="modal-actions">
                        <button wire:click="closeModal">Cancel</button>
                        <button wire:click="updatePriority">Update Order</button>
                    </div>
                </div>
            </div>
            @endif
    
    
    
            {{-- GUARANTEE --}}
            <div class="guarantee-box">
                <h4>Satisfaction Guarantee</h4>
                <p>
                    We want every customer to be satisfied, so we will work with any customer
                    who has any questions or concerns about their filings.
                    Our customer service team is made up of dedicated trademark representatives
                    with one goal — to meet each client's needs in a friendly, caring, and efficient manner.
                    <br><br>
                    If you do not think we have met this goal, let us know and we will be happy
                    to make every effort to resolve the issue(s).
                    If we make an error on your filing, we will correct it at no additional cost.
                </p>
            </div>
        </div>

    @endif

</div>
