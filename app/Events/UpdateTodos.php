<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UpdateTodos implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $name, $image;

    public function __construct($name,$image)
    {
        $this->name = $name;
        $this->image = $image;
    }

    public function broadcastOn()
    {
        return ['todos-updateTable-channel'];
    }
  
    public function broadcastAs()
    {
        return 'todos-updateTable-event';
    }

}
