<?php

namespace App\Listeners;

use App\Events\BookTraceEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\BooksTrace;

class RegisterBookTrace
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
     * @param  BookTraceEvent  $event
     * @return void
     */
    public function handle(BookTraceEvent $event)
    {
        $new_trace = new BooksTrace;
        $new_trace->user_id = $event->user_id;
        $new_trace->books_id = $event->book_id;
        $new_trace->save();
    }
}
