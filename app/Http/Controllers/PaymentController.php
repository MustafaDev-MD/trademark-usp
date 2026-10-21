<?php

namespace App\Http\Controllers;

use App\Models\TrademarkApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Checkout\Session;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function pay(Request $request, TrademarkApplication $application)
    {
        abort_unless((int) $application->user_id === (int) $request->user()->id, 403);
        $remaining = max(0, (int) round(((float) $application->total - (float) $application->paid_amount) * 100));
        if ($remaining === 0) {
            return redirect()->route('user.applications.show', $application->id)->with('success', 'No payment required.');
        }
        Stripe::setApiKey(config('services.stripe.secret'));
        $session = Session::create([
            'mode' => 'payment',
            'line_items' => [[
                'price_data' => ['currency' => 'usd', 'product_data' => ['name' => 'Trademark support - '.ucfirst($application->plan)], 'unit_amount' => $remaining],
                'quantity' => 1,
            ]],
            'customer_email' => $application->email,
            'client_reference_id' => (string) $application->id,
            'success_url' => route('stripe.success').'?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe.cancel'),
            'metadata' => ['application_id' => (string) $application->id, 'user_id' => (string) $request->user()->id],
        ], ['idempotency_key' => 'application-'.$application->id.'-'.$remaining.'-'.intdiv(time(), 1800)]);
        DB::table('payment_checkouts')->updateOrInsert(['session_id' => $session->id], [
            'trademark_application_id' => $application->id, 'amount_cents' => $remaining, 'currency' => 'usd',
            'created_at' => now(), 'updated_at' => now(),
        ]);

        return redirect()->away($session->url);
    }

    public function success(Request $request)
    {
        $checkout = DB::table('payment_checkouts')->where('session_id', $request->query('session_id'))->first();
        abort_unless($checkout, 404);
        $application = TrademarkApplication::findOrFail($checkout->trademark_application_id);
        abort_unless((int) $application->user_id === (int) $request->user()->id, 403);

        return view('payment.success', ['confirmed' => $checkout->paid_at !== null]);
    }
}
