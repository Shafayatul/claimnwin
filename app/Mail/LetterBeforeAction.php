<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class LetterBeforeAction extends Mailable
{
    use Queueable, SerializesModels;
    public $email_content,$from_email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email_content,$from_email)
    {
        $this->email_content = $email_content;
        $this->from_email = $from_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->from_email)->markdown('email.letter_before');
    }
}
