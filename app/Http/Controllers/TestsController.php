<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Soumen\Agent\Facades\Agent;
use App\Classes\cPanel;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
class TestsController extends Controller
{
    public function test_forword(){
        $cPanel = new cPanel(env('CPANEL_USERNAME'), env('CPANEL_PASSWORD'), env('CPANEL_IP'));
        // Forward mail from forwardme@example.com to fwdtome@example.com
        $add_mail_forwarder = $cPanel->api2(
            'Email', 'addforward', 
            array(
                'domain'          => 'freeflightclaim.com',
                'email'           => 'md082@freeflightclaim.com',
                'fwdopt'          => 'fwd',
                'fwdemail'        => 'info@freeflightclaim.com',
            ) 
        );
    }
    public function test(){
    	$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
        $username = 'davidwalshblog@gmail.com';
        $password = 'davidwalsh';

        /* try to connect */
        $inbox = imap_open($hostname,$username ,$password) or die('Cannot connect to Gmail: ' . imap_last_error());

        /* grab emails */
        $emails = imap_search($inbox,'ALL');

        /* if emails are returned, cycle through each... */
        if($emails) {

            /* begin output var */
            $output = '';

            /* put the newest emails on top */
            rsort($emails);

            /* for every email... */
            foreach($emails as $email_number) {

                /* get information specific to this email */
                $overview = imap_fetch_overview($inbox,$email_number,0);


                $output.= 'Name:  '.$overview[0]->from.'</br>';
                    $output.= 'Email:  '.$overview[0]->message_id.'</br>';



            }

            echo $output;
        }

        /* close the connection */
        imap_close($inbox);
    }


}
