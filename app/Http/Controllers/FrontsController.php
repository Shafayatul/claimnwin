<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontsController extends Controller
{
  public function aboutUs()
  {
    return view('front-pages.about_us');
  }
  public function contactUs()
  {
    return view('front-pages.contact_us');
  }
  public function faq()
  {
    return view('front-pages.faq');
  }
  public function termsAndConditions()
  {
    return view('front-pages.terms_n_condition');
  }
}
