<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Hash;
use App\User;
use App\ItineraryDetail;
use App\Claim;
use App\Connection;
use App\Currency;
use App\Airport;
use App\Passenger;
use App\Airline;
use App\Expense;
use Illuminate\Http\Request;

use Countries;

class ClaimsController extends Controller
{

    var $europe_countries;
    public function __construct() {       
        $this->europe_countries = ['AT','BE','BG','HR','CY','CZ','DK','EE','FI','FR','DE','GR','HU','IE','IT','LV','LT','LU','MT','NL','PL','PT','RO','SK','SI','ES','SE','GB','IS','NO','CH','TR','UA'];       
    }   

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
     public function claim()
   {
       return view('frontEnd.claim.claim');
   }

   public function missed_connection()
   {

        // $country = Countries::getList('en', 'json');
        // $country=json_decode($country, true);
        // dd($country);

        $airports = Airport::select('name', 'iata_code')->get()->toArray();
        $airport_object = '[';
        foreach ($airports as $airport) {
            $airport_object .= "['".$airport['name']."', '".$airport['iata_code']."'],";
        }
        $airport_object = rtrim($airport_object, ',');
        $airport_object .= ']';

        $airlines = Airline::select('name', 'iata_code')->get()->toArray();
        $airline_object = '[';
        foreach ($airlines as $airline) {
            $airline_object .= "['".$airline['name']."', '".$airline['iata_code']."'],";
        }
        $airline_object = rtrim($airline_object, ',');
        $airline_object .= ']';

        $currencies = Currency::pluck('code','id');


        return view('frontEnd.claim.missed_connection', compact('airport_object', 'airline_object', 'currencies'));
   }

   public function flight_delay()
   {
       return view('frontEnd.claim.flight_delay');
   }

   public function flight_cancellation()
   {
       return view('frontEnd.claim.flight_cancellation');
   }

   public function delay_luggage()
   {
       return view('frontEnd.claim.delay_luggage');
   }

   public function lost_luggage()
   {
       return view('frontEnd.claim.lost_luggage');
   }

   public function denied_boarding()
   {
       return view('frontEnd.claim.denied_boarding');
   }

    /**
    * @param $lat1, $lon1, $lat2, $lon2, $unit=K,M,N
    *
    * @return distance (float)
    */
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
      if (($lat1 == $lat2) && ($lon1 == $lon2)) {
        return 0;
      }else {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
          return round($miles * 1.609344);
        } else if ($unit == "N") {
          return round($miles * 0.8684);
        } else {
          return round($miles);
        }
      }
    }





    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $claims = Claim::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('departed_from_id', 'LIKE', "%$keyword%")
                ->orWhere('final_destination_id', 'LIKE', "%$keyword%")
                ->orWhere('is_direct_flight', 'LIKE', "%$keyword%")
                ->orWhere('selected_connection_id', 'LIKE', "%$keyword%")
                ->orWhere('what_happened_to_the_flight', 'LIKE', "%$keyword%")
                ->orWhere('total_delay', 'LIKE', "%$keyword%")
                ->orWhere('reason', 'LIKE', "%$keyword%")
                ->orWhere('is_rerouted', 'LIKE', "%$keyword%")
                ->orWhere('is_obtain_full_reimbursement', 'LIKE', "%$keyword%")
                ->orWhere('ticket_price', 'LIKE', "%$keyword%")
                ->orWhere('ticket_currency', 'LIKE', "%$keyword%")
                ->orWhere('is_paid_for_rerouting', 'LIKE', "%$keyword%")
                ->orWhere('is_spend_on_accommodation', 'LIKE', "%$keyword%")
                ->orWhere('is_signed_permission', 'LIKE', "%$keyword%")
                ->orWhere('here_from_where', 'LIKE', "%$keyword%")
                ->orWhere('here_from_other', 'LIKE', "%$keyword%")
                ->orWhere('is_contacted_airline', 'LIKE', "%$keyword%")
                ->orWhere('what_happened', 'LIKE', "%$keyword%")
                ->orWhere('correspondence_ids_file', 'LIKE', "%$keyword%")
                ->orWhere('correspondence_travel_doc_file', 'LIKE', "%$keyword%")
                ->orWhere('correspondence_proof_of_expense_file', 'LIKE', "%$keyword%")
                ->orWhere('correspondence_others_file', 'LIKE', "%$keyword%")
                ->orWhere('claim_table_type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $claims = Claim::latest()->paginate($perPage);
        }

        return view('claims.index', compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('claims.create');
    }

    /**
     * Returns id from a name+iata-code Ex. London Dubai Airport (LON)
     *
     * @param string Ex. London Dubai Airport (LON)
     *
     * @return integer Ex. 2
     */
    public function get_airport_id_name_and_iata_code($sting){
        $iata_code =  rtrim(substr($sting, strrpos($sting,"(")+1), ')'); // LON
        return Airport::WHERE('iata_code', $iata_code)->first()->id;
    }
    public function get_airline_id_name_and_iata_code($sting){
        $iata_code =  rtrim(substr($sting, strrpos($sting,"(")+1), ')'); // LON
        return Airline::WHERE('iata_code', $iata_code)->first()->id;
    }
    
    public function store(Request $request)
    {


        $departed_from_id = $this->get_airport_id_name_and_iata_code($request->departed_from);
        $final_destination_id = $this->get_airport_id_name_and_iata_code($request->final_destination);

        if (!isset($request->is_direct_flight)) {
            $is_direct_flight = 0;
        }else{
            $is_direct_flight = $request->is_direct_flight;
        }

        $what_happened_to_the_flight = $request->what_happened_to_the_flight;
        $total_delay = $request->total_delay;
        $reason = $request->reason;


        if (!isset($request->is_rerouted)) {
            $is_rerouted = 0;
        }else{
            $is_rerouted = $request->is_rerouted;
        }

        if (!isset($request->is_obtained_full_reimbursement)) {
            $is_obtain_full_reimbursement = 0;
        }else{
            $is_obtain_full_reimbursement = $request->is_obtained_full_reimbursement;
        }
        $ticket_price = $request->ticket_price_original_ticket;
        $ticket_currency = $request->ticket_currency_original_ticket;


        if (!isset($request->is_paid_for_rerouting)) {
            $is_paid_for_rerouting = 0;
        }else{
            $is_paid_for_rerouting = $request->is_paid_for_rerouting;
        }
        $rerouted_ticket_price = $request->ticket_price_rerouting;
        $rerouted_ticket_currency = $request->ticket_currency_rerouting;

        $email = $request->email_address;
        


        if (!isset($request->is_spend_on_accommodation)) {
            $spend_on_accommodation = 0;
        }else{
            $spend_on_accommodation = $request->is_spend_on_accommodation;
        }

        $here_from_where = $request->here_from_where;
        $is_contacted_airline = $request->is_contacted_airline;
        $what_happened = $request->what_happened;
        $claim_table_type = $request->claim_table_type;



        // create new user
        $user = User::create(
            [
             'name'             => $email,
             'email'            => $email,
             'password'         => Hash::make($request->password)
            ]);


        // create claim
        $claim = new Claim();
        $claim->user_id                                 = $user->id;
        $claim->departed_from_id                        = $departed_from_id;
        $claim->final_destination_id                    = $final_destination_id;
        $claim->is_direct_flight                        = $is_direct_flight;
        $claim->selected_connection_iata_codes          = $request->selected_connection_iata_codes;
        $claim->what_happened_to_the_flight             = $what_happened_to_the_flight;
        $claim->total_delay                             = $total_delay;
        $claim->reason                                  = $reason;
        $claim->is_rerouted                             = $is_rerouted;
        $claim->is_obtain_full_reimbursement            = $is_obtain_full_reimbursement;
        $claim->ticket_price                            = $ticket_price;
        $claim->ticket_currency                         = $ticket_currency;
        $claim->rerouted_ticket_price                   = $rerouted_ticket_price;
        $claim->rerouted_ticket_currency                = $rerouted_ticket_currency;
        $claim->is_paid_for_rerouting                   = $is_paid_for_rerouting;

        $claim->spend_on_accommodation                  = $spend_on_accommodation;
        $claim->here_from_where                         = $here_from_where;
        $claim->is_contacted_airline                    = $is_contacted_airline;
        $claim->what_happened                           = $what_happened;

        $claim->correspondence_ids_file                 = "";
        $claim->correspondence_travel_doc_file          = "";
        $claim->correspondence_proof_of_expense_file    = "";
        $claim->correspondence_others_file              = "";

        $claim->claim_table_type                        = $claim_table_type;
        $claim->save();

        // create connect

        foreach ($request->connection as $con) {
            if ($con != "") {
                $connection             = new Connection();
                $connection->claim_id   = $claim->id;
                $connection->airport_id = $this->get_airport_id_name_and_iata_code($con);
                $connection->save();
            }
        }
        // create passenger
        $cnt = 0;
        foreach ($request->first_name as $single_first_name) {
            if ($single_first_name != "") {
                if ($cnt==0) {
                    $passenger_email = $email;
                }else{
                    $passenger_email = $request->additional_email_address[$cnt];
                }
                $passenger             = new Passenger();
                $passenger->claim_id   = $claim->id;
                $passenger->first_name = $request->first_name[$cnt];
                $passenger->last_name = $request->last_name[$cnt];
                $passenger->address = $request->address[$cnt];
                $passenger->post_code = $request->post_code[$cnt];
                $passenger->date_of_birth = $request->date_of_birth[$cnt];
                $passenger->email = $passenger_email[$cnt];
                $passenger->is_booking_reference = $request->is_booking_reference[$cnt];
                $passenger->booking_refernece = $request->booking_reference_field_input[$cnt];
                $passenger->save();
            }
            $cnt++;
        }
        

        // create ininerary detail
        $cnt = 0;
        foreach ($request->flight_code as $single_flight_code) {
            if ($single_flight_code != "") {
                $itineraryDetail                    = new ItineraryDetail();
                $itineraryDetail->claim_id          = $claim->id;
                $itineraryDetail->flight_number     = $request->flight_number[$cnt];
                $itineraryDetail->flight_segment     = $request->flight_segment[$cnt];
                $itineraryDetail->departure_date    = $request->departure_date[$cnt];
                $itineraryDetail->airline_id        = Airline::where('iata_code', $single_flight_code)->first()->id;
                $itineraryDetail->save();
            }
            $cnt++;
        }

        // create expenses
        $cnt = 0;
        foreach ($request->expense_name as $single_expense_name) {

            $expense                    = new Expense();
            $expense->claim_id          = $claim->id;
            $expense->name              = $request->expense_name[$cnt];
            $expense->amount            = $request->expense_price[$cnt];
            $expense->currency          = $request->expense_currency[$cnt];
            $expense->is_receipt        = $request->expense_is_receipt[$cnt]; 
            $expense->save();

            $cnt++;
        }


        // $this->calculaion($departed_from_id, $final_destination_id);

        return 'Done';

        // return redirect('claims')->with('flash_message', 'Claim added!');
    }


    public function calculaion($departed_from_id, $final_destination_id, $total_delay){

        $departed_from = Airport::WHERE('id', $departed_from_id)->first();
        $final_destination = Airport::WHERE('id', $final_destination_id)->first();

        // stated from Europe
        if (in_array($departed_from->country, $europe_countries)) {

            // europe to europe
            if (in_array($final_destination->country, $europe_countries)) {

                if ($total_delay == "less_than_3_hours") {
                    // *** 
                }else{
                    // ***

                }

            // europe to israel
            }elseif($final_destination->country == "IL"){

            // europe to other country
            }else{

            }


        // started from israel
        }elseif ($final_destination->country == "IL") {
            // israel to europe
            if (in_array($final_destination->country, $europe_countries)) {
              
            // israel to europe
            }else{

            }

        // started from other country
        }else{

            // other country to europe
            if (in_array($final_destination->country, $europe_countries)) {
              

            // other country to israel
            }elseif($final_destination->country == "IL"){

            
            }
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $claim = Claim::findOrFail($id);

        return view('claims.show', compact('claim'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $claim = Claim::findOrFail($id);

        return view('claims.edit', compact('claim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $claim = Claim::findOrFail($id);
        $claim->update($requestData);

        return redirect('claims')->with('flash_message', 'Claim updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Claim::destroy($id);

        return redirect('claims')->with('flash_message', 'Claim deleted!');
    }
}
