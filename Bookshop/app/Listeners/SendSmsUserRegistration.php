<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use App\Mail\SendUserRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Kavenegar\KavenegarApi;

class SendSmsUserRegistration
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
     * @param  UserRegistered  $event
     * @return void
     */
    public function handle(UserRegistered $event)
    {
        $client = new KavenegarApi(env('KAVEH_NEGAR_API_KEY'));
        $client->Send(
            env('SENDER_MOBILE'),
            env('RECEIVER_MOBILE'),
            $event->user->name . ' has registered successfully.');
    }
}
