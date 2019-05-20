<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Airline;
use App\Claim;
use App\ClaimFile;
use App\Ticket;
use App\TicketNote;
use App\ClaimStatus;
use App\Expense;
use Hash;
use File;
use Share;
use App\Affiliate;
use Excel;
use App\Exports\AffiliateExport;
use App\Exports\PendingPaymentExport;
use App\Exports\PaymentExport;
use IlluminateAgnostic\Arr\Support\Carbon;

class UserPanelController extends Controller
{
    public function index()
    {
        if (!Auth::check())
        {
          return redirect('/');
        }else
        {
          $user_id = Auth::user()->id;
          $claims = Claim::where('user_id', $user_id)->get();
          $airline_id_array = Claim::where('user_id', $user_id)->pluck('airline_id')->toArray();

          $airline = Airline::whereIn('id', $airline_id_array)->pluck('name', 'id')->toArray();
          $claim_status = ClaimStatus::pluck('name', 'id')->toArray();
          return view('front-end.user.user_panel', compact('claims', 'airline', 'claim_status'));
        }
    }

    public function user_my_claim($id)
    {
      $claims = Claim::join('tickets', 'claims.id', '=', 'tickets.claim_id')
                      ->where('claims.id', $id)
                      ->select('tickets.id as ticket_id','tickets.subject', 'tickets.status as ticket_status', 'claims.*')
                      ->first();

      $ticket = Ticket::where('claim_id', $claims->id)->first();
      // dd($ticket->id);
      $ticket_notes = TicketNote::where('ticket_id', $ticket->id)->get();
      $airline = Airline::where('id', $claims->airline_id)->first();
      $claim_files = ClaimFile::where('claim_id', $claims->id)->get();
      $claim_staus = ClaimStatus::where('id',$claims->claim_status_id)->first();
      $expenses = Expense::where('claim_id',$id)->get();
       // $ticket = Ticket::where('claim_id', $id)->first();
        return view('front-end.user.user_panel_my_claim', compact('claims', 'ticket_notes', 'airline', 'claim_files','claim_staus', 'expenses'));
    }

    public function claimFileUpload(Request $request)
    {
        $claim_id = $request->claim_id;
        $file = $request->file('file_name');
      $file_name = sha1(date('YmdHis') . str_random(30));
      $name = $file_name . '.' . $file->getClientOriginalExtension();
      if(!File::exists(public_path('/uploads').'/'.$claim_id)) {
        File::makeDirectory(public_path('/uploads').'/'.$claim_id);
      }
      $file->move(public_path('/uploads').'/'.$claim_id.'/', $name);
      $claim_file = new ClaimFile();
      $claim_file->name = $request->user_upload_file_name;
      $claim_file->file_name = $name;
      $claim_file->user_id = Auth::user()->id;
      $claim_file->claim_id = $claim_id;
      $claim_file->save();
      return redirect(url('/user-my-claim/'.$claim_id))->with('success','File Added');
    }

    public function claimFileDownload($id)
    {
        $Claimfile= ClaimFile::where('id',$id)->first();
        $ext = $Claimfile->file_name;
        $ext=explode(".",$ext);
        $file_name = $Claimfile->name.'.'.$ext[1];
        $claimId = $Claimfile->claim_id;
        $file_path = public_path('uploads'.'/'.$claimId.'/'.$Claimfile->file_name);
        return response()->download($file_path,$file_name);
    }

    public function userSignup(Request $request)
    {
      $affiliate_user_id = str_replace('09Xohf', '', $request->encrypt_user_id);
      if($request->password == $request->confirm_password)
        {
            $authUser=User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if($authUser){
                $authUser->syncRoles('User');
                $new_user                     = User::find($authUser->id);
                $new_user->affiliate_user_id  = $affiliate_user_id;
                $new_user->save();
            }
            auth()->login($authUser);
            return redirect(url('/'));
        }else{
            return redirect()->back()->with('error','Password and Confirm Password Not Match.Please Try Again!!');
        }
    }

    public function user_signup($encrypt_user_id=null)
    {
        return view('front-end.signup',compact('encrypt_user_id'));
    }

    public function user_login()
    {
        return view('front-end.login');
    }

    public function affiliate()
    {
      $user_id = Auth::user()->id;
      $encrypt_user_id = '09Xohf'.$user_id;
      $link = url('user/signup/'.$encrypt_user_id);

    $facebook=Share::page($link,null,['id' => 'facebook'])
    ->facebook();
    $twitter=Share::page($link,null,['id' => 'twitter'])
    ->twitter();
    $google=Share::page($link,null,['id' => 'google'])
    ->googlePlus();
    $whatsapp=Share::page($link,null,['id' => 'whatsapp'])
    ->whatsapp();
      return view ('front-end.user.user_panel_affiliate', compact('encrypt_user_id','facebook','twitter','google','whatsapp'));
    }

    public function user_ticket_message(Request $request)
    {
      // $user_id = Auth::user()->id;
      // $user_ticket_notes = new TicketNote;
      // $user_ticket_notes->description  =  $request->description;
      // $user_ticket_notes->ticket_id = $request->ticket_id;
      // $user_ticket_notes->user_id = Auth::user()->id;

      $reqData = $request->all();
      TicketNote::create($reqData + ['user_id'=>Auth::user()->id]);
      $ticket=Ticket::find($request->ticket_id);
      $ticket->update(['status'=>1]);
      return redirect()->back()->with('success','Message Send Successfully.');


   }

   public function affiliateInfoShow()
   {
        $user_id=Auth::user()->id;
        $referral_ids=Affiliate::where('affiliate_user_id',$user_id)->limit(5)->get();
        $payments=Affiliate::where('affiliate_user_id',$user_id)->where('approved',1)->limit(5)->get();
        $pending_payments=Affiliate::where('affiliate_user_id',$user_id)->where('approved',0)->limit(5)->get();
        return view('front-end.user.user_panel_affiliate_info',compact('referral_ids','payments','pending_payments'));
   }

   public function allRefferalDataView($id)
   {

        $allReferral=Affiliate::where('affiliate_user_id',$id)->get();
        return view('front-end.user.user_panel_refferal_all',compact('allReferral'));
   }

   public function exportRefferalData()
   {
    $today = Carbon::now()->format('d-m-Y').'-Refferal'.'.xlsx';
    return Excel::download(new AffiliateExport, $today);
   }

   public function allPendingPaymentDataView($id)
   {
    $pending_payments=Affiliate::where('affiliate_user_id',$id)->where('approved',0)->get();
    return view('front-end.user.user_panel_pending_all',compact('pending_payments'));
   }

   public function exportPendingPaymentData()
   {
    $today = Carbon::now()->format('d-m-Y').'-Pending'.'.xlsx';
    return Excel::download(new PendingPaymentExport, $today);
   }

   public function allPaymentDataView($id)
   {
    $payments=Affiliate::where('affiliate_user_id',$id)->where('approved',1)->get();
    return view('front-end.user.user_panel_payment_all',compact('payments'));
   }

   public function exportPaymentData()
   {
    $today = Carbon::now()->format('d-m-Y').'-Payment'.'.xlsx';
    return Excel::download(new PaymentExport, $today);
   }


}
