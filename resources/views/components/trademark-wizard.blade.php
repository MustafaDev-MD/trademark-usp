<?php

// use Livewire\Component;
// use App\Models\TrademarkApplication;
// use Illuminate\Support\Facades\Auth;
// use Stripe\Stripe;
// use Stripe\Checkout\Session as StripeSession;

// new class extends Component
// {
//     // BASIC
//     public $application;
//     public $step = 1;

//     // STEP 1–2
//     public $trademark_type;
//     public $trademark_text;
//     public $logo_name;
//     public $logo_description;

//     // STEP 3
//     public $first_name;
//     public $last_name;
//     public $email;
//     public $phone;
//     public $sms_consent = false;

//     // STEP 4 – PLAN
//     public $plan;
//     public $plan_price = 0;

//     // STEP 5 – ADDONS
//     public $addons = [];
//     public $addons_price = 0;

//     // STEP 6 – PRIORITY
//     public $priority;
//     public $priority_price = 0;

//     // TOTAL
//     public $total = 0;

//     // CONFIG
//     protected $plans = [
//         'basic' => 49,
//         'standard' => 299,
//         'premium' => 539,
//     ];

//     protected $addonList = [
//         'filing_review' => 0,
//         'monitoring'    => 99,
//         'cease_desist'  => 149,
//     ];

//     protected $priorities = [
//         'express'  => 0,
//         'priority' => 100,
//     ];

//     // MOUNT
//     public function mount()
//     {
//         if (!Auth::check()) abort(403);

//         $this->application = TrademarkApplication::firstOrCreate(
//             ['user_id' => Auth::id(), 'status' => 'draft'],
//             ['current_step' => 1]
//         );

//         $this->step  = $this->application->current_step;
//         $this->email = Auth::user()->email;

//         // FREE addon auto-select
//         if (empty($this->addons)) {
//             $this->addons = ['filing_review'];
//         }
//     }

//     // AUTO RECALCULATE
//     public function updated($property)
//     {
//         if (in_array($property, ['plan', 'addons', 'priority'])) {
//             $this->calculateTotal();
//         }
//     }

//     // NEXT
//     public function next()
//     {
//         if ($this->step === 1) {
//             $this->validate(['trademark_type' => 'required']);
//         }

//         if ($this->step === 2) {
//             $this->trademark_type === 'logo'
//                 ? $this->validate(['logo_name' => 'required', 'logo_description' => 'required'])
//                 : $this->validate(['trademark_text' => 'required']);
//         }

//         if ($this->step === 3) {
//             $this->validate([
//                 'first_name' => 'required',
//                 'last_name'  => 'required',
//                 'phone'      => 'required',
//             ]);
//         }

//         if ($this->step === 4) {
//             $this->validate(['plan' => 'required']);
//         }

//         if ($this->step === 5) {
//             $this->validate([
//                 'addons' => 'required|array',
//                 'addons.*' => 'in:filing_review,monitoring,cease_desist',
//             ]);
//         }

//         if ($this->step === 6) {
//             $this->validate(['priority' => 'required']);
//             $this->calculateTotal();
//         }

//         $this->saveData();

//         $this->step = min($this->step + 1, 7);
//         $this->application->update(['current_step' => $this->step]);
//     }

//     // BACK
//     public function back()
//     {
//         if ($this->step > 1) {
//             $this->step--;
//             $this->application->update(['current_step' => $this->step]);
//         }
//     }

//     // TOTAL
//     protected function calculateTotal()
//     {
//         $this->plan_price = $this->plans[$this->plan] ?? 0;

//         $this->addons_price = collect($this->addons)
//             ->sum(fn($a) => $this->addonList[$a] ?? 0);

//         $this->priority_price = $this->priorities[$this->priority] ?? 0;

//         $this->total = $this->plan_price + $this->addons_price + $this->priority_price;
//     }

//     // SAVE
//     protected function saveData()
//     {
//         $this->application->update([
//             'trademark_type' => $this->trademark_type,
//             'trademark_text' => $this->trademark_text,
//             'logo_name'      => $this->logo_name,
//             'logo_description' => $this->logo_description,
//             'first_name'     => $this->first_name,
//             'last_name'      => $this->last_name,
//             'email'          => $this->email,
//             'phone'          => $this->phone,
//             'sms_consent'    => $this->sms_consent,
//             'plan'           => $this->plan,
//             'addons'         => $this->addons,
//             'priority'       => $this->priority,
//             'total'          => $this->total,
//         ]);
//     }

//     public function checkout()
//     {
//         Stripe::setApiKey(config('services.stripe.secret'));

//         $session = StripeSession::create([
//             'payment_method_types' => ['card'],
//             'mode' => 'payment',

//             'line_items' => [[
//                 'price_data' => [
//                     'currency' => 'usd',
//                     'product_data' => [
//                         'name' => 'Trademark Registration – ' . ucfirst($this->plan),
//                         'description' => 'Trademark filing services',
//                     ],
//                     'unit_amount' => $this->total * 100, // cents
//                 ],
//                 'quantity' => 1,
//             ]],

//             'customer_email' => $this->email,

//             'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
//             'cancel_url'  => route('stripe.cancel'),

//             'metadata' => [
//                 'application_id' => $this->application->id,
//                 'user_id' => Auth::id(),
//             ],
//         ]);

//         return redirect($session->url);
//     }
// };
?>


<!-- @if($step === 1)
<div>
    <h2>What are you trying to protect?</h2>

    <button wire:click="$set('trademark_type','name')">
        <strong>Name</strong><br>
        Protects the words used to identify your brand
    </button>

    <button wire:click="$set('trademark_type','slogan')">
        <strong>Slogan</strong><br>
        Protects a phrase or tagline
    </button>

    <button wire:click="$set('trademark_type','logo')">
        <strong>Logo</strong><br>
        Protects your visual design
    </button>

    @error('trademark_type') <p>{{ $message }}</p> @enderror

    <button wire:click="next">Continue</button>
</div>
@endif

@if($step === 2)
<div>
    @if($trademark_type === 'logo')
    <h2>Enter the Logo you want to protect</h2>

    <input type="text"
        wire:model="logo_name"
        placeholder="Logo Name">

    <textarea wire:model="logo_description"
        placeholder="Describe your logo (e.g. A triangle formed by three black lines)">
        </textarea>
    @else
    <h2>Enter the {{ ucfirst($trademark_type) }} you want to protect</h2>

    <input type="text"
        wire:model="trademark_text"
        placeholder="Enter Name or Slogan">
    @endif

    <button wire:click="back">Back</button>
    <button wire:click="next">Continue</button>
</div>
@endif

@if($step === 3)
<div>
    <h2>Your Information</h2>

    <input type="text" wire:model="first_name" placeholder="First Name">
    <input type="text" wire:model="last_name" placeholder="Last Name">
    <input type="email" wire:model="email" placeholder="Email">
    <input type="text" wire:model="phone" placeholder="Phone Number">

    <label>
        <input type="checkbox" wire:model="sms_consent">
        I consent to receiving SMS & calls
    </label>

    <p>
        Trusted by over 250,000 businesses since 2016.
        File your Trademark with confidence.
    </p>

    <button wire:click="back">Back</button>
    <button wire:click="next">Continue</button>
</div>
@endif

@if($step === 4)
<div>
    <h2>Choose Your Plan</h2>

    <button wire:click="$set('plan','basic')">
        <strong>Basic</strong><br>
        $49
    </button>

    <button wire:click="$set('plan','standard')">
        <strong>Standard</strong><br>
        $299
    </button>

    <button wire:click="$set('plan','premium')">
        <strong>Premium</strong><br>
        $539
    </button>

    @error('plan') <p>{{ $message }}</p> @enderror

    <button wire:click="back">Back</button>
    <button wire:click="next">Continue</button>
</div>
@endif

@if($step === 5)
<div>
    <h2>Select Add-ons</h2>

    <label>
        <input type="checkbox" checked disabled>
        <strong>Attorney Filing Review</strong> (FREE – Required)
    </label>

    <label>
        <input type="checkbox" wire:model="addons" value="monitoring">
        Trademark Monitoring ($99)
    </label>

    <label>
        <input type="checkbox" wire:model="addons" value="cease_desist">
        Cease & Desist Letter ($149)
    </label>

    @error('addons') <p>{{ $message }}</p> @enderror

    <button wire:click="back">Back</button>
    <button wire:click="next">Continue</button>
</div>
@endif

@if($step === 6)
<div>
    <h2>Processing Time</h2>

    <label>
        <input type="radio" wire:model="priority" value="express">
        Express – 5 Days (Free)
    </label>

    <label>
        <input type="radio" wire:model="priority" value="priority">
        Priority – 48 Hours (+$100)
    </label>

    <button wire:click="back">Back</button>
    <button wire:click="next">Review</button>
</div>
@endif

@if($step === 7)
<div>
    <h2>Review Your Order</h2>

    <p><strong>Plan:</strong> {{ ucfirst($plan) }} – ${{ $plan_price }}</p>

    <p><strong>Add-ons:</strong></p>
    <ul>
        @forelse($addons as $a)
        <li>{{ ucfirst(str_replace('_',' ',$a)) }}</li>
        @empty
        <li>No add-ons selected</li>
        @endforelse
    </ul>

    <p><strong>Priority:</strong> {{ ucfirst($priority) }} – ${{ $priority_price }}</p>

    <hr>

    <h3>Total: ${{ $total }}</h3>

    <button wire:click="$set('step',4)">Edit</button>
    <button wire:click="checkout">
        Pay & Agree
    </button>

</div>
@endif -->

<div class="tm-wizard-wrapper">
    <h2>Trademark Wizard</h2>

    <p>Livewire is working 🎉</p>
</div>
