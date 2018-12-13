<?php

namespace CodePress\CodeUser\Providers;

use CodePress\CodeUser\Event\UserCreatedEvent;
use CodePress\CodeUser\Listeners\EmailCreatedAccountListener;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserCreatedEvent::class => [
            EmailCreatedAccountListener::class,
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {

        parent::boot($events);

    }
}
