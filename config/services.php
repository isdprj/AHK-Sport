<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */
    'facebook' => [
        'client_id' => '1019603425716556',
        'client_secret' => 'ba2a791bbabe48801c6fd326d0fe5804',
        'redirect' => 'https://localhost:8000/callback',
    ],
    'google' => [
        'client_id' => '827662996737-tuqdat0u28o2v53la903ko4fiueitb10.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://localhost:8000/callback',
    ],
    
    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
