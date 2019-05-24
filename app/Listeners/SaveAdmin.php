<?php

namespace App\Listeners;

use App\Events\AdminLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\LoginControl;

class SaveAdmin
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
     * @param  AdminLoggedIn  $event
     * @return void
     */
    public function handle(AdminLoggedIn $event)
    {
        
        if ($event->type == 'promoter') 
        {
                      
                $insert= new LoginControl;
                $insert->id_login=$event->user->id;
                $insert->ip_log=$event->ip;
                $insert->save();                
            

        }
    }
}
