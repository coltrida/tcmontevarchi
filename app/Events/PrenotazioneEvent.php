<?php

namespace App\Events;

use App\Http\Resources\PrenotazioniResource;
use App\Models\Prenotazione;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PrenotazioneEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $prenotazione;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(PrenotazioniResource $prenotazione)
    {
        $this->prenotazione = $prenotazione;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('prenotazioneChannel');
    }
}
