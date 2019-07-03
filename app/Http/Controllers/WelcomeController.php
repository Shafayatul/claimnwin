<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airport;
use App\Currency;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Review;
use Session;
use Illuminate\Support\Str;

class WelcomeController extends Controller
{
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
    public function index()
    {
    	$amount1 = $this->currency_converter_url('1300 EUR');
    	$amount2 = $this->currency_converter_url('3400 EUR');
    	$amount3 = $this->currency_converter_url('7000 EUR');
        $amount4 = $this->currency_converter_url('600 EUR');

        $reviews = Review::limit(7)->latest()->get();

        $review_text      = [];
        $data_star        = [];
        $data_title       = [];
        $data_description = [];
        $data_name        = [];

        $all_title        = '';
        $all_description  = '';
        $all_name         = '';
        $cnt = 0;
        foreach ($reviews as $single_review) {
            array_push($data_star, $single_review->star);
            array_push($data_title, Str::limit($single_review->title, 30));
            array_push($data_description, Str::limit($single_review->description, 100));
            array_push($data_name, Str::limit($single_review->name, 30));
        }
        $review_title       = $this->get_translation($data_title);
        $review_description = $this->get_translation($data_description);
        $review_name        = $this->get_translation($data_name);

        if (!$review_title) {
            $review_title = $data_title;
        }

        if (!$review_description) {
            $review_description = $data_description;
        }

        if (!$review_name) {
            $review_name = $data_name;
        }


        $text[0] = 'When travel goes wrong, <span class="extra_color">we </br>make it right.</span>';
        $text[1] = "Travel disruptions happen, but that doesn't mean you have to accept them.";
        $text[2] = "Get up to";
        $text[3] = "for a cancelled, overbooked or delayed flight.";
        $text[4] = "for a luggage issue.";
        $text[5] = "for expenses you incurred as a result of your distrupted flight.";
        $text[6] = "CHECK COMPENSATION";
        $text[7] = "It's FREE";
        $text[8] = "to claim";
        $text[9] = "Up to";
        $text[10] = "compensation";
        $text[11] = "Trusted";
        $text[12] = "by millions";
        $text[13] = "8 Billion EUR";
        $text[14] = "available to claim";
        $text[15] = "HOW IT WORKS";
        $text[16] = "Check your compensation";
        $text[17] = "Submit your details and we run a quick flight check to see if the airline owes you money.";
        $text[18] = "Claim'N Win manages your  claim";
        $text[19] = "We're very good at this, so you sit back and relax while we jump into action.";
        $text[20] = "We send you the money";
        $text[21] = "We get it to you as quickly as we can, with regular updates along the way.";
        $text[22] = "WHAT OUR CUSTOMERS SAY";
        $text[23] = "OUR PROCESS";
        $text[24] = "Check your flight with</br> our industry-leading</br> calculator ";
        $text[25] = "Add passenger details </br> then submit your claim ";
        $text[26] = "We negotiate with the </br> airline for you and take it </br> to court in necessary ";
        $text[27] = "Your claim is settled and </br> your compensation </br> paid to you ";
        $text[28] = "Our Services are 100% no win no fee, </br>meaning there's no financial risk to you, </br> even if your claim is unsuccessfull.";
        $text[29] = "CLAIM MY MONEY";


        if (Session::has('locale')) {
            // dd("HAS SESSION");
            $responseDecoded = $this->get_translation($text);
            return view('layouts.home.home', compact('amount1','amount2','amount3','amount4','reviews', 'responseDecoded', 'text','review_title', 'review_description', 'review_name'));

        }else {
            // dd("NO SESSION");
            $responseDecoded = null;
            return view('layouts.home.home', compact('amount1','amount2','amount3','amount4','reviews', 'responseDecoded', 'text','review_title', 'review_description', 'review_name'));
        }


    }

    public function currency_converter_url($amount_and_currency){

        $compensation_amount = explode(" ",$amount_and_currency);

        $compensationAmount = $compensation_amount[0];
        $compensationAmountCurrencyCode = $compensation_amount[1];
        $geoip = new GeoIPLocation();
        $currentCurrencyCode = $geoip->getCurrencyCode();
        $currentCurrencySymbol = $geoip->getCurrencySymbol();

        if ((Currency::where('code',$compensationAmountCurrencyCode)->count() == 0) || (Currency::where('code',$currentCurrencyCode)->count() == 0)) {
            return $converted_expection_amount = mb_convert_encoding('&#8364;', 'UTF-8', 'HTML-ENTITIES'). ' '. $compensationAmount;
        }else{
            $currency_info=Currency::where('code',$compensationAmountCurrencyCode)->first();
            $total_usd_compensation_amount = $compensationAmount*$currency_info->value;
            $currentCurrencyInfo=Currency::where('code',$currentCurrencyCode)->first();
            return $converted_expection_amount = mb_convert_encoding($currentCurrencySymbol, 'UTF-8', 'HTML-ENTITIES'). ' '. round($total_usd_compensation_amount/$currentCurrencyInfo->value);
        }


    }
}
