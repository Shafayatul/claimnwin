<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorController extends Controller
{
    public function notfound404()
    {
        return view('errors.404');
    }
    public function notfound403()
    {
        return view('errors.403');
    }
}
