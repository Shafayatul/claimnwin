<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Passenger;
use Illuminate\Http\Request;

class PassengersController extends Controller
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
            $passengers = Passenger::where('claim_id', 'LIKE', "%$keyword%")
                ->orWhere('first_name', 'LIKE', "%$keyword%")
                ->orWhere('last_name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('post_code', 'LIKE', "%$keyword%")
                ->orWhere('date_of_birth', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('is_booking_reference', 'LIKE', "%$keyword%")
                ->orWhere('booking_refernece', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $passengers = Passenger::latest()->paginate($perPage);
        }

        return view('passengers.index', compact('passengers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('passengers.create');
    }
    public function create_from_claim($claim_id)
    {
        return view('passengers.create', compact('claim_id'));
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
        
        Passenger::create($requestData);

        return redirect('/claim-view/'.$request->input('claim_id'))->with('flash_message', 'Passenger added!');
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
        $passenger = Passenger::findOrFail($id);

        return view('passengers.show', compact('passenger'));
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
        $passenger = Passenger::findOrFail($id);

        return view('passengers.edit', compact('passenger'));
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
        
        $passenger = Passenger::findOrFail($id);
        $passenger->update($requestData);
        return redirect()->back()->with('success', 'Passenger updated!');
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
        Passenger::destroy($id);

        return redirect('passengers')->with('flash_message', 'Passenger deleted!');
    }
}
