<?php

namespace JLeonardoLemos\Categories\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

    /**
     * The event handler mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'eloquent.created*' => [
            'JLeonardoLemos\Categories\Listeners\attatchCategory',
        ],
        'eloquent.saved*' => [
            'JLeonardoLemos\Categories\Listeners\updateAttatchedCategory',
        ],
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events) {
        parent::boot($events);

        //
    }

}
