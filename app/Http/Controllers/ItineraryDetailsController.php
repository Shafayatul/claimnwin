<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ItineraryDetail;
use Illuminate\Http\Request;

class ItineraryDetailsController extends Controller
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
            $itinerarydetails = ItineraryDetail::where('claim_id', 'LIKE', "%$keyword%")
                ->orWhere('airline', 'LIKE', "%$keyword%")
                ->orWhere('flight_number', 'LIKE', "%$keyword%")
                ->orWhere('departure_date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $itinerarydetails = ItineraryDetail::latest()->paginate($perPage);
        }

        return view('itinerary-details.index', compact('itinerarydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('itinerary-details.create');
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
        
        ItineraryDetail::create($requestData);

        return redirect('itinerary-details')->with('flash_message', 'ItineraryDetail added!');
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
        $itinerarydetail = ItineraryDetail::findOrFail($id);

        return view('itinerary-details.show', compact('itinerarydetail'));
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
        $itinerarydetail = ItineraryDetail::findOrFail($id);

        return view('itinerary-details.edit', compact('itinerarydetail'));
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
        
        $itinerarydetail = ItineraryDetail::findOrFail($id);
        $itinerarydetail->update($requestData);

        return redirect('itinerary-details')->with('flash_message', 'ItineraryDetail updated!');
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
        ItineraryDetail::destroy($id);

        return redirect('itinerary-details')->with('flash_message', 'ItineraryDetail deleted!');
    }
}
