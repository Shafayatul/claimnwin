<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewClaim extends Mailable
{
    use Queueable, SerializesModels;
    public $from,$to,$airline,$is_eligible;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from, $to, $airline, $is_eligible)
    {
        $this->from         = $from;
        $this->to           = $to;
        $this->airline      = $airline;
        $this->is_eligible  = $is_eligible;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('info@claimnwin.com',"claimnwin.com")->subject('New Claim')->markdown('email.new_claim');
    }
}
