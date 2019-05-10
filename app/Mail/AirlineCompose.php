<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AirlineCompose extends Mailable
{
    use Queueable, SerializesModels;
    public $file__names,$composeData,$userName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($file__names,$composeData,$userName)
    {
        $this->file__names = $file__names;
        $this->composeData = $composeData;
        $this->userName = $userName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail =$this->markdown('email.AirlineComposeFileView');
        foreach($this->file__names as $file){
            $mail->attach($file);
        }
        return $mail;
    }
}
