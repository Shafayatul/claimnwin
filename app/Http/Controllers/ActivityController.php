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

        $perPage = 10;
        if ($request->has('submit')){
            $id                     = $request->get('id');
            $log_name               = $request->get('log_name');
            $model_name             = $request->get('model_name');

            $activities = Activity::whereNotNull('id');
            if(!empty($id)){
                $activities = $activities->where('id', 'LIKE', "%$id%");
            }
            if(!empty($log_name)){
                $activities = $activities->where('log_name', 'LIKE', "%$log_name%");
            }
            if(!empty($model_name)){
                $activities = $activities->where('subject_type', 'LIKE', "%$model_name%");
            }

            $activities = $activities->latest()->paginate($perPage);

        }else{
            $activities = Activity::latest()->paginate($perPage);
        }

    	
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
