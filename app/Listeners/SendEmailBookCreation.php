<?php

namespace App\Listeners;

use App\Events\BookCreated;
use App\Mail\SendBookCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendEmailBookCreation
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
        Mail::to('book@created.com')->send(new SendBookCreated($event->book, $event->user));
    }
}
