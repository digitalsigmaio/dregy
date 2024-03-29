<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FreeAdMail extends Mailable
{
    use Queueable, SerializesModels;

    public $freeAd;
    public $reason;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        //
        $this->freeAd = $event->freeAd;
        $this->reason = $event->reason;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@dr-egypt.net')->markdown('admin.emails.FreeAdMail');
    }
}
