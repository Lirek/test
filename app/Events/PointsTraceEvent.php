<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PointsTraceEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $type_content;
    public $id_content;
    public $ammount;

    public function __construct($type_content,$id_content,$ammount)
    {
        $this->type_content = $type_content;
        $this->id_content = $id_content;
        $this->ammount = $ammount;    
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
