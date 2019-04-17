<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Soumen\Agent\Facades\Agent;

use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
class TestsController extends Controller
{
    public function test(){
    	// echo 'Current PHP version: ' . phpversion();
    	Mail::to('mdshafayatul@gmail.com')->send(new OrderShipped());
    }
}
