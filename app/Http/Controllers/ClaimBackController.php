<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClaimBackController extends Controller
{
    public function index(Request $request)
    {


        return view('claim.manage_claim');
    }

    public function claimView()
    {
        return view('claim.claimView');
    }
}
