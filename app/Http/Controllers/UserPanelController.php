<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use Hash;

class UserPanelController extends Controller
{
    public function index()
    {
        return view('front-end.user.user_panel');
    }

    public function user_my_claim()
    {
        return view('front-end.user.user_panel_my_claim');
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
}
