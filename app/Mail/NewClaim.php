<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CustomerReply extends Mailable
{
    use Queueable, SerializesModels;
   public $from_airport,$to_airport,$client_email,$is_eligible;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from_airport,$to_airport,$client_email,$is_eligible)
    {
        $this->from_airport = $from_airport;
        $this->to_airport = $to_airport;
        $this->client_email = $client_email;
        $this->is_eligible = $is_eligible;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail =$this->subject("New Claim")->markdown('email.new_claim');
    }
}