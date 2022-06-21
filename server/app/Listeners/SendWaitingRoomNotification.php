<?php

namespace App\Listeners;

use App\Events\WaitingRoomCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendWaitingRoomNotification
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
     * @param  \App\Events\WaitingRoomCreated  $event
     * @return void
     */
    public function handle(WaitingRoomCreated $event)
    {
        //
    }
}
