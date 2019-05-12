<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Airport;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('layouts.home.home');
    }
}
