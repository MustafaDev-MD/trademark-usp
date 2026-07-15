<?php

namespace App\Providers;

use Laravel\Cashier\Events\WebhookReceived;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use App\Notifications\CustomVerifyEmail;

class EventServiceProvider extends ServiceProvider
{
protected $listen = [
    WebhookReceived::class => [
        \App\Listeners\HandleStripeWebhook::class,
    ],
];
}