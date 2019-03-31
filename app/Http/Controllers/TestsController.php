<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Soumen\Agent\Facades\Agent;
class TestsController extends Controller
{
    public function test(){
    	$user_agent = Agent::all();
    	dd($user_agent);
    }
}
