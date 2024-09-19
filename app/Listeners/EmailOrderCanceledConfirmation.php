<?php

namespace App\Listeners;

use App\Events\OrderWasCanceled;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailOrderCanceledConfirmation
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
    public function handle(OrderWasCanceled $event): void
    {
        //
    }
}
