<?php

namespace App\Events;

use App\Models\Reservation;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ReservationMade implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reservation;
    public $count;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Reservation $reservation,$count)
    {
        //Last Notification
        $this->reservation = $reservation;

        //Count of notifications today
        $this->count       = $count;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('user-reservations');
    }


    /**
     * @return string
     * Broadcast event
     */
    public function broadcastAs() : string
    {
        return 'ReservationMade';
    }
}
