<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\TicketNote;
use Illuminate\Http\Request;
use App\Ticket;
use Auth;

use Illuminate\Support\Facades\Mail;
use App\Mail\AdminTicketReply;


class TicketNotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function ticketDescriptionSave(Request $request)
    {
        $requestData = $request->all();

        TicketNote::create($requestData+["user_id"=>Auth::id()]);
        // return redirect('tickets')->with('success', 'TicketNote added!');
        $ticket = Ticket::find($request->ticket_id);
        $ticket->update(['status'=>2]);
        
        return redirect()->back()->with('success', 'TicketNote added!');
    }

    public function claimAjaxTicketDescription(Request $request)
    {
        $ticketnote              = new TicketNote;
        $ticketnote->user_id     = Auth::id();
        $ticketnote->ticket_id   = $request->ticket_id;
        $ticketnote->description = $request->ticket_description;
        $ticketnote->save();

        $ticket = Ticket::find($request->ticket_id);
        $ticket->update(['status'=>2]);

        $ticket_all_note = TicketNote::where('ticket_id', $request->ticket_id)->get();

        Mail::to('info@claimnwin.com')->send(new AdminTicketReply($ticket, $ticketnote));

        return response()->json([
            'msg'        => 'Success',
            'ticketnote' => $ticket_all_note
        ]);
    }



    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $ticketnotes = TicketNote::where('ticket_id', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ticketnotes = TicketNote::latest()->paginate($perPage);
        }

        return view('ticket-notes.index', compact('ticketnotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('ticket-notes.create');
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

        TicketNote::create($requestData);

        return redirect('ticket-notes')->with('flash_message', 'TicketNote added!');
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
        $ticketnote = TicketNote::findOrFail($id);

        return view('ticket-notes.show', compact('ticketnote'));
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
        $ticketnote = TicketNote::findOrFail($id);

        return view('ticket-notes.edit', compact('ticketnote'));
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

        $ticketnote = TicketNote::findOrFail($id);
        $ticketnote->update($requestData);

        return redirect('ticket-notes')->with('flash_message', 'TicketNote updated!');
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
        TicketNote::destroy($id);

        return redirect('ticket-notes')->with('flash_message', 'TicketNote deleted!');
    }
}
