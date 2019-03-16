<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('layouts.home.home');
    }

    public function signup()
    {
        return view('frontEnd.signup');
    }
}
