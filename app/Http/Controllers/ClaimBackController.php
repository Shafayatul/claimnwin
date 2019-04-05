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

class ClaimBackController extends Controller
{
    public function index(Request $request)
    {

        $claims = Claim::where('is_deleted',0)->paginate(10);
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


        $claimFiles = ClaimFile::all();

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
        $ticket_notes = TicketNote::where('ticket_id', $ticket->id)->get();

        return view('claim.claimView',compact('notes', 'ticket_notes', 'ticket', 'claimFiles','affiliateComm','adminComm','NextStepData','claimStatusData','flightInfo','airline','departed_airport','destination_airport','reminders','claims','passengers','ittDetails','flightCount','passCount','claimsStatus','nextSteps','banks', 'affiliate_user'));
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
        $claim->save();
        return redirect('/claim-view/'.$claim_id)->with('success','Required Details Updated');
    }

    public function claimArchiveOrReopen($id)
    {
        $claim=Claim::find($id);
        $isDelete = $claim->is_deleted;
        if($isDelete == 0){
            $claim->is_deleted = "1";
        }else{
            $claim->is_deleted = "0";
        }
        $claim->save();
        return redirect()->back()->with('success','Claim Archived!');
    }

    public function manageUnfinishedClaim()
    {
        return view('claim.manage_unfinished_claim');
    }

    public function unfinishedClaimView()
    {
        return view('claim.unfinished_claim_view');
    }

    public function manageFillsClaim()
    {
        return view('claim.manage_fills_claim');
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


}
