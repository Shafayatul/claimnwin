<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Victorybiz\GeoIPLocation\GeoIPLocation;
use Session;
use Illuminate\Http\Request;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);


        // Phone number acccording to IP
        $geoip = new GeoIPLocation();
        if ((strtoupper($geoip->getContinent()) == "EUROPE") || ($geoip->getContinentCode() == "EU")) {
            $ip_phone_number = '+44 20 3808 6632';
        }else{
            $ip_phone_number = '+1-718-475-1181';
        }

        View::share(['ip_phone_number' => $ip_phone_number]);
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




    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) 
        {

            // menu translation
            $menu_t[0] = "FAQ";
            $menu_t[1] = "BLOG";
            $menu_t[2] = "Your Rights";
            $menu_t[3] = "Become a partner";
            $menu_t[4] = "login";
            $menu_t[5] = "sign up";
            $menu_t[6] = "OUR SERVICES";
            $menu_t[7] = "Start a claim";
            $menu_t[8] = "FAQ";
            $menu_t[9] = "Pricing";
            $menu_t[10] = "Your Air Passenger Rights";
            $menu_t[11] = "Become a partner";
            $menu_t[12] = "OUR COMPANY";
            $menu_t[13] = "Blog";
            $menu_t[14] = "About us";
            $menu_t[15] = "Our App";
            $menu_t[16] = "Contact us";
            $menu_t[17] = "TERMS";
            $menu_t[18] = "Privacy policy";
            $menu_t[19] = "Terms & conditions";
            $menu_t[20] = "Affiliate Page";
            $menu_t[21] = "FOLLOW US";
            $menu_t[22] = "Facebook";
            $menu_t[23] = "Twitter";
            $menu_t[24] = "Youtube";
            $menu_t[25] = "Linkedin";
            $menu_t[26] = " Claim'N Win 2019.";
            // $menu_t[26] = "2018 Claim Win | All Rights Reserved.";
            $menu_t[27] = "Logout";
            $menu_t[28] = "My Claims";
            $menu_t[29] = "Affiliate";
            $menu_t[30] = "Copyright ";

            if (Session::has('locale')) {
                $translated_menu = $this->get_translation($menu_t);

                if(Session::get('locale') == 'en'){
                     $flag_url ='front_asset/img/country-flags/flag.png';
                }
                elseif(Session::get('locale') == 'yi'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Israel.png';
                }
                elseif(Session::get('locale') == 'af'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_South_Africa.png';
                }
                elseif(Session::get('locale') == 'ga'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Ireland.png';
                }
                elseif(Session::get('locale') == 'sq'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Albania.png';
                }
                elseif(Session::get('locale') == 'it'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Italy.png';
                }
                elseif(Session::get('locale') == 'ar'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Saudi_Arabia.png';
                }
                elseif(Session::get('locale') == 'ja'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Japan.png';
                }
                elseif(Session::get('locale') == 'az'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Azerbaijan.png';
                }
                elseif(Session::get('locale') == 'kn'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Canada.png';
                }
                elseif(Session::get('locale') == 'eu'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Spain.png';
                }
                elseif(Session::get('locale') == 'ko'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_South_Korea.png';
                }
                elseif(Session::get('locale') == 'bn'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Bangladesh.png';
                }
                elseif(Session::get('locale') == 'la'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Italy.png';
                }
                elseif(Session::get('locale') == 'be'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Belarus.png';
                }
                elseif(Session::get('locale') == 'lv'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Latvia.png';
                }
                elseif(Session::get('locale') == 'bg'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Bulgaria.png';
                }
                elseif(Session::get('locale') == 'lt'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Lithuania.png';
                }
                elseif(Session::get('locale') == 'mk'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Macedonia.png';
                }
                elseif(Session::get('locale') == 'zh-CN'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_the_Peoples_Republic_of_China.png';
                }
                elseif(Session::get('locale') == 'ms'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Malaysia.png';
                }
                elseif(Session::get('locale') == 'zh-TW'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_the_Peoples_Republic_of_China.png';
                }
                elseif(Session::get('locale') == 'mt'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Malta.png';
                }
                elseif(Session::get('locale') == 'hr'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Croatia.png';
                }
                elseif(Session::get('locale') == 'no'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Norway.png';
                }
                elseif(Session::get('locale') == 'cs'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_the_Czech_Republic.png';
                }
                elseif(Session::get('locale') == 'fa'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Iran.png';
                }
                elseif(Session::get('locale') == 'da'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Denmark.png';
                }
                elseif(Session::get('locale') == 'pl'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Poland.png';
                }
                elseif(Session::get('locale') == 'nl'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_the_Netherlands.png';
                }
                elseif(Session::get('locale') == 'pt'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Portugal.png';
                }
                elseif(Session::get('locale') == 'ro'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Romania.png';
                }
                elseif(Session::get('locale') == 'ru'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Russia.png';
                }
                elseif(Session::get('locale') == 'et'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Estonia.png';
                }
                elseif(Session::get('locale') == 'sr'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Serbia.png';
                }
                elseif(Session::get('locale') == 'tl'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_the_Philippines.png';
                }
                elseif(Session::get('locale') == 'sk'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Slovakia.png';
                }
                elseif(Session::get('locale') == 'fi'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Finland.png';
                }
                elseif(Session::get('locale') == 'sl'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Slovenia.png';
                }
                elseif(Session::get('locale') == 'fr'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_France.png';
                }
                elseif(Session::get('locale') == 'es'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Spain.png';
                }
                elseif(Session::get('locale') == 'sw'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Kenya.png';
                }
                elseif(Session::get('locale') == 'ka'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Georgia.png';
                }
                elseif(Session::get('locale') == 'sv'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Sweden.png';
                }
                elseif(Session::get('locale') == 'de'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Germany.png';
                }
                elseif(Session::get('locale') == 'el'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Greece.png';
                }
                elseif(Session::get('locale') == 'th'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Thailand.png';
                }
                elseif(Session::get('locale') == 'ht'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Haiti.png';
                }
                elseif(Session::get('locale') == 'tr'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Turkey.png';
                }
                elseif(Session::get('locale') == 'iw'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Israel.png';
                }
                elseif(Session::get('locale') == 'uk'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Ukraine.png';
                }
                elseif(Session::get('locale') == 'hi'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_India.png';
                }
                elseif(Session::get('locale') == 'ur'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Pakistan.png';
                }
                elseif(Session::get('locale') == 'hu'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Hungary.png';
                }
                elseif(Session::get('locale') == 'vi'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Vietnam.png';
                }
                elseif(Session::get('locale') == 'is'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Iceland.png';
                }
                elseif(Session::get('locale') == 'id'){
                     $flag_url ='front_asset/img/country-flags/Flag_of_Indonesia.png';
                }


            }else {
                $translated_menu = false;
                $flag_url ='front_asset/img/country-flags/flag.png';
            }
            View::share(['translated_menu' => $translated_menu, 'menu_t' => $menu_t, 'flag_url' => $flag_url]);
        });  
    }
}
