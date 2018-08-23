<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [ 

            'App\Events\AdminLoggedIn' => [
            'App\Listeners\SaveAdmin',
        ],
            'App\Events\WelcomeEmailEvent' => [
            'App\Listeners\SendWelcomeEmail',
        ],
            'App\Events\ContentAprovalEvent' => [
            'App\Listeners\SendAprovalEmail',
        ],
            'App\Events\ContentDenialEvent' => [
            'App\Listeners\SendDenialEmail',
        ],        
            'App\Events\InviteEvent' => [
            'App\Listeners\SendInviteEmail',
        ],
            'App\Events\PasswordPromoter' => [
            'App\Listeners\SendPasswordPromoterEmail',
        ],

            'App\Events\CreateCodeSocialUserEvent' => [
            'App\Listeners\CreateCodeSocialUser',
        ],

            'App\Events\BuyContentEvent' => [
            'App\Listeners\SendBuyContent',
        ],

            'App\Events\PayementAprovalEvent' => [
            'App\Listeners\SendPaymentAprovalEmail',
        ],

            'App\Events\PaymentDenialEvent' => [
            'App\Listeners\SendPaymentDenialEmail',
        ],
        
            'App\Events\UserValidateEvent' => [
            'App\Listeners\SendUserValidateEmail',
        ],


    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
