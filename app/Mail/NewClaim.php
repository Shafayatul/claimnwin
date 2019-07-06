<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewClaim extends Mailable
{
    use Queueable, SerializesModels;
    public $from,$to,$client_email,$is_eligible;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from, $to, $client_email, $is_eligible)
    {
        $this->from              = $from;
        $this->to                = $to;
        $this->client_email      = $client_email;
        $this->is_eligible       = $is_eligible;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.new_claim');
    }
}
