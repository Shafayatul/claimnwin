<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Pagination\Paginator;
use Spatie\Activitylog\Models\Activity;
use App\Mail\RejectingProject;
use App\Mail\AcceptingProject;
use Illuminate\Support\Facades\Mail;
use Image as Im;
use App\Image;
use App\Cat;
use App\User;
use App\Invoice;
use App\Project;
use App\Count;
use DB;
use PDF;

use storage;
use File;
use Log;
use Session;
use Hash;


class ProjectController extends Controller
{

    private $photos_path;

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['registerNewUser']]);

        $this->photos_path = '../award/images';
        // $this->photos_path = public_path('/images');

    }

    public function activity() {

      $user = Auth::user();

      $users = User::pluck('email','id');

      $activities = Activity::orderBy('id', "desc")->paginate(10);

      return view('activity', compact('user','activities', 'users'));
    } 

    public function SingleProject($id) {

      $user = Auth::user();

      $projects = Project::where('id', $id)
                        ->with('images')
                        ->paginate(5);


      $do_work = 0;
      return view('project-show-single', compact('projects', 'user','cat', 'do_work'));
    } 
	
	
  

    public function edit($id) {
      $user = Auth::user();
      $project = Project::where('id', $id)->first();
      $current_user = User::where("id", $project->user_id)->first();
      return view('project-edit', compact('project', 'user', 'current_user'));
    }   

    public function TopFive() {
        $user = Auth::user();

        $cats = Cat::pluck('name', 'id');
        $projects = Project::pluck('name', 'id');
        $point = array();
        foreach ($cats as $key => $value) {
          $projects_under_this_cat = Project::where('cat_id', $key)->pluck('id');
          $counts = Count::whereIn('project_id' , $projects_under_this_cat)->get();
          $point[$value] = array();
          foreach ($counts as $count) {
            if (array_key_exists($count->project_id, $point[$value])){
              $point[$value][$count->project_id] = $point[$value][$count->project_id]+$count->counts;
            }else{
              $point[$value][$count->project_id] = $count->counts;
            }
          }
          arsort($point[$value]);
          $point[$value] = array_slice($point[$value], 0, 5, true);
        }
        return view('project-top-five', get_defined_vars())->with(['user' => $user, 'cats' => $cats, 'point' => $point, 'projects' => $projects]);
    } 











    public function registerNewUser(Request $request) {
        $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required',
            'vorname' => 'required',
            'firma' => 'required',
            'password' => 'min:6',
            'password_confirmation' => 'required_with:password|same:password|min:6',
            'anr' => 'required',
            'agb' => 'required',
			'datenschutz' => 'required'
        ]);
		
        if($request->input('newsletter') == 1){
          $news_later =1;
        }else{
          $news_later=0;
        }

        $user = User::create(['name' => $request->input('name'), 'email' => $request->input('email'), 'password' => bcrypt($request->input('password')), 'firma' => $request->input('firma'),'vorname' => $request->input('vorname'), 'anr' => $request->input('anr'),'agb' => $request->input('agb'),'newsletter' => $news_later,
		'datenschutz' => $request->input('datenschutz')]);
        if($user){
            if(auth()->attempt(['email' => $request->input('email'), 'password' => $request->input('password')])){
                return redirect(url('/home')); 
            }
        }
        
        return back();

    }


	// Admin: Insert new Project for user
	
	
	public function SelectUserView () {
		
		$user = Auth::user();
		
		$users = User::orderBy('name', 'asc')
			->where('rolle','=','0')
			->orWhere('rolle', '=', '5')
			->get();
		
		return view('selectuser', compact('user', 'users'));
		
	}
	
	public function UserAddProject (Request $request) {
		
		
		$id = $request->input("id");
		
		dd($id);
		
	}
	
	
	
	

    public function insertProjectStepOne(Request $data) {

		
        $user = Auth::user();

        $cat_id = $data->input("cat_id");

        $cats = Cat::where('id', '=', $cat_id)->first();

        return view('project-insert-two', get_defined_vars())->with(['user' => $user]);

    }
	
	public function projectCategoryShow(Request $data) {
		
		$user = Auth::user();

        $cat_id = $data->input("cat_id");

        $cats = Cat::where('id', '=', $cat_id)->first();
		
		//dd($cats);

		$projects = Project::where('stat', '!=', '1')
			->where('cat_id', '=', $cat_id)
			->paginate(1000);
      $user_array = [];
      foreach ($projects as $project) {
        array_push($user_array, $project->user_id);
      }
      // Firstname, Lastname, Company, E-Mail 
      $users = User::whereIn('id', $user_array)->get()->keyBy('id')->toArray();
      // dd($users);
	

    return view('project-category-show', compact('projects', 'user','users','cats'));
	}
		
	
	public function CoE () {
		
		$user = Auth::user();
		
		$users = User::orderBy('name', 'asc')
			->where('rolle','=','0')
			->get();
		
		return view('coe', compact('user', 'users'));
	}
	
	public function addToCoE (Request $data) {
		
		$user_id = $data['id'];
		
		DB::table('users')
            ->where('id', $user_id)
            ->update(['rolle' => 5]);
		
		$user = Auth::user();
		
		$users = User::orderBy('name', 'asc')
			->where('rolle','=','0')
			->get();
		
		return view('coe', compact('user', 'users'));
		
	}
	
	public function CoEShow () {
		
		
		$user = Auth::user();
		
		$users = User::orderBy('name', 'asc')
			->where('rolle','=','5')
			->get();
		
		return view('coeshow', compact('user', 'users'));
		
		
	}
	
	
		
	public function VoteCoe(Request $request) {
		
		$user = Auth::user();
     	$all_cats = Cat::pluck('name', 'id');
		
		$cat_id = "21";

      	$pids = Count::pluck('project_id');
      	$uids = Count::pluck('user_id');


        $projects = Project::whereNotIn('id', $pids)
                        ->where('cat_id', $cat_id)
                        ->where('user_id', '!=', $user->id)
                        ->where('stat', '=', '2')
                        ->where('jury', '=', '1')
                        ->with('images')
                        ->paginate(5);





      if($request->ajax()) {



          $count = Project::whereNotIn('id', $pids)
                          ->where('cat_id', $cat_id)
                          ->where('user_id', '!=', $user->id)
                          ->where('stat', '=', '2')
                          ->where('jury', '=', '1')
                          ->with('images')
                          ->count();

          
          if ( ceil($count/5) == $request->input("page")) {
            $do_work = 0;
          }else{
            $do_work = 1;
          }


          return [
              'projects' => view('ajax-load')->with(compact('projects', 'user','cat', 'all_cats', 'cat_id','do_work'))->render(),
              'next_page' => $projects->nextPageUrl()
          ];
      }else{


          $count = Project::whereNotIn('id', $pids)
                        ->where('cat_id', $cat_id)
                        ->where('user_id', '!=', $user->id)
                        ->where('stat', '=', '2')
                        ->where('jury', '=', '1')
                        ->with('images')
                        ->count();


        
        if ( ceil($count) <= 5) {
          $do_work = 0;
        }else{
          $do_work = 1;
        }
      }

      // dd($count);

      return view('project-show-coe', compact('projects', 'user','cat', 'all_cats', 'cat_id', 'do_work'));
		
	}
		
		
		
		



/*    public function invoice(Request $data) {

        $user = Auth::user();

        $invoices = Invoice::latest()->paginate(20);

        $users_email = User::pluck('email', 'id')->all();
        $users_name = User::pluck('name', 'id')->all();

        return view('invoice', get_defined_vars())->with(['user' => $user, 'invoices' => $invoices, 'users_email' => $users_email, 'users_name' => $users_name ]);

    }*/

    public function invoice(Request $data) {
        $user = Auth::user();
        
        $users = User::paginate(15);
        
        return view('invoice', get_defined_vars())->with(['user' => $user, 'users' => $users ]);
    }

    
    public function my_pdf_download() {

        $user = Auth::user();

        $projects = Project::where('user_id', $user->id)->where('stat', '2')->get();
        $project_ids = "";

        foreach ($projects as $project) {
          $project_ids .= $project->id.',';
        }
        $project_ids = rtrim($project_ids, ',');
        $date = date("Y-m-d");
        $year = date("Y");

        $count = Invoice::where('project_ids', $project_ids)->where('user_id', $user->id)->count();
        if ($count == 0) {
          $invoice = Invoice::create(['user_id'=>$user->id, 'project_ids'=>$project_ids, 'date'=>$date]);
        }else{
          $invoice = Invoice::where('project_ids', $project_ids)->where('user_id', $user->id)->first();
        }


        $pdf = PDF::loadView('pdf.invoice', compact('projects', 'user', 'date', 'invoice', 'year'));
        return $pdf->download('Invoice.pdf');
    }

    public function pdf_download($id) {


        $user = User::where('id', $id)->first();

        $projects = Project::where('user_id', $id)->where('stat', '2')->get();
        $project_ids = "";

        foreach ($projects as $project) {
          $project_ids .= $project->id.',';
        }
        $project_ids = rtrim($project_ids, ',');
        $date = date("Y-m-d");
        $year = date("Y");

        $count = Invoice::where('project_ids', $project_ids)->where('user_id', $id)->count();
        if ($count == 0) {
          $invoice = Invoice::create(['user_id'=>$id, 'project_ids'=>$project_ids, 'date'=>$date]);
        }else{
          $invoice = Invoice::where('project_ids', $project_ids)->where('user_id', $id)->first();
        }


        $pdf = PDF::loadView('pdf.invoice', compact('projects', 'user', 'date', 'invoice', 'year'));
        return $pdf->download('Invoice.pdf');
    }



    public function insertProjectStepTwo(Request $data) {

      $user = Auth::user();
      $users = User::pluck("email", "id")->toArray();
      $users = User::all()->keyBy('id');


      $cat_id = $data->input("cat_id");
      $cats = Cat::where('id', '=', $cat_id)->first();
// dd($cats);
      return view('project-insert-three', get_defined_vars())->with(['user' => $user, 'users' => $users]);

    }

    public function rejectProject(Request $data) {

        $id = $data->id;
        $project = Project::find($id);
        $project->stat = '3';
        $project->save();

        //get user email
        $project = Project::where('id', $id)->first();
        $user_id = $project->user_id;
        $user = User::where('id', $user_id)->first();

        // Send Email
        Mail::to($user->email)->send(new RejectingProject($data->emailBody, $project->name, $user->vorname.' '.$user->name));

        Session::flash('alert-success','Das Projekt wurde erfolgreich zurückgewiesen.');

        return response()->json(array('msg'=> 'Success'), 200);
    }


    public function deleteProject(Request $data) {

        $id = $data->id;
        $project = Project::find($id);
        $project->stat = '1';
        $project->save();

/*        //get user email
        $project = Project::where('id', $id)->first();
        $user_id = $project->user_id;
        $user = User::where('id', $user_id)->first();

        // Send Email
        Mail::to($user->email)->send(new RejectingProject($data->emailBody, $project->name, $user->vorname.' '.$user->name));*/

        Session::flash('alert-success','Das Projekt wurde erfolgreich gelöscht.');

        return response()->json(array('msg'=> 'Success'), 200);
    }


    public function acceptProject(Request $data) {

        $id = $data->id;
        $project = Project::find($id);
        $project->stat = '2';
        $project->save();

        //get user email
        $project = Project::where('id', $id)->first();
        $user_id = $project->user_id;
        $user = User::where('id', $user_id)->first();

        // Send Email
        Mail::to($user->email)->send(new AcceptingProject($project->name, $user->vorname.' '.$user->name));

        Session::flash('alert-success','Das Projekt wurde angenommen.');

        return response()->json(array('msg'=> 'Success'), 200);
    }

    public function juryProject(Request $data) {

        $id = $data->id;
        $project = Project::find($id);
        $project->stat = '2';
        $project->jury = '1';
        $project->save();

        //get user email
        $project = Project::where('id', $id)->first();
        $user_id = $project->user_id;
        $user = User::where('id', $user_id)->first();

        // Send Email
        Mail::to($user->email)->send(new AcceptingProject($project->name, $user->vorname.' '.$user->name));

        Session::flash('alert-success','Das Projekt wurde angenommen und für die Jury freigegeben.');

        return response()->json(array('msg'=> 'Success'), 200);
    }



    public function juryAddProject(Request $data) {

        $id = $data->id;
        $project = Project::find($id);
        $project->jury = '1';
        $project->save();

        /*//get user email
        $project = Project::where('id', $id)->first();
        $user_id = $project->user_id;
        $user = User::where('id', $user_id)->first();

        // Send Email
        Mail::to($user->email)->send(new AcceptingProject($project->name, $user->vorname.' '.$user->name));*/

        Session::flash('alert-success','Das Projekt wurde für die Jury freigegeben.');

        return response()->json(array('msg'=> 'Success'), 200);
    }
    public function juryRemoveProject(Request $data) {

        $id = $data->id;
        $project = Project::find($id);
        $project->jury = '0';
        $project->save();

        /*//get user email
        $project = Project::where('id', $id)->first();
        $user_id = $project->user_id;
        $user = User::where('id', $user_id)->first();

        // Send Email
        Mail::to($user->email)->send(new AcceptingProject($project->name, $user->vorname.' '.$user->name));*/

        Session::flash('alert-success','Das Projekt wurde aus der Jury entfernt.');

        return response()->json(array('msg'=> 'Success'), 200);
    }



    public function changeProject(Request $data) {

      $users = User::all()->keyBy('id');

      if ($data->submit == 'change') {

        $user = Auth::user();
        $projectID = $data->projectID;
        $catID = $data->catID;
        $cats = Cat::where('id', '=', $catID)->first();
        $project = Project::where('id', '=', $projectID)->first();
        $changeBlade = $cats->code .'-change';

        return view($changeBlade, compact('project', 'user','cats', 'users'))->with(['user' => $user]);

    } elseif ($data->submit=='delete') {

      $projectID = $data->projectID;

      $project_del = Project::find($projectID);
      $project_del->stat = '1';
      $project_del->save();



      return redirect()->route("project-show")->with('alert-success', 'Das Projekt mit der Projekt ID: ' . $projectID . ' wurde erfolgreich gelöscht!');

    }
  }

    public function ProjectChange(Request $data) {

      $user = Auth::user();

      $project_id = $data['project_id'];


      /**
      * video upload
      */
      //get old link
/*      $old_video = Project::where('id', $project_id)->first()->youtube;

      $youtube = "";
      if ($data->hasFile('youtube')) {
        $video = $data->file('youtube');

        $file = $video->getPathName();
        $image = addslashes(file_get_contents($video->getPathName()));
        $image_name = addslashes($video->getClientOriginalName());
        $image_name_next = time().'.'.$video->getClientOriginalExtension();

        if(move_uploaded_file($video->getPathName(),"../award/videos/" . $video->getClientOriginalName())){
          rename("../award/videos/$image_name","../award/videos/$image_name_next");
          $youtube = $image_name_next;
          unlink("../award/videos/".$old_video);
        }
        else{
          echo 'Error: Video not uploaded in folder';
        }

      }*/


/*      Project::where('id', $project_id)
              ->update(['name' => $data['name'],
              'beschreibung' => $data['beschreibung'],
              'testimonial' => $data['testimonial'],
              'youtube' => $data['youtube'],
              'name' => $data['name'],
              'cat_name' => $data['cat_name'],
              'copyright' => $data['copyright'],
              'ort' => $data['ort'],
              'extra' => $data['extra'],

            ]);*/


      $project = Project::find($project_id);
      $project->name = $data['name'];
      $project->user_id = $data['user_id'];
      $project->beschreibung = $data['beschreibung'];
      $project->testimonial = $data['testimonial'];
      $project->youtube = $data['youtube'];
      $project->name = $data['name'];
      $project->cat_name = $data['cat_name'];
      $project->copyright = $data['copyright'];
      $project->ort = $data['ort'];
      $project->extra = $data['extra'];
      $project->save();

      return redirect()->route("project-show")->with('alert-success', 'Das Projekt ' . $data['name'] . ' wurde erfolgreich geändert!');


    }

    public function insertProject(Request $data) {


      $cat_id = $data->input("cat_id");
      $group = $data['group'];

      if( $data->has('check') ){
        $check = 1;
      }

      $cats = Cat::where('id', '=', $cat_id)->first();
      /*if ($data->input("selected_user") == 0) {
        $userId = Auth::id();
      }else{
        $userId = $data->input("selected_user");
      }*/
      $userId = $data->input("user_id");
      
      $user = Auth::user();

      $projectname = time();

      /*// video upload
      $youtube = "";
      if ($data->hasFile('youtube')) {
        $video = $data->file('youtube');

        $file = $video->getPathName();
        $image = addslashes(file_get_contents($video->getPathName()));
        $image_name = addslashes($video->getClientOriginalName());
        $image_name_next = time().'.'.$video->getClientOriginalExtension();

        if(move_uploaded_file($video->getPathName(),"../award/videos/" . $video->getClientOriginalName())){
          rename("../award/videos/$image_name","videos/$image_name_next");
          $youtube = $image_name_next;
        }
        else{
          echo 'Error: Video not uploaded in folder';
        }

      }

		*/

/*      $project_id = Project::insertGetId([
          'name' => $data->input("name"),
          'projektname' => $projectname,
          'cat_id' => $data->input("cat_id"),
          'cat_name' => $data->input("cat_name"),
          'group' => $group,
          'user_id' => $userId,
          'beschreibung' => $data->input("beschreibung"),
          'youtube' => $data->input("youtube"),
          'copyright' => $data->input("copyright"),
          'testimonial' => $data->input("testimonial"),
          'extra' => $data->input("extra"),
          'check' => $check,
          'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
          'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
      ]);*/

      $project = new Project;
      $project->name = $data->input("name");
      $project->projektname = $projectname;
      $project->cat_id = $data->input("cat_id");
      $project->cat_name = $data->input("cat_name");
      $project->group = $group;
      $project->user_id = $userId;
      $project->beschreibung = $data->input("beschreibung");
      $project->youtube = $data->input("youtube");
      $project->copyright = $data->input("copyright");
      $project->testimonial = $data->input("testimonial");
      $project->extra = $data->input("extra");
      $project->check = $check;
      $project->save();

      $project_id = $project->id;

      Session::flash('alert-success','Das Projekt wurde gespeichert. Bitte fügen Sie jetzt Bilder hinzu.');

      return view('project-insert-picture', get_defined_vars())->with(['user' => $user]);
    }


    public function AddImage($project_id, $cat_id) {

      $cats = Cat::where('id', '=', $cat_id)->first();

      $userId = Auth::id();
      $user = Auth::user();

      //max image = 5 - current image
      $current_image_number = Image::where('project_id', $project_id)->count();
      $max_img = $cats->count-$current_image_number;

      if ($max_img <0 ) {
        $max_img = 0;
      }
      return view('project-add-new-picture', get_defined_vars())->with(['user' => $user, 'max_img' => $max_img]);
    }

    public function EditImage($project_id, $cat_id) {

      $cats = Cat::where('id', '=', $cat_id)->first();

      $userId = Auth::id();
      $user = Auth::user();

      //max image = 5 - current image
      $current_image_number = Image::where('project_id', $project_id)->count();
      $current_images = Image::where('project_id', $project_id)->get();
      $max_img = $cats->count-$current_image_number;

      if ($max_img <0 ) {
        $max_img = 0;
      }
      return view('project-edit-new-picture', get_defined_vars())->with(['user' => $user, 'max_img' => $max_img, 'current_images' => $current_images ]);
    }



    public function upload(Request $request)
    {


      // Log::debug('An informational message.');

      $cat_id = $request->input('cat_id');
      $userId = Auth::id();

      $photo = $request->file('file');


      $name = sha1(date('YmdHis') . str_random(30));
      $save_name = $name . '.' . $photo->getClientOriginalExtension();
      // $resize_name = $name . str_random(2) . '.' . $photo->getClientOriginalExtension();



      if(!File::exists($this->photos_path.'/'.$userId)) {
        File::makeDirectory($this->photos_path.'/'.$userId);
      }

      if(!File::exists($this->photos_path.'/'.$userId.'/'.$cat_id)) {
        File::makeDirectory($this->photos_path.'/'.$userId.'/'.$cat_id);
      }

      if(!File::exists($this->photos_path.'/'.$userId.'/'.$cat_id.'/thumbnail')) {
        File::makeDirectory($this->photos_path.'/'.$userId.'/'.$cat_id.'/thumbnail');
      }


      Im::make($photo)
          ->resize(200, null, function ($constraints) {
              $constraints->aspectRatio();
          })
          ->save($this->photos_path.'/'.$userId.'/'.$cat_id.'/thumbnail/'.$save_name);

      $photo->move($this->photos_path.'/'.$userId.'/'.$cat_id.'/', $save_name);



      if(!File::exists($this->photos_path.'/'.$userId.'/'.$cat_id.'/thumbnail/'.$save_name)) {
        $upload_success = false;
      }else{
        $upload_success = true;
      }


      $Image = new Image;
      $Image->project_id = $request['project_id'];
      $Image->filename = $save_name;
      $Image->url = 'images/'.$userId.'/'.$cat_id.'/'.$save_name;
      $Image->thumb_url = 'images/'.$userId.'/'.$cat_id.'/thumbnail/'.$save_name;
      $Image->save();


      Session::flash('alert-success','Images added to project.');


      if ($upload_success) {
          return json_encode(array('fileName' => $save_name , 'status' => 200));
      }else{
          return json_encode(array('fileName' => "" , 'status' => 400));
      }

    }

    public function DeleteImage(Request $request)
    {
      $id = $request->input('id');

      File::delete('../award/'.$request->input('thumb_url'));
      File::delete('../award/'.$request->input('url'));

      Image::find($id)->delete();

      Session::flash('alert-success','Image Deleted.');

      return json_encode(array('status' => 200));

    }


    public function delete(Request $request)
    {
      $fileName = $request->input('fileName');

      $dynamic_ids = Image::join('projects', 'images.project_id', '=', 'projects.id')
            ->select('projects.user_id', 'projects.cat_id')
            ->where('images.filename', $fileName)
            ->get();
      $user = $dynamic_ids[0]->user_id;
      $cat = $dynamic_ids[0]->cat_id;

      $thumb_filePath = '../award/images/'.$user.'/'.$cat.'/thumbnail/';
      File::delete($thumb_filePath.$fileName);
      $wide_filePath = '../award/images/'.$user.'/'.$cat.'/';
      File::delete($wide_filePath.$fileName);

      $id_to_delete = Image::where('filename', $fileName)->first()->id;
      Image::find($id_to_delete)->delete();


      return $fileName;
    }

    public function show_delete(Request $request)
    {
      $fileName = $request->input('fileName');
      $userId = Auth::id();
      $user = User::where('id', $userId)->first();
      $role = $user->rolle;
      if ($role == 0 || $role == 9){
        $dynamic_ids = Image::join('projects', 'images.project_id', '=', 'projects.id')
            ->select('projects.user_id', 'projects.cat_id')
            ->where('images.filename', $fileName)
            ->get();
        $user = $dynamic_ids[0]->user_id;
        $cat = $dynamic_ids[0]->cat_id;
        $thumb_filePath = 'images/'.$user.'/'.$cat.'/thumbnail/';
        File::delete($thumb_filePath.$fileName);
        $wide_filePath = 'images/'.$user.'/'.$cat.'/';
        File::delete($wide_filePath.$fileName);

        $id_to_delete = Image::where('filename', $fileName)->first()->id;
        Image::find($id_to_delete)->delete();

      }

      $id_to_delete = Image::where('filename', $fileName)->first()->id;
      $image = Image::find($id_to_delete);
      $image->state = 1;
      $image->save();

      return $fileName;
    }

    public function myform() {

      $user = Auth::user();
      $cats = Cat::orderBy('name', 'asc')->get();

      return view('project-insert', get_defined_vars());

    }
	
	public function categorySelect() {

      $user = Auth::user();
      $cats = Cat::orderBy('name', 'asc')->get();

      return view('project-category-select', compact('user','cats'));

    }
	


    public function filter(Request $request)
    {
      $cat_id = $request->input("cat_id");
    //  return $cat_id;


    //  $code = Cat::where('id', $cat_id)->first();
      $query = Cat::where('id', '=', $cat_id);

      var_dump($code->code);

    //  return view('project-insert', get_defined_vars());
    }

    public function ProjectShow () {


      $user = Auth::user();


      $projects = Project::with(['images' => function($query){
        $query->where('state' , 0 );
      }])
      ->where('stat', '!=', '1')
      ->whereHas('user', function ($query) use ($user) {
                        $query->where('id', '=', $user->id);

                    })->get();



    return view('project-show', compact('projects', 'user','cat'));

    }





    public function adminProjectShowAll(Request $request) {
      $is_paginate = true;
      $keyword = $request->get('search');
      if (!empty($keyword)) {
        /*search in user model*/
        $searched_user = User::where('email',$request->get('search'))
                                ->orWhere('vorname', $request->get('search'))
                                ->orWhere('name', $request->get('search'))
                                ->pluck('id')
                                ->toArray();
                                
        $get_project_by_searched_user = Project::where('stat', '!=', '1')
                                        ->whereIn('user_id', $searched_user)
                                        ->pluck('id')
                                        ->toArray();

        /*search in project*/
        $project_with_search = Project::Where('name', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('projektname', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('cat_id', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('cat_name', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('group', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('beschreibung', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('youtube', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('copyright', 'LIKE', '%'.$keyword.'%')
                            ->orWhere('testimonial', 'LIKE', '%'.$keyword.'%')
                            ->where('stat', '!=', '1')
                            ->pluck('id')
                            ->toArray();

        /*combine 2 array*/
        $project_ids = array_unique(array_merge($get_project_by_searched_user,$project_with_search));
        $projects = Project::whereIn('id', $project_ids)->get();

        /*turn of pagination*/
        $is_paginate = false;
      }else{
        $projects = Project::where('stat', '!=', '1')->paginate(15);
      }

      $user = Auth::user();
      $user_array = [];
      foreach ($projects as $project) {
        array_push($user_array, $project->user_id);
      }
      $users = User::whereIn('id', $user_array)->get()->keyBy('id')->toArray();

      return view('admin-project-show-all', compact('projects', 'user','users', 'is_paginate'));

    }

    public function ProjectBewerten(Request $request, $cat_id = null) {

      $user = Auth::user();
      $all_cats = Cat::pluck('name', 'id');

      $pids = Count::pluck('project_id');
      $uids = Count::pluck('user_id');

      if ($cat_id == null) {
        $projects = Project::whereNotIn('id', $pids)
                        ->whereNotIn('user_id', $uids)
                        ->where('stat', '=', '2')
                        ->where('jury', '=', '1')
                        ->with('images')
                        ->paginate(5);
      }else{
        $projects = Project::whereNotIn('id', $pids)
                        ->where('cat_id', $cat_id)
                        ->whereNotIn('user_id', $uids)
                        ->where('stat', '=', '2')
                        ->where('jury', '=', '1')
                        ->with('images')
                        ->paginate(5);
      }




      if($request->ajax()) {


        if ($cat_id == null) {
          $count = Project::whereNotIn('id', $pids)
                          ->whereNotIn('user_id', $uids)
                          ->where('stat', '=', '2')
                          ->where('jury', '=', '1')
                          ->with('images')
                          ->count();
        }else{
          $count = Project::whereNotIn('id', $pids)
                          ->where('cat_id', $cat_id)
                          ->whereNotIn('user_id', $uids)
                          ->where('stat', '=', '2')
                          ->where('jury', '=', '1')
                          ->with('images')
                          ->count();
        }

          
          if ( ceil($count/5) == $request->input("page")) {
            $do_work = 0;
          }else{
            $do_work = 1;
          }


          return [
              'projects' => view('ajax-load')->with(compact('projects', 'user','cat', 'all_cats', 'cat_id','do_work'))->render(),
              'next_page' => $projects->nextPageUrl()
          ];
      }else{

        if ($cat_id == null) {
          $count = Project::whereNotIn('id', $pids)
                        ->whereNotIn('user_id', $uids)
                        ->where('stat', '=', '2')
                        ->where('jury', '=', '1')
                        ->with('images')
                        ->count();
        }else{
          $count = Project::whereNotIn('id', $pids)
                        ->where('cat_id', $cat_id)
                        ->whereNotIn('user_id', $uids)
                        ->where('stat', '=', '2')
                        ->where('jury', '=', '1')
                        ->with('images')
                        ->count();
        }


        
        if ( ceil($count) <= 5) {
          $do_work = 0;
        }else{
          $do_work = 1;
        }
      }

      // dd($count);

      return view('project-show-rater', compact('projects', 'user','cat', 'all_cats', 'cat_id', 'do_work'));

    }

    public function ProjectRated(Request $request) {

      $user = Auth::user();

      $count = new Count;
      $count->project_id = $request->project_id;
      $count->user_id = $user->id;
      $count->counts = $request->counts;
      $count->created_at = \Carbon\Carbon::now()->toDateTimeString();
      $count->updated_at = \Carbon\Carbon::now()->toDateTimeString();
      $count->save();


      if ($user->rolle == 5) {
        return redirect('/votecoe');
      }else{
        return redirect('/project-show-rater');
      }

      

    }

    public function singgleAdminProjectShow($id) {
      $user = Auth::user();
      $project = Project::where('id', $id)->with('images')->first();
      $current_user = User::where('id', $project->user_id)->first();
      return view('single-project-show', compact('project', 'user','current_user'));

    }
    public function adminProjectShow($stat) {

/*      $user = Auth::user();

      $projects = Project::where('stat', $stat)->paginate(15);
      $users_email = User::pluck('email', 'id');*/
      $user = Auth::user();
      $projects = Project::where('stat', $stat)->paginate(15);
      $user_array = [];
      foreach ($projects as $project) {
        array_push($user_array, $project->user_id);
      }

      $users = User::whereIn('id', $user_array)->get()->keyBy('id')->toArray();

      return view('admin-project-show', compact('projects', 'user','users'));
    }
	
/*	public function adminProjectShowAll() {
		
		$user = Auth::user();
		$stat = 1;
		$projects = Project::where('user_id', $user->id)->where('stat', '<>', '2')->get();
	
		$results = User::with('projects')->get();
		
	  return view('admin-project-show-all', compact('results','projects', 'user'));
		
	}*/


  public function ProjectFreigeben(Request $request, $cat_id = null) {

    $user = Auth::user();
    $all_cats = Cat::pluck('name', 'id');

    if ($cat_id == null) {
      $projects = Project::where('stat', '=', '0')
                ->with('images')
                ->paginate(5);
    }else{
      $projects = Project::where('stat', '=', '0')
                ->where('cat_id', $cat_id)
                ->with('images')
                ->paginate(5);
    }


    $user_array = [];
    foreach ($projects as $project) {
      array_push($user_array, $project->user_id);
    }
    $users = User::whereIn('id', $user_array)->get()->keyBy('id')->toArray();


    if($request->ajax()) {

      if ($cat_id == null) {
        $count = Project::where('stat', '=', '0')
                        ->with('images')
                        ->count();
      }else{
        $count = Project::where('stat', '=', '0')
                        ->where('cat_id', '=', $cat_id)
                        ->with('images')
                        ->count();
      }
      

      $user_array = [];
      foreach ($projects as $project) {
        array_push($user_array, $project->user_id);
      }
      $users = User::whereIn('id', $user_array)->get()->keyBy('id')->toArray();

      if ( ceil($count/5) == $request->input("page")) {
        $do_work = 0;
      }else{
        $do_work = 1;
      }

      return [
        'projects' => view('ajax-load-admin')->with(compact('projects', 'user','cat', 'all_cats', 'cat_id', 'do_work', 'users'))->render(),
        'next_page' => $projects->nextPageUrl()
      ];
      }else{

      if ($cat_id == null) {
        $count = Project::where('stat', '=', '0')
                        ->with('images')
                        ->count();
      }else{
        $count = Project::where('stat', '=', '0')
                        ->where('cat_id', $cat_id)
                        ->with('images')
                        ->count();
      }

        
        if ( ceil($count) <= 5) {
          $do_work = 0;
        }else{
          $do_work = 1;
        }
      }

    return view('project-show-admin', compact('projects', 'user','cat', 'all_cats', 'cat_id', 'do_work','users'));

  }

    public function ProjectFreigegeben(Request $request) {

      $user = Auth::user();


      $projects = Project::where('stat', '=', '0')
                        ->with('images')
                        ->paginate(5);


      return view('project-show-admin', compact('projects', 'user','cat'));

    }

    public function EmailSenden(Request $request) {

      $userId = $request->input("user_id");
      $projectId = $request->input("project_id");

      $user = User::where('id', $userId)->first();
      $project = Project::where('id', $projectId)->first();

      return view('email-senden', compact('project', 'user'));


    }
	
	


}
