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
use Illuminate\Support\Facades\Cache;
use Session;

class UserPanelController extends Controller
{

  public function get_translation($text)
  {
    $a = Session::get('locale');
    $apiKey = env('GOOGLE_TRANSLATION_KEY');
    $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey;

    foreach ($text as $single_text) {
      $url .= '&q=' . rawurlencode($single_text);
    }
    $url .= '&source=en&target='.$a;

    $handle = curl_init($url);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($handle);
        $responseDecoded = json_decode($response, true);
        $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);      //Here we fetch the HTTP response code
        curl_close($handle);
        if ($responseCode != 200) {
          return false;
        }else{
          return $responseDecoded;
        }

  }
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

          $text[0] = "My Claim List";
          $text[1] = "Claim";
          $text[2] = "Created at";
          $text[3] = "Defendant";
          $text[4] = "Value";
          $text[5] = "Status";
          $text[6] = "Not eligible for compensation";
          $text[7] = "No status defined";

          if (Session::has('locale')) {
            $responseDecoded = $this->get_translation($text);
            return view('front-end.user.user_panel', compact('claims', 'airline', 'claim_status', 'responseDecoded', 'text'));

          }else {
            $responseDecoded = null;
            return view('front-end.user.user_panel', compact('claims', 'airline', 'claim_status', 'responseDecoded', 'text'));
          }
        }
    }

    public function user_my_claim($id)
    {
      $claims = Claim::where('claims.id', $id)->first();

      $ticket = Ticket::where('claim_id', $claims->id)->first();
      // dd($ticket->id);
      if ($ticket) {
        $ticket_notes = TicketNote::whereNotNull('user_id')->where('ticket_id', $ticket->id)->get();
      }else{
        $ticket_notes = [];
      }
      
      $airline = Airline::where('id', $claims->airline_id)->first();
      $claim_files = ClaimFile::where('claim_id', $claims->id)->get();
      $claim_staus = ClaimStatus::where('id',$claims->claim_status_id)->first();
      $expenses = Expense::where('claim_id',$id)->get();
       // $ticket = Ticket::where('claim_id', $id)->first();

       $text[0] = "My Claim Details";
       $text[1] = "Claim";
       $text[2] = "Defendant";
       $text[3] = "Value";
       $text[4] = "Status";
       $text[5] = "Claim status";
       $text[6] = "Ticket details";
       $text[7] = "Claim details";
       $text[8] = "Documents";
       $text[9] = "Claim Status ".$claim_staus->name;
       $text[10] = $claim_staus->description;
       $text[11] = "Waiting For Reply";
       $text[12] = "Action Required";
       $text[13] = "Closed";
       $text[14] = "How can we help you today?";
       $text[15] = "Send";
       $text[16] = "Chat Messages";
       $text[17] = "Me";
       $text[18] = "Admin";

       if (Session::has('locale')) {
         $responseDecoded = $this->get_translation($text);
         return view('front-end.user.user_panel_my_claim', compact('claims', 'ticket_notes', 'airline', 'claim_files','claim_staus', 'expenses', 'responseDecoded', 'text', 'ticket'));

       }else {
         $responseDecoded = null;
         return view('front-end.user.user_panel_my_claim', compact('claims', 'ticket_notes', 'airline', 'claim_files','claim_staus', 'expenses', 'responseDecoded', 'text', 'ticket'));
       }

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

      // create new ticket
      $ticket                     = new Ticket;
      $ticket->subject            = 'New File.';
      $ticket->status             = "1";
      $ticket->to_email           = $request->cpanel_email;
      $ticket->text               = 'New file uploaded.';
      $ticket->claim_id           = $request->claim_id;
      $ticket->from_name          = Auth::user()->name;
      $ticket->save();



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
      if (Cache::get($request->ip()) != null ) {
        $affiliate_user_id = Cache::get($request->ip());
      }else{
        $affiliate_user_id = '';
      }

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

                Cache::forget($request->ip());

            }
            auth()->login($authUser);
            return redirect(url('/'));
        }else{
            return redirect()->back()->with('error','Password and Confirm Password Not Match.Please Try Again!!');
        }
    }

    public function user_signup()
    {
        $text[0] = "Signup";
        $text[1] = "Connect With Facebook";
        $text[2] = "Connect With Google";
        $text[3] = "or";
        $text[4] = "Name";
        $text[5] = "Email address";
        $text[6] = "Password";
        $text[7] = "Confirm Password";
        $text[8] = "Remember Me";
        $text[9] = "Forgot password";

      if (Session::has('locale')) {
         $responseDecoded = $this->get_translation($text);
         return view('front-end.signup',compact('responseDecoded', 'text'));

       }else {
         $responseDecoded = null;
         return view('front-end.signup',compact('responseDecoded', 'text'));
       }
    }

    public function store_affiliate_info_in_cache(Request $request, $encrypt_user_id=null)
    {
      $affiliate_user_id = str_replace('09Xohf', '', $request->encrypt_user_id);
      $ip = $request->ip();
      Cache::put($ip, $affiliate_user_id);
      return redirect('/');
    }

    public function user_login()
    {
        $text[0] = "Login";
        $text[1] = "Connect With Facebook";
        $text[2] = "Connect With Google";
        $text[3] = "or";
        $text[4] = "Email address";
        $text[5] = "Password";
        $text[6] = "Remember Me";
        $text[7] = "Forgot password";


      if (Session::has('locale')) {
         $responseDecoded = $this->get_translation($text);
         return view('front-end.login',compact('responseDecoded', 'text'));

       }else {
         $responseDecoded = null;
         return view('front-end.login',compact('responseDecoded', 'text'));
       }
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
      // $google=Share::page($link,null,['id' => 'google'])
      // ->googlePlus();
      $linkedin=Share::page($link,null,['id' => 'linkedin'])
      ->linkedin('Extra linkedin summary can be passed here');
      $whatsapp=Share::page($link,null,['id' => 'whatsapp'])
      ->whatsapp();

      $text[0] = "Share link and earn";

      if (Session::has('locale')) {
        $responseDecoded = $this->get_translation($text);
        return view ('front-end.user.user_panel_affiliate', compact('encrypt_user_id','facebook','twitter','linkedin','whatsapp', 'responseDecoded', 'text'));

      }else {
        $responseDecoded = null;
        return view ('front-end.user.user_panel_affiliate', compact('encrypt_user_id','facebook','twitter','linkedin','whatsapp', 'responseDecoded', 'text'));
      }

  }

    public function user_ticket_message(Request $request)
    {
\Log::debug($request);
      $reqData = $request->all();
      TicketNote::create($reqData + ['user_id'=>Auth::user()->id]);
      $ticket=Ticket::find($request->ticket_id);
      $ticket->status =  1;
      $ticket->save;

      $ticket                     = new Ticket;
      $ticket->subject            = 'Message within claim';
      $ticket->status             = "1";
      // $ticket->from_email         = Auth::user()->email;
      $ticket->to_email           = $request->cpanel_email;
      $ticket->text               = $request->description;
      $ticket->claim_id           = $request->claim_id;
      $ticket->from_name          = Auth::user()->name;
      $ticket->save();


      $ticket_note                = new TicketNote;
      $ticket_note->ticket_id     = $ticket->id;
      $ticket_note->description   = $request->description;
      $ticket_note->save();

      return response()->json([
        'msg' => $ticket_note->description, 
        'date' => Carbon::parse($ticket_note->created_at)->format('d-m-Y h:m A')
      ]);
   }

   public function affiliateInfoShow()
   {
        $user_id              = Auth::user()->id;
        $encrypt_user_id      = '09Xohf'.$user_id;
        $referral_ids         = Affiliate::where('affiliate_user_id',$user_id)->limit(5)->get();
        $referral_count_data  = Affiliate::where('affiliate_user_id',$user_id)->count();
        $comsion_all_amount   = Affiliate::where('affiliate_user_id',$user_id)->get();
        $commision_sum_amount = ''; //$comsion_all_amount->sum('commision_amount'); dropColumn
        $payments             = Affiliate::where('affiliate_user_id',$user_id)->where('is_payment_done',1)->limit(5)->get();
        $all_payments         = Affiliate::where('affiliate_user_id',$user_id)->where('is_payment_done',1)->get();
        $last_payments        = Affiliate::where('affiliate_user_id',$user_id)->where('is_payment_done',1)->latest()->first();
        $pending_payments     = Affiliate::where('affiliate_user_id',$user_id)->where('approved',1)->where('is_payment_done',0)->limit(5)->get();
        $latest_refferals     = Affiliate::where('affiliate_user_id',$user_id)->where('approved',1)->limit(5)->get();


        $link = url('user/signup/'.$encrypt_user_id);
        $facebook = Share::page($link,null,['id' => 'facebook'])->facebook();
        $twitter  = Share::page($link,null,['id' => 'twitter'])->twitter();
        $linkedin = Share::page($link,null,['id' => 'linkedin'])->linkedin();
        // $linkedin = Share::page($link,null,['id' => 'linkedin'])->linkedin('Extra linkedin summary can be passed here');
        $whatsapp = Share::page($link,null,['id' => 'whatsapp'])->whatsapp();


        $text[0] = "Hello";
        $text[1] = "</br></br>Welcome to your affiliate control panel. Please manage your accounts via the left hand menu. To view the menu click the hamburger icon above. Please keep your contact/payment details up to date and we recommend you change your password from time to time for security.</br></br>To get started, view the product section for promotional materials and commission information.</br></br>Any problems, please let us know.";
        $text[2] = "Latest 5 Refferals";
        $text[3] = "Show All";
        $text[4] = "DateTime";
        $text[5] = "Claim Id";
        $text[6] = "Commsion Amount";
        $text[7] = "Latest 5 Pending Payments";
        $text[8] = "Latest 5 Payments";
        $text[9] = "Unique Affiliate Code";
        $text[10] = "Affiliate Overview";
        $text[11] = "Referrals";
        $text[12] = "Commissions";
        $text[13] = "Payments";
        $text[14] = "Last Payment";
        $text[15] = "Terms & Condition";
        $text[16] = "We may collect personal identification information from Users, including but not limited to, when Users visit our site, register their information on the website by completing, ...";
        $text[17] = "Email Us";
        $text[18] = "Contact Us";
        $text[19] = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.";

        if (Session::has('locale')) {
          $responseDecoded = $this->get_translation($text);
          return view('front-end.user.user_panel_affiliate_info',compact('last_payments','all_payments','commision_sum_amount','referral_count_data','referral_ids','payments','pending_payments', 'encrypt_user_id', 'responseDecoded', 'text','facebook','twitter','linkedin','whatsapp', 'latest_refferals'));

        }else {
          $responseDecoded = null;
          return view('front-end.user.user_panel_affiliate_info',compact('last_payments','all_payments','commision_sum_amount','referral_count_data','referral_ids','payments','pending_payments', 'encrypt_user_id', 'responseDecoded', 'text','facebook','twitter','linkedin','whatsapp', 'latest_refferals'));
        }
   }

   public function allRefferalDataView($id)
   {

        $allReferral=Affiliate::where('affiliate_user_id',$id)->get();

        $text[0] = "All Refferals";
        $text[1] = "Export CSV";
        $text[2] = "DateTime";
        $text[3] = "Claim Id";
        $text[4] = "Commsion Amount";

        if (Session::has('locale')) {
          $responseDecoded = $this->get_translation($text);
          return view('front-end.user.user_panel_refferal_all',compact('allReferral', 'responseDecoded', 'text'));

        }else {
          $responseDecoded = null;
          return view('front-end.user.user_panel_refferal_all',compact('allReferral', 'responseDecoded', 'text'));
        }
   }

   public function exportRefferalData()
   {
    $today = Carbon::now()->format('d-m-Y').'-Refferal'.'.xlsx';
    return Excel::download(new AffiliateExport, $today);
   }

   public function allPendingPaymentDataView($id)
   {
    $pending_payments=Affiliate::where('affiliate_user_id',$id)->where('approved',0)->get();

    $text[0] = "All Payments";
    $text[1] = "Export CSV";
    $text[2] = "DateTime";
    $text[3] = "Claim Id";
    $text[4] = "Commsion Amount";

    if (Session::has('locale')) {
      $responseDecoded = $this->get_translation($text);
      return view('front-end.user.user_panel_pending_all',compact('pending_payments', 'responseDecoded', 'text'));

    }else {
      $responseDecoded = null;
      return view('front-end.user.user_panel_pending_all',compact('pending_payments', 'responseDecoded', 'text'));
    }


   }

   public function exportPendingPaymentData()
   {
    $today = Carbon::now()->format('d-m-Y').'-Pending'.'.xlsx';
    return Excel::download(new PendingPaymentExport, $today);
   }

   public function allPaymentDataView($id)
   {
    $payments=Affiliate::where('affiliate_user_id',$id)->where('approved',1)->get();

    $text[0] = "All Payments";
    $text[1] = "Export CSV";
    $text[2] = "DateTime";
    $text[3] = "Claim Id";
    $text[4] = "Commsion Amount";

    if (Session::has('locale')) {
      $responseDecoded = $this->get_translation($text);
      return view('front-end.user.user_panel_payment_all',compact('payments', 'responseDecoded', 'text'));

    }else {
      $responseDecoded = null;
      return view('front-end.user.user_panel_payment_all',compact('payments', 'responseDecoded', 'text'));
    }

   }

   public function exportPaymentData()
   {
    $today = Carbon::now()->format('d-m-Y').'-Payment'.'.xlsx';
    return Excel::download(new PaymentExport, $today);
   }


}
