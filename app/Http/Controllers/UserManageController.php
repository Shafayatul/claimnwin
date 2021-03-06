<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserManageController extends Controller
{
    public function editUserinfo($id)
    {
        $user=User::find($id);
        return view('user.user-info-backend',compact('user'));
    }

    public function updateUserInfo(Request $request)
    {
        $id                                = $request->id;
        $user                              = User::find($id);
        $user->name                        = $request->name;
        $user->email                       = $request->email;
        $user->add_special_affiliate_offer = $request->add_special_affiliate_offer;
        $user->is_affiliate_first_time     = $request->is_affiliate_first_time;
        $user->save();
        return redirect('/admin/role/assign')->with('success','User Info Updated!');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if($user->status == '1')
        {
            $user->status = "0";
            $msg = 'User Blocked';
        }else{
            $user->status = "1";
            $msg = 'User Activated';
        }
        $user->save();
        return redirect('admin/role/assign')->with('success',$msg);
    }
}
