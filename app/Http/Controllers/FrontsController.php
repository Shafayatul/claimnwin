<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontsController extends Controller
{
  public function user_signup()
  {
      return view('front-end.signup');
  }

  public function user_login()
  {
      return view('front-end.login');
  }

}
