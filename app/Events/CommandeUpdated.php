<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\Commande;

class CommandeUpdated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    public $commande;
    public  $changes;
    /**
     * Create a new event instance.
     */
     public function __construct(Commande $commande, $changes)
    {
        $this->commande = $commande;
        $this->changes = $changes;
    }

        //
    

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new PrivateChannel('channel-name'),
        ];
    }
}
