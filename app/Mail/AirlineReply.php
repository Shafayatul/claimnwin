<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AirlineReply extends Mailable
{
    use Queueable, SerializesModels;
    public $file__names,$composeData,$userName,$from_email,$from_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($file__names,$composeData,$userName,$from_email,$from_name)
    {
        $this->file__names = $file__names;
        $this->composeData = $composeData;
        $this->userName = $userName;
        $this->from_email = $from_email;
        $this->from_name = $from_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail =$this->from($this->from_email,$this->from_name)->markdown('email.AirlineComposeFileView');
            if($this->file__names != ''){
                foreach($this->file__names as $file){
                    $mail->attach($file);
                }
            }


        return $mail;
    }
}
