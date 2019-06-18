<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airport;
use App\Currency;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use App\Review;
use Session;

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
        $reviews = Review::all();

      $text[0] = "When travel goes wrong,";
      $text[1] = "we";
      $text[2] = "make it right.";
      $text[3] = "Travel disruptions happen, but that doesn't mean you have to accept them.";
      $text[4] = "Get up to";
      $text[5] = "for a cancelled, overbooked or delayed flight.";
      $text[6] = "for a luggage issue.";
      $text[7] = "for expenses you incurred as a result of your distrupted flight.";
      $text[8] = "CHECK COMPENSATION";
      $text[9] = "It's FREE";
      $text[10] = "to claim";
      $text[11] = "Up to";
      $text[12] = "compensation";
      $text[13] = "Trusted";
      $text[14] = "by millions";
      $text[15] = "8 Billion EUR";
      $text[16] = "available to claim";
      $text[17] = "HOW IT WORKS";
      $text[18] = "Check your compensation";
      $text[19] = "Submit your details and we run a quick flight check to see if the airline owes you money.";
      $text[20] = "Claim'N Win manages you  claim";
      $text[21] = "We're very good at this, so you sit back and relax while we jump into action.";
      $text[22] = "We send you the money";
      $text[23] = "We get it to you as quickly as we can, with regular updates along the way.";
      $text[24] = "WHAT OUR CUSTOMERS SAY";
      $text[25] = "OUR PROCESS";
      $text[26] = "Check your flight with";
      $text[27] = "our industry-leading";
      $text[28] = "calculator";
      $text[29] = "Add passenger details";
      $text[30] = "then submit your claim";
      $text[31] = "We negotiate with the";
      $text[32] = "airline for you and take it";
      $text[33] = "to court in necessary";
      $text[34] = "Your claim is settled and";
      $text[35] = "your compensation";
      $text[36] = "paid to you";
      $text[37] = "Our Services are 100% no win no fee,";
      $text[38] = "meaning there's no financial risk to you,";
      $text[39] = "even if your claim is unsuccessfull.";
      $text[40] = "CLAIM MY MONEY";
        if (Session::has('locale')) {
          // dd("HAS SESSION");
          $responseDecoded = $this->get_translation($text);
          return view('layouts.home.home', compact('amount1','amount2','amount3','amount4','reviews', 'responseDecoded', 'text'));

        }else {
          // dd("NO SESSION");
          $responseDecoded = null;
          return view('layouts.home.home', compact('amount1','amount2','amount3','amount4','reviews', 'responseDecoded', 'text'));
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
