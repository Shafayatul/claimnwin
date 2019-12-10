<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Airline;
use App\Flight;
use Illuminate\Http\Request;
use Auth;

class FlightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        $airline = Airline::orderBy('name', 'asc')->get()->pluck('name', 'id');

        if (!empty($keyword)) {
            $flights = Flight::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('flight_no', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('scheduled_departure_time_and_date', 'LIKE', "%$keyword%")
                ->orWhere('actual_departure_time_and_date', 'LIKE', "%$keyword%")
                ->orWhere('scheduled_arrival_time_and_date', 'LIKE', "%$keyword%")
                ->orWhere('actual_arrival_time_and_date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $flights = Flight::latest()->paginate($perPage);
        }

        return view('flights.index', compact('flights', 'airline'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $airline = Airline::orderBy('name', 'asc')->get()->pluck('name', 'id');
        return view('flights.create', compact('airline'));
    }
    public function create_from_claim($claim_id, $airline_id, $flight_number, $date)
    {
        $airline = Airline::orderBy('name', 'asc')->get()->pluck('name', 'id');
        return view('flights.create-from-claim', compact('airline', 'claim_id', 'airline_id', 'flight_number', 'date'));
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

        Flight::create($requestData + ['user_id' => Auth::user()->id]);

        if ($request->input('claim_id') != '') {
            return redirect('claim-view/'.$request->input('claim_id'))->with('success', 'Flight added!');
        }else{
            return redirect('flights/create')->with('success', 'Flight added!');
        }

        
    }

    public function claimAjaxTimeUpdateForClaim(Request $request)
    {
        $flight                                    = Flight::where('flight_no', $request->flight_no)->first();
        $flight->user_id                           = Auth::user()->id;
        $flight->airline_id                        = $request->airline_id;
        $flight->flight_no                         = $request->flight_no;
        $flight->scheduled_departure_time_and_date = $request->scheduled_departure_time_and_date;
        $flight->actual_departure_time_and_date    = $request->actual_departure_time_and_date;
        $flight->scheduled_arrival_time_and_date   = $request->scheduled_arrival_time_and_date;
        $flight->actual_arrival_time_and_date      = $request->actual_arrival_time_and_date;
        $flight->save();
        return response()->json([
            'msg' => 'Success',
            'flight' => $flight
        ]);
    }

    public function claimAjaxTimeSetForClaim(Request $request)
    {
        $flight                                    = new Flight;
        $flight->user_id                           = Auth::user()->id;
        $flight->airline_id                        = $request->airline_id;
        $flight->flight_no                         = $request->flight_no;
        $flight->scheduled_departure_time_and_date = $request->scheduled_departure_time_and_date;
        $flight->actual_departure_time_and_date    = $request->actual_departure_time_and_date;
        $flight->scheduled_arrival_time_and_date   = $request->scheduled_arrival_time_and_date;
        $flight->actual_arrival_time_and_date      = $request->actual_arrival_time_and_date;
        $flight->save();
        return response()->json([
            'msg' => 'Success',
            'flight' => $flight
        ]);
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
        $flight = Flight::findOrFail($id);

        return view('flights.show', compact('flight'));
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
        $airline = Airline::orderBy('name', 'asc')->get()->pluck('name', 'id');
        $flight = Flight::findOrFail($id);

        return view('flights.edit', compact('flight', 'airline'));
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

        $flight = Flight::findOrFail($id);
        $flight->update($requestData);

        return redirect()->back()->with('success', 'Flight updated!');
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
        Flight::destroy($id);

        return redirect('flights')->with('success', 'Flight deleted!');
    }
}
