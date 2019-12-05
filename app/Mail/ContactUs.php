<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
    public $email, $name, $subject, $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $name, $subject, $msg)
    {
        $this->email = $email;
        $this->name = $name;
        $this->subject = $subject;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email,$this->name)->subject($this->subject)->markdown('email.contact_us');
    }
}
