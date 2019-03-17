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

  public function flight_delay()
  {
      return view('frontEnd.claim.flight_delay');
  }

  public function flight_cancellation()
  {
      return view('frontEnd.claim.flight_cancellation');
  }

  public function delay_luggage()
  {
      return view('frontEnd.claim.delay_luggage');
  }

  public function lost_luggage()
  {
      return view('frontEnd.claim.lost_luggage');
  }

  public function denied_boarding()
  {
      return view('frontEnd.claim.denied_boarding');
  }

}
