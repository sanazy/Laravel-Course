<?php

namespace App\Listeners;

use App\Events\BookCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Kavenegar\KavenegarApi;

class SendSmsBookCreation
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
     * @param  BookCreated  $event
     * @return void
     */
    public function handle(BookCreated $event)
    {
        $client = new KavenegarApi(env('KAVEH_NEGAR_API_KEY'));
        $client->Send(
            env('SENDER_MOBILE'),
            env('RECEIVER_MOBILE'),
            '"' . $event->book->name . '" book has been created by "' . $event->user->name . '".');
    }
}
