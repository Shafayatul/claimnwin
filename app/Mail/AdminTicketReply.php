<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminTicketReply extends Mailable
{
    use Queueable, SerializesModels;
    public $ticket, $ticketnote;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket, $ticketnote)
    {
        $this->ticket     = $ticket;
        $this->ticketnote = $ticketnote;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.admin-ticket-reply');
    }
}
