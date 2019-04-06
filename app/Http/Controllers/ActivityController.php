<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use \DataTables;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
    	$activities = Activity::latest()->paginate(100);
        return view('activity.index', compact('activities'));
    }


}
