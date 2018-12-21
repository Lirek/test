<?php

namespace App\Listeners;

use App\Events\TransactionsId;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendTransactionsId
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
     * @param  TransactionsId  $event
     * @return void
     */
    public function handle(TransactionsId $event)
    {
        $user_email= $event->user;
        $transaction_id= $event->transaction_id;
        
    }
}
