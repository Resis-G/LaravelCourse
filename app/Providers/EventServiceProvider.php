<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use App\Events\MessageWasReceived;

use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use App\Listeners\sendAutoResponder;
use App\Listeners\snedNotificationToTheOwner;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [

        MessageWasReceived::class=>[
            sendAutoResponder::class,
            snedNotificationToTheOwner::class,
        ],

        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
