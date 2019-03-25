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
use App\Airline;
use App\Expense;
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
            $is_obtain_full_reimbursement = 0;
        }else{
            $is_obtain_full_reimbursement = 1;
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
        

        if (isset($request->is_spend_on_accommodation)) {
            $spend_on_accommodation = $request->is_spend_on_accommodation;
        }else{
            $spend_on_accommodation = 'I did not spend anything';
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

        // create ininerary detail
        $cnt = 0;
        foreach ($request->flight_code as $single_flight_code) {
            if ($single_flight_code != "") {
                $itineraryDetail                    = new ItineraryDetail();
                $itineraryDetail->claim_id          = $claim->id;
                $itineraryDetail->flight_number     = $request->flight_number[$cnt];
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

        return 'Done';

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
