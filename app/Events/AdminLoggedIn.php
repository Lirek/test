<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class AdminLoggedIn
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $type;
    public $ip;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user,$type,$ip)
    {
        $this->user= $user;
        $this->type= $type;
        $this->ip= $ip;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
