<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Connection;
use Illuminate\Http\Request;

class ConnectionsController extends Controller
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
            $connections = Connection::where('claim_id', 'LIKE', "%$keyword%")
                ->orWhere('connection', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $connections = Connection::latest()->paginate($perPage);
        }

        return view('connections.index', compact('connections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('connections.create');
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
        
        Connection::create($requestData);

        return redirect('connections')->with('flash_message', 'Connection added!');
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
        $connection = Connection::findOrFail($id);

        return view('connections.show', compact('connection'));
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
        $connection = Connection::findOrFail($id);

        return view('connections.edit', compact('connection'));
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
        
        $connection = Connection::findOrFail($id);
        $connection->update($requestData);

        return redirect('connections')->with('flash_message', 'Connection updated!');
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
        Connection::destroy($id);

        return redirect('connections')->with('flash_message', 'Connection deleted!');
    }
}
