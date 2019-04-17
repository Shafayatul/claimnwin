<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

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
  public function privacyPolicy()
  {
    return view('front-pages.privacy_policy');
  }
  public function pricingList()
  {
    return view('front-pages.pricing_list');
  }
  public function pressBlog()
  {
    $blogs=Post::latest()->paginate(6);
    return view('front-pages.press_blog',compact('blogs'));
  }
  public function singleBlogView($title,$id)
  {
    $post=Post::find($id);
    return view('front-pages.single_blog',compact('post'));
  }
  public function app()
  {
    return view('front-pages.app_page');
  }
  public function partner()
  {
    return view('front-pages.partner');
  }
  public function affiliatePage()
  {
    return view('front-pages.affiliate_page');
  }
  public function formClaim()
  {
    return view('front-pages.form_claim');
  }
}
