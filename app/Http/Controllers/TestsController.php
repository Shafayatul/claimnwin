<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Soumen\Agent\Facades\Agent;
use App\Classes\cPanel;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;

use Illuminate\Support\Facades\Cache;
use App\Claim;
use App\User;
use App\ItineraryDetail;
use App\Passenger;
use App\Mail\ClaimCompleted;
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
        $claim = Claim::where('id', '10000022')->first();
        $user = User::where('id', '84')->first();
        $ittDetails = ItineraryDetail::where('claim_id',$claim->id)->where('is_selected','1')->first();
        $passengers = Passenger::where('claim_id',$claim->id)->get();
        Mail::to($user->email)->send(new ClaimCompleted($user, $ittDetails, $passengers));
    }


}
