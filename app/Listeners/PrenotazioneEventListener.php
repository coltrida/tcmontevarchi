<?php

namespace App\Listeners;

use App\Events\PrenotazioneEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class PrenotazioneEventListener
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
     * @param  PrenotazioneEvent  $event
     * @return void
     */
    public function handle(PrenotazioneEvent $event)
    {
        //
    }
}
