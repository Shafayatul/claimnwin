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
        $id=$request->id;
        $user=User::find($id);
        $user->name  = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect('/admin/role/assign')->with('success','User Info Updated!');
    }

    public function destroy($id)
    {
        User::destroy($id);

        return redirect('admin/role/assign')->with('success', 'Role deleted!');
    }
}
