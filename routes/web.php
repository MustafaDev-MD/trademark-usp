<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ModalFormController;
use App\Http\Controllers\StripeWebhookController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\AddonController;
use App\Http\Controllers\UserApplicationController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\TrademarkApplication;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Http\Controllers\Admin\AdminApplicationController;
use App\Http\Controllers\Admin\AdminUserController;
use Stripe\Checkout\Session as StripeSession;
// use App\Http\Controllers\Auth\VerifyEmailCodeController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ClientFormController;

/*
|--------------------------------------------------------------------------
| Public Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/about-us', function () {
    return view('about-us');
})->name('about-us');

Route::get('/trademark-search', function () {
    return view('trademark-search');
})->name('trademark-search');

Route::get('/comprehensive-search', function () {
    return view('comprehensive-search');
})->name('comprehensive-search');

Route::get('/trademark-renewal', function () {
    return view('trademark-renewal');
})->name('trademark-renewal');

Route::get('/dmca-takedown-service', function () {
    return view('dmca-takedown-service');
})->name('dmca-takedown-service');

Route::get('/statement-of-use-extension', function () {
    return view('statement-of-use-extension');
})->name('statement-of-use-extension');

Route::get('/trademark-registration', function () {
    return view('trademark-registration');
})->name('trademark-registration');

Route::get('/trademark-monitoring', function () {
    return view('trademark-monitoring');
})->name('trademark-monitoring');

Route::get('/office-action', function () {
    return view('office-action');
})->name('office-action');

Route::get('/copyright-registration', function () {
    return view('copyright-registration');
})->name('copyright-registration');

Route::get('/statement-of-use', function () {
    return view('statement-of-use');
})->name('statement-of-use');

Route::get('/blogs', function () {
    return view('blog');
})->name('blog');

Route::get('/trademark-faqs', function () {
    return view('trademark-faqs');
})->name('trademark-faqs');

Route::get('/copyrights-faqs', function () {
    return view('copyrights-faqs');
})->name('copyrights-faqs');

Route::get('/careers', function () {
    return view('careers');
})->name('careers');

Route::get('/guarantee', function () {
    return view('guarantee');
})->name('guarantee');

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
})->name('privacy-policy');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/client-form', function () {
    return view('client-form');
})->name('client-form');

Route::post('/client-form-submit', [ClientFormController::class, 'submitForm'])->name('client.form.submit');

Route::get('/term-of-service', function () {
    return view('term-of-service');
})->name('term-of-service');

// Route::post('/modal.form.submit', [ModalFormController::class, 'submit'])->name('modal.form.submit');

Route::post('/modal.form.submit', [ModalFormController::class, 'submit'])
    ->name('modal.form.submit')
    ->middleware('throttle:20,1'); // 1 submission per 1 minute

Route::get('/thank-you', function () {
    return view('thank-you');
})->name('thank-you');

Route::get('/b-copyright', function () {
    return view('b-copyright');
})->name('b-copyright');

Route::get('/b-guides', function () {
    return view('b-guides');
})->name('b-guides');

Route::get('/b-trademark', function () {
    return view('b-trademark');
})->name('b-trademark');

Route::get('/blog-page', function () {
    return view('blog-page');
})->name('blog-page');

Route::get('/blog-page2', function () {
    return view('blog-page2');
})->name('blog-page2');

Route::get('/blog-page3', function () {
    return view('blog-page3');
})->name('blog-page3');

Route::get('/blog-page4', function () {
    return view('blog-page4');
})->name('blog-page4');

Route::get('/blog-page5', function () {
    return view('blog-page5');
})->name('blog-page5');

Route::get('/blog-page6', function () {
    return view('blog-page6');
})->name('blog-page6');

Route::get('/blog-page7', function () {
    return view('blog-page7');
})->name('blog-page7');

Route::get('/blog-page8', function () {
    return view('blog-page8');
})->name('blog-page8');

Route::get('/blog-page9', function () {
    return view('blog-page9');
})->name('blog-page9');

Route::get('/blog-page10', function () {
    return view('blog-page10');
})->name('blog-page10');

/*
|--------------------------------------------------------------------------
| Admin Authentication Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {

    // Admin Login Page
    Route::get('/login', function () {
        return view('admin.auth.login');
    })->name('admin.login');

    // Admin Login Submit
    Route::post('/login', [AdminAuthController::class, 'login'])
        ->name('admin.login.submit');
});

/*
|--------------------------------------------------------------------------
| Admin Dashboard Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Route::get('/dashboard', function () {
        //     return view('admin.dashboard');
        // })->name('dashboard');

        Route::get('/dashboard', [AdminApplicationController::class, 'index'])->name('dashboard');
        // Show single user with applications
        Route::get('/user/{id}/applications', [AdminUserController::class, 'showApplications'])->name('user.applications');

        Route::get('/applications/{application}', [AdminApplicationController::class, 'show'])
            ->name('applications.show');

        // routes/web.php
        Route::get(
            '/admin/user/{user}/applications/{application}',
            [AdminApplicationController::class, 'show']
        )->name('user.applications.show');

        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect()->route('admin.profile.edit');
        }

        Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/dashboard/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        // Update project status
        Route::patch('/application/{id}/update-status', [AdminUserController::class, 'updateProjectStatus'])->name('application.update-status');

        Route::resource('packages', PackageController::class);
        Route::resource('addons', AddonController::class);

        Route::get('/dashboard/leads', [ModalFormController::class, 'index'])
            ->name('leads.index');

        Route::get('/client-applications', [ClientFormController::class, 'adminIndex'])
            ->name('client.applications.index');

        Route::get('/client-applications/{id}', [ClientFormController::class, 'adminShow'])
            ->name('client.applications.show');
    });



/*
|--------------------------------------------------------------------------
| User Authenticated Routes
|--------------------------------------------------------------------------
*/

// Route::middleware(['auth', 'verified', 'redirectIfAdmin', 'form.submitted'])->group(function () {
Route::middleware(['auth', 'redirectIfAdmin', 'form.submitted'])->group(function () {

    // Route::get('/dashboard', function () {
    //     $user = Auth::user();

    //     // Admin users go to admin dashboard
    //     if ($user->role === 'admin') {
    //         return redirect()->route('admin.dashboard');
    //     }

    //     $applications = TrademarkApplication::where('user_id', Auth::id())
    //         ->orderBy('created_at', 'desc')
    //         ->paginate(10);

    //     $application = null; // <-- fix: define it
    //     return view('user.dashboard', compact('applications', 'application'));
    // })->name('dashboard');

    Route::get('/dashboard', function () {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (!$user->hasVerifiedEmail()) {
            return redirect()->route('verify.code');
        }

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $applications = TrademarkApplication::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $application = null;
        return view('user.dashboard', compact('applications', 'application'));
    })->name('dashboard');

    Route::get('/payment/{application}/pay', function (\App\Models\TrademarkApplication $application) {
        if ($application->user_id !== Auth::id()) {
            abort(403);
        }

        // $finalTotal = ($application->total ?? 0) - ($application->discount ?? 0);
        // $remaining = max($finalTotal - ($application->paid_amount ?? 0), 0);
        $remaining = max(($application->total ?? 0) - ($application->paid_amount ?? 0), 0);

        if ($remaining <= 0) {
            return redirect()->route('user.applications.show', $application->id)
                ->with('success', 'No payment required.');
        }

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        // $session = \Stripe\Checkout\Session::create([
        //     'payment_method_types' => ['card'],
        //     'line_items' => [[
        //         'price_data' => [
        //             'currency' => 'usd',
        //             'product_data' => [
        //                 'name' => 'Payment for Application #' . $application->id,
        //             ],
        //             'unit_amount' => intval($remaining * 100),
        //         ],
        //         'quantity' => 1,
        //     ]],
        //     'mode' => 'payment',
        //     'success_url' => route('user.applications.show', ['id' => $application->id, 'status' => 'success']),
        //     'cancel_url' => route('user.applications.show', ['id' => $application->id, 'status' => 'cancel']),
        //     'metadata' => [
        //         'application_id' => $application->id,
        //     ],
        // ]);



        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'mode' => 'payment',

            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'Trademark Registration – ' . ucfirst($application->plan),
                        'description' => 'Trademark filing services',
                    ],
                    'unit_amount' => intval($remaining * 100), // cents
                ],
                'quantity' => 1,
            ]],

            'customer_email' => $application->email,

            'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url'  => route('stripe.cancel'),

            'metadata' => [
                'application_id' => $application->id,
                'user_id' => Auth::id(),
            ],
        ]);

        return redirect($session->url);
    })->name('user.payment.pay');



    Route::get('/checkout/{application}', function ($applicationId) {
        $application = \App\Models\TrademarkApplication::findOrFail($applicationId);
        return view('payment.checkout', compact('application'));
    })->name('stripe.checkout');


    Route::get('/dashboard/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/dashboard/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/my-applications', [UserApplicationController::class, 'index'])
        ->name('user.applications');

    Route::get('/my-applications/{id}', [UserApplicationController::class, 'show'])
        ->name('user.applications.show');

    // Route::get('/verify-code', function () {
    //     return view('auth.verify-code');
    // })->name('verify.code');

    // Route::post('/verify-code', VerifyEmailController::class)
    // ->name('verify.code.submit');
    // OTP page
    Route::get('/verify-code', function () {
        return view('auth.verify-code');
    })->name('verify.code');

    // OTP submit
    Route::post('/verify-code', VerifyEmailController::class)
        ->name('verify.code.submit');

    // Resend OTP
    Route::get('/resend-otp', [VerifyEmailController::class, 'resend'])
        ->name('resend.otp');
});


Route::middleware('auth')->group(function () {

    // // OTP page
    // Route::get('/verify-code', function () {
    //     return view('auth.verify-code');
    // })->name('verify.code');

    // // OTP submit
    // Route::post('/verify-code', VerifyEmailController::class)
    //     ->name('verify.code.submit');

    // // Resend OTP
    // Route::get('/resend-otp', [VerifyEmailController::class, 'resend'])
    //     ->name('resend.otp');
});

Route::get('/payment/success', function () {
    return view('payment.success');
})->name('stripe.success');



Route::get('/payment/cancel', function () {
    return view('payment.cancel');
})->name('stripe.cancel');

// Route::post('/stripe/webhook', [StripeWebhookController::class, 'handle']);

// Route::post('/stripe/webhook', [StripeWebhookController::class, 'handle'])
//     ->name('stripe.webhook')
//     ->withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class]);

Route::middleware(['auth', 'otp.verified'])->group(function () {
    Route::get('/trademark/apply', function () {
        return view('trademark.apply');
    })->name('trademark.apply');
});

// Route::get('/trademark/apply', function () {
//         return view('trademark.apply');
//     })->name('trademark.apply');


require __DIR__ . '/auth.php';
