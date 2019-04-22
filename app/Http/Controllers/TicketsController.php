<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ticket;
use Illuminate\Http\Request;
use App\TicketNote;
use Auth;
use App\User;

class TicketsController extends Controller
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
            $tickets = Ticket::where('subject', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tickets = Ticket::latest()->paginate($perPage);
        }
        $user_array = [];
        foreach($tickets as $row){
            if($row->assign_user_id != null){
                array_push($user_array,$row->assign_user_id);
            }
        }
        $assign_users=User::whereIn('id',$user_array)->pluck('email','id');

        $users = User::role('Admin')->pluck('email','id');

        return view('tickets.index', compact('tickets','users','assign_users'));
    }

    public function myTickets(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;
        $id=Auth::user()->id;
        if (!empty($keyword)) {
            $tickets = Ticket::where('subject', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->where('assign_user_id',$id)
                ->latest()->paginate($perPage);
        } else {
            $tickets = Ticket::where('assign_user_id',$id)->latest()->paginate($perPage);
        }

        return view('tickets.my_tickets', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('tickets.create');
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
        $user=Auth::user();
        $requestData = $request->all();
        $roles = $user->getRoleNames();
        if($roles[0] == 'Admin'){
            $ticket = Ticket::create($requestData + ['status' => '2']);
            TicketNote::create(['ticket_id' => $ticket->id, 'description' => $request->description]);
        }else{
            $ticket = Ticket::create($requestData + ['status' => '1']);
            TicketNote::create(['ticket_id' => $ticket->id, 'description' => $request->description]);
        }
        return redirect('tickets')->with('flash_message', 'Ticket added!');
    }


    public function ticketAssignUser(Request $request)
    {
        $ticket_id = $request->ticket_id;
        $ticket = Ticket::find($ticket_id);
        $ticket->assign_user_id = $request->assign_user_id;
        $ticket->save();
        return redirect('tickets')->with('flash_message', 'Assigned Successfully!');
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
            $ticket  = Ticket::findOrFail($id);
        $ticket_notes = TicketNote::where('ticket_id',$ticket->id)->get();
        return view('tickets.show', compact('ticket','ticket_notes'));
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
        $ticket = Ticket::findOrFail($id);

        return view('tickets.edit', compact('ticket'));
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

        $ticket = Ticket::findOrFail($id);
        $ticket->update($requestData);

        return redirect('tickets')->with('flash_message', 'Ticket updated!');
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
        // Ticket::destroy($id);

        // return redirect('tickets')->with('flash_message', 'Ticket deleted!');
        $ticket = Ticket::findOrfail($id);
        $ticket->status = 3;
        $ticket->save();
        return redirect()->back()->with('success', 'Ticket Closed!');
    }

    public function reopenTicket($id)
    {
        $ticket = Ticket::findOrfail($id);
        $ticket->status = 1;
        $ticket->save();
        return redirect()->back()->with('success', 'Ticket opened!');
    }
    public function closeTicket($id)
    {
        $ticket = Ticket::findOrfail($id);
        $ticket->status = 3;
        $ticket->save();
        return redirect()->back()->with('success', 'Ticket Closed!');
    }
}
