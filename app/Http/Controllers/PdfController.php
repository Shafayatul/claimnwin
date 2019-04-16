<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
use App\Mail\LetterBeforeAction;

class PdfController extends Controller
{
    public function letterBeforeActionView($id)
    {

        $claim=Claim::find($id);


        $iternery = ItineraryDetail::where('claim_id',$id)->get();

        $itt_details=ItineraryDetail::where('claim_id',$id)->first();

        if($itt_details)
        {
            $flight_segment=$itt_details->flight_segment;

            $flight_seg=explode("-",$flight_segment);
        }

        $dept_and_arrival_airport=Airport::whereIn('iata_code',$flight_seg)->get()->toArray();



        $departed_airport = Airport::where('id',$claim->departed_from_id)->first();

        $final_destination_airport = Airport::where('id',$claim->final_destination_id)->first();



        $all_passenger = Passenger::where('claim_id',$id)->get();

        $current_passenger = Passenger::where('claim_id',$id)->first();





        $expense = Expense::where('claim_id',$id)->get();

        $reminder = Reminder::find($id);



        $connection = Connection::where('claim_id',$id)->first();

        if($connection != null){
            $connection_airport = Airport::where('id',$connection->airport_id)->first();
        }else{
            $connection_airport = '';
        }




        $bank_info=BankAccount::where('id',$claim->bank_details_id)->first();

        if($bank_info != null){
            $currency=Currency::where('id',$bank_info->currency_of_account)->first();
        }else{
            $currency='';
        }


        $airline = Airline::where('id',$itt_details->airline_id)->first();



        return view('pdf.letterBeforeAction',compact('airline','currency','bank_info','connection_airport','itt_details','dept_and_arrival_airport','departed_airport','final_destination_airport','claim','all_passenger','iternery','expense','reminder','connection','current_passenger'));
    }

    public function pdfView($id)
    {
        // $claim=Claim::find($id);
        $claim=Claim::where('id',$id)->first();
        $itinerary_details = ItineraryDetail::where('claim_id',$id)->first();
        $passenger = Passenger::where('claim_id',$id)->first();
        // dd($passenger);
        return view('pdf.POA',compact('claim','passenger', 'itinerary_details'));
    }

    public function letterBeforeActionEmail(Request $request)
    {
        $email_content = $request->letter_before_content;
        $id = $request->claim_id;
        $airline_id = $request->airline_id;
        $airline_email=Airline::where('id',$airline_id )->first()->email;
        $from_email = $request->cpanel_email;
        Mail::to($airline_email)->send(new LetterBeforeAction($email_content,$from_email));
        return redirect('/claim-view/'.$id)->with('success','Email Sent Successfully!');
    }
}
