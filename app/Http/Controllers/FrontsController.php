<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Faq;
use Session;

class FrontsController extends Controller
{

   public function change_lang($locale)
   {
     Session::put('locale', $locale);
     return redirect()->back();
   }
    public function aboutUs()
    {
        $text[0] = 'We Are Experts In Delayed Flight Compensation.';
        $text[1] = 'bdasdaad';
        $responseDecoded = $this->get_translation($text);

        return view('front-pages.about_us', compact('responseDecoded'));
    }
    public function get_translation($text){
      $a = Session::get('locale');
      $apiKey = env('GOOGLE_TRANSLATION_KEY');

      $url = 'https://www.googleapis.com/language/translate/v2?key=' . $apiKey;

      foreach ($text as $single_text) {
        $url .= '&q=' . rawurlencode($single_text);
      }
      $url .= '&source=en&target='.$a;

      $handle = curl_init($url);
          curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
          $response = curl_exec($handle);
          $responseDecoded = json_decode($response, true);
          $responseCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);      //Here we fetch the HTTP response code
          curl_close($handle);
          return $responseDecoded;
    }
    public function contactUs()
    {
        return view('front-pages.contact_us');
    }
    public function faq()
    {
        $faqs = Faq::all();
        return view('front-pages.faq',compact('faqs'));
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
    public function yourRights()
    {
        return view('front-pages.your_rights');
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

    public function single_post(Request $request, $slug = null)
    {
        if ($slug == null)
        {
            return redirect('/');
        }else
        {
            $single_post = Post::where('slug', $slug)->count();

            if($single_post > 0)
            {
                $singlePost = Post::where('slug', $slug)->first();
                return view('front-pages.page',compact('singlePost'));
            }else
            {
                return redirect('404');
            }


        }
    }
}
