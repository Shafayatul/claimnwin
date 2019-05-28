<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Victorybiz\GeoIPLocation\GeoIPLocation;

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

        $geoip = new GeoIPLocation();
        $currentCurrencyCode = $geoip->getCurrencyCode();
        if (($currentCurrencyCode == "USD") || ($currentCurrencyCode == "usd")) {
            $ip_phone_number = '+1-718-475-1181';
        }else{
            $ip_phone_number = '+44 20 3808 6632';
        }

        View::share('ip_phone_number', $ip_phone_number);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
