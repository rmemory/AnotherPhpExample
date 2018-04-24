<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // Step 1, create the event and listeners here:
        // In this case, ThreadCreated, and NotifySubscribers.
        // Step 2, use php artisan event:generate 
        // Step 3, to dispatch an event, we use the event
        // helper method, like this: 
        // event (new ThreadCreated($mythread))
        'App\Events\ThreadCreated' => [
            // After the fact, we could also use
            // php artisan make:listener to create 
            // more listeners.
            'App\Listeners\NotifySubscribers',
        ],

        /* Alternatively, instead of using php artisan event:generate,
         * we could do this: 
         * 
         * php artisan make:listener CheckForSpam --event="ThreadCreated"
         * 
         * Note, that in this case, we need to update the $listen table
         * above to fire a ThreadCreated event to the CheckForSpam
         * listener.
         */
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
