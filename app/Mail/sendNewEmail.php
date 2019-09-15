<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendNewEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $file_names,$composeData,$toEmail,$from_email,$from_name,$subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($file_names,$composeData,$toEmail,$from_email,$from_name,$subject)
    {
        $this->file_names               = $file_names;
        $this->composeData              = $composeData;
        $this->toEmail                  = $toEmail;
        $this->from_email               = $from_email;
        $this->from_name                = $from_name;
        $this->subject                  = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail =$this->from($this->from_email,$this->from_name)->subject($this->subject)->markdown('email.send_new_email');
            if($this->file_names != ''){
                foreach($this->file_names as $file){
                    $mail->attach($file);
                }
            }
        return $mail;
    }
}
