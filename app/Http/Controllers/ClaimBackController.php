<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Reminder;
use App\Claim;
use App\Airport;
use App\ItineraryDetail;
use DB;
use App\Airline;

class ClaimBackController extends Controller
{
    public function index(Request $request)
    {
        $claims=DB::table('claims')
            ->join('passengers','claims.id','passengers.claim_id')
            ->join('itinerary_details','claims.id','itinerary_details.claim_id')
            ->join('airlines','itinerary_details.airline_id','=','airlines.id')
            ->join('airports','claims.departed_from_id','airports.id')
            ->select('claims.*','itinerary_details.flight_number','passengers.first_name','passengers.last_name','airlines.name','airports.name as departed_name')
            ->get();
            $final_destination=DB::table('claims')
            ->join('airports','claims.final_destination_id','airports.id')
            ->select('airports.name as final_destination')
            ->first();

        // $claims = Claim::paginate(10);
        // $claim_id_array = [];
        // foreach($claims as $claim){
        //     array_push($claim_id_array, $claim->id);
        // }


        // $itineraryDetail = ItineraryDetail::WHERE('claim_id', $claim_id_array)->pluck('airline_id','claim_id');
        // $necessary_airline_ids = ItineraryDetail::WHERE('claim_id', $claim_id_array)->pluck('airline_id');

        // $departed_from_id = Claim::WHERE('id', $claim_id_array)->pluck('departed_from_id')->get();
        // $final_destination_id = Claim::WHERE('id', $claim_id_array)->pluck('final_destination_id');

        // $airport_ids = array_unique($departed_from_id, $final_destination_id);

        // // $passenger = +++Passenger::WHERE()->get()
        $airport = Airport::pluck('name','id');
        $airline = Airline::pluck('name', 'id');
        return view('claim.manage_claim',compact('claims','airport', 'airline'));
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
        return view('claim.claimView',compact('reminders','claim','flightCount','passCount','departed','final_destination'));
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
