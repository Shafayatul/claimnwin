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
/*        $cPanel = new cPanel(env('CPANEL_USERNAME'), env('CPANEL_PASSWORD_NEW'), env('CPANEL_IP'));
        // Forward mail from forwardme@example.com to fwdtome@example.com
        $add_mail_forwarder = $cPanel->api2(
            'Email', 'addforward',
            array(
                'domain'          => 'claimnwin.com',
                'email'           => 'md082@claimnwin.com',
                'fwdopt'          => 'fwd',
                'fwdemail'       ` => 'info@claimnwin.com',
            )
        );*/
    }
    public function test(Request $request){

        // echo "for test:";
        // dd(env('CPANEL_PASSWORD'));
        // $claim = Claim::where('id', '10000022')->first();
        // $user = User::where('id', '84')->first();
        // $ittDetails = ItineraryDetail::where('claim_id',$claim->id)->where('is_selected','1')->first();
        // $passengers = Passenger::where('claim_id',$claim->id)->get();
        // // dd(Mail::to('sharafat.sohan047@gmail.com')->send(new ClaimCompleted($user, $ittDetails, $passengers)));
        // return view('email.test', compact('user', 'ittDetails', 'passengers'));
        // 87TYT%^R^%Rduyt
    }


}
