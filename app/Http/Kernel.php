<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        // Permisos para las apis
        \Barryvdh\Cors\HandleCors::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
             \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,

        ],

        'api' => [
            'throttle:60,1',
            'bindings',
            // Permisos para las apis
            \Barryvdh\Cors\HandleCors::class,
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \Illuminate\Auth\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        //Middlewares de contenido

          'MyAlbums' => \App\Http\Middleware\MyAlbums::class,
          'MyBooks' => \App\Http\Middleware\MyBooks::class,
          'MyMegazine' => \App\Http\Middleware\MyMegazine::class,
          'MyMovies' => \App\Http\Middleware\MyMovies::class,
          'MySeries' => \App\Http\Middleware\MySeries::class,
          'MySingles' => \App\Http\Middleware\MySingles::class,

        //add custom middlewares here as key and value pair.
         'seller_auth' => \App\Http\Middleware\AuthenticateSeller::class,
         'seller_guest' => \App\Http\Middleware\RedirectIfSellerAuthenticated::class,

         'promoter_auth' => \App\Http\Middleware\AuthenticatePromoter::class,
         'promoter_guest' => \App\Http\Middleware\RedirectIfPromoterAuthenticated::class,

        'bidder_auth' => \App\Http\Middleware\AuthenticateBidder::class,
        'bidder_guest' => \App\Http\Middleware\RedirectIfBidderAuthenticated::class,

         'Admin' => \App\Http\Middleware\AdminMiddleware::class,
         'SuperAdmin' => \App\Http\Middleware\SuperAdmin::class,
         'Operator' => \App\Http\Middleware\OperatorMiddleware::class,
         'jwt.auth' => 'Tymon\JWTAuth\Middleware\GetUserFromToken',
         'jwt.refresh' => 'Tymon\JWTAuth\Middleware\RefreshToken',

         //middleware de usuario activo
         'ActiveUser' => \App\Http\Middleware\ActiveUsers::class,
         'VerifiedEmail' => \App\Http\Middleware\EmailVerified::class,
         'GeoLock' => \App\Http\Middleware\GeoLock::class,

        // middleware para peticiones de las apis
        'cors' => \Barryvdh\Cors\HandleCors::class,
    ];
}
