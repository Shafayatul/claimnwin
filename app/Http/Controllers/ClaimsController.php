<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Claim;
use App\Airport;
use App\Airline;
use App\Connection;
use Illuminate\Http\Request;

class ClaimsController extends Controller
{
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

        return view('frontEnd.claim.missed_connection', compact('airport_object', 'airline_object'));
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

        if ($request->is_direct_flight == 'is_direct_flight_no') {
            $is_direct_flight = 0;
        }else{
            $is_direct_flight = 1;
        }

        $what_happened_to_the_flight = $request->what_happened_to_the_flight;
        $total_delay = $request->total_delay;
        $reason = $request->reason;

        if ($request->is_rerouted == "is_rerouted_no") {
            $is_rerouted = 0;
        }else{
            $is_rerouted = 1;
        }
        if ($request->is_obtained_full_reimbursement == "is_obtained_full_reimbursement_no") {
            $is_obtained_full_reimbursement = 0;
        }else{
            $is_obtained_full_reimbursement = 1;
        }
        $ticket_price = $request->ticket_price_original_ticket;
        $ticket_currency = $request->ticket_currency_original_ticket;

        if ($request->is_paid_for_rerouting == "is_paid_for_rerouting_yes") {
            $is_paid_for_rerouting = 1;
        }else{
            $is_paid_for_rerouting = 0;
        }
        $rerouted_ticket_price = $request->ticket_price_rerouting;
        $rerouted_ticket_currency = $request->ticket_currency_rerouting;

        $email = $request->email_address;


        // create new user


        // create claim

        // create connect

        // create ininerary detail

        // create expenses



        
// 1. connect table insert
// "connection" => array:1 [▼
// 0 => null
// ]

// 2. demo56_itinerary_details insert
// "airline" => array:1 [▶]
// "flight_code" => array:1 [▶]
// "flight_number" => array:1 [▶]
// "departure_date" => array:1 [▶]

// 3. demo56_expenses
// "expense_name" => array:4 [▶]
// "expense_price" => array:8 [▶]
// "expense_currency" => array:8 [▶]
// "is_receipt_accommodation" => "Yes"
// "is_receipt_transportation" => "Yes"
// "is_receipt_food" => "Yes"
// "is_receipt_others" => "Yes"
// "is_receipt_accommodation_mobile" => "Yes"
// "is_receipt_transportation_mobile" => "Yes"
// "is_receipt_food_mobile" => "Yes"
// "is_receipt_others_mobile" => "Yes"


        // $requestData = $request->all();

        // Claim::create($requestData);

        // return redirect('claims')->with('flash_message', 'Claim added!');
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
