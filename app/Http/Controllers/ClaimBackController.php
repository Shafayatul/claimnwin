<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Reminder;

class ClaimBackController extends Controller
{
    public function index(Request $request)
    {
        return view('claim.manage_claim');
    }

    public function claimView()
    {
        $notes = Note::latest()->paginate(6);
        $reminders=Reminder::latest()->paginate(6);
        return view('claim.claimView',compact('notes','reminders'));
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
