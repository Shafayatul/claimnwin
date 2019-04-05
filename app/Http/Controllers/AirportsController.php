<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Airport;
use Illuminate\Http\Request;
use Auth;
use Session;
use Countries;

class AirportsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $name          = $request->get('name');
        $country       = $request->get('country');
        $iata_code     = $request->get('iata_code');
        $icao_code     = $request->get('icao_code');
        $municipality  = $request->get('municipality');
        $type          = $request->get('type');

        $perPage = 25;

        if ((!empty($name)) || (!empty($country)) || (!empty($iata_code)) || (!empty($icao_code)) || (!empty($municipality)) || (!empty($type))) {
/*            $airports = Airport::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('iata_code', 'LIKE', "%$keyword%")
                ->orWhere('icao_code', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('municipality', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('latitude', 'LIKE', "%$keyword%")
                ->orWhere('longitude', 'LIKE', "%$keyword%")
                ->orWhere('home_link', 'LIKE', "%$keyword%")
                ->orWhere('wikipedia_link', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);*/
            $airports = Airport::whereNotNull('id');
            if(!empty($name)){
                $airports = $airports->Where('name', 'LIKE', "%$name%");
            }
            if(!empty($country)){
                $airports = $airports->Where('country', 'LIKE', "%$country%");
            }
            if(!empty($iata_code)){
                $airports = $airports->Where('iata_code', 'LIKE', "%$iata_code%");
            }
            if(!empty($icao_code)){
                $airports = $airports->Where('icao_code', 'LIKE', "%$icao_code%");
            }
            if(!empty($municipality)){
                $airports = $airports->Where('municipality', 'LIKE', "%$municipality%");
            }
            if(!empty($type)){
                $airports = $airports->Where('type', 'LIKE', "%$type%");
            }
            // dd($airports);
            $airports = $airports->latest()->paginate($perPage);


        } else {
            $airports = Airport::latest()->paginate($perPage);
        }

        $country = Countries::getList('en', 'json');
        $country=json_decode($country, true);

        return view('airports.index', compact('airports', 'country'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $country = Countries::getList('en', 'json');
        $country=json_decode($country, true);
        // dd($country);
        return view('airports.create',compact('country'));
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

        Airport::create($requestData + ['user_id' => Auth::user()->id]);

        return redirect('airports/create')->with('success', 'Airport added!');
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
        $airport = Airport::findOrFail($id);
        $country = Countries::getList('en', 'json');
        $country=json_decode($country, true);
        return view('airports.show', compact('airport','country'));
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
        $airport = Airport::findOrFail($id);
        $country = Countries::getList('en', 'json');
        $country=json_decode($country, true);
        return view('airports.edit', compact('airport','country'));
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

        $airport = Airport::findOrFail($id);
        $airport->update($requestData);

        return redirect('airports')->with('success', 'Airport updated!');
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
        Airport::destroy($id);

        return redirect('airports')->with('success', 'Airport deleted!');
    }
}
