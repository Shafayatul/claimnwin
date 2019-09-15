<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ClaimCompleted extends Mailable
{
    use Queueable, SerializesModels;
    public $user, $ittDetails, $passengers, $airline;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$ittDetails, $passengers, $airline)
    {
        $this->user       = $user;
        $this->ittDetails = $ittDetails;
        $this->passengers = $passengers;
        $this->airline    = $airline;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Claim Completed')->markdown('email.claim_completed');
    }
}
