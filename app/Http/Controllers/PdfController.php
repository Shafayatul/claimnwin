<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Claim;
use App\Passenger;
use App\ItineraryDetail;
use App\Expense;
use App\Reminder;
use App\Connection;


class PdfController extends Controller
{
    public function letterBeforeActionView($id)
    {
        $claim=Claim::find($id);
        $passenger = Passenger::where('claim_id',$id)->get();
        $iternery = ItineraryDetail::where('claim_id',$id)->get();
        $expense = Expense::where('claim_id',$id)->get();
        $reminder = Reminder::find($id);
        $connection = Connection::find($id);
        return view('pdf.letterBeforeAction',compact('claim','passenger','iternery','expense','reminder','connection'));
    }
}
