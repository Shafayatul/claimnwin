<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontsController extends Controller
{
  public function user_signup()
  {
      return view('frontEnd.signup');
  }

  public function user_login()
  {
      return view('frontEnd.login');
  }

  public function claim()
  {
      return view('frontEnd.claim.claim');
  }

  public function missed_connection()
  {
      return view('frontEnd.claim.missed_connection');
  }

}
