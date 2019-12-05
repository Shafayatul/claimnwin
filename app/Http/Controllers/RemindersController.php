<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Reminder;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;

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
    public function claimAjaxReminderCreate(Request $request)
    {
        $id = $request->claim_id;

        if($id != null){
            $requestData = $request->all();
            $insert_reminder = Reminder::create($requestData + ['user_id' => Auth::user()->id] + ['status' => 'Reminders']);
        }

        $reminder                 = Reminder::where('id', $insert_reminder->id)->first();

        $reminder_claims          = DB::table('claims')->where('id',$reminder->claim_id)->first();
        $flightDetails            = DB::table('itinerary_details')->where('claim_id',$reminder_claims->id)->where('is_selected','1')->first();
        $airline                  = DB::table('airlines')->where('id',$flightDetails->airline_id)->first();
        $passengers               = DB::table('passengers')->where('claim_id',$reminder_claims->id)->get();
        $reminderDeparted         = DB::table('airports')->where('id',$reminder_claims->departed_from_id)->first();
        $reminderfinalDestination = DB::table('airports')->where('id',$reminder_claims->final_destination_id)->first();


        return response()->json([
            'msg'                      => 'Success',
            'reminder'                 => $reminder,
            'reminder_claims'          => $reminder_claims,
            'flightDetails'            => $flightDetails,
            'airline'                  => $airline,
            'passengers'               => $passengers,
            'reminderDeparted'         => $reminderDeparted,
            'reminderfinalDestination' => $reminderfinalDestination
        ]);
    }


    public function store(Request $request)
    {
        $id = $request->claim_id;
        $requestData = $request->all();
        Reminder::create($requestData + ['user_id' => Auth::user()->id] + ['status' => 'Reminders']);
        return redirect('/claim-view/'.$id)->with('success', 'Reminder added!');
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
    public function claimAjaxReminderUpdate(Request $request)
    {
        $id                          = $request->reminder_id;
        $reminder_old                = Reminder::findOrFail($id);
        $reminder_old->user_id       = Auth::user()->id;
        $reminder_old->claim_id      = $reminder_old->claim_id;
        $reminder_old->callback_date = $request->callback_date;
        $reminder_old->callback_time = $request->callback_time;
        $reminder_old->note          = $request->note;
        $reminder_old->snooze        = $reminder_old->snooze;
        $reminder_old->status        = $reminder_old->status;
        $reminder_old->save();

        $reminder_claims          = DB::table('claims')->where('id',$reminder_old->claim_id)->first();
        $flightDetails            = DB::table('itinerary_details')->where('claim_id',$reminder_claims->id)->where('is_selected','1')->first();
        $airline                  = DB::table('airlines')->where('id',$flightDetails->airline_id)->first();
        $passengers               = DB::table('passengers')->where('claim_id',$reminder_claims->id)->get();
        $reminderDeparted         = DB::table('airports')->where('id',$reminder_claims->departed_from_id)->first();
        $reminderfinalDestination = DB::table('airports')->where('id',$reminder_claims->final_destination_id)->first();


        return response()->json([
            'msg'                      => 'Success',
            'reminder'                 => $reminder_old,
            'reminder_claims'          => $reminder_claims,
            'flightDetails'            => $flightDetails,
            'airline'                  => $airline,
            'passengers'               => $passengers,
            'reminderDeparted'         => $reminderDeparted,
            'reminderfinalDestination' => $reminderfinalDestination
        ]);
    }


    public function update(Request $request)
    {
        $requestData = $request->all();
        $id = $request->id;
        $reminder = Reminder::findOrFail($id);
        $reminder->update($requestData + ['user_id' => Auth::user()->id]);
        return redirect()->back()->with('success', 'Reminder updated!');
    }

    public function reminderStatusDismiss($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->status = 'Dismiss';
        $reminder->save();
        return redirect('/claim-view/'.$reminder->claim_id)->with('success','Reminder Status Updated');
    }

    public function claimAjaxReminderDismiss(Request $request)
    {
        $id = $request->reminder_id;
        $reminder = Reminder::findOrFail($id);
        $reminder->status = 'Dismiss';
        $reminder->save();
        return response()->json([
            'msg' => 'Success',
            'reminder' => $reminder
        ]);
    }

    public function claimAjaxReminderMarkAsDone(Request $request)
    {
        $id = $request->reminder_id;
        $reminder = Reminder::findOrFail($id);
        $reminder->status = 'Mark as done';
        $reminder->save();
        return response()->json([
            'msg' => 'Success',
            'reminder' => $reminder
        ]);
    }

    public function reminderStatusMarkasdone($id)
    {
        $reminder = Reminder::findOrFail($id);
        $reminder->status = 'Mark as done';
        $reminder->save();
        return redirect('/claim-view/'.$reminder->claim_id)->with('success','Reminder Status Updated');
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

        return redirect()->back()->with('success', 'Reminder deleted!');
    }

    public function claimAjaxReminderDelete(Request $request){
        $id = $request->reminder_id;
        Reminder::destroy($id);
        return response()->json([
            'msg' => 'Success'
        ]);
    }
}
