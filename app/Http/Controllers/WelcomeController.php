<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airport;
use App\Currency;
use Victorybiz\GeoIPLocation\GeoIPLocation;

class WelcomeController extends Controller
{
    public function index()
    {
    	$amount1 = $this->currency_converter_url('1300 EUR');
    	$amount2 = $this->currency_converter_url('3400 EUR');
    	$amount3 = $this->currency_converter_url('7000 EUR');
    	$amount4 = $this->currency_converter_url('600 EUR');
        return view('layouts.home.home', compact('amount1','amount2','amount3','amount4'));
    }

    public function currency_converter_url($amount_and_currency){

        $compensation_amount = explode(" ",$amount_and_currency);

        $compensationAmount = $compensation_amount[0];
        $compensationAmountCurrencyCode = $compensation_amount[1];
        $geoip = new GeoIPLocation();
        $currentCurrencyCode = $geoip->getCurrencyCode();

        if ((Currency::where('code',$compensationAmountCurrencyCode)->count() == 0) || (Currency::where('code',$currentCurrencyCode)->count() == 0)) {
            return $amount_and_currency;
        }else{
            $currency_info=Currency::where('code',$compensationAmountCurrencyCode)->first();
            $total_usd_compensation_amount = $compensationAmount*$currency_info->value;
            $currentCurrencyInfo=Currency::where('code',$currentCurrencyCode)->first();
            return $converted_expection_amount = round($total_usd_compensation_amount/$currentCurrencyInfo->value).' '.$currentCurrencyCode;
        }


    }
}
