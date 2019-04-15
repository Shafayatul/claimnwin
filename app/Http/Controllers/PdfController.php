<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Claim;
use App\Passenger;
use App\ItineraryDetail;
use App\Expense;
use App\Reminder;
use App\Connection;
use App\Airport;
use App\BankAccount;
use App\Currency;
use App\Airline;

class PdfController extends Controller
{
    public function letterBeforeActionView($id)
    {

        $claim=Claim::find($id);

        $itt_details=ItineraryDetail::find($id);

        $flight_segment=$itt_details->flight_segment;

        $flight_seg=explode("-",$flight_segment);

        $dept_and_arrival_airport=Airport::whereIn('iata_code',$flight_seg)->get()->toArray();
        // dd($dept_final_airport);
        $departed_airport = Airport::where('id',$claim->departed_from_id)->first();

        $final_destination_airport = Airport::where('id',$claim->final_destination_id)->first();

        $all_passenger = Passenger::where('claim_id',$id)->get();

        $current_passenger = Passenger::where('claim_id',$id)->first();

        $iternery = ItineraryDetail::where('claim_id',$id)->get();

        $expense = Expense::where('claim_id',$id)->get();

        $reminder = Reminder::find($id);

        $connection = Connection::where('claim_id',$id)->first();

        $connection_airport = Airport::where('id',$connection->airport_id)->first();

        $bank_info=BankAccount::where('id',$claim->bank_details_id)->first();

        $currency=Currency::where('id',$bank_info->currency_of_account)->first();

        $airline = Airline::where('id',$itt_details->airline_id)->first();

        return view('pdf.letterBeforeAction',compact('airline','currency','bank_info','connection_airport','itt_details','dept_and_arrival_airport','departed_airport','final_destination_airport','claim','all_passenger','iternery','expense','reminder','connection','current_passenger'));
    }

    public function pdfView($id)
    {
        $claim=Claim::find($id);
        $passenger = Passenger::where('claim_id',$id)->get();
        return view('pdf.POA');
    }
}
