<?php

use App\Http\Controllers\Admin\AddonController;
use App\Http\Controllers\Admin\AdminApplicationController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\ClientFormController;
use App\Http\Controllers\ModalFormController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserApplicationController;
use App\Models\TrademarkApplication;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Website Routes
|--------------------------------------------------------------------------
*/

Route::get('/start-application/{plan}', function (string $plan) {
    abort_unless(array_key_exists($plan, config('packages')), 404);
    session(['selected_package' => $plan]);

    return redirect()->route(Auth::check() ? 'trademark.apply' : 'register');
})->name('application.start');

Route::get('/sitemap.xml', function () {
    $urls = array_keys(config('seo'));
    $xml = '<?xml version="1.0" encoding="UTF-8"?>'.'<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
    foreach ($urls as $path) {
        $url = rtrim(config('app.url'), '/').($path ? '/'.$path : '/');
        $xml .= '<url><loc>'.htmlspecialchars($url, ENT_XML1, 'UTF-8').'</loc></url>';
    }

    return response($xml.'</urlset>', 200, ['Content-Type' => 'application/xml; charset=UTF-8']);
})->name('sitemap');

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

Route::post('/client-form-submit', [ClientFormController::class, 'submitForm'])
    ->name('client.form.submit');

Route::get('/term-of-service', function () {
    return view('term-of-service');
})->name('term-of-service');

Route::post('/modal.form.submit', [ModalFormController::class, 'submit'])
    ->name('modal.form.submit')
    ->middleware('throttle:20,1');

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

    Route::get('/login', function () {
        return view('admin.auth.login');
    })->name('admin.login');

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

        Route::get('/dashboard', [AdminApplicationController::class, 'index'])
            ->name('dashboard');

        Route::get(
            '/user/{id}/applications',
            [AdminUserController::class, 'showApplications']
        )->name('user.applications');

        Route::get(
            '/applications/{application}',
            [AdminApplicationController::class, 'show']
        )->name('applications.show');

        Route::get(
            '/admin/user/{user}/applications/{application}',
            [AdminApplicationController::class, 'show']
        )->name('user.applications.show');

        Route::get(
            '/dashboard/profile',
            [ProfileController::class, 'edit']
        )->name('profile.edit');

        Route::patch(
            '/dashboard/profile',
            [ProfileController::class, 'update']
        )->name('profile.update');

        Route::delete(
            '/profile',
            [ProfileController::class, 'destroy']
        )->name('profile.destroy');

        Route::patch(
            '/application/{id}/update-status',
            [AdminUserController::class, 'updateProjectStatus']
        )->name('application.update-status');

        Route::resource('packages', PackageController::class);

        Route::resource('addons', AddonController::class);

        Route::get(
            '/dashboard/leads',
            [ModalFormController::class, 'index']
        )->name('leads.index');

        Route::get(
            '/client-applications',
            [ClientFormController::class, 'adminIndex']
        )->name('client.applications.index');

        Route::get(
            '/client-applications/{id}',
            [ClientFormController::class, 'adminShow']
        )->name('client.applications.show');
    });

/*
|--------------------------------------------------------------------------
| User Authenticated Routes
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'redirectIfAdmin',
    'form.submitted',
])->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        /** @var \App\Models\User $user */
        $user = Auth::user();

        if (! $user->hasVerifiedEmail()) {
            return redirect()->route('verify.code');
        }

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        $applications = TrademarkApplication::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $application = null;

        return view(
            'user.dashboard',
            compact('applications', 'application')
        );
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

    /*
    |--------------------------------------------------------------------------
    | Payment
    |--------------------------------------------------------------------------
    */

    Route::get('/payment/{application}/pay', [\App\Http\Controllers\PaymentController::class, 'pay'])->name('user.payment.pay');

    Route::get(
        '/checkout/{application}',
        function ($applicationId) {

            $application = \App\Models\TrademarkApplication::findOrFail(
                $applicationId
            );

            abort_unless((int) $application->user_id === (int) Auth::id(), 403);

            return view(
                'payment.checkout',
                compact('application')
            );
        }
    )->name('stripe.checkout');

    /*
    |--------------------------------------------------------------------------
    | Applications
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/my-applications',
        [UserApplicationController::class, 'index']
    )->name('user.applications');

    Route::get(
        '/my-applications/{id}',
        [UserApplicationController::class, 'show']
    )->name('user.applications.show');

    /*
    |--------------------------------------------------------------------------
    | OTP Verification
    |--------------------------------------------------------------------------
    */

    Route::get('/verify-code', function () {
        return view('auth.verify-code');
    })->name('verify.code');

    Route::post(
        '/verify-code',
        VerifyEmailController::class
    )->name('verify.code.submit');

    Route::get(
        '/resend-otp',
        [VerifyEmailController::class, 'resend']
    )->name('resend.otp');

    /*
    |--------------------------------------------------------------------------
    | Standard Laravel Email Verification
    |--------------------------------------------------------------------------
    */

    Route::get('/verify-email', function () {
        return view('auth.verify-email');
    })->name('verification.notice');

    // Route::get(
    //     '/verify-email/{id}/{hash}',
    //     function (EmailVerificationRequest $request) {
    //         $request->fulfill();

    //         return redirect('/dashboard');
    //     }
    // )
    //     ->middleware(['signed', 'throttle:6,1'])
    //     ->name('verification.verify');

    Route::get(
        '/verify-email/{id}/{hash}',
        function (EmailVerificationRequest $request) {
            $request->fulfill();

            return redirect(
                route('dashboard', absolute: false).'?verified=1'
            );
        }
    )
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    // Route::post(
    //     '/email/verification-notification',
    //     function (Request $request) {
    //         $request->user()->sendEmailVerificationNotification();

    //         return back()->with(
    //             'status',
    //             'verification-link-sent'
    //         );
    //     }
    // )
    //     ->middleware('throttle:6,1')
    //     ->name('verification.send');

    Route::post(
        '/email/verification-notification',
        [EmailVerificationNotificationController::class, 'store']
    )
        ->middleware('throttle:6,1')
        ->name('verification.send');
});

/*
|--------------------------------------------------------------------------
| Payment Success / Cancel
|--------------------------------------------------------------------------
*/

Route::get('/payment/success', [\App\Http\Controllers\PaymentController::class, 'success'])->middleware('auth')->name('stripe.success');

Route::get('/payment/cancel', function () {
    return view('payment.cancel');
})->name('stripe.cancel');

/*
|--------------------------------------------------------------------------
| Trademark Application
|--------------------------------------------------------------------------
*/

Route::middleware([
    'auth',
    'otp.verified',
])->group(function () {

    Route::get('/trademark/apply', function () {
        return view('trademark.apply');
    })->name('trademark.apply');
});

/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
