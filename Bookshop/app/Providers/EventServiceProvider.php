<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    /*protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];*/
    protected $listen = [
        'App\Events\BookCreated' => [
            'App\Listeners\SendSmsBookCreation',
            'App\Listeners\SendEmailBookCreation',
        ],
        'App\Events\UserRegistered' => [
            'App\Listeners\SendSmsUserRegistration',
            'App\Listeners\SendEmailUserRegistration',
        ],
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
