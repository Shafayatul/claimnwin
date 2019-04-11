<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use \DataTables;
use App\User;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
    	$activities = Activity::latest()->paginate(100);
    	$user_id_array = [];
    	foreach ($activities as $row) {
    		array_push($user_id_array, $row->causer_id);
    	}
    	$user_id_array = array_unique($user_id_array);
    	$user_email = User::whereIn('id', $user_id_array)->pluck('email', 'id');
    	$user_name = User::whereIn('id', $user_id_array)->pluck('name', 'id');
        return view('activity.index', compact('activities', 'user_email', 'user_name'));
    }


}
