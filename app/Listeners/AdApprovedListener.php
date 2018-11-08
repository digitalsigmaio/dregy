<?php

namespace App\Listeners;

use App\Events\AdApprovedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\FreeAdMail;

class AdApprovedListener implements ShouldQueue
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
     * @param  AdApprovedEvent  $event
     * @return void
     */
    public function handle(AdApprovedEvent $event)
    {
        //
        Mail::to($event->freeAd->user)->send(new FreeAdMail($event));
    }
}
