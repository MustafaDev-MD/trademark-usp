<?php

use Laravel\Cashier\Events\WebhookReceived;

class EventServiceProvider extends EventServiceProvider
{
protected $listen = [
    WebhookReceived::class => [
        \App\Listeners\HandleStripeWebhook::class,
    ],
];
}