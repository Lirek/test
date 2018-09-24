<?php

namespace App\Listeners;

use App\Events\NewContentNotice;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\NoticeOfNewElement;
use Illuminate\Support\Facades\Mail;


class SendNoticeEmail
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
     * @param  NewContentNotice  $event
     * @return void
     */
    public function handle(NewContentNotice $event)
    {
        Mail::to('bcastillo@leipel.com')->send(new NoticeOfNewElement($event->type,$event->name));
    }
}
