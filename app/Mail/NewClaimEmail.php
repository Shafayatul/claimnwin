<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewClaimEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $from_airport,$to_airport,$client_email,$is_eligible,$airline,$a_html;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($from_airport,$to_airport,$client_email,$is_eligible,$airline,$a_html)
    {
        $this->from_airport = $from_airport;
        $this->to_airport = $to_airport;
        $this->client_email = $client_email;
        $this->is_eligible = $is_eligible;
        $this->airline = $airline;
        $this->a_html = $a_html;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('email.new_claim_email')->with(['from_airport' => $this->from_airport, 'to_airport' => $this->to_airport, 'client_email' => $this->client_email, 'is_eligible' => $this->is_eligible, 'airline' => $this->airline, 'a_html' => $this->a_html]);
    }
}
