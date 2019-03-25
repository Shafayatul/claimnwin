<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Reminder;
use App\Claim;
use DB;

class ClaimBackController extends Controller
{
    public function index(Request $request)
    {
        $claims=DB::table('claims')
            ->join('passengers','claims.id','passengers.claim_id')
            ->join('itinerary_details','claims.id','itinerary_details.claim_id')
        ->paginate(6);
        return view('claim.manage_claim',compact('claims'));
    }

    public function claimView($id)
    {
        // $notes = Note::latest()->paginate(6);
        $reminders=Reminder::where('claim_id',$id)->get();
        $claim=DB::table('claims')
            ->join('passengers','claims.id','passengers.claim_id')
            ->join('itinerary_details','claims.id','itinerary_details.claim_id')
            ->where('claims.id',$id)
        ->first();
        $flightCount=DB::table('itinerary_details')->where('claim_id',$id)->count();
        $passCount=DB::table('passengers')->where('claim_id',$id)->count();
        return view('claim.claimView',compact('reminders','claim','flightCount','passCount'));
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
