<?php

// namespace App\Livewire;

// use Livewire\Component;
// use App\Models\TrademarkApplication;
// use Illuminate\Support\Facades\Auth;
// use Stripe\Stripe;
// use Stripe\Checkout\Session as StripeSession;
// use App\Models\User;

// class TrademarkWizard extends Component
// {
//     public function render()
//     {
//         return view('livewire.trademark-wizard');
//     }

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
    // public $sms_consent = false;

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
//     public $plans = [
//         'basic' => 59,
//         'standard' => 299,
//         'premium' => 539,
//     ];

//     public $addonList = [
//         'basic' => 0,
//         'standard'    => 99,
//         'premium'  => 149,
//     ];

//     public $priorities = [
//         'standard'    => 0,   // Standard – 3 weeks
//         'express'  => 50,  // Express – 5 days
//         'priority'   => 100, // Priority – 48 hours
//     ];

//     // MOUNT
//     // public function mount()
//     // {
//     //     if (!Auth::check()) abort(403);

//     //     $this->application = TrademarkApplication::firstOrCreate(
//     //         ['user_id' => Auth::id(), 'status' => 'draft'],
//     //         ['current_step' => 1]
//     //     );

//     //     $this->step  = $this->application->current_step;
//     //     $this->email = Auth::user()->email;

//     //     // FREE addon auto-select
//     //     if (empty($this->addons)) {
//     //         $this->addons = ['basic'];
//     //     }
//     // }

//     public function mount()
//     {
//         if (!Auth::check()) abort(403);

//         // $this->application = TrademarkApplication::firstOrCreate(
//         //     ['user_id' => Auth::id(), 'status' => 'draft'],
//         //     ['current_step' => 1]
//         // );

//         // $this->application = TrademarkApplication::where('user_id', Auth::id())
//         //     ->latest('created_at')
//         //     ->first();

//         $this->application = TrademarkApplication::where('user_id', Auth::id())
//             ->where('status', 'draft')
//             ->latest()
//             ->first();


//         // If no application exists, create a draft
//         if (!$this->application) {
//             $this->application = TrademarkApplication::create([
//                 'user_id' => Auth::id(),
//                 'current_step' => 1,
//                 'status' => 'draft',
//             ]);
//         }

//         // STEP
//         $this->step = $this->application->current_step ?? 1;

//         // LOAD DATA FROM DB
//         $this->first_name = $this->application->first_name ?? Auth::user()->first_name;
//         $this->last_name  = $this->application->last_name ?? Auth::user()->last_name;
//         $this->logo_name        = $this->application->logo_name;
//         $this->logo_description = $this->application->logo_description;

//         $this->first_name  = $this->application->first_name;
//         $this->last_name   = $this->application->last_name;
//         $this->email       = $this->application->email ?? Auth::user()->email;
//         $this->phone       = $this->application->phone;
//         $this->sms_consent = (bool) $this->application->sms_consent;

//         $this->plan     = $this->application->plan;
//         $this->addons = is_array($this->application->addons)
//             ? $this->application->addons
//             : [];

//         $this->priority = $this->application->priority;

//         $this->discount  = $this->application->discount ?? 0;
//         $this->promoCode = $this->application->promo_code ?? null;

//         //  VERY IMPORTANT
//         $this->calculateTotal();
//     }

//     public function selectAddon($addon)
//     {
//         // only ONE addon allowed
//         $this->addons = [$addon];

//         $this->calculateTotal();
//         $this->saveData();
//     }


//     public function selectPlanAndContinue($plan)
//     {
//         $this->plan = $plan;

//         // plan select validation
//         $this->validate([
//             'plan' => 'required|in:basic,standard,premium',
//         ]);

//         $this->calculateTotal();
//         $this->saveData();

//         // move to next step
//         $this->next();
//         // $this->step++;
//         // $this->application->update(['current_step' => $this->step]);
//     }

//     public function selectAddonAndContinue($addon)
//     {
//         $this->addons = [$addon];

//         // plan select validation
//         $this->validate([
//             'addons.' => 'in:basic,standard,premium',
//         ]);

//         $this->calculateTotal();
//         $this->saveData();

//         $this->next();
//     }

//     public function selectPriorityAndContinue($priority)
//     {
//         $this->priority = $priority;

//         $this->validate([
//             'priority' => 'required|in:standard,express,priority',
//         ]);

//         $this->calculateTotal();
//         $this->saveData();

//         $this->next();
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
//                 'first_name'   => 'required|string|min:2',
//                 'last_name'    => 'required|string|min:2',
//                 'email'        => 'required|email',
//                 'phone'        => 'required',
//                 'sms_consent'  => 'accepted',
//             ]);
//         }

//         if ($this->step === 4) {
//             $this->validate(['plan' => 'required']);
//         }

//         if ($this->step === 5) {
//             $this->validate([
//                 'addons' => 'required|array',

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

//         $subtotal = $this->plan_price + $this->addons_price + $this->priority_price;

//         // APPLY DISCOUNT
//         $this->total = max($subtotal - $this->discount, 0);
//     }


//     // SAVE
//     // protected function saveData()
//     // {
//     //     $this->application->update([
//     //         'trademark_type' => $this->trademark_type,
//     //         'trademark_text' => $this->trademark_text,
//     //         'logo_name'      => $this->logo_name,
//     //         'logo_description' => $this->logo_description,
//     //         'first_name'     => $this->first_name,
//     //         'last_name'      => $this->last_name,
//     //         'email'          => $this->email,
//     //         'phone'          => $this->phone,
//     //         'sms_consent'    => $this->sms_consent,
//     //         'plan'           => $this->plan,
//     //         'addons'         => $this->addons,
//     //         'priority'       => $this->priority,
//     //         'total'          => $this->total,
//     //     ]);
//     // }

//     protected function saveData()
//     {
//         $subtotal = ($this->plan_price ?? 0) + ($this->addons_price ?? 0) + ($this->priority_price ?? 0);

//         $data = array_filter([
//             'trademark_type' => $this->trademark_type,
//             'trademark_text' => $this->trademark_text,
//             'logo_name' => $this->logo_name,
//             'logo_description' => $this->logo_description,
//             'first_name' => $this->first_name,
//             'last_name' => $this->last_name,
//             'email' => $this->email,
//             'phone' => $this->phone,
//             'sms_consent' => $this->sms_consent,
//             'plan' => $this->plan,
//             'addons' => $this->addons,
//             'priority' => $this->priority,
//             'plan_price' => $this->plan_price,
//             'addons_price' => $this->addons_price,
//             'priority_price' => $this->priority_price,
//             'subtotal' => $subtotal,
//             'discount' => $this->discount,
//             'total' => $this->total,
//             'promo_code' => $this->promoCode,
//         ], fn($v) => $v !== null);

//         $this->application->update($data);

//         // ALSO update user's profile
//         $user = Auth::user();
//         if ($user instanceof User) {
//             $user->update([
//                 'first_name' => $this->first_name,
//                 'last_name'  => $this->last_name,
//             ]);
//             // 🔥 Update ALL other trademark applications for this user
//             TrademarkApplication::where('user_id', $user->id)
//                 ->update([
//                     'first_name' => $this->first_name,
//                     'last_name'  => $this->last_name,
//                 ]);
//         }
//     }


//     // public function checkout()
//     // {

//     //     // STEP 1: RE-CALCULATE (safe side)
//     //     $this->calculateTotal();

//     //     // STEP 2: ZERO PAYMENT CASE
//     //     if ($this->total <= 0) {

//     //         $this->application->update([
//     //             'paid_amount'    => 0,
//     //             'payment_status' => 'paid',
//     //             'status'         => 'approved',
//     //             'project_status' => 'in_progress',
//     //             'paid_at'        => now(),
//     //         ]);

//     //         // Optional: move wizard to completed step
//     //         $this->step = 7;
//     //         $this->application->update([
//     //             'current_step' => 7,
//     //         ]);

//     //         session()->flash('success', 'Payment completed successfully (100% discount).');

//     //         return redirect()->route('user.applications.show', $this->application->id);
//     //     }

//     //     Stripe::setApiKey(config('services.stripe.secret'));

//     //     $total = $this->application->total ?? 0;        // already includes discount
//     //     $remaining = max($total - ($this->application->paid_amount ?? 0), 0);

//     //     $session = StripeSession::create([
//     //         'payment_method_types' => ['card'],
//     //         'mode' => 'payment',

//     //         'line_items' => [[
//     //             'price_data' => [
//     //                 'currency' => 'usd',
//     //                 'product_data' => [
//     //                     'name' => 'Trademark Registration – ' . ucfirst($this->plan),
//     //                     'description' => 'Trademark filing services',
//     //                 ],
//     //                 'unit_amount' => intval($remaining * 100), // cents
//     //             ],
//     //             'quantity' => 1,
//     //         ]],

//     //         'customer_email' => $this->email,

//     //         'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
//     //         'cancel_url'  => route('stripe.cancel'),

//     //         'metadata' => [
//     //             'application_id' => $this->application->id,
//     //             'user_id' => Auth::id(),
//     //         ],
//     //     ]);

//     //     return redirect($session->url);
//     // }
    
//     public function checkout()
//     {
//         $this->calculateTotal();
    
//         // Application update
//         $this->application->update([
//             'payment_status' => 'pending',
//             'status'         => 'submitted',
//             'project_status' => 'pending',
//             'submitted_at'   => now(),
//         ]);
    
//         // USER KO UPDATE KAREIN (Taki middleware ko pata chale ke form bhar diya gaya hai)
//         $user = Auth::user();
//         $user->update([
//             'is_applied' => true, // Ensure karein ke users table mein ye column ho
//         ]);
    
//         session()->flash('success', 'Your application has been successfully submitted.');
    
//         return redirect()->route('dashboard');
//     }

//     // MODALS
//     public $showPlanModal = false;
//     public $showAddonModal = false;
//     public $showPriorityModal = false;

//     public $tempPlan;
//     public $tempAddon;
//     public $tempPriority;

//     public function openPlanModal()
//     {
//         $this->tempPlan = $this->plan;
//         $this->showPlanModal = true;
//     }

//     public function updatePlan()
//     {
//         if (!$this->tempPlan) return;

//         $this->plan = $this->tempPlan;

//         $this->calculateTotal();
//         $this->saveData();

//         $this->closeModal();
//     }

//     public function updateAddon()
//     {
//         if (!$this->tempAddon) return;

//         $this->addons = [$this->tempAddon];

//         $this->calculateTotal();
//         $this->saveData();

//         $this->closeModal();
//     }

//     public function updatePriority()
//     {
//         if (!$this->tempPriority) return;

//         $this->priority = $this->tempPriority;

//         $this->calculateTotal();
//         $this->saveData();

//         $this->closeModal();
//     }

//     // public function closeModal()
//     // {
//     //     $this->showPlanModal = false;
//     //     $this->showAddonModal = false;
//     //     $this->showPriorityModal = false;
//     // }



//     public function openModal($type)
//     {
//         $this->resetModals();

//         if ($type === 'plan') {
//             $this->tempPlan = $this->plan; // ✅ IMPORTANT
//             $this->showPlanModal = true;
//         }

//         if ($type === 'addon') {
//             $this->tempAddon = $this->addons[0] ?? 'basic'; // ✅ IMPORTANT
//             $this->showAddonModal = true;
//         }

//         if ($type === 'priority') {
//             $this->tempPriority = $this->priority ?? 'standard'; // ✅ IMPORTANT
//             $this->showPriorityModal = true;
//         }
//     }


//     public function closeModal()
//     {
//         $this->resetModals();
//     }

//     private function resetModals()
//     {
//         $this->showPlanModal = false;
//         $this->showAddonModal = false;
//         $this->showPriorityModal = false;
//     }

//     public $promoCode;
//     public $discount = 0;

//     public $promoMessage = null;
//     public $promoSuccess = false;

//     public function applyPromo()
//     {
//         $this->promoMessage = null;
//         $this->promoSuccess = false;

//         // Example promo codes
//         $codes = [
//             'SAVE50' => 50,
//             'SAVE100' => 100,
//             'SAVE788' => 788,
//         ];

//         $code = strtoupper(trim($this->promoCode));

//         if (array_key_exists($code, $codes)) {
//             $this->discount = $codes[$code];
//             $this->promoMessage = 'Promo code applied successfully 🎉';
//             $this->promoSuccess = true;
//         } else {
//             $this->discount = 0;
//             $this->promoMessage = 'Invalid promo code ❌';
//             $this->promoSuccess = false;
//         }

//         $this->calculateTotal();
//         $this->saveData();
//     }
// }



namespace App\Livewire;

use Livewire\Component;
use App\Models\TrademarkApplication;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Models\User;

class TrademarkWizard extends Component
{
    public function render()
    {
        return view('livewire.trademark-wizard');
    }

    // BASIC
    public $application;
    public $step = 1;

    // STEP 1–2
    public $trademark_type;
    public $trademark_text;
    public $logo_name;
    public $logo_description;

    // STEP 3
    // public $first_name;
    // public $last_name;
    // public $email;
    // public $phone;
    public $sms_consent = false;

    // STEP 4 – PLAN
    public $plan;
    public $plan_price = 0;

    // STEP 5 – ADDONS
    public $addons = [];
    public $addons_price = 0;

    // STEP 6 – PRIORITY
    public $priority;
    public $priority_price = 0;

    // TOTAL
    public $total = 0;

    // CONFIG
    public $plans = [
        'basic' => 59,
        'standard' => 299,
        'premium' => 539,
    ];

    public $addonList = [
        'basic' => 0,
        'standard'    => 99,
        'premium'  => 149,
    ];

    public $priorities = [
        'standard'    => 0,   // Standard – 3 weeks
        'express'  => 50,  // Express – 5 days
        'priority'   => 100, // Priority – 48 hours
    ];

    // MOUNT
    // public function mount()
    // {
    //     if (!Auth::check()) abort(403);

    //     $this->application = TrademarkApplication::firstOrCreate(
    //         ['user_id' => Auth::id(), 'status' => 'draft'],
    //         ['current_step' => 1]
    //     );

    //     $this->step  = $this->application->current_step;
    //     $this->email = Auth::user()->email;

    //     // FREE addon auto-select
    //     if (empty($this->addons)) {
    //         $this->addons = ['basic'];
    //     }
    // }

    // public function mount()
    // {
    //     if (!Auth::check()) abort(403);

    //     // $this->application = TrademarkApplication::firstOrCreate(
    //     //     ['user_id' => Auth::id(), 'status' => 'draft'],
    //     //     ['current_step' => 1]
    //     // );

    //     // $this->application = TrademarkApplication::where('user_id', Auth::id())
    //     //     ->latest('created_at')
    //     //     ->first();

    //     $this->application = TrademarkApplication::where('user_id', Auth::id())
    //         ->where('status', 'draft')
    //         ->latest()
    //         ->first();

    //     // If no application exists, create a draft
    //     if (!$this->application) {
    //         $this->application = TrademarkApplication::create([
    //             'user_id' => Auth::id(),
    //             'current_step' => 1,
    //             'status' => 'draft',
    //         ]);
    //     }

    //     // STEP
    //     $this->step = $this->application->current_step ?? 1;

    //     // LOAD DATA FROM DB
    //     $this->first_name = $this->application->first_name ?? Auth::user()->first_name;
    //     $this->last_name  = $this->application->last_name ?? Auth::user()->last_name;
    //     $this->logo_name        = $this->application->logo_name;
    //     $this->logo_description = $this->application->logo_description;

    //     $this->first_name  = $this->application->first_name;
    //     $this->last_name   = $this->application->last_name;
    //     $this->email       = $this->application->email ?? Auth::user()->email;
    //     $this->phone       = $this->application->phone;
    //     $this->sms_consent = (bool) $this->application->sms_consent;

    //     $this->plan     = $this->application->plan;
    //     $this->addons = is_array($this->application->addons)
    //         ? $this->application->addons
    //         : [];

    //     $this->priority = $this->application->priority;

    //     $this->discount  = $this->application->discount ?? 0;
    //     $this->promoCode = $this->application->promo_code ?? null;

    //     //  VERY IMPORTANT
    //     $this->calculateTotal();
    // }

    public function mount()
    {
        if (!Auth::check()) abort(403);

        // Get draft application
        $this->application = TrademarkApplication::where('user_id', Auth::id())
            ->where('status', 'draft')
            ->latest()
            ->first();

        if (!$this->application) {
            $this->application = TrademarkApplication::create([
                'user_id' => Auth::id(),
                'current_step' => 1,
                'status' => 'draft',
            ]);
        }
    
        $user = Auth::user();

        // STEP
        $this->step = $this->application->current_step ?? 1;

        // PERSONAL INFO (Application > User fallback)
        // $this->first_name  = $this->application->first_name ?? $user->first_name;
        // $this->last_name   = $this->application->last_name ?? $user->last_name;
        // $this->email       = $this->application->email ?? $user->email;
        // $this->phone       = $this->application->phone ?? $user->phone;
        $this->sms_consent = (bool) ($this->application->sms_consent ?? false);

        // OTHER DATA
        $this->trademark_type = $this->application->trademark_type;
        $this->trademark_text = $this->application->trademark_text;
        $this->logo_name = $this->application->logo_name;
        $this->logo_description = $this->application->logo_description;

        $this->plan = $this->application->plan;
        $this->addons = is_array($this->application->addons) ? $this->application->addons : [];
        $this->priority = $this->application->priority;

        $this->discount = $this->application->discount ?? 0;
        $this->promoCode = $this->application->promo_code;

        $this->calculateTotal();
    }

    public function selectAddon($addon)
    {
        // only ONE addon allowed
        $this->addons = [$addon];
        $this->calculateTotal();
        $this->saveData();
    }

    public function selectPlanAndContinue($plan)
    {
        $this->plan = $plan;
        
        // plan select validation
        $this->validate([
            'plan' => 'required|in:basic,standard,premium',
        ]);

        $this->calculateTotal();
        $this->saveData();

        // move to next step
        $this->next();
        // $this->step++;
        // $this->application->update(['current_step' => $this->step]);
    }

    public function selectAddonAndContinue($addon)
    {
        $this->addons = [$addon];
        
        // plan select validation
        $this->validate([
            'addons.' => 'in:basic,standard,premium',
        ]);

        $this->calculateTotal();
        $this->saveData();

        $this->next();
    }

    public function selectPriorityAndContinue($priority)
    {
        $this->priority = $priority;

        $this->validate([
            'priority' => 'required|in:standard,express,priority',
        ]);

        $this->calculateTotal();
        $this->saveData();

        $this->next();
    }

    // AUTO RECALCULATE
    public function updated($property)
    {
        if (in_array($property, ['plan', 'addons', 'priority'])) {
            $this->calculateTotal();
        }
    }

    // NEXT
    // public function next()
    // {
    //     if ($this->step === 1) {
    //         $this->validate(['trademark_type' => 'required']);
    //     }

    //     if ($this->step === 2) {
    //         $this->trademark_type === 'logo'
    //             ? $this->validate(['logo_name' => 'required', 'logo_description' => 'required'])
    //             : $this->validate(['trademark_text' => 'required']);
    //     }

    //     if ($this->step === 3) {
    //         $this->validate([
    //             'first_name'  => 'required|string|min:2',
    //             'last_name'   => 'required|string|min:2',
    //             'email'       => 'required|email',
    //             'phone'       => 'required|numeric|digits_between:10,15',
    //             'sms_consent' => 'accepted',
    //         ]);
    //     }

    //     if ($this->step === 4) {
    //         $this->validate(['plan' => 'required']);
    //     }

    //     if ($this->step === 5) {
    //         $this->validate([
    //             'addons' => 'required|array',
    //         ]);
    //     }

    //     if ($this->step === 6) {
    //         $this->validate(['priority' => 'required']);
    //         $this->calculateTotal();
    //     }

    //     $this->saveData();

    //     $this->step = min($this->step + 1, 7);
    //     $this->application->update(['current_step' => $this->step]);
    // }
    
    // public function next()
    // {
    //     if ($this->step === 1) {
    //         $this->validate(['trademark_type' => 'required']);
    //     }
    
    //     if ($this->step === 2) {
    //         if ($this->trademark_type === 'logo') {
    //             $this->validate([
    //                 'logo_name' => 'required|string',
    //                 'logo_description' => 'required|string',
    //             ]);
    //         } else {
    //             $this->validate([
    //                 'trademark_text' => 'required|string',
    //             ]);
    //         }
    //     }
    
    //     // STEP 3 SKIP
    
    //     if ($this->step === 4) {
    //         $this->validate(['plan' => 'required']);
    //     }
    
    //     if ($this->step === 5) {
    //         $this->validate(['addons' => 'required|array']);
    //     }
    
    //     if ($this->step === 6) {
    //         $this->validate(['priority' => 'required']);
    //         $this->calculateTotal();
    //     }
    
    //     $this->saveData();
    
    //     // Skip Step 3: if current step is 2, go to 4
    //     if ($this->step === 2) {
    //         $this->step = 4;
    //     } else {
    //         $this->step = min($this->step + 1, 7);
    //     }
    
    //     $this->application->update(['current_step' => $this->step]);
    // }
    
    
    public function next()
    {
        if ($this->step === 1) {
            $this->validate(['trademark_type' => 'required']);
        }
    
        if ($this->step === 2) {
            if ($this->trademark_type === 'logo') {
                $this->validate([
                    'logo_name' => 'required|string',
                    'logo_description' => 'required|string',
                ]);
            } else {
                $this->validate([
                    'trademark_text' => 'required|string',
                ]);
            }
        }
    
        // STEP 3 SKIP
    
        if ($this->step === 4) {
            $this->validate(['plan' => 'required']);
        }
    
        if ($this->step === 5) {
            $this->validate(['addons' => 'required|array']);
        }
    
        if ($this->step === 6) {
            $this->validate(['priority' => 'required']);
            $this->calculateTotal();
        }
    
        // SMS Consent required on final step (Step 7)
        if ($this->step === 7) {
            $this->validate([
                'sms_consent' => 'accepted',
            ]);
        }
    
        $this->saveData();
    
        if ($this->step === 2) {
            $this->step = 4; // skip step 3
        } else {
            $this->step = min($this->step + 1, 7);
        }
    
        $this->application->update(['current_step' => $this->step]);
    }

    // BACK
    // public function back()
    // {
    //     if ($this->step > 1) {
    //         $this->step--;
    //         $this->application->update(['current_step' => $this->step]);
    //     }
    // }
    
    public function back()
    {
        if ($this->step > 1) {
    
            // Agar current step 4 hai, aur step 3 skip kiya hai, directly 2 par jao
            if ($this->step === 4) {
                $this->step = 2;
            } else {
                $this->step--;
            }
    
            $this->application->update(['current_step' => $this->step]);
        }
    }

    // TOTAL
    protected function calculateTotal()
    {
        $this->plan_price = $this->plans[$this->plan] ?? 0;

        $this->addons_price = collect($this->addons)
            ->sum(fn($a) => $this->addonList[$a] ?? 0);

        $this->priority_price = $this->priorities[$this->priority] ?? 0;

        $subtotal = $this->plan_price + $this->addons_price + $this->priority_price;

        // APPLY DISCOUNT
        $this->total = max($subtotal - $this->discount, 0);
    }

    // SAVE

    // protected function saveData()
    // {
    //     $this->application->update([
    //         'trademark_type' => $this->trademark_type,
    //         'trademark_text' => $this->trademark_text,
    //         'logo_name'      => $this->logo_name,
    //         'logo_description' => $this->logo_description,
    //         'first_name'     => $this->first_name,
    //         'last_name'      => $this->last_name,
    //         'email'          => $this->email,
    //         'phone'          => $this->phone,
    //         'sms_consent'    => $this->sms_consent,
    //         'plan'           => $this->plan,
    //         'addons'         => $this->addons,
    //         'priority'       => $this->priority,
    //         'total'          => $this->total,
    //     ]);
    // }

    // protected function saveData()
    // {
    //     $subtotal = ($this->plan_price ?? 0) + ($this->addons_price ?? 0) + ($this->priority_price ?? 0);

    //     $data = array_filter([
    //         'trademark_type' => $this->trademark_type,
    //         'trademark_text' => $this->trademark_text,
    //         'logo_name' => $this->logo_name,
    //         'logo_description' => $this->logo_description,
    //         'first_name' => $this->first_name,
    //         'last_name' => $this->last_name,
    //         'email' => $this->email,
    //         'phone' => $this->phone,
    //         'sms_consent' => $this->sms_consent,
    //         'plan' => $this->plan,
    //         'addons' => $this->addons,
    //         'priority' => $this->priority,
    //         'plan_price' => $this->plan_price,
    //         'addons_price' => $this->addons_price,
    //         'priority_price' => $this->priority_price,
    //         'subtotal' => $subtotal,
    //         'discount' => $this->discount,
    //         'total' => $this->total,
    //         'promo_code' => $this->promoCode,
    //     ], fn($v) => $v !== null);

    //     $this->application->update($data);
    
    //     // ALSO update user's profile
    //     $user = Auth::user();
    //     if ($user instanceof User) {
    //         $user->update([
    //             'first_name' => $this->first_name,
    //             'last_name'  => $this->last_name,
    //         ]);
    //         //  Update ALL other trademark applications for this user
    //         TrademarkApplication::where('user_id', $user->id)
    //             ->update([
    //                 'first_name' => $this->first_name,
    //                 'last_name'  => $this->last_name,
    //             ]);
    //     }
    // }

    protected function saveData()
    {
        $subtotal = ($this->plan_price ?? 0)
                  + ($this->addons_price ?? 0)
                  + ($this->priority_price ?? 0);

        // Save application
        $this->application->update([
            'trademark_type' => $this->trademark_type,
            'trademark_text' => $this->trademark_text,
            'logo_name' => $this->logo_name,
            'logo_description' => $this->logo_description,
    
            // 'first_name' => $this->first_name,
            // 'last_name'  => $this->last_name,
            // 'email'      => $this->email,
            // 'phone'      => $this->phone,
            'sms_consent'=> $this->sms_consent,
    
            'plan' => $this->plan,
            'addons' => $this->addons,
            'priority' => $this->priority,

            'plan_price' => $this->plan_price,
            'addons_price' => $this->addons_price,
            'priority_price' => $this->priority_price,
            'subtotal' => $subtotal,
            'discount' => $this->discount,
            'total' => $this->total,
            'promo_code' => $this->promoCode,
        ]);

        //  UPDATE USER PROFILE
        
        $user = Auth::user();

        // $user->update([
        //     'first_name' => $this->first_name,
        //     'last_name'  => $this->last_name,
        //     'email'      => $this->email,
        //     'phone'      => $this->phone,
        // ]);

        // SYNC ALL DRAFT APPLICATIONS
        // TrademarkApplication::where('user_id', $user->id)
        //     ->where('status', 'draft')
        //     ->update([
        //         'first_name' => $this->first_name,
        //         'last_name'  => $this->last_name,
        //         'email'      => $this->email,
        //         'phone'      => $this->phone,
        //     ]);
    }

    // public function checkout()
    // {

    //     // STEP 1: RE-CALCULATE (safe side)
    //     $this->calculateTotal();

    //     // STEP 2: ZERO PAYMENT CASE
    //     if ($this->total <= 0) {

    //         $this->application->update([
    //             'paid_amount'    => 0,
    //             'payment_status' => 'paid',
    //             'status'         => 'approved',
    //             'project_status' => 'in_progress',
    //             'paid_at'        => now(),
    //         ]);

    //         // Optional: move wizard to completed step
    //         $this->step = 7;
    //         $this->application->update([
    //             'current_step' => 7,
    //         ]);

    //         session()->flash('success', 'Payment completed successfully (100% discount).');

    //         return redirect()->route('user.applications.show', $this->application->id);
    //     }

    //     Stripe::setApiKey(config('services.stripe.secret'));

    //     $total = $this->application->total ?? 0;        // already includes discount
    //     $remaining = max($total - ($this->application->paid_amount ?? 0), 0);

    //     $session = StripeSession::create([
    //         'payment_method_types' => ['card'],
    //         'mode' => 'payment',

    //         'line_items' => [[
    //             'price_data' => [
    //                 'currency' => 'usd',
    //                 'product_data' => [
    //                     'name' => 'Trademark Registration – ' . ucfirst($this->plan),
    //                     'description' => 'Trademark filing services',
    //                 ],
    //                 'unit_amount' => intval($remaining * 100), // cents
    //             ],
    //             'quantity' => 1,
    //         ]],

    //         'customer_email' => $this->email,

    //         'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
    //         'cancel_url'  => route('stripe.cancel'),

    //         'metadata' => [
    //             'application_id' => $this->application->id,
    //             'user_id' => Auth::id(),
    //         ],
    //     ]);

    //     return redirect($session->url);
    // }

    public function checkout()
    {
        $this->validate([
            'sms_consent' => 'accepted',
        ]);
        
        $this->calculateTotal();

        $this->application->update([
            'payment_status' => 'pending',
            'status' => 'submitted',
            'project_status' => 'pending',
            'submitted_at' => now(),
        ]);
        
         // USER KO UPDATE KAREIN (Taki middleware ko pata chale ke form bhar diya gaya hai)
        $user = Auth::user();
        $user->update([
            'is_applied' => true, // Ensure karein ke users table mein ye column ho
        ]);

        session()->flash(
            'success',
            'Your application has been successfully submitted. Our agent will contact you soon.'
        );

        return redirect()->route('dashboard');
    }

    // MODALS
    public $showPlanModal = false;
    public $showAddonModal = false;
    public $showPriorityModal = false;

    public $tempPlan;
    public $tempAddon;
    public $tempPriority;

    public function openPlanModal()
    {
        $this->tempPlan = $this->plan;
        $this->showPlanModal = true;
    }

    public function updatePlan()
    {
        if (!$this->tempPlan) return;

        $this->plan = $this->tempPlan;

        $this->calculateTotal();
        $this->saveData();

        $this->closeModal();
    }

    public function updateAddon()
    {
        if (!$this->tempAddon) return;

        $this->addons = [$this->tempAddon];

        $this->calculateTotal();
        $this->saveData();

        $this->closeModal();
    }

    public function updatePriority()
    {
        if (!$this->tempPriority) return;

        $this->priority = $this->tempPriority;

        $this->calculateTotal();
        $this->saveData();

        $this->closeModal();
    }

    // public function closeModal()
    // {
    //     $this->showPlanModal = false;
    //     $this->showAddonModal = false;
    //     $this->showPriorityModal = false;
    // }

    public function openModal($type)
    {
        $this->resetModals();

        if ($type === 'plan') {
            $this->tempPlan = $this->plan; // IMPORTANT
            $this->showPlanModal = true;
        }

        if ($type === 'addon') {
            $this->tempAddon = $this->addons[0] ?? 'basic'; // IMPORTANT
            $this->showAddonModal = true;
        }

        if ($type === 'priority') {
            $this->tempPriority = $this->priority ?? 'standard'; // ✅ IMPORTANT
            $this->showPriorityModal = true;
        }
    }

    public function closeModal()
    {
        $this->resetModals();
    }

    private function resetModals()
    {
        $this->showPlanModal = false;
        $this->showAddonModal = false;
        $this->showPriorityModal = false;
    }

    public $promoCode;
    public $discount = 0;

    public $promoMessage = null;
    public $promoSuccess = false;

    public function applyPromo()
    {
        $this->promoMessage = null;
        $this->promoSuccess = false;

        // Example promo codes

        $codes = [
            'SAVE50' => 50,
            'SAVE100' => 100,
            'SAVE788' => 788,
        ];

        $code = strtoupper(trim($this->promoCode));

        if (array_key_exists($code, $codes)) {
            $this->discount = $codes[$code];
            $this->promoMessage = 'Promo code applied successfully 🎉';
            $this->promoSuccess = true;
        } else {
            $this->discount = 0;
            $this->promoMessage = 'Invalid promo code ❌';
            $this->promoSuccess = false;
        }

        $this->calculateTotal();
        $this->saveData();
    }
}