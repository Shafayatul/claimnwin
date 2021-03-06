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
use App\Mail\sendNewEmail;
use Carbon\Carbon;
use App\EmailTemplate;
use PDF;
use App\Mail\CustomerCompose;

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
        if ($request->has('submit')){
            $contact                    = $request->get('contact');
            $subject                    = $request->get('subject');
            $agent                      = $request->get('agent');
            $state                      = $request->get('state');
            $priority                   = $request->get('priority');
            $status                     = $request->get('status');

            $tickets = Ticket::whereNotNull('id');
            if(!empty($contact)){
                $tickets=$tickets->where('from_email',$contact);
            }
            if(!empty($subject)){
                $tickets=$tickets->where('subject',$subject);
            }
            if(!empty($agent)){
                $tickets = $tickets->where('assign_user_id',$agent);
            }
            if(!empty($state)){
                $tickets=$tickets->where('status',$state);
            }
            if(!empty($priority)){
                $tickets=$tickets->where('priority',$priority);
            }
            if(!empty($status)){
                $tickets=$tickets->where('ticket_status',$status);
            }
            $tickets = $tickets->latest()->paginate(100000);
        }else {
        $oClient = new Client([
            'host'          => 'premium39.web-hosting.com',
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => env('MAIL_USERNAME'),
            'password'      => env('MAIL_PASSWORD'),
            'protocol'      => 'imap'
        ]);
        $oClient->connect();
        $aFolder = $oClient->getFolders();
        // dd($aFolder);



        foreach($aFolder as $oFolder){

            //Get all Messages of the current Mailbox $oFolder
            /** @var \Webklex\IMAP\Support\MessageCollection $aMessage */
            $aMessage = $oFolder->getUnseenMessages()->all();


            /** @var \Webklex\IMAP\Message $oMessage */
            foreach($aMessage as $oMessage){
                $to_email   = $oMessage->getTo()[0]->mail;
                $from_email = $oMessage->getFrom()[0]->mail;
                $from_name = $oMessage->getFrom()[0]->personal;
                if (Claim::where('cpanel_email', $to_email)->count() !=0) {
                    $old_claim_id      = Claim::where('cpanel_email', $to_email)->first()->id;
                    $sub = 'Ticket';
                }else{
                    $old_claim_id      = "";
                    $sub = 'Email';
                }

                $imap_msg_no = $oMessage->getUid();


                $sub =$oMessage->getSubject();
                $date = $oMessage->getDate();
                $longMsg=$oMessage->getHTMLBody(true);
                // $textMsg=  $oMessage->getTextBody(true);
                // if (strpos($textMsg, "\r\n") !== false) {
                //     $lines=explode("\r\n", $longMsg)[0];
                // }elseif (strpos($textMsg, "\n") !== false) {
                //     $lines=explode("\n", $longMsg)[0];
                // }elseif (strpos($textMsg, "\r") !== false) {
                //     $lines=explode("\r", $longMsg)[0];
                // }else{
                //     $lines= $textMsg;
                // }
                $ticket                 = new Ticket;
                $ticket->subject        = $sub;
                $ticket->claim_id       = $old_claim_id;
                $ticket->status         = '1';
                $ticket->to_email       = $to_email;
                $ticket->from_email     = $from_email;
                $ticket->from_name      = $from_name;
                $ticket->imap_msg_no    = $imap_msg_no;
                // $ticket->text           = $lines;
                $ticket->email_date     = $date;
                $ticket->save();

                $ticketNote = new TicketNote;
                $ticketNote->ticket_id = $ticket->id;
                $ticketNote->description = $longMsg;
                $ticketNote->save();
            }
        }
        $tickets=Ticket::latest()->paginate($perPage);
        }
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
        Ticket::destroy($id);
        TicketNote::where('ticket_id',$id)->delete();
        return redirect()->back()->with('success', 'Ticket Delete!');
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

    public function claimAjaxCloseTicket(Request $request)
    {
        $id = $request->ticket_id;
        $ticket = Ticket::findOrfail($id);
        $ticket->status = 3;
        $ticket->save();
        return response()->json([
            'msg' => 'Success',
            'ticket' => $ticket
        ]);
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

       $ticketReplySubject = $request->sub;

        $toEmail = $request->to_email;
        $toEmail = explode(',', $toEmail);
        Mail::to($toEmail)->send(new TicketReply($file_names,$composeData,$toEmail,$from_email,$from_name,$ticketReplySubject));
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
        $email_date = substr($ticket->email_date,8,2).'.'.substr($ticket->email_date,5,2).'.'.substr($ticket->email_date,0,4);


        $perPage = 25;
        $imap_msg_no = $ticket->imap_msg_no;
        if($imap_msg_no == null){
            
            $sub            = $ticket->subject;
            $date           = Carbon::parse($ticket->email_date)->format("D, d M Y");
            $time           = Carbon::parse($ticket->email_date)->format("h:i A");
            $from           = $ticket->from_email;
            $to             = $ticket->to_email;
            $from_name      = null;
            $to_name        = null;
            $attachments    = [];
        }else{
        $oClient = new Client([
            'host'          => 'premium39.web-hosting.com',
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => env('MAIL_USERNAME'),
            'password'      => env('MAIL_PASSWORD'),
            // 'username'      =>'rtwh095@freeflightclaim.com',
            // 'password'      => 'olMpHjWv',
            'protocol'      => 'imap'
        ]);
        $oClient->connect();
        $oFolder = $oClient->getFolder('INBOX');
        $aMessage = $oFolder->search()->from($ticket->from_email)->since($email_date)->get();

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

    }
        $users = User::role('Admin')->pluck('email','id');
        return view('tickets.ticket-email-view',compact('ticket_reply','ticket_note','time','ticket','sub','date','from','to','from_name','to_name', 'attachments', 'users'));
    }


    public function singleEmailView($u_id, $email, $date)
    {

        $oClient = new Client([
            'host'          => 'premium39.web-hosting.com',
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => env('MAIL_USERNAME'),
            'password'      => env('MAIL_PASSWORD'),
            // 'username'      =>'rtwh095@freeflightclaim.com',
            // 'password'      => 'olMpHjWv',
            'protocol'      => 'imap'
        ]);
        $oClient->connect();
        $oFolder = $oClient->getFolder('INBOX');
        $aMessage = $oFolder->search()->from($email)->since($date)->get();

        foreach ($aMessage as $oMessage) {
            if ($oMessage->getUid() == $u_id) {
                $attachments = $oMessage->attachments;
                $oMessage = $oFolder->getMessage($u_id);
                $sub = $oMessage->getSubject();
                $longMsg=$oMessage->getHTMLBody(true);
                $date=Carbon::parse($oMessage->getDate())->format("D, d M Y");
                $time = Carbon::parse($oMessage->getDate())->format("h:i A");
                $from = $oMessage->getFrom()[0]->mail;
                $to = $oMessage->getTo()[0]->mail;
                $from_name = $oMessage->getFrom()[0]->personal;
                $to_name = $oMessage->getTo()[0]->personal;
            }
        }

        return view('single-email-view',compact('time','sub','date','from','to','from_name','to_name', 'attachments', 'longMsg'));
    }


    public function ticketReplyView($id)
    {
        $ticket=Ticket::find($id);
        $EmailTemplate = EmailTemplate::all()->pluck('title', 'id');
        $main_email = TicketNote::where('ticket_id', $id)->first()->description;
        // dd($main_email);
        return view('tickets.ticket-email-reply',compact('ticket', 'EmailTemplate', 'main_email'));
    }

    public function newEmail()
    {
        $EmailTemplate = EmailTemplate::all()->pluck('title', 'id');
        return view('new-email',compact('EmailTemplate'));
    }

    public function newEmailSend(Request $request)
    {

        $composeData = $request->ticket_reply_note;

        if($request->hasFile('ticket_reply_files')){
            $files = $request->file('ticket_reply_files');
            // dd($files);
            foreach($files as $file){
                $fileName = uniqid().'.'.$file->getClientOriginalExtension();
                $filePath = 'ticket_reply_files/';
                $fileUrl = $filePath.$fileName;
                $file->move($filePath,$fileName);
                // $file__name[] = $fileName;
                $images[]=$fileUrl;
            }

        }else{
            $images= [];
        }


        $file__names                  = $images;
        $from_email                   = $request->from_email;
        $from_name                    = $request->from_name;
        $userName                     = $request->to_email;
        $customerComposeSubject       = $request->sub;
        $send_email_to_multiple_email = explode(',', $request->to_email);

        Mail::to($send_email_to_multiple_email)->send(new CustomerCompose($file__names,$composeData,$userName,$from_email,$from_name,$customerComposeSubject));

        return redirect()->back()->with('flash_message', 'Email sent!');
    }

    public function fromEmailViewPdf($id)
    {
        $ticket=Ticket::find($id);
        $ticket_note = TicketNote::where('ticket_id',$ticket->id)->first();
        $ticket_reply = TicketReplyEmail::where('ticket_id',$id)->latest()->get();

        $email_date = substr($ticket->email_date,8,2).'.'.substr($ticket->email_date,5,2).'.'.substr($ticket->email_date,0,4);


        $perPage = 25;
        $oClient = new Client([
            'host'          => 'premium39.web-hosting.com',
            'port'          => 993,
            'encryption'    => 'ssl',
            'validate_cert' => true,
            'username'      => env('MAIL_USERNAME'),
            'password'      => env('MAIL_PASSWORD'),
            // 'username'      =>'rtwh095@freeflightclaim.com',
            // 'password'      => 'olMpHjWv',
            'protocol'      => 'imap'
        ]);
        $oClient->connect();
        $oFolder = $oClient->getFolder('INBOX');
        // $aMessage = $oFolder->search()->get();
        $aMessage = $oFolder->search()->whereFrom($ticket->from_email)->whereOn($email_date)->get();
        


        foreach ($aMessage as $oMessage) {
// dd($oMessage);
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

        $pdf = PDF::loadView('pdf.from_email_view',['ticket_note'=>$ticket_note,'time'=>$time,'ticket'=>$ticket,'date'=>$date,'from'=>$from,'to'=>$to,'from_name'=>$from_name]);
        return $pdf->download($from_name.'-email'.'.'.'pdf');

    }

    public function replyEmailViewPdf($id)
    {
        $ticket_reply = TicketReplyEmail::where('ticket_id',$id)->first();
        // $pdf   = PDF::loadView('pdf.reply_email_view',['ticket_reply'=>$ticket_reply])->setPaper('a4', 'landscape')->setWarnings(false);
        // return $pdf->download($ticket_reply->from_name.'-email'.'.'.'pdf');
        return view('pdf.reply_email_view', compact('ticket_reply'));

    }

    public function send_new_email_view()
    {
        $EmailTemplate = EmailTemplate::all()->pluck('title', 'id');
        return view('tickets.send-new-email', compact('EmailTemplate'));
    }

    public function send_new_email(Request $request)
    {
        $composeData = $request->description;
        if($request->hasFile('new_email_files')){
            $files = $request->file('new_email_files');
            // dd($files);
            foreach($files as $file){
                $fileName = uniqid().'.'.$file->getClientOriginalExtension();
                $filePath = 'new-email/';
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

       $subject = $request->sub;

       $toEmail = explode(',', $request->to_email);
        Mail::to($toEmail)->send(new sendNewEmail($file_names,$composeData,$toEmail,$from_email,$from_name,$subject));
        return redirect()->back()->with('success', 'Send Email Successfully');
    }
}
