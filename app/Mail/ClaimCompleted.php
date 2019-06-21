<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClaimCompleted extends Mailable
{
    use Queueable, SerializesModels;
    public $user, $ittDetails, $passengers;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$ittDetails, $passengers)
    {
        $this->user         = $user;
        $this->ittDetails   = $ittDetails;
        $this->passengers    = $passengers;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.claim_completed');
    }
}
