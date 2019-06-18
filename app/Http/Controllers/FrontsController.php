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
        $text[0] = "About Us";
        $text[1] = "We Are Experts In Delayed Flight Compensation.";
        $text[2] = "<p>Our team of Delayed Flight experts and solicitors will manage your claim from start to finish while keeping you updated along the way.</p> <p>We are dedicated to ensuring the best possible outcome for your claim. You will receive all of the money you are entitled to and we will save you the time and hassle of going it alone.</p>";
        $text[3] = "START YOUR CLAIM";
        $text[4] = "Our Services are 100% no win no fee, </br>meaning there's no financial risk to you, </br> even if your claim is unsuccessfull.";
        $text[5] = 'CLAIM MY MONEY';
        $text[6] = 'We Work With All Airlines, Including...';

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
        $text[0]    = 'Contact Us';
        $text[1]    = 'Do you have any question';
        $text[2]    = 'or call us on';
        $text[3]    = 'Your name (required)';
        $text[4]    = 'Your email (required)';
        $text[5]    = 'Subject';
        $text[6]    = 'your message';
        $text[7]    = 'SUBMIT';
        $text[8]    = 'Registered Office';
        $text[9]    = '39 Montefiore Court, Stamford Hill, London, England, N16 5TY';
        $text[10]   = 'Company No: 09748199';
        $text[11]   = 'ICO Registration number: ZA137982';
        $text[12]   = 'Email Us';
        $text[13]   = 'info@claimNwin.com';
        $text[14]   = 'Talk To Us';

        if (Session::has('locale')) {
            // dd("HAS SESSION");
            $responseDecoded = $this->get_translation($text);
            return view('front-pages.contact_us', compact('responseDecoded', 'text'));
        }else {
            // dd("NO SESSION");
            $responseDecoded = null;
            return view('front-pages.contact_us', compact('responseDecoded', 'text'));
        }
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
        $text[0]    = 'Privacy Policy';
        $text[1]    = 'Personal Identification Information';

        $text[2]    = 'We may collect personal identification information from Users, including, but not limited to, when Users visit our site, register their';
        $text[3]    = 'information on the website by completing, or partially completing the webform giving us full or partial instruction/ details of their';
        $text[4]    = 'proposed instruction.';

        $text[5]    = 'Users may be asked for, as appropriate, name, email address, mailing address, phone numbers, flight details and relevant information relating to the';
        $text[6]    = 'circumstances of the event which the claim/ proposed claim relates to. Additional supporting information/evidence is also likely to be requested.We';
        $text[7]    = 'may also request bank details if paying compensation directly into your account.';

        $text[8]    = 'We will collect personal identification information from Users only if they submit such information to us. Users can always refuse to supply personal';
        $text[9]    = 'identification information, except that it may prevent them from engaging our services to assist them in obtaining any due compensation from the';
        $text[10]   = 'Carrier/Airline.';

        $text[11]   = 'We will retain your personal data until we have completed the compensation claim fully, and any monies due have been paid/received,';
        $text[12]   = 'and the file has been deemed closed, and a suitable period of time, (within a 3 month period) has lapsed to allow us to remove your';
        $text[13]   = 'details from our records.';

        $text[14]   = 'Non Personal Identification Information';

        $text[15]   = 'We may collect non-personal identification information about Users whenever they interact with E.Asthampton Limited trading as';
        $text[16]   = 'Claim Win Team, whether via our site, emails or any other form of communication. Non-personal identification information may include';
        $text[17]   = 'the browser name, the type of computer and technical information about Users means of connection to our Site, emails or other';
        $text[18]   = 'electronic methods of communication, such as the operating system and the Internet service providers utilised and other similar';
        $text[19]   = 'information, such as your IP address.';

        $text[20]   = 'How We Use Collected Information';

        $text[21]   = 'E.Asthampton Limited, trading as Claim Win Team collects and uses personal information for the following perposes';

        $text[22]   = 'To improve customer experience by offering the User, the opportunity of engaging our services to assist in them in securing any';
        $text[23]   = 'compensation due to them as a result of a delayed or cancelled flight, subject to a qualifying criteria, in line with EU 261/04, The';
        $text[24]   = 'Montreal Convention, Regulation On Air Passenger Rights and US Code of Federal Regulations.';

        $text[25]   = 'To process the claim. We will use the information the User has provided to process the claim you have engaged our services to';
        $text[26]   = 'gain any due compensation. This will include us undertaking various eligibility checks, and contacting the airline/carrier. We may';
        $text[27]   = 'need to contact you for additional information relating to the circumstances, documentation or your overall experience.';

        $text[28]   = 'To make contact with you the User. Additional information may be required to assist us with your claim. We may need to advise';
        $text[29]   = 'you of information we receive from your Carrier in the process of undertaking our work.';

        $text[30]   = 'We may need to contact you the User for your bank details, should the Airline in question wish to pay you directly into your';
        $text[31]   = 'account. We may also need to contact you with our invoice, or payment reminders, if payment has not been made directly to';
        $text[32]   = 'ourselves by the Airline in the first instance.';

        $text[33]   = 'Sharing Your Personal Information';

        $text[34]   = 'On review of your claim by one of our experienced Claims Handlers, it may be considered that to maximise your chances of receiving';
        $text[35]   = 'any due compensation, we need to engage one of our Panel Solicitors. This decision may be made at any point during the claim process,';
        $text[36]   = 'and will then involve E.Asthampton Limited, trading as Claim Win Team, passing your data to the chosen Panel Solicitor which is';
        $text[37]   = 'felt to be best placed to handle your claim.';

        $text[38]   = 'We will contact you, using the data provided, requesting you to sign the Panel Solicitors instructions.';

        $text[39]   = 'By signing this instruction, you are giving us permission to release your data to the Panel Solicitor in question.';

        $text[40]   = 'We do not sell, or trade your data with any other organisation.';

        if (Session::has('locale')) {
            // dd("HAS SESSION");
            $responseDecoded = $this->get_translation($text);
            return view('front-pages.privacy_policy', compact('responseDecoded', 'text'));
        }else {
            // dd("NO SESSION");
            $responseDecoded = null;
            return view('front-pages.privacy_policy', compact('responseDecoded', 'text'));
        }
    }
    public function pricingList()
    {
      $text1[0] = "Pricing List";
      $text1[1] = "1. DEFINITIONS";
      $text1[2] = "Our Price List should be read in conjunction with our Terms, where you will find all the defined terms used in our Price List.";
      $text1[3] = "2. FREE SERVICES";
      $text1[4] = "ClaimWin does not charge anything for its delivery of Eligibility Service, ClaimWin Connect, Information Service and unsuccessful Justice as a Service.";
      $text1[5] = "3. FREE SERVICES";
      $text1[6] = "If ClaimWin is successful with providing Justice as a Service and the Client receives Flight Compensation, ClaimWin is entitled to its Service Fee, which will be deducted from Flight Compensation.";
      $text1[7] = "For EC 261 Claims, the Service Fee is as follows:";
      $text1[8] = "<p>In case of all flights of 1,500 km or less, where the Client is entitled to a compensation of 250 EUR, the Client will pay a Service Fee of 63 EUR, including applicable VAT.</p><p>In case of all intra-Community flights of more than 1,500 km and for all flights between 1,500 km and 3,500 km, where the Client is entitled to a compensation of <br> 400 EUR, the Client will pay a Service Fee of 100 EUR, including applicable VAT.</p><p>In case of all flights not described above, where the Client is entitled to a compensation of 600 EUR, the Client will pay a Service Fee of 150 EUR,<br> including applicable VAT.</p><p>In case of a flight as described above, where the Client is not entitled to EUR 250, EUR 400 or EUR 600, the Client shall pay a Service Fee of 25% of received Flight Compensation, including applicable VAT.</p>";
      $text1[9] = "For other Claims than EC 261 Claims, the Service Fee is as follows:";
      $text1[10] = "In case the Client receives Flight Compensation of 100 EUR or less, the Client will pay a Service Fee of 25 EUR, including applicable VAT.<br>In case the Client receives Flight Compensation of 101-200 EUR, the Client will pay a Service Fee of 40 EUR, including applicable VAT.<br>In case the Client receives Flight Compensation of 201-300 EUR, the Client will pay a Service Fee of 65 EUR, including applicable VAT.<br>In case the Client receives Flight Compensation of 301-400 EUR, the Client will pay a Service Fee of 90 EUR, including applicable VAT.<br>In case the Client receives Flight Compensation of 401-500 EUR, the Client will pay a Service Fee of 120 EUR, including applicable VAT.<br>In case the Client receives Flight Compensation of 501-600 EUR, the Client will pay a Service Fee of 150 EUR, including applicable VAT.<br>In case the Client receives Flight Compensation of 601-800 EUR, the Client will pay a Service Fee of 200 EUR, including applicable VAT.<br>In case the Client receives Flight Compensation of 801-1,000 EUR, the Client will pay a Service Fee of 250 EUR, including applicable VAT";
      $text1[11] = "The lock-step of an extra 50 EUR in fee for each increase of 200 EUR in Flight Compensation applies to all amounts above 1,000 EUR. As an example, if the Flight Compensation is EUR 2,000, the Client will pay a Service Fee of 500 EUR, including applicable VAT.";
      $text1[12] = "4. LEGAL ACTION FEE";
      $text1[13] = "The Legal Action Fee is only charged, if Legal Action was necessary to provide successful Justice as a Service and will be deducted from your Flight Compensation in addition to the Service Fee.";
      $text1[14] = "The Legal Action Fee is only applicable to EC 261 Claims, where it is as follows:";
      $text1[15] = "<p>In case of all flights of 1,500 km or less, where the Client is entitled to a compensation of 250 EUR, the Client will pay a Legal Action Fee of 63 EUR, including applicable VAT.</p><p>In case of all intra-Community flights of more than 1,500 km and for all flights between 1,500 km and 3,500 km, where the Client is entitled to a compensation of 400 EUR, the Client will pay a Legal Action Fee of 100 EUR, including applicable VAT.</p><p>In case of all flights not described above, where the Client is entitled to a compensation of 600 EUR, the Client will pay a Legal Action Fee of 150 EUR, including applicable VAT.</p><p>In case of a flight as described above, where the Client is not entitled to 250, 400 or 600 EUR, the Client shall pay a Legal Action Fee of 25% of received Flight Compensation,including applicable VAT.</p>";
      $text2[16] = "The Legal Action Fee is not applicable to Claims that are covered by a booking connected with an ClaimWin+ purchase.";
      $text2[17] = "5. CUSTOMERS FROM TRAVEL AGENCIES AND OTHER CORPORATE AGREEMENTS";
      $text2[18] = "If you have entered into an Agreement with ClaimWin via a travel agency or another corporate agreement, the fee structure, payout options, currency conversion and similar might be different depending on the specific level of services provided and individual terms agreed upon. However, in no event will the combined total of the Service Fee and the Legal Action Fee that applies to you exceed the combined total of the Service Fee and the Legal Action Fee as described above.";
      $text2[19] = "6. FLIGHT COMPENSATION AMOUNT GUARANTEE";
      $text2[20] = "ClaimWin guarantees that the Client will always get the correct amount of compensation. If the Clients claim is filed in accordance with EC261, the Client is guaranteed the correct amount in EUR. If the Clients claim is filed in accordance with other Air Passenger Rights Regulation, the Client is guaranteed the correct amount in the applicable currency.";
      $text2[21] = "This applies despite that ClaimWin might be paid in another currency by the airlines and incur fees and FX cost related to receiving the funds. ClaimWin will therefore never reduce the correct amount of compensation with potential FX cost and bank charges related to receiving funds.";
      $text2[22] = "All compensation is therefore always paid in EUR for EC261 claims and the applicable currency for other Air Passenger Rights claims, unless otherwise specifically requested by the Client and accepted by ClaimWin.";
      $text2[23] = "This gives the Client transparency on the compensation paid out and the ability to always be able to check that ClaimWin has transferred the correct amount in accordance with EC261 or the applicable Air Passenger Rights Regulation.";
      $text2[24] = "7. FREE INTERNATIONAL BANK TRANSFER";
      $text2[25] = "ClaimWin offers free international bank transfers via its commercial partner. There will not be any transaction charges/fees of any type charged by neither ClaimWin nor the commercial partner. All transaction fees/costs related to the sending bank will be fully covered by ClaimWin. However, ClaimWin will not cover any additional fees/costs related to Intermediaries/beneficiary banks.";
      $text2[26] = "8. FREE CHECK PAYMENTS IN USD";
      $text2[27] = "ClaimWin offers check payments in USD as a payout method only if you are a resident of the USA. There will not be any charges/fees of any type charged by ClaimWin. All fees/costs related to issuing checks will be fully covered by ClaimWin. However, ClaimWin will not cover any additional fees/costs related to the cashing of the checks.";
      $text2[28] = "9. VALUE ADDED TAX (VAT)";
      $text2[29] = "All fees and charges stated in this Price List include applicable VAT, unless otherwise specified.";
      $text2[30] = "Published";
      if (Session::has('locale')) {
          $responseDecoded1 = $this->get_translation($text1);
          $responseDecoded2 = $this->get_translation($text2);
          return view('front-pages.pricing_list', compact('responseDecoded1', 'responseDecoded2', 'text'));
      }else {
          $responseDecoded1 = null;
          $responseDecoded2 = null;
          return view('front-pages.pricing_list', compact('responseDecoded1', 'responseDecoded2', 'text'));
      }
    }
    public function pressBlog()
    {
        $blogs=Post::latest()->paginate(6);

        $text[0] = "Blog Page";
        $text[1] = "About all things concerning aviation";
        $text[2] = "Every week we illustrate various subjects regarding our service, passenger rights and commercial aviation. Of course, as we have a lot of experience on the matter, we also provide you with tips & tricks regarding air travel.";

        if (Session::has('locale')) {
            // dd("HAS SESSION");
            $responseDecoded = $this->get_translation($text);
            return view('front-pages.press_blog', compact('blogs', 'responseDecoded', 'text'));
        }else {
            // dd("NO SESSION");
            $responseDecoded = null;
            return view('front-pages.press_blog', compact('blogs', 'responseDecoded', 'text'));
        }
    }
    public function yourRights()
    {
      $text[0] = "Your Rights";
      $text[1] = 'Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC';
      $text[2] = 'START YOUR CLAIM';
      if (Session::has('locale')) {
          // dd("HAS SESSION");
          $responseDecoded = $this->get_translation($text);
          return view('front-pages.your_rights', compact('responseDecoded', 'text'));
      }else {
          // dd("NO SESSION");
          $responseDecoded = null;
          return view('front-pages.your_rights', compact('responseDecoded', 'text'));
      }
    }
    public function singleBlogView($title,$id)
    {
        $post=Post::find($id);

        $text[0] = $post->title;
        $text[1] = $post->body;
        $text[2] = "Blog Page";
        if (Session::has('locale')) {
            // dd("HAS SESSION");
            $responseDecoded = $this->get_translation($text);
            return view('front-pages.single_blog', compact('post', 'responseDecoded', 'text'));
        }else {
            // dd("NO SESSION");
            $responseDecoded = null;
            return view('front-pages.single_blog', compact('post', 'responseDecoded', 'text'));
        }
    }
    public function app()
    {

      $text[0] = "Get our free mobile app";
      $text[1] = "Submit your claim from the airport. Download our app now!";
      $text[2] = "<h2>Get our free mobile app</h2> <p>Our team of Delayed Flight experts and solicitors will manage your claim from start to finish while keeping you updated along the way.</p> <p>We are dedicated to ensuring the best possible outcome for your claim. You will  receive all of the money you are entitled to and we will save you the time and hassle of going it alone.</p> <h3>Check for delays </h3> <p>You need to download our app to do this. Thousands of customers have benefited from this app so far!</p> <h3>Don’t forget to check on past flights! </h3> <p>The latest regulations entitle you to claim compensation for delayed or cancelled flights dating back several years (as well as some denied boarding on domestic flights). Download the Claim’N Win app to check past flights!</p>";
      $text[3] = "Get compensation when your travel plans don’t go as planned.";
      $text[4] = "If you’ve been on a delayed, cancelled, or diverted flight in the last three years, the airlines might owe you money for your troubles. Check with Claim’N Win to see if your flight qualifies for compensation.";
      $text[5] = "Check your compensation";
      $text[6] = "Get our free mobile app";
      $text[7] = "You could receive up to €600 if your flight is delayed, canceled, or you were denied boarding. We handle your claim on a “No Win, No Fee” basis.";
      $text[8] = "Get our free mobile app";
      $text[9] = "You could receive up to €600 if your flight is delayed, canceled, or you were denied boarding. We handle your claim on a “No Win, No Fee” basis.";
      $text[10] = "Get our free mobile app";
      $text[11] = "You could receive up to €600 if your flight is delayed, canceled, or you were denied boarding. We handle your claim on a “No Win, No Fee” basis.";

      if (Session::has('locale')) {
          // dd("HAS SESSION");
          $responseDecoded = $this->get_translation($text);
          return view('front-pages.app_page', compact('responseDecoded', 'text'));
      }else {
          // dd("NO SESSION");
          $responseDecoded = null;
          return view('front-pages.app_page', compact('responseDecoded', 'text'));
      }
    }
    public function partner()
    {

      $text[0] = "Be there for your customers, <br> even when things don't go as <br> planned.";
      $text[1] = "Opportunities that will bring money to you and your customers.";
      $text[2] = "contact us";
      $text[3] = "Partnership programs";
      $text[4] = "21 million";
      $text[5] = "21 million passengers are entitled <br> to compensation";
      $text[6] = "8 Billion Euro";
      $text[7] = "8 Billion Euro available to claim annually";
      $text[8] = "Millions";
      $text[9] = "Millions in potential ancillary revenues";
      $text[10] = "ClaimCompass API";
      $text[11] = "Developed in partnership with Microsoft, the ClaimCompass API uses cutting edge technology and monitors in real-time all of your bookings, notifying you and your clients when they're entitled to compensation. Our API is first of its kind and is built in a way, which does not require any personal data - all we need is the flight number and the date.";
      $text[12] = "Affiliate";
      $text[13] = "Become an affiliate partner and help us reach even more passengers, while earning money for each successful claim. Choose from either placing an affiliate link or embedding your very own ClaimCompass Widget on your website.  We'll still do all the work, but you'll get all the credit!";
      $text[14] = "WHAT OUR CUSTOMERS SAY";
      $text[15] = "Great advisor and transparent...";
      $text[16] = "Great advisor and transparent communication<br> about the process. Fast turn around too.<br> Strongly recomend it";
      $text[17] = "Denise Roberts";
      $text[18] = "Great advisor and transparent...";
      $text[19] = "Great advisor and transparent communication<br> about the process. Fast turn around too.<br> Strongly recomend it";
      $text[20] = "Clare Burchell";
      $text[21] = "Great advisor and transparent...";
      $text[22] = "Great advisor and transparent communication<br> about the process. Fast turn around too.<br> Strongly recomend it";
      $text[23] = "Kjell Caminha";
      $text[24] = "Great advisor and transparent...";
      $text[25] = "Great advisor and transparent communication<br> about the process. Fast turn around too.<br> Strongly recomend it";
      $text[26] = "Sarah Green";
      $text[27] = "Great advisor and transparent...";
      $text[28] = "Great advisor and transparent communication<br> about the process. Fast turn around too.<br> Strongly recomend it";
      $text[29] = "Denise Roberts";

      if (Session::has('locale')) {
          // dd("HAS SESSION");
          $responseDecoded = $this->get_translation($text);
          return view('front-pages.partner', compact('responseDecoded', 'text'));
      }else {
          // dd("NO SESSION");
          $responseDecoded = null;
          return view('front-pages.partner', compact('responseDecoded', 'text'));
      }
    }
    public function affiliatePage()
    {
      $text[0] = "Get paid if you're in travel";
      $text[1] = "Join our affiliate program and begin earning money while helping fellow travellers in need.";
      $text[2] = "sign up";
      $text[3] = "HIGH COMMISSION RATES";
      $text[4] = "Claim'N Win offers some of the highest commision rates in the industry. Earn up to €185 per referral!";
      $text[5] = "EASY TO SET UP";
      $text[6] = "No programming knowledge needed. Simply sign up and pick the option you prefer.";
      $text[7] = "LONGEST LASTING COOKIES";
      $text[8] = "Our cookie data lasts for 3 months! So even if users come back at a later point, we'll still allocate them to you.";
      $text[9] = "LOVED BY TRAVELLERS";
      $text[10] = "Claim'N Win is rated 4.9 out of 5 stars. Show your visitors that you care about them too!";
      $text[11] = "WE ARE GLOBAL";
      $text[12] = "We are a truly global team and support travellers in 17 different languages It's a small world, after all.";
      $text[13] = "WE SUPPORT YOU";
      $text[14] = "Just as we do for our customers, we're here to offer the support you need to get you started!";
      $text[15] = "Get paid if you're in travel";
      $text[16] = "Our affiliate program aims at reaching and helping even more <br> passengers get compensated when their flights are disrupted.";
      $text[17] = "If you have a travel related website, a blog, or you are an influencer, <br> you can now earn money while providing even more value to your <br> audience. Simply sign up and get your unique link to post on <br> your website.";
      $text[18] = "We'll still do all the work, but you'll get all the credit.";
      $text[19] = "HOW IT WORKS";
      $text[20] = "Register in just a few simple steps and get access to your dashboard";
      $text[21] = "PICK A REFERRAL METHOD";
      $text[22] = "Register in just a few simple steps and get a referral link.";
      $text[23] = "BEGIN EARNING MONEY";
      $text[24] = "Promote your new service to your users and begin earning money!";
      $text[25] = "Help fellow travellers and earn money";
      $text[26] = "Claim'N Win helps passengers get compensated when their flights <br> are disrupted. Join one of the best affiliate programs in travel <br> today! Our affiliate program aims at reaching and helping even <br> more passengers get compensated when their flights are disrupted.";
      $text[27] = "BECOME AN AFFILIATE";

      if (Session::has('locale')) {
        $responseDecoded = $this->get_translation($text);
        return view('front-pages.affiliate_page',compact('responseDecoded', 'text'));
      }else {
        $responseDecoded = null;
        return view('front-pages.affiliate_page',compact('responseDecoded', 'text'));
      }
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
                $text[0] = $singlePost->title;
                $text[1] = $singlePost->body;
                if (Session::has('locale')) {
                  $responseDecoded = $this->get_translation($text);
                  return view('front-pages.page',compact('singlePost', 'responseDecoded', 'text'));
                }else {
                  $responseDecoded = null;
                  return view('front-pages.page',compact('singlePost', 'responseDecoded', 'text'));
                }
            }else
            {
                return redirect('404');
            }


        }
    }
}
