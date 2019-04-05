<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Airline;
use Illuminate\Http\Request;
use Countries;

class AirlinesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $name       = $request->get('name');
        $alias      = $request->get('alias');
        $iata_code  = $request->get('iata_code');
        $icao_code  = $request->get('icao_code');
        $email      = $request->get('email');
        $phone      = $request->get('phone');
        $country    = $request->get('country');
        $status     = $request->get('status');
        $perPage = 25;

        if ((!empty($name)) || (!empty($alias)) || (!empty($iata_code)) || (!empty($icao_code)) || (!empty($email)) || (!empty($phone)) || (!empty($country)) || (!empty($status))) {
/*
            $airlines = Airline::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('iata_code', 'LIKE', "%$keyword%")
                ->orWhere('icao_code', 'LIKE', "%$keyword%")
                ->orWhere('country', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('address_line_1', 'LIKE', "%$keyword%")
                ->orWhere('address_line_2', 'LIKE', "%$keyword%")
                ->orWhere('address_line_3', 'LIKE', "%$keyword%")
                ->orWhere('address_line_4', 'LIKE', "%$keyword%")
                ->orWhere('online_form_link', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('alias', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
*/
            $airlines = Airline::whereNotNull('id');

            if(!empty($name)){
                $airlines = $airlines->Where('name', 'LIKE', "%$name%");
            }
            if(!empty($alias)){
                $airlines = $airlines->Where('alias', 'LIKE', "%$alias%");
            }
            if(!empty($iata_code)){
                $airlines = $airlines->Where('iata_code', 'LIKE', "%$iata_code%");
            }
            if(!empty($icao_code)){
                $airlines = $airlines->Where('icao_code', 'LIKE', "%$icao_code%");
            }
            if(!empty($email)){
                $airlines = $airlines->Where('email', 'LIKE', "%$email%");
            }
            if(!empty($phone)){
                $airlines = $airlines->Where('phone', 'LIKE', "%$phone%");
            }
            if(!empty($country)){
                $airlines = $airlines->Where('country', 'LIKE', "%$country%");
            }

            $airlines = $airlines->Where('status', $status)->latest()->paginate($perPage);

        } else {
            $airlines = Airline::latest()->paginate($perPage);
        }
        $country = Countries::getList('en', 'json');
        $country=json_decode($country, true);
        return view('airlines.index', compact('country','airlines'));
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
        return view('airlines.create',compact('country'));
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

        Airline::create($requestData + ['user_id' => Auth::user()->id]);

        return redirect('airlines/create')->with('success', 'Airline added!');
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
        $airline = Airline::findOrFail($id);
        $country = Countries::getList('en', 'json');
        $country=json_decode($country, true);
        return view('airlines.show', compact('airline','country'));
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
        $airline = Airline::findOrFail($id);
        $country = Countries::getList('en', 'json');
        $country=json_decode($country, true);
        return view('airlines.edit', compact('airline','country'));
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

        $airline = Airline::findOrFail($id);
        $airline->update($requestData);

        return redirect('airlines')->with('success', 'Airline updated!');
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
        Airline::destroy($id);

        return redirect('airlines')->with('success', 'Airline deleted!');
    }
}
