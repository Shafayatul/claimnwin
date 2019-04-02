<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Airline;
use App\ClaimFile;
use App\Claim;
use App\Ticket;
use App\TicketNote;
use App\ClaimStatus;
use Hash;
use File;
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

       // $claim = Claim::where('id',$id)->get();
       // $ticket = Ticket::where('claim_id', $id)->first();
        return view('front-end.user.user_panel_my_claim', compact('claims', 'ticket_notes', 'airline'));
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
      $claim_file->name = $request->name;
      $claim_file->file_name = $name;
      $claim_file->user_id = Auth::user()->id;
      $claim_file->claim_id = $claim_id;
      $claim_file->save();
      return redirect(url('/user-my-claim/'.$claim_id))->with('success','File Added');

    }

    public function userSignup(Request $request)
    {
      if($request->password == $request->confirm_password)
        {
            $authUser=User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            if($authUser){
                $authUser->syncRoles('User');
            }
            auth()->login($authUser);

            return redirect('/user-home');
        }else{
            return redirect()->back()->with('error','Password and Confirm Password Not Match.Please Try Again!!');
        }

    }

    public function user_signup()
    {
        return view('front-end.signup');
    }

    public function user_login()
    {
        return view('front-end.login');
    }

    public function affiliate()
    {
      return view ('front-end.user.user_panel_affiliate');
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
      return redirect()->back()->with('success','Message Send Successfully.');


   }


}
