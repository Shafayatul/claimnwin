<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\ClaimStatus;
use Illuminate\Http\Request;

class ClaimStatusController extends Controller
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
            $claimstatus = ClaimStatus::where('name', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->paginate($perPage);
        } else {
            $claimstatus = ClaimStatus::paginate($perPage);
        }

        return view('claim-status.index', compact('claimstatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('claim-status.create');
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

        ClaimStatus::create($requestData);

        return redirect('/claim-status/create')->with('success', 'ClaimStatus added!');
    }

    public function claimAjaxStatusStore(Request $request)
    {
        $claimstatus              = new ClaimStatus;
        $claimstatus->name        = $request->status_name;
        $claimstatus->description = $request->status_description;
        $claimstatus->save();
        
        return response()->json([
            'msg' => 'Success',
            'claim_status' => $claimstatus
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
        $claimstatus = ClaimStatus::findOrFail($id);

        return view('claim-status.show', compact('claimstatus'));
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
        $claimstatus = ClaimStatus::findOrFail($id);

        return view('claim-status.edit', compact('claimstatus'));
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

        $claimstatus = ClaimStatus::findOrFail($id);
        $claimstatus->update($requestData);

        return redirect('claim-status')->with('success', 'ClaimStatus updated!');
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
        ClaimStatus::destroy($id);

        return redirect('claim-status')->with('success', 'ClaimStatus deleted!');
    }
}
