<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Reminder;
use App\Claim;
use App\Airport;
use App\Passenger;
use App\ItineraryDetail;
use DB;
use App\Airline;
use App\ClaimStatus;
use App\NextStep;
use App\BankAccount;
use App\Setting;

class ClaimBackController extends Controller
{
    public function index(Request $request)
    {

        $claims = Claim::paginate(10);
        $claim_id_array = [];
        foreach($claims as $claim){
            array_push($claim_id_array, $claim->id);
        }


        $itineraryDetail = ItineraryDetail::whereIn('claim_id', $claim_id_array)->pluck('airline_id','claim_id')->toArray();
        $necessary_airline_ids = ItineraryDetail::whereIn('claim_id', $claim_id_array)->pluck('airline_id')->toArray();
        $departed_from_id = Claim::whereIn('id', $claim_id_array)->pluck('departed_from_id')->toArray();
        $final_destination_id = Claim::whereIn('id', $claim_id_array)->pluck('final_destination_id')->toArray();

        $necessary_airport_id_array = array_unique(array_merge($departed_from_id, $final_destination_id));
        $necessary_airline_id_array = array_unique($necessary_airline_ids);
        $passenger = Passenger::whereIn('claim_id', $claim_id_array)->orderBy('id', 'DESC')->get()->keyBy('claim_id');
        $airport = Airport::whereIn('id', $necessary_airport_id_array)->pluck('name','id');
        $airline = Airline::whereIn('id', $necessary_airline_id_array)->pluck('name','id');
        return view('claim.manage_claim',compact('claims','airport', 'airline', 'passenger'));
    }

    public function claimView($id)
    {
        // $notes = Note::latest()->paginate(6);
        $reminders=Reminder::where('claim_id',$id)->get();
        $claim=DB::table('claims')
            ->join('passengers','claims.id','passengers.claim_id')
            ->join('itinerary_details','claims.id','itinerary_details.claim_id')
            ->join('airlines','itinerary_details.airline_id','=','airlines.id')
            ->where('claims.id',$id)
        ->first();
        $flightCount=DB::table('itinerary_details')->where('claim_id',$id)->count();
        $passCount=DB::table('passengers')->where('claim_id',$id)->count();
        $departed=Claim::join('airports','claims.departed_from_id','=','airports.id')
                ->where('claims.id',$id)
                ->select('airports.name as departed_name')
                ->first();
        $final_destination=Claim::join('airports','claims.final_destination_id','=','airports.id')
        ->where('claims.id',$id)
        ->select('airports.name as destination_name')
        ->first();
        $claimStatus=ClaimStatus::all();
        $nextSteps = NextStep::all();
        $banks = BankAccount::join('currencies','bank_accounts.currency_of_account','=','currencies.id')
                    ->where('bank_accounts.status',1)
                    ->where('currencies.status',1)
                    ->get();
        $adminComm = Setting::where(['fieldKey'=>'_admin_comm'])->first();
        $affiliateComm = Setting::where(['fieldKey'=>'_affiliate_comm'])->first();
        return view('claim.claimView',compact('reminders','claim','flightCount','passCount','departed','final_destination','claimStatus','nextSteps','banks'));
    }

    public function manageUnfinishedClaim()
    {
        return view('claim.manage_unfinished_claim');
    }

    public function unfinishedClaimView()
    {
        return view('claim.unfinished_claim_view');
    }

    public function manageFillsClaim()
    {
        return view('claim.manage_fills_claim');
    }

    public function fillsClaimView()
    {
        return view('claim.fills_claim_view');
    }
}
