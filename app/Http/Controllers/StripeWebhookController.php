<?php

namespace App\Http\Controllers;

use App\Models\TrademarkApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function handle(Request $request)
    {
        $secret = config('services.stripe.webhook_secret');
        if (! $secret) {
            return response()->json(['error' => 'Webhook unavailable'], 503);
        }
        try {
            $event = Webhook::constructEvent($request->getContent(), $request->header('Stripe-Signature', ''), $secret);
        } catch (\UnexpectedValueException|\Stripe\Exception\SignatureVerificationException $exception) {
            return response()->json(['error' => 'Invalid webhook signature or payload'], 400);
        }
        if (! in_array($event->type, ['checkout.session.completed', 'checkout.session.async_payment_succeeded'], true)) {
            return response()->json(['status' => 'ignored']);
        }
        $session = $event->data->object;
        if ($session->payment_status !== 'paid' || $session->mode !== 'payment') {
            return response()->json(['status' => 'pending']);
        }

        return DB::transaction(function () use ($session) {
            $checkout = DB::table('payment_checkouts')->where('session_id', $session->id)->lockForUpdate()->first();
            if (! $checkout) {
                return response()->json(['error' => 'Unknown checkout'], 422);
            }
            if ($checkout->paid_at) {
                return response()->json(['status' => 'already_processed']);
            }
            $application = TrademarkApplication::whereKey($checkout->trademark_application_id)->lockForUpdate()->firstOrFail();
            if ((int) ($session->metadata->application_id ?? 0) !== (int) $application->id
                || (int) ($session->metadata->user_id ?? 0) !== (int) $application->user_id
                || (int) $session->amount_total !== (int) $checkout->amount_cents
                || $session->currency !== $checkout->currency) {
                return response()->json(['error' => 'Checkout details do not match'], 422);
            }
            $paid = (int) round((float) $application->paid_amount * 100) + (int) $checkout->amount_cents;
            $total = (int) round((float) $application->total * 100);
            $application->paid_amount = $paid / 100;
            $application->payment_status = $paid >= $total ? 'paid' : 'partial';
            // Payment is not legal approval of the trademark application.
            $application->save();
            DB::table('payment_checkouts')->where('id', $checkout->id)->update(['paid_at' => now(), 'updated_at' => now()]);

            return response()->json(['status' => 'success']);
        });
    }
}
