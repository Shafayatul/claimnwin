<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Ticket;
use Illuminate\Http\Request;
use App\TicketNote;
use Auth;
use App\User;
use App\Claim;
use Webklex\IMAP\Client;
// use Illuminate\Foundation\Console\PackageDiscoverCommand;
use App\TicketReplyEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\TicketReply;
use Carbon\Carbon;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function ticketInbox(Request $request)
    {
        $perPage = 25;
        $oClient = new Client([
            'host'          => 'premium39.web-hosting.com',
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => 'info@freeflightclaim.com',
            'password'      => 'oKwGE2vzcOYt',
            // 'username'      =>'rtwh095@freeflightclaim.com',
            // 'password'      => 'olMpHjWv',
            'protocol'      => 'imap'
        ]);
        $oClient->connect();
        $aFolder = $oClient->getFolders();



        foreach($aFolder as $oFolder){

            //Get all Messages of the current Mailbox $oFolder
            /** @var \Webklex\IMAP\Support\MessageCollection $aMessage */
            $aMessage = $oFolder->getUnseenMessages()->all();

            /** @var \Webklex\IMAP\Message $oMessage */
            foreach($aMessage as $oMessage){

                $to_email   = $oMessage->getTo()[0]->mail;
                $from_email = $oMessage->getFrom()[0]->mail;
                if (Claim::where('cpanel_email', $to_email)->count() !=0) {
                    $old_claim_id      = Claim::where('cpanel_email', $to_email)->first()->id;
                }else{
                    $old_claim_id      = "";
                }

                $imap_msg_no = $oMessage->getUid();


                $sub =$oMessage->getSubject();
                $date = $oMessage->getDate();
                $longMsg=$oMessage->getHTMLBody(true);
                $textMsg=  str_replace(array("\n", "\r"), '',$oMessage->getTextBody(true));
                $lines=explode("\n", $longMsg);

                $ticket                 = new Ticket;
                $ticket->subject        = $sub;
                $ticket->claim_id       = $old_claim_id;
                $ticket->status         = '1';
                $ticket->to_email       = $to_email;
                $ticket->from_email     = $from_email;
                $ticket->imap_msg_no    = $imap_msg_no;

                $ticket->text           = $textMsg;
                $ticket->email_date     = $date;
                $ticket->save();

                $ticketNote = new TicketNote;
                $ticketNote->ticket_id = $ticket->id;
                $ticketNote->description = $longMsg;
                $ticketNote->save();
            }
        }
        $tickets=Ticket::latest()->paginate($perPage);
        $user_array = [];
        foreach($tickets as $row){
            if($row->assign_user_id != null){
                array_push($user_array,$row->assign_user_id);
            }
        }
        $assign_users=User::whereIn('id',$user_array)->pluck('email','id');

        $users = User::role('Admin')->pluck('email','id');

        return view('tickets.ticket-inbox', compact('tickets','users','assign_users'));
    }

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



    public function ajax_ticket_priority(Request $request)
    {
        $ticket_id = $request->ticket_id;
        $ticket = Ticket::find($ticket_id);
        $ticket->priority = $request->priority;
        $ticket->save();
        return response()->json([
            'msg' => 'Success'
        ]);
    }


    public function ajax_ticket_ticket_status(Request $request)
    {
        $ticket_id = $request->ticket_id;
        $ticket = Ticket::find($ticket_id);
        $ticket->ticket_status = $request->ticket_status;
        $ticket->save();
        return response()->json([
            'msg' => 'Success'
        ]);
    }




    public function ajax_ticket_assign(Request $request)
    {
        $ticket_id = $request->ticket_id;
        $ticket = Ticket::find($ticket_id);
        $ticket->assign_user_id = $request->assign_user_id;
        $ticket->save();
        return response()->json([
            'msg' => 'Success'
        ]);
    }

    public function ticketAssignUser(Request $request)
    {
        $ticket_id = $request->ticket_id;
        $ticket = Ticket::find($ticket_id);
        $ticket->assign_user_id = $request->assign_user_id;
        $ticket->save();
        return redirect()->back()->with('flash_message', 'Assigned Successfully!');
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

    public function ticketReplyDataSave(Request $request)
    {

        $composeData = $request->ticket_reply_note;

        if($request->hasFile('ticket_reply_files')){
            $files = $request->file('ticket_reply_files');
            // dd($files);
            foreach($files as $file){
                $fileName = uniqid().'.'.$file->getClientOriginalExtension();
                $filePath = 'ticket_reply_file/';
                $fileUrl = $filePath.$fileName;
                $file->move($filePath,$fileName);
                // $file__name[] = $fileName;
                $images[]=$fileUrl;
            }

        }else{
            $images= [];
        }
        $file_names =$images;

       $from_email  = $request->from_email;
       $from_name   = $request->from_name;


        $toEmail = $request->to_email;
        Mail::to($toEmail)->send(new TicketReply($file_names,$composeData,$toEmail,$from_email,$from_name));
        $file = new TicketReplyEmail;
        $file->ticket_reply_note    = $request->ticket_reply_note;
        $file->from_email           = $request->from_email;
        $file->from_name            = $request->from_name;
        $file->to_email             = $request->to_email;
        $file->ticket_id            = $request->ticket_id;
        $file->sub                  = $request->sub;
        $file->ticket_reply_files   = implode("|",$images);
        $file->save();

        $ticketNote = new TicketNote;
        $ticketNote->ticket_id      = $request->ticket_id;
        $ticketNote->description    = $request->ticket_reply_note;
        $ticketNote->save();
        return redirect('/tickets-inbox')->with('success','Sent Email Successfully!');
    }

    public function ticketSingleEmailView($id)
    {


        $ticket=Ticket::find($id);
        $ticket_note = TicketNote::where('ticket_id',$ticket->id)->first();
        $ticket_reply = TicketReplyEmail::where('ticket_id',$id)->latest()->get();

        $perPage = 25;
        $oClient = new Client([
            'host'          => 'premium39.web-hosting.com',
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => 'info@freeflightclaim.com',
            'password'      => 'oKwGE2vzcOYt',
            // 'username'      =>'rtwh095@freeflightclaim.com',
            // 'password'      => 'olMpHjWv',
            'protocol'      => 'imap'
        ]);
        $oClient->connect();
        // $oFolder = $oClient->getFolder('INBOX');

        $oFolder = $oClient->getFolder('INBOX');
        // $aMessage = $oFolder->search()->text('sdf sadf sdf sdfsada')->get();
        $aMessage = $oFolder->search()->text($ticket->text)->get();
        foreach ($aMessage as $oMessage) {
            if ($oMessage->getUid() == $ticket->imap_msg_no) {
                $attachments = $oMessage->attachments;
                $oMessage = $oFolder->getMessage($ticket->imap_msg_no);
                $sub = $oMessage->getSubject();
                $date=Carbon::parse($oMessage->getDate())->format("D, d M Y");
                $time = Carbon::parse($oMessage->getDate())->format("h:i A");
                $from = $oMessage->getFrom()[0]->mail;
                $to = $oMessage->getTo()[0]->mail;
                $from_name = $oMessage->getFrom()[0]->personal;
                $to_name = $oMessage->getTo()[0]->personal;
            }
        }
// dd($attachments);
        return view('tickets.ticket-email-view',compact('ticket_reply','ticket_note','time','ticket','sub','date','from','to','from_name','to_name', 'attachments'));
    }

    public function ticketReplyView($id)
    {
        $ticket=Ticket::find($id);
        return view('tickets.ticket-email-reply',compact('ticket'));
    }
}
