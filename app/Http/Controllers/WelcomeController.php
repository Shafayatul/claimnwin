<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airport;

class WelcomeController extends Controller
{
    public function index()
    {
        $airports = Airport::select('name', 'iata_code')->get()->toArray();
        $airport_object = '[';
        foreach ($airports as $airport) {
            $airport_object .= "['".addslashes($airport['name'])."', '".addslashes($airport['iata_code'])."'],";
        }
        $airport_object = rtrim($airport_object, ',');
        $airport_object .= ']';
        return view('layouts.home.home',compact('airport_object'));
    }
}
