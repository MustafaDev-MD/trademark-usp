<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Webhook;
use App\Models\TrademarkApplication;
use Illuminate\Support\Facades\Log;

class StripeWebhookController extends Controller
{
    // public function handle(Request $request)
    // {
    //     $payload = $request->getContent();
    //     $sig = $request->header('Stripe-Signature');

    //     $event = Webhook::constructEvent(
    //         $payload,
    //         $sig,
    //         config('services.stripe.webhook_secret')
    //     );

    //     if ($event->type === 'checkout.session.completed') {
    //         $session = $event->data->object;

    //         TrademarkApplication::where('id', $session->metadata->application_id)
    //             ->update([
    //                 'status' => 'paid',
    //             ]);

    //         $application = TrademarkApplication::find($session->metadata->application_id);

    //         if ($application) {
    //             $application->paid_amount = $application->total; // full payment
    //             $application->payment_status = 'paid';
    //             $application->status = 'approved'; // optional, if you mark completed
    //             $application->save();
    //         }
    //     }

    //     TrademarkApplication::where('id', $session->metadata->application_id)
    //         ->update([
    //             'status' => 'paid',
    //         ]);


    //     return response()->json(['status' => 'success']);
    // }


    public function handle(Request $request)
    {
        $payload = $request->getContent();
        $sig = $request->header('Stripe-Signature');

        try {
            $event = Webhook::constructEvent(
                $payload,
                $sig,
                config('services.stripe.webhook_secret')
            );

            Log::info('Stripe Webhook Received', [
                'event_type' => $event->type,
            ]);

            // Determine the application_id from different event types
            $applicationId = null;

            switch ($event->type) {
                case 'checkout.session.completed':
                    $session = $event->data->object;
                    $applicationId = $session->metadata->application_id ?? null;
                    break;

                case 'payment_intent.succeeded':
                    $paymentIntent = $event->data->object;
                    $applicationId = $paymentIntent->metadata->application_id ?? null;
                    break;

                case 'charge.succeeded':
                    $charge = $event->data->object;
                    $applicationId = $charge->metadata->application_id ?? null;
                    break;

                default:
                    // Other event types you might ignore
                    Log::info('Unhandled Stripe event type', ['type' => $event->type]);
                    return response()->json(['status' => 'ignored']);
            }

            if (!$applicationId) {
                Log::warning('Stripe event missing application_id', ['event_type' => $event->type]);
                return response()->json(['error' => 'No application_id in metadata'], 400);
            }

            $application = TrademarkApplication::find($applicationId);

            if ($application && $application->payment_status !== 'paid') {
                $finalTotal = (float)($application->total ?? 0) - (float)($application->discount ?? 0);

                $application->paid_amount = $finalTotal;
                $application->payment_status = 'paid';
                $application->status = 'approved';
                $application->project_status = 'in_progress';
                $application->save();

                Log::info('TrademarkApplication updated after Stripe payment', [
                    'application_id' => $application->id,
                    'paid_amount' => $application->paid_amount,
                    'event_type' => $event->type
                ]);
            }

            return response()->json(['status' => 'success']);

        } catch (\Exception $e) {
            Log::error('Stripe Webhook Error', ['error' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}


