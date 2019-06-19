<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Soumen\Agent\Facades\Agent;
use App\Classes\cPanel;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Cache;
use Artisan;

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
    public function test(Request $request){
    	
        $exitCode = Artisan::call('storage:link', [] );
dd($exitCode); // 0 exit code for no errors.
    }


}
