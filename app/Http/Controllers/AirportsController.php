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
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $airports = Airport::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('iata_code', 'LIKE', "%$keyword%")
                ->orWhere('three_digit_code', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('continent', 'LIKE', "%$keyword%")
                ->orWhere('sub_continent', 'LIKE', "%$keyword%")
                ->orWhere('latitude', 'LIKE', "%$keyword%")
                ->orWhere('longitude', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
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
