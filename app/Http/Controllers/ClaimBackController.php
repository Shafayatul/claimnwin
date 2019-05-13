<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Note;
use App\Reminder;
use App\Claim;
use App\Ticket;
use App\TicketNote;
use App\Airport;
use App\Passenger;
use App\ItineraryDetail;
use DB;
use Carbon\Carbon;
use App\Airline;
use App\ClaimStatus;
use App\NextStep;
use App\BankAccount;
use App\Setting;
use App\User;
use App\Flight;
use File;
use App\ClaimFile;
use Auth;
use App\SentEmail;
use Webklex\IMAP\Client;
use App\Expense;
use App\affiliate_notes;
use Illuminate\Support\Facades\Mail;
use App\Mail\ClaimClosed;
use App\Currency;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\CustomerComposerFile;
use App\AirlineComposeFile;
use App\Mail\CustomerCompose;
use App\Mail\AirlineCompose;
use App\Mail\AirlineReply;
use App\Mail\CustomerReply;

class ClaimBackController extends Controller
{

    public function index_report(Request $request)
    {

        $s_airline        = $request->get('s_airline');
        $s_claim_status    = $request->get('s_claim_status');
        $s_starting_date   = $request->get('s_starting_date');
        $s_end_date        = $request->get('s_end_date');
        if ((!empty($s_airline)) || (!empty($s_claim_status)) || (!empty($s_starting_date)) || (!empty($s_end_date))) {
            $claims = Claim::whereNotNull('id');
            if(!empty($s_airline)){
                $airline_id = Airline::where('name', $s_airline)->first()->id;
                $claims = $claims->Where('airline_id', $airline_id);
            }
            if(!empty($s_claim_status)){
                $claims = $claims->Where('claim_status_id', $s_claim_status);
            }
            if(!empty($s_starting_date)){
                $claims = $claims->Where('created_at', '>=', $s_starting_date.' 00:00:00');
            }
            if(!empty($s_end_date)){
                $claims = $claims->Where('created_at', '<=', $s_end_date.' 00:00:00');
            }
            $claims = $claims->latest()->paginate(15);

        }else{
            $claims = Claim::latest()->paginate(15);
        }


        $claim_id_array = [];
        $user_id_array = [];
        $airline_id_array = [];
        foreach($claims as $claim){
            array_push($claim_id_array, $claim->id);
            array_push($user_id_array, $claim->user_id);
            array_push($airline_id_array, $claim->airline_id);
        }

        $user_id_array = array_unique($user_id_array);
        $user_all = User::whereIn('id', $user_id_array)->pluck('name', 'id');
        $airlines = Airline::whereIn('id', $airline_id_array)->pluck('name', 'id');


        $claim_status=ClaimStatus::pluck('name', 'id');

        return view('claim.report',compact('claims', 'user_all', 'claim_status', 'airlines'));
    }



    public function index_affiliate(Request $request)
    {

        $s_claim_id        = $request->get('s_claim_id');
        $s_claim_status    = $request->get('s_claim_status');
        $s_starting_date   = $request->get('s_starting_date');
        $s_end_date        = $request->get('s_end_date');
        if ((!empty($s_claim_id)) || (!empty($s_claim_status)) || (!empty($s_starting_date)) || (!empty($s_end_date))) {
            $claims = Claim::whereNotNull('id');
            if(!empty($s_claim_id)){
                $claims = $claims->Where('id', $s_claim_id);
            }
            if(!empty($s_claim_status)){
                $claims = $claims->Where('claim_status_id', $s_claim_status);
            }
            if(!empty($s_starting_date)){
                $claims = $claims->Where('created_at', '>=', $s_starting_date.' 00:00:00');
            }
            if(!empty($s_end_date)){
                $claims = $claims->Where('created_at', '<=', $s_end_date.' 00:00:00');
            }
            $claims = $claims->where('is_deleted',0)->whereNotNull('affiliate_user_id')->latest()->paginate(10);

        }else{
            $claims = Claim::where('is_deleted',0)->whereNotNull('affiliate_user_id')->latest()->paginate(10);
        }





        $claim_id_array = [];
        $user_id_array = [];
        foreach($claims as $claim){
            array_push($claim_id_array, $claim->id);
            array_push($user_id_array, $claim->user_id);
            array_push($user_id_array, $claim->affiliate_user_id);
        }

        $user_id_array = array_unique($user_id_array);
        $user_all = User::whereIn('id', $user_id_array)->pluck('email', 'id');

        $claim_status=ClaimStatus::pluck('name', 'id');

        $itineraryDetail = ItineraryDetail::whereIn('claim_id', $claim_id_array)->pluck('airline_id','claim_id')->toArray();

        $necessary_airline_ids = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->pluck('airline_id')->toArray();
        $claim_and_airline_array = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->select('airline_id', 'claim_id')->get()->keyBy('claim_id');


        $departed_from_id = Claim::whereIn('id', $claim_id_array)->pluck('departed_from_id')->toArray();
        $final_destination_id = Claim::whereIn('id', $claim_id_array)->pluck('final_destination_id')->toArray();

        $necessary_airport_id_array = array_unique(array_merge($departed_from_id, $final_destination_id));
        $passenger = Passenger::whereIn('claim_id', $claim_id_array)->orderBy('id', 'DESC')->get()->keyBy('claim_id');
        $airport = Airport::whereIn('id', $necessary_airport_id_array)->pluck('name','id');
        $airline = Airline::whereIn('id', $necessary_airline_ids)->pluck('name','id');
        return view('claim.manage_affiliate',compact('claims','airport', 'airline', 'passenger', 'claim_and_airline_array', 'user_all', 'claim_status'));
    }
    public function index(Request $request)
    {
        $perPage = 10;
        if ($request->has('submit')){
            $first_name             = $request->get('first_name');
            $last_name              = $request->get('last_name');
            $email                  = $request->get('email');
            $phone                  = $request->get('phone');
            $note                   = $request->get('note');

            $claims = Claim::whereNotNull('id');
            if(!empty($first_name)){
                $claim_id=Passenger::where('first_name', 'LIKE', "%$first_name%")->select('claim_id')->get();

                $claims = $claims->whereIn('id',$claim_id)->latest()->paginate($perPage);
            }
            if(!empty($last_name)){
                $claim_id=Passenger::where('last_name', 'LIKE', "%$last_name%")->select('claim_id')->get();

                $claims = $claims->whereIn('id',$claim_id)->latest()->paginate($perPage);
            }
            if(!empty($email)){
                $claim_id=Passenger::where('email', 'LIKE', "%$email%")->select('claim_id')->get();

                $claims = $claims->whereIn('id',$claim_id)->latest()->paginate($perPage);
            }
            if(!empty($phone)){
                $claim_id=Passenger::where('phone', 'LIKE', "%$phone%")->select('claim_id')->get();
                $claims = $claims->whereIn('id',$claim_id)->latest()->paginate($perPage);
            }
            if(!empty($note)){
                $notes = Note::where('note', 'LIKE', "%$note%")->select('claim_id')->get();
                $claims = $claims->whereIn('id',$notes)->latest()->paginate($perPage);

            }

            // $airlines = $airlines->Where('status', $status)->latest()->paginate($perPage);

        }else{
            $claims = Claim::where('is_deleted',0)->latest()->paginate($perPage);
        }


        $claim_id_array = [];
        foreach($claims as $claim){
            array_push($claim_id_array, $claim->id);
        }


        $itineraryDetail = ItineraryDetail::whereIn('claim_id', $claim_id_array)->pluck('airline_id','claim_id')->toArray();

        $necessary_airline_ids = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->pluck('airline_id')->toArray();
        $claim_and_airline_array = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->select('airline_id', 'claim_id')->get()->keyBy('claim_id');


        $departed_from_id = Claim::whereIn('id', $claim_id_array)->pluck('departed_from_id')->toArray();
        $final_destination_id = Claim::whereIn('id', $claim_id_array)->pluck('final_destination_id')->toArray();

        $necessary_airport_id_array = array_unique(array_merge($departed_from_id, $final_destination_id));
        $passenger = Passenger::whereIn('claim_id', $claim_id_array)->orderBy('id', 'DESC')->get()->keyBy('claim_id');
        $airport = Airport::whereIn('id', $necessary_airport_id_array)->pluck('name','id');
        $airline = Airline::whereIn('id', $necessary_airline_ids)->pluck('name','id');
        return view('claim.manage_claim',compact('claims','airport', 'airline', 'passenger', 'claim_and_airline_array'));
    }
    public function index_by_user(Request $request, $id)
    {

        $claims = Claim::where('user_id', $id)->where('is_deleted',0)->paginate(10);
        $claim_id_array = [];
        foreach($claims as $claim){
            array_push($claim_id_array, $claim->id);
        }


        $itineraryDetail = ItineraryDetail::whereIn('claim_id', $claim_id_array)->pluck('airline_id','claim_id')->toArray();

        $necessary_airline_ids = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->pluck('airline_id')->toArray();
        $claim_and_airline_array = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->select('airline_id', 'claim_id')->get()->keyBy('claim_id');


        $departed_from_id = Claim::whereIn('id', $claim_id_array)->pluck('departed_from_id')->toArray();
        $final_destination_id = Claim::whereIn('id', $claim_id_array)->pluck('final_destination_id')->toArray();

        $necessary_airport_id_array = array_unique(array_merge($departed_from_id, $final_destination_id));
        $passenger = Passenger::whereIn('claim_id', $claim_id_array)->orderBy('id', 'DESC')->get()->keyBy('claim_id');
        $airport = Airport::whereIn('id', $necessary_airport_id_array)->pluck('name','id');
        $airline = Airline::whereIn('id', $necessary_airline_ids)->pluck('name','id');
        return view('claim.manage_claim',compact('claims','airport', 'airline', 'passenger', 'claim_and_airline_array'));
    }

    public function claimView($id)
    {

        $reminders=Reminder::where('claim_id',$id)->get();

        $claims = Claim::where('id',$id)->first();
        if($claims->claim_status_id != null){
            $claim_status_id = $claims->claim_status_id;
            $claimStatusData=ClaimStatus::where('id',$claim_status_id)->first();
        }

        if($claims->claim_next_step_id != null){
            $claim_next_step_id = $claims->claim_next_step_id;
            $NextStepData=NextStep::where('id',$claim_next_step_id)->first();
        }

        if($claims->affiliate_user_id != null){
            $affiliate_user = User::where('id', $claims->affiliate_user_id)->first() ;
        }else{
            $affiliate_user = false;
        }
        $passengers = Passenger::where('claim_id',$id)->get();

        $ittDetails = ItineraryDetail::where('claim_id',$id)->where('is_selected','1')->first();

        $airline_id=$ittDetails->airline_id;

        $airline=Airline::where('id',$airline_id)->first();

        $airport_array = explode('-',$ittDetails->flight_segment);

        $departed_airport=Airport::where('iata_code',$airport_array[0])->first();
        $destination_airport=Airport::where('iata_code',$airport_array[1])->first();

        $flightNo=$ittDetails->flight_number;

        $flightInfo=Flight::where('flight_no',$flightNo)->first();


        $claimFiles = ClaimFile::where('claim_id',$id)->latest()->get();


        $notes = Note::where('claim_id',$id)->latest()->get();


        $flightCount=ItineraryDetail::where('claim_id',$id)->count();
        $passCount=Passenger::where('claim_id',$id)->count();
        $claimsStatus=ClaimStatus::all();
        $nextSteps = NextStep::all();
        $banks = BankAccount::join('currencies','bank_accounts.currency_of_account','=','currencies.id')
                    ->where('bank_accounts.status',1)
                    ->where('currencies.status',1)
                    ->get();
        $adminComm = Setting::where(['fieldKey'=>'_admin_comm'])->first();
        $affiliateComm = Setting::where(['fieldKey'=>'_affiliate_comm'])->first();


        $ticket = Ticket::where('claim_id', $claims->id)->first();
        if($ticket == null){
            $ticket_notes = '';
        }else{
            $ticket_notes = TicketNote::where('ticket_id', $ticket->id)->get();
        }
            $sents=CustomerComposerFile::where('claim_id',$id)->latest()->get();

            $oClient = new Client([
                'host'          => 'premium39.web-hosting.com',
                'port'          => 993,
                'encryption'    => 'ssl',
                'validate_cert' => true,
                // 'username'      => $claims->cpanel_email,
                // 'password'      => $claims->cpanel_password,
                'username'      =>'rtwh095@freeflightclaim.com',
                'password'      => 'olMpHjWv',
                'protocol'      => 'imap'
            ]);
            $oClient->connect();
            $aFolder = $oClient->getFolders();

            $inbox = $oClient->getFolders('INBOX');

            $expanses = Expense::where('claim_id',$id)->get();
            $affiliateNotes = affiliate_notes::where('claim_id',$id)->get();
            $airlineSents=AirlineComposeFile::where('claim_id',$id)->latest()->get();

            //Airline Info For Single Claim
            $airlineId = $claims->airline_id;
            $airlineInfo = Airline::where('id',$airlineId)->first();

        return view('claim.claimView',compact('airlineInfo','airlineSents','inbox','affiliateNotes','expanses','aFolder','sents','notes', 'ticket_notes', 'ticket', 'claimFiles','affiliateComm','adminComm','NextStepData','claimStatusData','flightInfo','airline','departed_airport','destination_airport','reminders','claims','passengers','ittDetails','flightCount','passCount','claimsStatus','nextSteps','banks', 'affiliate_user'));
    }

    public function downloadClaimFile($id)
    {
        $Claimfile= ClaimFile::where('id',$id)->first();
        $ext = $Claimfile->file_name;
        $ext=explode(".",$ext);
        $file_name = $Claimfile->name.'.'.$ext[1];
        $claimId = $Claimfile->claim_id;

        $file_path = public_path('uploads'.'/'.$claimId.'/'.$Claimfile->file_name);
        return response()->download($file_path,$file_name);

    }


    public function claimFileUpload(Request $request)
    {
        $claim_id = $request->claim_id;
        $file = $request->file('file_name');


      $file_name = sha1(date('YmdHis') . str_random(30));
      $name = $file_name . '.' . $file->getClientOriginalExtension();
      // $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();



      if(!File::exists(public_path('/uploads').'/'.$claim_id)) {
        File::makeDirectory(public_path('/uploads').'/'.$claim_id);
      }

      $file->move(public_path('/uploads').'/'.$claim_id.'/', $name);

      $claim_file = new ClaimFile();
      $claim_file->name = $request->name;
      $claim_file->file_name = $name;
      $claim_file->user_id = Auth::user()->id;
      $claim_file->claim_id = $claim_id;
      $claim_file->save();
      return redirect('/claim-view/'.$claim_id)->with('success','File Added');

    }


    public function claimNextstepStatusChange(Request $request)
    {
        $claim_id = $request->claim_id;
        $claim = Claim::find($claim_id);
        $claim->claim_status_id = $request->claim_status;
        $claim->claim_next_step_id = $request->nextstep_status;
        $claim->save();
        return redirect('/claim-view/'.$claim_id)->with('success','Status Updated');
    }

    public function requiredDetailsUpdate(Request $request)
    {
        $claim_id = $request->claim_id;
        $claim = Claim::find($claim_id);
        $claim->bank_details_id = $request->bank_details_id;
        $claim->affiliate_commision = $request->affiliate_commision;
        $claim->admin_commision = $request->admin_commision;
        $claim->additional_details_for_lba = $request->additional_details_for_lba;
        $claim->amount = $request->amount;
        $claim->received_amount = $request->received_amount;
        $claim->save();
        return redirect('/claim-view/'.$claim_id)->with('success','Required Details Updated');
    }

    public function claimArchiveOrReopen($id)
    {
        $claim=Claim::find($id);
        $user = User::where('id',$claim->user_id)->first();
        $isDelete = $claim->is_deleted;
        if($isDelete == 0){
            $claim->is_deleted = "1";
            Mail::to($user->email)->send(new ClaimClosed());
        }else{
            $claim->is_deleted = "0";
        }
        $claim->save();
        return redirect()->back()->with('success','Claim Archived!');
    }

    public function manageUnfinishedClaim()
    {
        $claim_status=ClaimStatus::latest()->first();
        $claims = Claim::where('is_deleted',0)->where('claim_status_id','!=',$claim_status->id)->latest()->paginate(10);

        $claim_id_array = [];
        foreach($claims as $claim){
            array_push($claim_id_array, $claim->id);
        }


        $itineraryDetail = ItineraryDetail::whereIn('claim_id', $claim_id_array)->pluck('airline_id','claim_id')->toArray();

        $necessary_airline_ids = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->pluck('airline_id')->toArray();
        $claim_and_airline_array = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->select('airline_id', 'claim_id')->get()->keyBy('claim_id');


        $departed_from_id = Claim::whereIn('id', $claim_id_array)->pluck('departed_from_id')->toArray();
        $final_destination_id = Claim::whereIn('id', $claim_id_array)->pluck('final_destination_id')->toArray();

        $necessary_airport_id_array = array_unique(array_merge($departed_from_id, $final_destination_id));
        $passenger = Passenger::whereIn('claim_id', $claim_id_array)->orderBy('id', 'DESC')->get()->keyBy('claim_id');
        $airport = Airport::whereIn('id', $necessary_airport_id_array)->pluck('name','id');
        $airline = Airline::whereIn('id', $necessary_airline_ids)->pluck('name','id');
        return view('claim.manage_unfinished_claim',compact('claims','airport', 'airline', 'passenger', 'claim_and_airline_array'));
    }

    public function unfinishedClaimView()
    {
        return view('claim.unfinished_claim_view');
    }

    public function manageFillsClaim()
    {
        $claim_status=ClaimStatus::latest()->first();

        $claims = Claim::where('is_deleted',0)->where('claim_status_id',$claim_status->id)->latest()->paginate(10);
        $claim_id_array = [];
        foreach($claims as $claim){
            array_push($claim_id_array, $claim->id);
        }


        $itineraryDetail = ItineraryDetail::whereIn('claim_id', $claim_id_array)->pluck('airline_id','claim_id')->toArray();

        $necessary_airline_ids = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->pluck('airline_id')->toArray();
        $claim_and_airline_array = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->select('airline_id', 'claim_id')->get()->keyBy('claim_id');


        $departed_from_id = Claim::whereIn('id', $claim_id_array)->pluck('departed_from_id')->toArray();
        $final_destination_id = Claim::whereIn('id', $claim_id_array)->pluck('final_destination_id')->toArray();

        $necessary_airport_id_array = array_unique(array_merge($departed_from_id, $final_destination_id));
        $passenger = Passenger::whereIn('claim_id', $claim_id_array)->orderBy('id', 'DESC')->get()->keyBy('claim_id');
        $airport = Airport::whereIn('id', $necessary_airport_id_array)->pluck('name','id');
        $airline = Airline::whereIn('id', $necessary_airline_ids)->pluck('name','id');
        return view('claim.manage_fills_claim',compact('claims','airport', 'airline', 'passenger', 'claim_and_airline_array'));
    }

    public function fillsClaimView()
    {
        return view('claim.fills_claim_view');
    }


    // Archive Module Start

    public function archiveIndex(Request $request)
    {
        $claims = Claim::where('is_deleted',1)->paginate(10);
        $claim_id_array = [];
        foreach($claims as $claim){
            array_push($claim_id_array, $claim->id);
        }


        $itineraryDetail = ItineraryDetail::whereIn('claim_id', $claim_id_array)->pluck('airline_id','claim_id')->toArray();

        $necessary_airline_ids = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->pluck('airline_id')->toArray();
        $claim_and_airline_array = ItineraryDetail::whereIn('claim_id', $claim_id_array)->where('is_selected', '1')->select('airline_id', 'claim_id')->get()->keyBy('claim_id');
        // $current_airline_id = $necessary_airline_ids[2]['airline_id'];
// dd($claim_and_airline_array[2]['airline_id']);

        $departed_from_id = Claim::whereIn('id', $claim_id_array)->pluck('departed_from_id')->toArray();
        $final_destination_id = Claim::whereIn('id', $claim_id_array)->pluck('final_destination_id')->toArray();

        $necessary_airport_id_array = array_unique(array_merge($departed_from_id, $final_destination_id));
        $passenger = Passenger::whereIn('claim_id', $claim_id_array)->orderBy('id', 'DESC')->get()->keyBy('claim_id');
        $airport = Airport::whereIn('id', $necessary_airport_id_array)->pluck('name','id');
        $airline = Airline::whereIn('id', $necessary_airline_ids)->pluck('name','id');
        return view('claim.manage_claim',compact('claims','airport', 'airline', 'passenger', 'claim_and_airline_array'));
    }

    public function affiliateNoteAdd(Request $request)
    {
       $affiliateNote = new affiliate_notes;
       $affiliateNote->claim_id = $request->claim_id;
       $affiliateNote->affiliate_note = $request->affiliate_note;
       $affiliateNote->save();
       return redirect('/claim-view/'.$request->claim_id)->with('success','Note Add Success!');
    }

    public function affiliateNoteUpdate(Request $request)
    {
        $id = $request->affiliate_note_id;
        $claim_id = $request->claim_id;
        $affiliateNote = affiliate_notes::where('id',$id)->first();
        $affiliateNote->affiliate_note = $request->affiliate_note;
        $affiliateNote->save();
        return redirect('/claim-view/'.$claim_id)->with('success','Note Update Success!');
    }

    public function affiliateNoteDelete(Request $request, $id)
    {
        $claim_id = $request->claim_id;
        affiliate_notes::destroy($id);
        return redirect('/claim-view/'.$claim_id)->with('success','Affiliate Note Delete!');
    }

    public function customerComposeDataSave(Request $request)
    {
        $id = $request->claim_id;
        $composeData = $request->compose_text;

        if($request->hasFile('compose_file')){
            $files = $request->file('compose_file');
            // dd($files);
            foreach($files as $file){
                $fileName = uniqid().'.'.$file->getClientOriginalExtension();
                $filePath = 'compose_file/';
                $fileUrl = $filePath.$fileName;
                $file->move($filePath,$fileName);
                // $file__name[] = $fileName;
                $images[]=$fileUrl;
            }

        }else{
            $images= [];
        }

       $file__names =$images;

       $from_email  = $request->from_email;
       $from_name   = $request->from_name;


        $userName =$request->to_email;

        Mail::to($request->to_email)->send(new CustomerCompose($file__names,$composeData,$userName,$from_email,$from_name));
        $file= new CustomerComposerFile();
        $file->compose_text = $request->compose_text;
        $file->from_email = $request->from_email;
        $file->from_name = $request->from_name;
        $file->to_email = $request->to_email;
        $file->claim_id = $request->claim_id;
        $file->sub = $request->sub;
        $file->compose_file= implode("|",$images);
        $file->save();
        return redirect('/claim-view/'.$id)->with('success','Sent Email Successfully!');

    }

    public function airlineComposeDataSave(Request $request)
    {

        $id = $request->claim_id;
        $composeData = $request->airline_compose_text;

        if($request->hasFile('airline_compose_file')){
            $files = $request->file('airline_compose_file');
            // dd($files);
            foreach($files as $file){
                $fileName = uniqid().'.'.$file->getClientOriginalExtension();
                $filePath = 'airline_compose_file/';
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


        $userName = $request->to_email;
        Mail::to($request->to_email)->send(new AirlineCompose($file_names,$composeData,$userName,$from_email,$from_name));
        $file = new AirlineComposeFile();
        $file->airline_compose_text = $request->airline_compose_text;
        $file->from_email           = $request->from_email;
        $file->from_name            = $request->from_name;
        $file->to_email             = $request->to_email;
        $file->claim_id             = $request->claim_id;
        $file->sub                  = $request->sub;
        $file->airline_compose_file = implode("|",$images);
        $file->save();
        return redirect('/claim-view/'.$id)->with('success','Sent Email Successfully!');
    }

    public function departureArivalTimeSave(Request $request)
    {
        $claim_id = $request->claim_id;
        $claim = Claim::where('id',$claim_id)->first();
        $claim->departure_time_by_claim     = $request->departure_time_by_claim;
        $claim->arival_time_by_claim        = $request->arival_time_by_claim;
        $claim->save();
        return redirect('/claim-view/'.$claim_id)->with('success','Update Successfully!');
    }

    public function airlineReplyDataSave(Request $request)
    {
        $id = $request->claim_id;
        $composeData = $request->airline_compose_text;

        if($request->hasFile('airline_compose_file')){
            $files = $request->file('airline_compose_file');
            // dd($files);
            foreach($files as $file){
                $fileName = uniqid().'.'.$file->getClientOriginalExtension();
                $filePath = 'airline_compose_file/';
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


        $userName = $request->to_email;
        Mail::to($request->to_email)->send(new AirlineReply($file_names,$composeData,$userName,$from_email,$from_name));
        $file = new AirlineComposeFile();
        $file->airline_compose_text = $request->airline_compose_text;
        $file->from_email           = $request->from_email;
        $file->from_name            = $request->from_name;
        $file->to_email             = $request->to_email;
        $file->claim_id             = $request->claim_id;
        $file->sub                  = $request->sub;
        $file->airline_compose_file = implode("|",$images);
        $file->save();
        return redirect('/claim-view/'.$id)->with('success','Sent Email Successfully!');
    }

    public function customerReplyDataSave(Request $request)
    {
        $id = $request->claim_id;
        $composeData = $request->compose_text;

        if($request->hasFile('compose_file')){
            $files = $request->file('compose_file');
            // dd($files);
            foreach($files as $file){
                $fileName = uniqid().'.'.$file->getClientOriginalExtension();
                $filePath = 'compose_file/';
                $fileUrl = $filePath.$fileName;
                $file->move($filePath,$fileName);
                // $file__name[] = $fileName;
                $images[]=$fileUrl;
            }

        }else{
            $images= [];
        }

       $file__names =$images;

       $from_email  = $request->from_email;
       $from_name   = $request->from_name;


        $userName =$request->to_email;

        Mail::to($request->to_email)->send(new CustomerReply($file__names,$composeData,$userName,$from_email,$from_name));
        $file= new CustomerComposerFile();
        $file->compose_text = $request->compose_text;
        $file->from_email = $request->from_email;
        $file->from_name = $request->from_name;
        $file->to_email = $request->to_email;
        $file->claim_id = $request->claim_id;
        $file->sub = $request->sub;
        $file->compose_file= implode("|",$images);
        $file->save();
        return redirect('/claim-view/'.$id)->with('success','Sent Email Successfully!');
    }



}
