<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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

        if (!empty($keyword)) {
            $flights = Flight::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('flight_no', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->orWhere('scheduled_departure_time', 'LIKE', "%$keyword%")
                ->orWhere('actual_departure_time_and_date', 'LIKE', "%$keyword%")
                ->orWhere('scheduled_arrival_time_and_date', 'LIKE', "%$keyword%")
                ->orWhere('actual_arrival_time_and_date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $flights = Flight::latest()->paginate($perPage);
        }

        return view('flights.index', compact('flights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('flights.create');
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

        return redirect('flights/create')->with('success', 'Flight added!');
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
        $flight = Flight::findOrFail($id);

        return view('flights.edit', compact('flight'));
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

        return redirect('flights')->with('success', 'Flight updated!');
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
