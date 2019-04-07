<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontsController extends Controller
{
  public function aboutUs()
  {
    return view('front-pages.about_us');
  }
}
