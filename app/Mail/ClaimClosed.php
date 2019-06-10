<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClaimClosed extends Mailable
{
    use Queueable, SerializesModels;
    public $user,$ittDetails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$ittDetails)
    {
        $this->user         = $user;
        $this->ittDetails   = $ittDetails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.claim_closed');
    }
}
