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
   public function get_translation($text)
   {
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
         if ($responseCode != 200) {
           return false;
         }else{
           return $responseDecoded;
         }

   }
    public function aboutUs()
    {
        $text[0] = 'About Us';
        $text[1] = 'We Are Experts In Delayed Flight Compensation.';
        $text[2] = 'Our team of Delayed Flight experts and solicitors will manage your claim from start to finish while keeping you updated along the way.';
        $text[3] = 'We are dedicated to ensuring the best possible outcome for your claim. You will receive all of the money you are entitled to and we will save you the time and hassle of going it alone.';
        $text[4] = 'START YOUR CLAIM';
        $text[5] = 'Our Services are 100% no win no fee, ';
        $text[6] = "meaning there's no financial risk to you, ";
        $text[7] = 'even if your claim is unsuccessfull.';
        $text[8] = 'CLAIM MY MONEY';
        $text[9] = 'We Work With All Airlines, Including...';
        if (Session::has('locale')) {
          $responseDecoded = $this->get_translation($text);
          return view('front-pages.about_us', compact('responseDecoded', 'text'));

        }else {
          $responseDecoded = null;
          return view('front-pages.about_us', compact('responseDecoded','text'));
        }
    }

    public function contactUs()
    {
        return view('front-pages.contact_us');
    }
    public function faq()
    {
        $faqs = Faq::all();
        $text[0] = "FAQ's";
        $text[1] = "Frequently Asked Questions";
        $text[2] = "No Faqs Here Now";
        if (Session::has('locale')) {
          $responseDecoded = $this->get_translation($text);
          return view('front-pages.faq',compact('faqs', 'responseDecoded', 'text'));
        }else {
          $responseDecoded = null;
          return view('front-pages.faq',compact('faqs', 'responseDecoded', 'text'));
        }

    }
    public function termsAndConditions()
    {
      $text[0] = "Terms & Conditions";
      $text[1] = "User Agreement";
      $text[2] = "We may collect personal identification information from Users, including, but not limited to, when Users visit our site, register their";
      $text[3] = "information on the website by completing, or partially completing the webform giving us full or partial instruction/ details of their";
      $text[4] = "proposed instruction.";
      $text[5] = "Users may be asked for, as appropriate, name, email address, mailing address, phone numbers, flight details and relevant information relating to the";
      $text[6] = "circumstances of the event which the claim/ proposed claim relates to. Additional supporting information/evidence is also likely to be requested.We";
      $text[7] = "may also request bank details if paying compensation directly into your account.";
      $text[8] = "We will collect personal identification information from Users only if they submit such information to us. Users can always refuse to supply personal";
      $text[9] = "identification information, except that it may prevent them from engaging our services to assist them in obtaining any due compensation from the";
      $text[10] = "Carrier/Airline.";
      $text[11] = "We will retain your personal data until we have completed the compensation claim fully, and any monies due have been paid/received, and the file has";
      $text[12] = "been deemed closed, and a suitable period of time, (within a 3 month period) has lapsed to allow us to remove your details from our records.";
      $text[13] = "In this User Agreement:";
      $text[14] = "We may collect non-personal identification information about Users whenever they interact with E.Asthampton Limited trading as Claim Win Team,";
      $text[15] = "whether via our site, emails or any other form of communication. Non-personal identification information may include the browser name, the type of";
      $text[16] = "computer and technical information about Users means of connection to our Site, emails or other";
      $text[17] = "electronic methods of communication, such as the operating system and the Internet service providers utilised and other similar";
      $text[18] = "information, such as your IP address.";
      $text[19] = "Using this site";
      $text[20] = "E.Asthampton Limited, trading as Claim Win Team collects and uses personal information for the following perposes:";
      $text[21] = "To improve customer experience by offering the User, the opportunity of engaging our services to assist in them in securing any";
      $text[22] = "compensation due to them as a result of a delayed or cancelled flight, subject to a qualifying criteria, in line with EU 261/04, The";
      $text[23] = "Montreal Convention, Regulation On Air Passenger Rights and US Code of Federal Regulations.";
      $text[24] = "To process the claim. We will use the information the User has provided to process the claim you have engaged our services to";
      $text[25] = "gain any due compensation. This will include us undertaking various eligibility checks, and contacting the airline/carrier. We may";
      $text[26] = "need to contact you for additional information relating to the circumstances, documentation or your overall experience.";
      $text[27] = "To make contact with you the User. Additional information may be required to assist us with your claim. We may need to advise ";
      $text[28] = "you of information we receive from your Carrier in the process of undertaking our work. ";
      $text[29] = "We may need to contact you the User for your bank details, should the Airline in question wish to pay you directly into your";
      $text[30] = "account. We may also need to contact you with our invoice, or payment reminders, if payment has not been made directly to ";
      $text[31] = "ourselves by the Airline in the first instance.";
      $text[32] = "Fees and Services";
      $text[33] = "On review of your claim by one of our experienced Claims Handlers, it may be considered that to maximise your chances of receiving";
      $text[34] = "any due compensation, we need to engage one of our Panel Solicitors. This decision may be made at any point during the claim process,";
      $text[35] = "and will then involve E.Asthampton Limited, trading as Claim Win Team, passing your data to the chosen Panel Solicitor which is";
      $text[36] = "felt to be best placed to handle your claim.";
      $text[37] = "We will contact you, using the data provided, requesting you to sign the Panel Solicitors instructions.";
      $text[38] = "By signing this instruction, you are giving us permission to release your data to the Panel Solicitor in question.";
      $text[39] = "We do not sell, or trade your data with any other organisation.";

      if (Session::has('locale')) {
        $responseDecoded = $this->get_translation($text);
        return view('front-pages.terms_n_condition',compact('responseDecoded', 'text'));
      }else {
        $responseDecoded = null;
        return view('front-pages.terms_n_condition',compact('responseDecoded', 'text'));
      }
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
