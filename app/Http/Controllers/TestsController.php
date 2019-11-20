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
use App\Airline;
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
        $airlines = Airline::select('icao_code')->where('icao_code', '!=', '')->get();

        foreach ($airlines as $airline) {
            if (Airline::where('icao_code', $airline->icao_code)->count() >1) {
                foreach(Airline::select('name', 'icao_code')->where('icao_code', $airline->icao_code)->get() as $row){
                    echo $row->name.'-'.$row->icao_code;
                    echo "<br>";
                }
                echo "<hr>";
            }
        }

    }


}
