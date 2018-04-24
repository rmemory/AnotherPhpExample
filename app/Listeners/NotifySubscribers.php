<?php

namespace App\Listeners;

use App\Events\ThreadCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

// If we wish for the listener notification to be sent
// through a queue, we can do this 
//
// class NotifySubscribers implements ShouldQueue
class NotifySubscribers
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
     * @param  ThreadCreated  $event
     * @return void
     */
    public function handle(ThreadCreated $event)
    {
        //This will be called when the ThreadCreated
        // event occurs.

        var_dump($event->thread['name'].' was published to forum');
    }
}
