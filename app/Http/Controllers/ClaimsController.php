<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Claim;
use App\Airport;
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
        return view('frontEnd.claim.missed_connection', compact('airport_object'));
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
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {

        $requestData = $request->all();

        Claim::create($requestData);

        return redirect('claims')->with('flash_message', 'Claim added!');
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
