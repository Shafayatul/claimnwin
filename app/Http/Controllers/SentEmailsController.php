<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\SentEmail;
use Illuminate\Http\Request;

class SentEmailsController extends Controller
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
            $sentemails = SentEmail::where('body', 'LIKE', "%$keyword%")
                ->orWhere('claim_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $sentemails = SentEmail::latest()->paginate($perPage);
        }

        return view('sent-emails.index', compact('sentemails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('sent-emails.create');
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
        
        SentEmail::create($requestData);

        return redirect('sent-emails')->with('flash_message', 'SentEmail added!');
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
        $sentemail = SentEmail::findOrFail($id);

        return view('sent-emails.show', compact('sentemail'));
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
        $sentemail = SentEmail::findOrFail($id);

        return view('sent-emails.edit', compact('sentemail'));
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
        
        $sentemail = SentEmail::findOrFail($id);
        $sentemail->update($requestData);

        return redirect('sent-emails')->with('flash_message', 'SentEmail updated!');
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
        SentEmail::destroy($id);

        return redirect('sent-emails')->with('flash_message', 'SentEmail deleted!');
    }
}
