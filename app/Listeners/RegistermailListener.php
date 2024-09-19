<?php

namespace App\Listeners;

use App\Events\Registermail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class RegistermailListener
{
    /**
     * Create the event listener.
     */

     
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registermail $event): void
    {
        // dd($event);
        Mail::to("admin@gmail.com")->queue(new \App\Mail\hellomail($event->mailData));
    }
}
