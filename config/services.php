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
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID','310370796775-ljofrqkqjmalt0v5dughqbcrebfeb5k2.apps.googleusercontent.com'),         // Your GitHub Client ID
        'client_secret' => env('GOOGLE_CLIENT_SECRET','dM1lQonXg2WP_-wQxHAUnGQX'), // Your GitHub Client Secret
        'redirect' => 'https://prueba.leipel.com/login/google/callback',
//        'redirect' => 'http://localhost/test/public/login/google/callback',
    ],

//    'github' => [
//        'client_id' => env('GITHUB_CLIENT_ID','53745a44e9e958b55ff1'),         // Your GitHub Client ID
//        'client_secret' => env('GITHUB_CLIENT_SECRET','de7cf48f31962f31970d1779cd210e378dcd755f'), // Your GitHub Client Secret
//        'redirect' => 'http://leipel.com.test/login/github/callback',
//        'redirect' => 'http://localhost/test/public/login/github/callback',
//    ],

    'facebook' => [
        'client_id'     => env('FACEBOOK_ID','196009587789318'),
        'client_secret' => env('FACEBOOK_SECRET','30a7707c5762f77be28f1fe0480a672a'),
        'redirect'      => 'https://prueba.leipel.com/login/facebook/callback',
    ],

    'twitter' => [
        'client_id'     => env('TWITTER_ID','3ViUyES1FTvFurw0Ge8ncu6QZ'),
        'client_secret' => env('TWITTER_SECRET','	Lup0XAw3DrXbfq2HpZuuyrkBXGso1L45EDoGsXpul44bVlLJzz'),
        'redirect' => 'https://prueba.leipel.com/login/twitter/callback',
//        'redirect' => 'http://localhost/test/public/login/twitter/callback',
    ],

];
