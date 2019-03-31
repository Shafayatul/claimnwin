<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
// use App\User;

class AdminsController extends Controller
{
    public function index()
    {
      return view('layouts.admin_layout');
    }

    public function store(Request $request)
    {
        $user = User::create(['name' => $request->input('name'), 'email' => $request->input('email'), 'password' => bcrypt($request->input('password'))]);
        $user->syncRoles('Admin');

        Session::flash('success','New user successfully created.');

        return back();
    }
    public function create(Request $request)
    {
        return view('admin-user.create');
    }

}
