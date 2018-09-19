<?php

namespace App\Listeners;

use App\Events\CreateCodeSocialUserEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class CreateCodeSocialUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreateCodeSocialUserEvent  $event
     * @return void
     */
    public function handle(CreateCodeSocialUserEvent $event)
    {
        $user = User::find($event->user);

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                 $charactersLength = strlen($characters);
                 $randomString = '';
        
                   for ($i = 0; $i < 6; $i++) 
                      {
                        $randomString .= $characters[rand(0, $charactersLength - 1)];
                      }


        $code=$randomString;

        $user->codigo_ref = $code;

        

        $user->save();

    }
}
