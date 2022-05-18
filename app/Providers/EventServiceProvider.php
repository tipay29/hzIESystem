<?php

namespace App\Providers;

use App\Events\GetCutEffEvent;
use App\Events\GetTotalCutUtilEvent;
use App\Events\InsertCutTableEvent;
use App\Events\PushCutEffSheetEvent;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        GetCutEffEvent::class => [
            \App\Listeners\CalculateCutUtilListener::class,
        ],
        GetTotalCutUtilEvent::class => [
            \App\Listeners\CalculateTotalCutUtilListener::class,
        ],
        PushCutEffSheetEvent::class => [
            \App\Listeners\PushCutEffSheetListener::class,
        ],
        InsertCutTableEvent::class => [
          \App\Listeners\InsertCutTableListener::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
