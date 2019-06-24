<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BidderChangeStatus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $bidder;
    public $url;

    public function __construct($bidder) {
        $this->bidder = $bidder;
        $this->url = config('app.url').'/bidderComplete/'.$this->bidder->bidder->id.'/'.$this->bidder->bidder->token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        if ($this->bidder->bidder->status=="Pre-Aprobado") {
            return $this->view('admin.mails.BidderAproved')->subject('Usuario pre-aprobado')->with('name',$this->bidder->bidder->name)->with('url',$this->url);
        } elseif ($this->bidder->bidder->status=="Denegado"){
            return $this->view('admin.mails.BidderDenied')->subject('Usuario denegado')->with('name',$this->bidder->bidder->name)->with('reason',$this->bidder->reason);
        }
    }
}
