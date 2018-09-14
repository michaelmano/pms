<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'slack' => [
        'application_id' => env('SLACK_APPLICATION_ID'),
        'application_client_id' => env('SLACK_APPLICATION_CLIENT_ID'),
        'application_client_secret' => env('SLACK_APPLICATION_CLIENT_SECRET'),
        'application_signing_secret' => env('SLACK_APPLICATION_SIGNING_SECRET'),
        'application_bot_token' => env('SLACK_APPLICATION_BOT_TOKEN'),
        'application_access_token' => env('SLACK_APPLICATION_ACCESS_TOKEN'),
        'application_webhook_url' => env('SLACK_APPLICATION_WEBHOOK_URL'),
    ],
];
