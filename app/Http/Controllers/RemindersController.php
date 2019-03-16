<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reminder;
use Illuminate\Http\Request;
use Auth;

class RemindersController extends Controller
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
            $reminders = Reminder::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('claim_id', 'LIKE', "%$keyword%")
                ->orWhere('callback_date', 'LIKE', "%$keyword%")
                ->orWhere('callback_time', 'LIKE', "%$keyword%")
                ->orWhere('note', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('snooze', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $reminders = Reminder::latest()->paginate($perPage);
        }

        return view('reminders.index', compact('reminders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('reminders.create');
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

        Reminder::create($requestData + ['user_id' => Auth::user()->id]);

        return redirect('reminders')->with('success', 'Reminder added!');
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
        $reminder = Reminder::findOrFail($id);

        return view('reminders.show', compact('reminder'));
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
        $reminder = Reminder::findOrFail($id);

        return view('reminders.edit', compact('reminder'));
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

        $reminder = Reminder::findOrFail($id);
        $reminder->update($requestData + ['user_id' => Auth::user()->id]);

        return redirect('reminders')->with('success', 'Reminder updated!');
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
        Reminder::destroy($id);

        return redirect('reminders')->with('success', 'Reminder deleted!');
    }
}
