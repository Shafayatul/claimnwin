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
use App\SentEmail;
use App\Flight;

class PdfController extends Controller
{
    public function letterBeforeActionView($id)
    {

        $claim = Claim::find($id);

        $iternery = ItineraryDetail::where('claim_id',$id)->get();
        $all_iternery_airport = [];
        $all_flight_segment   = '';
        $all_flight_seg       = [];
        $all_airline_ids      = [];
        $all_iternery_airline = [];
        $all_iternery_flight  = [];
        $all_flight_number    = [];

        if(count($iternery) == 1){

          $is_connecting_flight = false;

        }else{

          $is_connecting_flight = true;

          foreach ($iternery as $row) {
            $all_flight_segment .= $row->flight_segment.'-';
            array_push($all_airline_ids, $row->airline_id);
            array_push($all_flight_number, $row->flight_number);
          }

          $all_flight_segment = rtrim($all_flight_segment, '-');
          $all_flight_seg = explode("-",$all_flight_segment);

          $all_iternery_airport = Airport::whereIn('iata_code',$all_flight_seg)->get()->keyBy('iata_code');
          $all_iternery_airline = Airline::whereIn('id',$all_airline_ids)->get()->keyBy('id');
          $all_iternery_flight  = Flight::whereIn('flight_no',$all_flight_number)->get()->keyBy('flight_no');
        }
        $pos = strpos(strtolower($claim->amount), 'eur');
        if ($pos != false) {
          $law = 'EC Regulation 261/2004';
        }else{
          $law = 'Israeli Aviation Services Law';
        }

        // all segmented flights
        $all_flight_seg = [];
        $temp_str = '';
        foreach ($iternery as $single_iternery) {
          $temp_str = $temp_str.$single_iternery->flight_segment.'-';
        }
        $temp_str = rtrim($temp_str, '-');
        $all_flight_seg = array_unique(explode('-', $temp_str));
        $necessary_connection = [];
        foreach ($all_flight_seg as $key => $value) {
          array_push($necessary_connection, $value);
        }
        $internal_connected_airport = [];
        for($i=1; $i<=(count($necessary_connection)-2); $i++){
          array_push($internal_connected_airport, $necessary_connection[$i]);
        }
        $internal_connected_airport_names = Airport::whereIn('iata_code', $internal_connected_airport)->get();


        $itt_details=ItineraryDetail::where('claim_id',$id)->where('is_selected', 1)->first();

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
        $flights = Flight::where('flight_no', $itt_details->flight_number)->first();

        if ($bank_info && $airline) {
          return view('pdf.letterBeforeAction',compact('airline', 'flights', 'currency','bank_info','connection_airport','itt_details','dept_and_arrival_airport','departed_airport','final_destination_airport','claim','all_passenger','iternery','expense','reminder','connection','current_passenger', 'internal_connected_airport_names', 'is_connecting_flight', 'all_iternery_airport', 'all_iternery_airline', 'all_iternery_flight', 'law'));
        }else {
          return redirect()->back()->with('error', 'Please fill up all required fields.');
        }

    }

    public function pdfView($id)
    {
        // $claim=Claim::find($id);
        $claim=Claim::where('id',$id)->first();
        $airport_from=Airport::where('id', $claim->departed_from_id)->first();
        $airport_to=Airport::where('id', $claim->final_destination_id)->first();
        $itinerary_details = ItineraryDetail::where('claim_id',$id)->first();
        $passenger = Passenger::where('claim_id',$id)->first();
        // dd($passenger);
        return view('pdf.POA',compact('claim','passenger', 'itinerary_details', 'airport_from', 'airport_to'));
    }

    public function letterBeforeActionEmail(Request $request)
    {
        $email_content = $request->letter_before_content;
        $id = $request->claim_id;
        $airline_id = $request->airline_id;
        $airline_email=Airline::where('id',$airline_id )->first()->email;
        $from_email = $request->cpanel_email;

        $airline_email = explode(',', $airline_email);
        Mail::to($airline_email)->send(new LetterBeforeAction($email_content,$from_email));

        SentEmail::create([
            'body'      => $email_content,
            'claim_id'  => $id,
            'subject'   =>'claim',
        ]);

        return redirect('/claim-view/'.$id)->with('success','Email Sent Successfully!');
    }
}
