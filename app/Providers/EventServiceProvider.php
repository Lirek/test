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

            'App\Events\AssingPointsEvents' => [
            'App\Listeners\AssingPoints',
        ],

            'App\Events\MovieTraceEvent' => [
            'App\Listeners\RegisterMovieTrace',
        ],

            'App\Events\AlbumTraceEvent' => [
            'App\Listeners\RegisterAlbumTrace',
        ],

            'App\Events\SongTraceEvent' => [
            'App\Listeners\RegisterSongTrace',
        ],

            'App\Events\MegazineTraceEvent' => [
            'App\Listeners\RegisterMegazineTrace',
        ],

            'App\Events\BookTraceEvent' => [
            'App\Listeners\RegisterBookTrace',
        ],

            'App\Events\EpisodeTraceEvent' => [
            'App\Listeners\RegisterEpisodeTrace',
        ],

            'App\Events\RadioTraceEvent' => [
            'App\Listeners\RegisterRadioTrace',
        ],

            'App\Events\TvTraceEvent' => [
            'App\Listeners\RegisterTvTrace',
        ],

            'App\Events\PointsTraceEvent' => [
            'App\Listeners\RegisterPointsTrace',
        ],

            'App\Events\NewContentNotice' => [
            'App\Listeners\SendNoticeEmail',
        ],

            'App\Events\TransactionsId' => [
            'App\Listeners\SendTransactionsId',
        ],

            'App\Events\TransactionToken' => [
            'App\Listeners\SendTokenEmail',
        ],

            'App\Events\DeleteAccount' => [
            'App\Listeners\DeleteAccount',
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
