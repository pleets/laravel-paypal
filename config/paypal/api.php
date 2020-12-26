<?php

return [
    'credentials' => [
        'client_id' => env('PAYPAL_CLIENT_ID'),
        'secret' => env('PAYAL_SECRET'),
    ],
    'endpoints' => [
        'sandbox' => 'https://api.sandbox.paypal.com',
        'live' => 'https://api.paypal.com'
    ],
    'environment' => env('PAYPAL_ENVIRONMENT', 'sandbox')
];
