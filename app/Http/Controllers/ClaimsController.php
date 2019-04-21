<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Soumen\Agent\Facades\Agent;
use Hash;
use App\User;
use App\ItineraryDetail;
use App\Claim;
use App\Connection;
use App\Currency;
use App\Airport;
use App\Passenger;
use App\Airline;
use App\Expense;
use App\Ticket;
use Illuminate\Http\Request;
use Auth;
use Log;
use PragmaRX\Countries\Package\Countries;
use App\Setting;
use File;
use App\ClaimFile;
use App\Classes\cPanel;

class ClaimsController extends Controller
{

    public $europe_countries_code;
    public $europe_countries;
    public function __construct() {
        $this->europe_countries_code = ['at','be','bg','hr','cy','cz','dk','ee','fi','fr','de','gr','hu','ie','it','lv','lt','lu','mt','nl','pl','pt','ro','sk','si','es','se','gb','is','no','ch','tr','ua'];
        $this->europe_countries = ['austria', 'belgium', 'bulgaria', 'croatia', 'cyprus', 'czech republic', 'denmark', 'estonia', 'finland', 'france', 'germany', 'greece', 'hungary', 'ireland', 'italy', 'latvia', 'lithuania', 'luxembourg', 'malta', 'the netherlands', 'poland', 'portugal', 'romania', 'slovakia', 'slovenia', 'spain', 'sweden', 'united kingdom', 'iceland', 'norway', 'switzerland', 'turkey', 'ukraine'];
        
    }

    public function randomName() {
        
    }
    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    public function create_cpanel_email($email_name, $password){
        $cPanel = new cPanel(env('CPANEL_USERNAME'), env('CPANEL_PASSWORD'), env('CPANEL_IP'));
        $parameters = [
                'email'         => $email_name,
                'password'      => $password,
                'domain'        => env('CPANEL_DOMAIN'),
                'quota'         => 0,
        ];

        $result = $cPanel->execute('uapi', "Email", "add_pop", $parameters);
        if (!$result->status == 1) {
            return "not okay";
        }
        return "okay";
    }

    public function claim(){
       return view('front-end.claim.claim');
    }

   public function missed_connection()
   {

        $airports = Airport::select('name', 'iata_code')->get()->toArray();
        $airport_object = '[';
        foreach ($airports as $airport) {
            $airport_object .= "['".addslashes($airport['name'])."', '".addslashes($airport['iata_code'])."'],";
        }
        $airport_object = rtrim($airport_object, ',');
        $airport_object .= ']';

        $airlines = Airline::select('name', 'iata_code')->get()->toArray();
        $airline_object = '[';
        foreach ($airlines as $airline) {
            $airline_object .= "['".addslashes($airline['name'])."', '".addslashes($airline['iata_code'])."'],";
        }
        $airline_object = rtrim($airline_object, ',');
        $airline_object .= ']';

        $currencies = Countries::currencies();

        return view('front-end.claim.missed_connection', compact('airport_object', 'airline_object', 'currencies'));
   }

   public function flight_delay()
   {

        $airports = Airport::select('name', 'iata_code')->get()->toArray();
        $airport_object = '[';
        foreach ($airports as $airport) {
            $airport_object .= "['".addslashes($airport['name'])."', '".addslashes($airport['iata_code'])."'],";
        }
        $airport_object = rtrim($airport_object, ',');
        $airport_object .= ']';

        $airlines = Airline::select('name', 'iata_code')->get()->toArray();
        $airline_object = '[';
        foreach ($airlines as $airline) {
            $airline_object .= "['".addslashes($airline['name'])."', '".addslashes($airline['iata_code'])."'],";
        }
        $airline_object = rtrim($airline_object, ',');
        $airline_object .= ']';

        $currencies = Countries::currencies();


       return view('front-end.claim.flight_delay', compact('airport_object', 'airline_object', 'currencies'));
   }

   public function flight_cancellation()
   {
        $airports = Airport::select('name', 'iata_code')->get()->toArray();
        $airport_object = '[';
        foreach ($airports as $airport) {
            $airport_object .= "['".addslashes($airport['name'])."', '".addslashes($airport['iata_code'])."'],";
        }
        $airport_object = rtrim($airport_object, ',');
        $airport_object .= ']';

        $airlines = Airline::select('name', 'iata_code')->get()->toArray();
        $airline_object = '[';
        foreach ($airlines as $airline) {
            $airline_object .= "['".addslashes($airline['name'])."', '".addslashes($airline['iata_code'])."'],";
        }
        $airline_object = rtrim($airline_object, ',');
        $airline_object .= ']';

        $currencies = Countries::currencies();


       return view('front-end.claim.flight_cancellation', compact('airport_object', 'airline_object', 'currencies'));
   }

   public function delay_luggage()
   {

        $airports = Airport::select('name', 'iata_code')->get()->toArray();
        $airport_object = '[';
        foreach ($airports as $airport) {
            $airport_object .= "['".addslashes($airport['name'])."', '".addslashes($airport['iata_code'])."'],";
        }
        $airport_object = rtrim($airport_object, ',');
        $airport_object .= ']';

        $airlines = Airline::select('name', 'iata_code')->get()->toArray();
        $airline_object = '[';
        foreach ($airlines as $airline) {
            $airline_object .= "['".addslashes($airline['name'])."', '".addslashes($airline['iata_code'])."'],";
        }
        $airline_object = rtrim($airline_object, ',');
        $airline_object .= ']';

        $currencies = Countries::currencies();


       return view('front-end.claim.delay_luggage', compact('airport_object', 'airline_object', 'currencies'));
   }

   public function lost_luggage()
   {


        $airports = Airport::select('name', 'iata_code')->get()->toArray();
        $airport_object = '[';
        foreach ($airports as $airport) {
            $airport_object .= "['".addslashes($airport['name'])."', '".addslashes($airport['iata_code'])."'],";
        }
        $airport_object = rtrim($airport_object, ',');
        $airport_object .= ']';

        $airlines = Airline::select('name', 'iata_code')->get()->toArray();
        $airline_object = '[';
        foreach ($airlines as $airline) {
            $airline_object .= "['".addslashes($airline['name'])."', '".addslashes($airline['iata_code'])."'],";
        }
        $airline_object = rtrim($airline_object, ',');
        $airline_object .= ']';

        $currencies = Countries::currencies();

       return view('front-end.claim.lost_luggage', compact('airport_object', 'airline_object', 'currencies'));
   }

   public function denied_boarding()
   {
        $airports = Airport::select('name', 'iata_code')->get()->toArray();
        $airport_object = '[';
        foreach ($airports as $airport) {
            $airport_object .= "['".addslashes($airport['name'])."', '".addslashes($airport['iata_code'])."'],";
        }
        $airport_object = rtrim($airport_object, ',');
        $airport_object .= ']';

        $airlines = Airline::select('name', 'iata_code')->get()->toArray();
        $airline_object = '[';
        foreach ($airlines as $airline) {
            $airline_object .= "['".addslashes($airline['name'])."', '".addslashes($airline['iata_code'])."'],";
        }
        $airline_object = rtrim($airline_object, ',');
        $airline_object .= ']';

        $currencies = Countries::currencies();

       return view('front-end.claim.denied_boarding', compact('airport_object', 'airline_object', 'currencies'));
   }

    /**
    * @param $lat1, $lon1, $lat2, $lon2, $unit=K,M,N
    *
    * @return distance (float)
    */
    function distance($lat1, $lon1, $lat2, $lon2, $unit) {
      if (($lat1 == $lat2) && ($lon1 == $lon2)) {
        return 0;
      }else {
        $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;
        $unit = strtoupper($unit);

        if ($unit == "K") {
          return round($miles * 1.609344);
        } else if ($unit == "N") {
          return round($miles * 0.8684);
        } else {
          return round($miles);
        }
      }
    }





    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $claims = Claim::where('user_id', 'LIKE', "%$keyword%")
                ->orWhere('departed_from_id', 'LIKE', "%$keyword%")
                ->orWhere('final_destination_id', 'LIKE', "%$keyword%")
                ->orWhere('is_direct_flight', 'LIKE', "%$keyword%")
                ->orWhere('selected_connection_id', 'LIKE', "%$keyword%")
                ->orWhere('what_happened_to_the_flight', 'LIKE', "%$keyword%")
                ->orWhere('total_delay', 'LIKE', "%$keyword%")
                ->orWhere('reason', 'LIKE', "%$keyword%")
                ->orWhere('is_rerouted', 'LIKE', "%$keyword%")
                ->orWhere('is_obtain_full_reimbursement', 'LIKE', "%$keyword%")
                ->orWhere('ticket_price', 'LIKE', "%$keyword%")
                ->orWhere('ticket_currency', 'LIKE', "%$keyword%")
                ->orWhere('is_paid_for_rerouting', 'LIKE', "%$keyword%")
                ->orWhere('is_spend_on_accommodation', 'LIKE', "%$keyword%")
                ->orWhere('is_signed_permission', 'LIKE', "%$keyword%")
                ->orWhere('here_from_where', 'LIKE', "%$keyword%")
                ->orWhere('here_from_other', 'LIKE', "%$keyword%")
                ->orWhere('is_contacted_airline', 'LIKE', "%$keyword%")
                ->orWhere('what_happened', 'LIKE', "%$keyword%")
                ->orWhere('claim_table_type', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $claims = Claim::latest()->paginate($perPage);
        }

        return view('claims.index', compact('claims'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('claims.create');
    }

    /**
     * Returns id from a name+iata-code Ex. London Dubai Airport (LON)
     *
     * @param string Ex. London Dubai Airport (LON)
     *
     * @return integer Ex. 2
     */
    public function get_airport_id_name_and_iata_code($sting){
        $iata_code =  rtrim(substr($sting, strrpos($sting,"(")+1), ')'); // LON
        $airline_id = Airport::WHERE('iata_code', $iata_code)->first()->id;
        if ($airline_id) {
            return $airline_id;
        }else{
            return 0;
        }
    }
    public function get_airline_id_name_and_iata_code($sting){
        $iata_code =  rtrim(substr($sting, strrpos($sting,"(")+1), ')'); // LON
        $airline_id = Airline::WHERE('iata_code', $iata_code)->first()->id;
        if ($airline_id) {
            return $airline_id;
        }else{
            return 0;
        }
    }

    public function store(Request $request)
    {

        $user_agent = Agent::all();

        $departed_from_id = $this->get_airport_id_name_and_iata_code($request->departed_from);
        $final_destination_id = $this->get_airport_id_name_and_iata_code($request->final_destination);

        if (!isset($request->is_direct_flight)) {
            $is_direct_flight = 0;
        }else{
            $is_direct_flight = $request->is_direct_flight;
        }

        if (isset($request->what_happened_to_the_flight)) {
            $what_happened_to_the_flight = $request->what_happened_to_the_flight;
        }else{
            $what_happened_to_the_flight = "";
        }

        if (isset($request->total_delay)) {
            $total_delay = $request->total_delay;
        }else{
            $total_delay = "";
        }

        if (isset($request->reason)) {
            $reason = $request->reason;
        }else{
            $reason = "";
        }



        if (!isset($request->is_rerouted)) {
            $is_rerouted = 0;
        }else{
            $is_rerouted = $request->is_rerouted;
        }

        if (!isset($request->is_obtained_full_reimbursement)) {
            $is_obtain_full_reimbursement = 0;
        }else{
            $is_obtain_full_reimbursement = $request->is_obtained_full_reimbursement;
        }

        if (isset($request->ticket_price_original_ticket)) {
            $ticket_price = $request->ticket_price_original_ticket;
        }else{
            $ticket_price = 0;
        }

        if (isset($request->ticket_currency_original_ticket)) {
            $ticket_currency = $request->ticket_currency_original_ticket;
        }else{
            $ticket_currency = 0;
        }



        if (!isset($request->is_paid_for_rerouting)) {
            $is_paid_for_rerouting = 0;
        }else{
            $is_paid_for_rerouting = $request->is_paid_for_rerouting;
        }


        if (isset($request->ticket_price_rerouting)) {
            $rerouted_ticket_price = $request->ticket_price_rerouting;
        }else{
            $rerouted_ticket_price = "";
        }

        if (isset($request->ticket_currency_rerouting)) {
            $rerouted_ticket_currency = $request->ticket_currency_rerouting;
        }else{
            $rerouted_ticket_currency = "";
        }


        $email = $request->email_address;


        if (isset($request->pir)) {
            $pir = $request->pir;
        }else{
            $pir = "";
        }
        if (isset($request->written_airline_date)) {
            $written_airline_date = $request->written_airline_date;
        }else{
            $written_airline_date = "";
        }
        if (isset($request->received_luggage_date)) {
            $received_luggage_date = $request->received_luggage_date;
        }else{
            $received_luggage_date = "";
        }
        if (isset($request->correspondence_property_irregularity_report)) {
            $correspondence_property_irregularity_report = $request->correspondence_property_irregularity_report;
        }else{
            $correspondence_property_irregularity_report = "";
        }




        if (!isset($request->is_luggage_received)) {
            $is_luggage_received = 0;
        }else{
            $is_luggage_received = $request->is_luggage_received;
        }

        if (!isset($request->is_already_written_airline)) {
            $is_already_written_airline = 0;
        }else{
            $is_already_written_airline = $request->is_already_written_airline;
        }

        if (!isset($request->is_notify_before_forteen_days)) {
            $is_notify_before_forteen_days = 0;
        }else{
            $is_notify_before_forteen_days = $request->is_notify_before_forteen_days;
        }

        if (!isset($request->is_spend_on_accommodation)) {
            $spend_on_accommodation = 0;
        }else{
            $spend_on_accommodation = $request->is_spend_on_accommodation;
        }

        if (isset($request->here_from_where)) {
            $here_from_where = $request->here_from_where;
        }else{
            $here_from_where = "";
        }

        if (isset($request->is_contacted_airline)) {
            $is_contacted_airline = $request->is_contacted_airline;
        }else{
            $is_contacted_airline = 0;
        }

        if (isset($request->what_happened)) {
            $what_happened = $request->what_happened;
        }else{
            $what_happened = "";
        }

        if (isset($request->claim_table_type)) {
            $claim_table_type = $request->claim_table_type;
        }else{
            $claim_table_type = "";
        }

        if (isset($request->selected_connection_iata_codes)) {
            $selected_connection_iata_codes = $request->selected_connection_iata_codes;
        }else{
            $selected_connection_iata_codes = "";
        }



        if (Auth::user()) {
            $user = Auth::user();
        }else{
            // create new user or get old
            $user_count = User::where('email', $email)->count();
            if ($user_count ==0) {
                $user = User::create(
                    [
                     'name'             => $email,
                     'email'            => $email,
                     'password'         => Hash::make($email)
                    ]);
                $user->syncRoles('User');
            }else{
                $user = User::where('email', $email)->first();
            }
            // user login
            if ($user != null){
                Auth::loginUsingId($user->id);
            }
        }

        $adminCom=Setting::where('fieldKey','_admin_comm')->where('status',1)->first();
        $affiliateCom=Setting::where('fieldKey','_affiliate_comm')->where('status',1)->first();



        // create claim
        $claim = new Claim();
        $claim->user_id                                 = $user->id;
        $claim->departed_from_id                        = $departed_from_id;
        $claim->final_destination_id                    = $final_destination_id;
        $claim->is_direct_flight                        = $is_direct_flight;
        $claim->selected_connection_iata_codes          = $selected_connection_iata_codes;
        $claim->what_happened_to_the_flight             = $what_happened_to_the_flight;
        $claim->total_delay                             = $total_delay;
        $claim->reason                                  = $reason;
        $claim->is_rerouted                             = $is_rerouted;
        $claim->is_obtain_full_reimbursement            = $is_obtain_full_reimbursement;
        $claim->ticket_price                            = $ticket_price;
        $claim->ticket_currency                         = $ticket_currency;
        $claim->rerouted_ticket_price                   = $rerouted_ticket_price;
        $claim->rerouted_ticket_currency                = $rerouted_ticket_currency;
        $claim->is_paid_for_rerouting                   = $is_paid_for_rerouting;

        $claim->spend_on_accommodation                  = $spend_on_accommodation;
        $claim->here_from_where                         = $here_from_where;
        $claim->is_contacted_airline                    = $is_contacted_airline;
        $claim->what_happened                           = $what_happened;

        $claim->affiliate_user_id                       = $user->affiliate_user_id;


        $claim->is_notify_before_forteen_days           = $is_notify_before_forteen_days;
        $claim->is_already_written_airline              = $is_already_written_airline;
        $claim->written_airline_date                    = $written_airline_date;
        $claim->pir                                     = $pir;
        $claim->received_luggage_date                   = $received_luggage_date;
        $claim->correspondence_property_irregularity_report = $correspondence_property_irregularity_report;
        $claim->is_luggage_received                     = $is_luggage_received;

        $claim->claim_status_id                         = '1';
        $claim->claim_next_step_id                      = '1';


        $claim->affiliate_commision                     = $affiliateCom->fieldValue;
        $claim->admin_commision                         = $adminCom->fieldValue;
        $claim->claim_table_type                        = $claim_table_type;


        $claim->ip                                      =    $user_agent->ip;
        $claim->browser                                 =    $user_agent->browser->name;
        $claim->language                                =    $request->server('HTTP_ACCEPT_LANGUAGE');
        $claim->os                                      =    $user_agent->platform->name;

        $claim->save();

        if ($claim) {
          $ticket = new Ticket;
          $ticket->subject = $claim->claim_table_type;
          $ticket->claim_id = $claim->id;
          $ticket->user_id = $claim->user_id;
          $ticket->status = "1";
          $ticket->save();
        }


        // create connect
        if (isset($request->connection)) {
            foreach ($request->connection as $con) {
                if ($con != "") {
                    $connection             = new Connection();
                    $connection->claim_id   = $claim->id;
                    $connection->airport_id = $this->get_airport_id_name_and_iata_code($con);
                    $connection->save();
                }
            }
        }

        // create passenger
        if (isset($request->first_name)) {
            $cnt = 0;
            foreach ($request->first_name as $single_first_name) {
                if ($single_first_name != "") {
                    if ($cnt==0) {
                        $cpanel_email_name  = $request->first_name[0].'0'.$claim->id;
                        $passenger_email    = $email;
                    }else{
                        $passenger_email = $request->additional_email_address[$cnt];
                    }
                    $passenger                          = new Passenger();
                    $passenger->claim_id                = $claim->id;
                    $passenger->first_name              = $request->first_name[$cnt];
                    $passenger->last_name               = $request->last_name[$cnt];
                    $passenger->address                 = $request->address[$cnt];
                    $passenger->post_code               = $request->post_code[$cnt];
                    $passenger->date_of_birth           = $request->date_of_birth[$cnt];
                    $passenger->email                   = $passenger_email;
                    $passenger->is_booking_reference    = $request->is_booking_reference[$cnt];
                    $passenger->booking_refernece       = $request->booking_reference_field_input[$cnt];
                    $passenger->save();
                }
                $cnt++;
            }
        }



        // create ininerary detail
        $airline_id = 0;
        if (isset($request->flight_code)) {
            $cnt = 0;
            foreach ($request->flight_code as $single_flight_code) {
                if ($single_flight_code != "") {
                  if ($request->flight_segment[$cnt] == $selected_connection_iata_codes) {
                    $is_selected = 1;
                    $airline_id  = Airline::where('iata_code', $single_flight_code)->first()->id;
                  }else{
                    $is_selected = 0;
                  }
                  $itineraryDetail                    = new ItineraryDetail();
                  $itineraryDetail->claim_id          = $claim->id;
                  $itineraryDetail->flight_number     = $request->flight_number[$cnt];
                  $itineraryDetail->flight_segment    = $request->flight_segment[$cnt];
                  $itineraryDetail->departure_date    = $request->departure_date[$cnt];
                  $itineraryDetail->is_selected        = $is_selected;
                  $itineraryDetail->airline_id        = Airline::where('iata_code', $single_flight_code)->first()->id;
                  $itineraryDetail->save();
                }
                $cnt++;
            }

            if (count($request->flight_code)==1) {
                $airline_id  = ItineraryDetail::where('claim_id', $claim->id)->first()->airline_id;
            }
        }


        // create expenses
        if (isset($request->expense_name)) {
            $cnt = 0;
            foreach ($request->expense_name as $single_expense_name) {

                if (isset($request->is_receipt[$cnt])) {
                    $is_receipt = $request->is_receipt[$cnt];
                }else{
                    $is_receipt = 0;
                }

                $expense                    = new Expense();
                $expense->claim_id          = $claim->id;
                $expense->name              = $request->expense_name[$cnt];
                $expense->amount            = $request->expense_price[$cnt];
                $expense->currency          = $request->expense_currency[$cnt];
                $expense->is_receipt        = $is_receipt;
                $expense->save();

                $cnt++;
            }
        }
// -----------------------------
        // store files
        if ($request->file('file_name') !== null) {
            $all_files = $request->file('file_name');
            // $file1 = $file_name[1]['file'];
            $claim_id = $claim->id;
            for($i=0; $i<count($all_files); $i++) {   
                $file = $all_files[$i];

                $file_name = sha1(date('YmdHis') . str_random(30));
                $name = $file_name . '.' . $file->getClientOriginalExtension();

                if(!File::exists(public_path('/uploads').'/'.$claim_id)) {
                    File::makeDirectory(public_path('/uploads').'/'.$claim_id);
                }

                $file->move(public_path('/uploads').'/'.$claim_id.'/', $name);

                $claim_file             = new ClaimFile();
                $claim_file->name       = "Uploaded by user";
                $claim_file->file_name  = $name;
                $claim_file->user_id    = Auth::user()->id;
                $claim_file->claim_id   = $claim_id;
                $claim_file->save();
            }
        }


        /**
        * Create custom email
        */
        $cpanel_password  = $this->randomPassword();

        $this->create_cpanel_email($cpanel_email_name, $cpanel_password);
        $cpanel_email     = $cpanel_email_name.'@freeflightclaim.com';


        if ($claim_table_type == "missed_connection") {
            $amount_and_distance = $this->missed_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim->id);
        }elseif ($claim_table_type == 'flight_delay') {
            $amount_and_distance = $this->flight_delay_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim->id);
        }elseif ($claim_table_type == 'flight_cancellation') {
            $amount_and_distance = $this->flight_cancellation_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim->id);
        }elseif ($claim_table_type == 'delay_luggage') {
            $amount_and_distance = $this->delay_luggage_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim->id);
        }elseif ($claim_table_type == 'lost_luggage') {
            $amount_and_distance = $this->lost_luggage_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim->id, $is_luggage_received, $received_luggage_date, $is_already_written_airline);
        }elseif ($claim_table_type == 'denied_boarding') {
            $amount_and_distance = $this->denied_boarding_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim->id);
        }

        $amount_and_distance = explode('-', $amount_and_distance);


        $update_claim                   = Claim::find($claim->id);
        $update_claim->amount           = $amount_and_distance[0];
        $update_claim->airline_id       = $airline_id;
        $update_claim->cpanel_email     = $cpanel_email;
        $update_claim->cpanel_password  = $cpanel_password;
        $update_claim->distance         = $amount_and_distance[1];
        $update_claim->save();

        $amount = $amount_and_distance[0];

        return view('front-end.claim.success',compact('amount'));

    }


    public function ajax_fight_delay_calculation(Request $request){

        $total_delay = $request->total_delay;
        $departed_from_id = $this->get_airport_id_name_and_iata_code($request->departed_from);
        $final_destination_id = $this->get_airport_id_name_and_iata_code($request->final_destination);

        $airline = Airline::WHERE('iata_code', $request->flight_code)->first();

        $departed_from = Airport::WHERE('id', $departed_from_id)->first();
        $final_destination = Airport::WHERE('id', $final_destination_id)->first();


        $distance = $this->distance($departed_from->latitude, $departed_from->longitude, $final_destination->latitude, $final_destination->longitude, 'K');

        

        // stated from Europe
        if ((in_array(strtolower($departed_from->country), $this->europe_countries)) || (in_array(strtolower($departed_from->country), $this->europe_countries_code))) {
            
            // europe to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
                
                if ($total_delay == "less_than_3_hours") {
                    
                  return '0';
                }else{
                    
                  if ($distance < 1500) {
                    return '250 EUR';
                  }elseif ($distance <= 3500) {
                    return '400 EUR';
                  }else{
                    return '600 EUR';
                  }
                }

            // europe to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {

                if ($total_delay == "3_to_8_hours") {
                  if ($distance < 1500) {
                    return '250 EUR';
                  }elseif ($distance <= 3500) {
                    return '400 EUR';
                  }else{
                    return '600 EUR';
                  }
                }elseif($total_delay == "more_than_8_hours"){
                  if ($distance < 2000) {
                    return '1250 ILS';
                  }elseif ($distance <= 3500) {
                    return '2000 ILS';
                  }elseif ($distance <= 4500) {
                    return '600 EUR';
                  }else{
                    return '3080 ILS';
                  }
                }

            // europe to other country
            }else{

                if ($total_delay == "less_than_3_hours") {
                  return '0';
                }else{
                  if ($distance < 1500) {
                    return '250 EUR';
                  }elseif ($distance <= 3500) {
                    return '400 EUR';
                  }else{
                    return '600 EUR';
                  }
                }

            }


          // started from israel
          }elseif ((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") )  {

            

            // israel to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
              if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {

                if ($total_delay == "3_to_8_hours") {
                  if ($distance < 1500) {
                    return '250 EUR';
                  }elseif ($distance <= 3500) {
                    return '400 EUR';
                  }else{
                    return '600 EUR';
                  }
                }elseif($total_delay == "more_than_8_hours"){
                  if ($distance < 2000) {
                    return '1250 ILS';
                  }elseif ($distance <= 3500) {
                    return '2000 ILS';
                  }elseif ($distance <= 4500) {
                    return '600 EUR';
                  }else{
                    return '3080 ILS';
                  }
                }

              // other airline
              }else {
                if ($total_delay == "more_than_8_hours") {
                  if ($distance < 2000) {
                    return '1250 ILS';
                  }elseif ($distance <= 4500) {
                    return '2000 ILS';
                  }else{
                    return '3080 ILS';
                  }
                }else{
                  return '0';
                }
              }

            // israel to other
            }else{
              if ($total_delay == "more_than_8_hours") {
                if ($distance < 2000) {
                  return '1250 ILS';
                }elseif ($distance <= 4500) {
                  return '2000 ILS';
                }else{
                  return '3080 ILS';
                }
              }else{
                return '0';
              }
            }

          // started from other country
          }else{

            

            // other country to europe
            if ( (in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code)) ) {
              
              // europe airline
              if ( (in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
                if ($total_delay == "less_than_3_hours") {
                  return '0';
                }else{
                  if ($distance < 1500) {
                    return '250 EUR';
                  }elseif ($distance <= 3500) {
                    return '400 EUR';
                  }else{
                    return '600 EUR';
                  }
                }
              }else{

                if(in_array(strtolower($final_destination->country), $this->europe_countries_code)){
                    Log::debug('working');
                }else{
                    Log::debug('not working');
                }


                return '0';
              }

            // other country to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {
              if ($total_delay == "more_than_8_hours") {
                if ($distance < 2000) {
                  return '1250 ILS';
                }elseif ($distance <= 4500) {
                  return '2000 ILS';
                }else{
                  return '3080 ILS';
                }
              }else{
                return '0';
              }
            }
          }
          return '0';
        }
    public function ajax_fight_cancellation_calculation(Request $request){
      
        $total_delay = $request->total_delay;
        $departed_from_id = $this->get_airport_id_name_and_iata_code($request->departed_from);
        $final_destination_id = $this->get_airport_id_name_and_iata_code($request->final_destination);

        $airline = Airline::WHERE('iata_code', $request->flight_code)->first();


        $departed_from = Airport::WHERE('id', $departed_from_id)->first();
        $final_destination = Airport::WHERE('id', $final_destination_id)->first();


        $distance = $this->distance($departed_from->latitude, $departed_from->longitude, $final_destination->latitude, $final_destination->longitude, 'K');

        // stated from Europe
        if ((in_array(strtolower($departed_from->country), $this->europe_countries)) || (in_array(strtolower($departed_from->country), $this->europe_countries_code))) {

            // europe to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {

                  if ($distance < 1500) {
                    return '250 EUR';
                  }elseif ($distance <= 3500) {
                    return '400 EUR';
                  }else{
                    return '600 EUR';
                  }

            // europe to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {

                  if ($distance < 2000) {
                    return '1250 ILS';
                  }elseif ($distance <= 3500) {
                    return '2000 ILS';
                  }elseif ($distance <= 4500) {
                    return '600 EUR';
                  }else{
                    return '3080 ILS';
                  }


            // europe to other country
            }else{

                if ($distance < 1500) {
                  return '250 EUR';
                }elseif ($distance <= 3500) {
                  return '400 EUR';
                }else{
                  return '600 EUR';
                }

            }


          // started from israel
          }elseif ((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") )  {
            // israel to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
              if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
                  if ($distance < 2000) {
                    return '1250 ILS';
                  }elseif ($distance <= 3500) {
                    return '2000 ILS';
                  }elseif ($distance <= 4500) {
                    return '600 EUR';
                  }else{
                    return '3080 ILS';
                  }

              // other airline
              }else {
                  if ($distance < 2000) {
                    return '1250 ILS';
                  }elseif ($distance <= 4500) {
                    return '2000 ILS';
                  }else{
                    return '3080 ILS';
                  }
              }

            // israel to other
            }else{
                  if ($distance < 2000) {
                    return '1250 ILS';
                  }elseif ($distance <= 4500) {
                    return '2000 ILS';
                  }else{
                    return '3080 ILS';
                  }
            }

          // started from other country
          }else{

            // other country to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
              if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
                if ($distance < 1500) {
                  return '250 EUR';
                }elseif ($distance <= 3500) {
                  return '400 EUR';
                }else{
                  return '600 EUR';
                }
              }else{
                return '0';
              }

            // other country to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {
                if ($distance < 2000) {
                  return '1250 ILS';
                }elseif ($distance <= 4500) {
                  return '2000 ILS';
                }else{
                  return '3080 ILS';
                }
            }
          }
          return '0';
        }


        public function ajax_denied_bording_calculation(Request $request){

            $total_delay = $request->total_delay;
            $departed_from_id = $this->get_airport_id_name_and_iata_code($request->departed_from);
            $final_destination_id = $this->get_airport_id_name_and_iata_code($request->final_destination);
            $airline = Airline::WHERE('iata_code', $request->flight_code)->first();

            $departed_from = Airport::WHERE('id', $departed_from_id)->first();
            $final_destination = Airport::WHERE('id', $final_destination_id)->first();


            $distance = $this->distance($departed_from->latitude, $departed_from->longitude, $final_destination->latitude, $final_destination->longitude, 'K');

                // stated from Europe
            if ((in_array(strtolower($departed_from->country), $this->europe_countries)) || (in_array(strtolower($departed_from->country), $this->europe_countries_code)) ) {

                    // europe to europe
                if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {

                    if ($distance < 1500) {
                        return '250 EUR';
                    }elseif ($distance <= 3500) {
                        return '400 EUR';
                    }else{
                        return '600 EUR';
                    }

                    // europe to israel
                }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel")) {

                    if ($distance < 2000) {
                        return '1250 ILS';
                    }elseif ($distance <= 3500) {
                        return '2000 ILS';
                    }elseif ($distance <= 4500) {
                        return '600 EUR';
                    }else{
                        return '3080 ILS';
                    }


                    // europe to other country
                }else{
                    if ($distance < 1500) {
                        return '250 EUR';
                    }elseif ($distance <= 3500) {
                        return '400 EUR';
                    }else{
                        return '600 EUR';
                    }

                }


                  // started from israel
            }elseif ((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") )  {
                    // israel to europe
                if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
                      // europe airline
                    if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
                        if ($distance < 2000) {
                            return '1250 ILS';
                        }elseif ($distance <= 3500) {
                            return '2000 ILS';
                        }elseif ($distance <= 4500) {
                            return '600 EUR';
                        }else{
                            return '3080 ILS';
                        }

                      // israel airline
                    }else{
                        if ($distance < 2000) {
                            return '1250 ILS';
                        }elseif ($distance <= 4500) {
                            return '2000 ILS';
                        }else{
                            return '3080 ILS';
                        }
                    }

                    // israel to other
                }else{
                    if ($distance < 2000) {
                        return '1250 ILS';
                    }elseif ($distance <= 4500) {
                        return '2000 ILS';
                    }else{
                        return '3080 ILS';
                    }
                }

                  // started from other country
            }else{

                    // other country to europe
                if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
                      // europe airline
                    if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
                        if ($distance < 1500) {
                            return '250 EUR';
                        }elseif ($distance <= 3500) {
                            return '400 EUR';
                        }else{
                            return '600 EUR';
                        }
                    }else{
                        return '0';
                    }

                    // other country to israel
                }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {
                    if ($distance < 2000) {
                        return '1250 ILS';
                    }elseif ($distance <= 4500) {
                        return '2000 ILS';
                    }else{
                        return '3080 ILS';
                    }
                }
            }
            return '0';
        }


    public function ajax_missed_calculation(Request $request){

        $total_delay = $request->total_delay;
        $departed_from_id = $this->get_airport_id_name_and_iata_code($request->departed_from);
        $final_destination_id = $this->get_airport_id_name_and_iata_code($request->final_destination);

        $airline = Airline::WHERE('iata_code', $request->flight_code)->first();

        $departed_from = Airport::WHERE('id', $departed_from_id)->first();
        $final_destination = Airport::WHERE('id', $final_destination_id)->first();


        $distance = $this->distance($departed_from->latitude, $departed_from->longitude, $final_destination->latitude, $final_destination->longitude, 'K');

        // stated from Europe
        if ((in_array(strtolower($departed_from->country), $this->europe_countries)) || (in_array(strtolower($departed_from->country), $this->europe_countries_code))) {

            // europe to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {

                if ($total_delay == "less_than_3_hours") {
                  return '0';
                }else{
                  if ($distance < 1500) {
                    return '250 EUR';
                  }elseif ($distance <= 3500) {
                    return '400 EUR';
                  }else{
                    return '600 EUR';
                  }
                }

            // europe to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {

                if ($total_delay == "3_to_8_hours") {
                  if ($distance < 1500) {
                    return '250 EUR';
                  }elseif ($distance <= 3500) {
                    return '400 EUR';
                  }else{
                    return '600 EUR';
                  }
                }elseif($total_delay == "more_than_8_hours"){
                  if ($distance < 2000) {
                    return '1250 ILS';
                  }elseif ($distance <= 3500) {
                    return '2000 ILS';
                  }elseif ($distance <= 4500) {
                    return '600 EUR';
                  }else{
                    return '3080 ILS';
                  }
                }

            // europe to other country
            }else{

              if ($total_delay == "less_than_3_hours") {
                return '0';
              }else{
                if ($distance < 1500) {
                  return '250 EUR';
                }elseif ($distance <= 3500) {
                  return '400 EUR';
                }else{
                  return '600 EUR';
                }
              }

            }


          // started from israel
          }elseif ((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") )  {
            // israel to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {

              if ($total_delay == "less_than_3_hours") {
                return '0';
              }else{
                  // europe airline
                  if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {

                    if ($total_delay == "3_to_8_hours") {
                      if ($distance < 1500) {
                        return '250 EUR';
                      }elseif ($distance <= 3500) {
                        return '400 EUR';
                      }else{
                        return '600 EUR';
                      }
                    }elseif($total_delay == "more_than_8_hours"){
                      if ($distance < 2000) {
                        return '1250 ILS';
                      }elseif ($distance <= 3500) {
                        return '2000 ILS';
                      }elseif ($distance <= 4500) {
                        return '600 EUR';
                      }else{
                        return '3080 ILS';
                      }
                    }

                  // other airline
                  }else{
                    if ($total_delay == "more_than_8_hours") {
                      if ($distance < 2000) {
                        return '1250 ILS';
                      }elseif ($distance <= 4500) {
                        return '2000 ILS';
                      }else{
                        return '3080 ILS';
                      }
                    }else{
                      return '0';
                    }
                  }
              }


            // israel to other
            }else{
              if ($total_delay == "more_than_8_hours") {
                if ($distance < 2000) {
                  return '1250 ILS';
                }elseif ($distance <= 4500) {
                  return '2000 ILS';
                }else{
                  return '3080 ILS';
                }
              }else{
                return '0';
              }
            }

          // started from other country
          }else{

            // other country to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
              if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
                if ($total_delay == "less_than_3_hours") {
                  return '0';
                }else{
                  if ($distance < 1500) {
                    return '250 EUR';
                  }elseif ($distance <= 3500) {
                    return '400 EUR';
                  }else{
                    return '600 EUR';
                  }
                }
              }else{
                return '0';
              }

            // other country to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {
              if ($total_delay == "more_than_8_hours") {
                if ($distance < 2000) {
                  return '1250 ILS';
                }elseif ($distance <= 4500) {
                  return '2000 ILS';
                }else{
                  return '3080 ILS';
                }
              }else{
                return '0';
              }
            }
          }
          return '0';
    }


    public function denied_boarding_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim_id){

        $airline_id = ItineraryDetail::WHERE('claim_id', $claim_id)->WHERE('flight_segment', $selected_connection_iata_codes)->first()->airline_id;

        $airline = Airline::WHERE('id', $airline_id)->first();


        $departed_from = Airport::WHERE('id', $departed_from_id)->first();
        $final_destination = Airport::WHERE('id', $final_destination_id)->first();


        $distance = $this->distance($departed_from->latitude, $departed_from->longitude, $final_destination->latitude, $final_destination->longitude, 'K');

        // stated from Europe
        if ((in_array(strtolower($departed_from->country), $this->europe_countries)) || (in_array(strtolower($departed_from->country), $this->europe_countries_code)) ) {

            // europe to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {

            if ($distance < 1500) {
                return '250 EUR'.'-'.$distance;
            }elseif ($distance <= 3500) {
                return '400 EUR'.'-'.$distance;
            }else{
                return '600 EUR'.'-'.$distance;
            }

            // europe to israel
        }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel")) {

            if ($distance < 2000) {
                return '1250 ILS'.'-'.$distance;
            }elseif ($distance <= 3500) {
                return '2000 ILS'.'-'.$distance;
            }elseif ($distance <= 4500) {
                return '600 EUR'.'-'.$distance;
            }else{
                return '3080 ILS'.'-'.$distance;
            }


            // europe to other country
        }else{
            if ($distance < 1500) {
              return '250 EUR'.'-'.$distance;
          }elseif ($distance <= 3500) {
              return '400 EUR'.'-'.$distance;
          }else{
              return '600 EUR'.'-'.$distance;
          }

      }


          // started from israel
  }elseif ((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") )  {
            // israel to europe
    if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
      if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
          if ($distance < 2000) {
            return '1250 ILS'.'-'.$distance;
        }elseif ($distance <= 3500) {
            return '2000 ILS'.'-'.$distance;
        }elseif ($distance <= 4500) {
            return '600 EUR'.'-'.$distance;
        }else{
            return '3080 ILS'.'-'.$distance;
        }

              // israel airline
    }else{
      if ($distance < 2000) {
        return '1250 ILS'.'-'.$distance;
    }elseif ($distance <= 4500) {
        return '2000 ILS'.'-'.$distance;
    }else{
        return '3080 ILS'.'-'.$distance;
    }
}

            // israel to other
}else{
    if ($distance < 2000) {
      return '1250 ILS'.'-'.$distance;
  }elseif ($distance <= 4500) {
      return '2000 ILS'.'-'.$distance;
  }else{
      return '3080 ILS'.'-'.$distance;
  }
}

          // started from other country
}else{

            // other country to europe
    if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
      if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
        if ($distance < 1500) {
          return '250 EUR'.'-'.$distance;
      }elseif ($distance <= 3500) {
          return '400 EUR'.'-'.$distance;
      }else{
          return '600 EUR'.'-'.$distance;
      }
  }else{
    return '0'.'-'.$distance;
}

            // other country to israel
}elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {
    if ($distance < 2000) {
      return '1250 ILS'.'-'.$distance;
  }elseif ($distance <= 4500) {
      return '2000 ILS'.'-'.$distance;
  }else{
      return '3080 ILS'.'-'.$distance;
  }
}
}
return '0'.'-'.$distance;
}








    public function ajax_lost_luggage_calculation(Request $request){
        $is_luggage_received        = $request->is_luggage_received;
        $received_luggage_date      = strtotime($request->received_luggage_date);
        $departure_date             = strtotime($request->departure_date);
        $time_diff                  = time() - $departure_date;

        if ($request->is_luggage_received==1) {
            if ($time_diff > (2*365*24*60*60)) {
                return '0';
            }else{
                $time_diff = $departure_date - $received_luggage_date;
                if ($time_diff < (21*24*60*60)) {
                    return '1350 EUR';
                }else{
                    if ($request->is_already_written_airline == 1) {
                        return '1350 EUR';
                    }else{
                        return '1350 EUR(low cances but we can try)';
                    }
                }
            }
        }else{
            if ($time_diff > (2*365*24*60*60)) {
                return '0';
            }else{
                return '1350 EUR';
            }
        }
        return '0';
    }





    public function lost_luggage_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim_id, $is_luggage_received, $received_luggage_date, $is_already_written_airline){

        $claim = Claim::where('id', $claim_id)->first();
        $Itinerary_detail = ItineraryDetail::WHERE('claim_id', $claim_id)->first();
        $departure_date = strtotime($Itinerary_detail->departure_date);
        $current_date = strtotime($claim->created_at);
        $time_diff = $current_date - $departure_date;

        if ($is_luggage_received==1) {

            if ($time_diff > (2*365*24*60*60)) {
                return '0'.'- ';
            }else{
                $received_luggage_date = strtotime($received_luggage_date);
                $time_diff = $departure_date - $received_luggage_date;
                if ($time_diff < (21*24*60*60)) {
                    return 'You are eligibe to a refund of up to 1350 EUR per passenger'.'- ';
                }else{
                    if ($is_already_written_airline == 1) {
                        return 'You are eligibe to a refund of up to 1350 EUR per passenger'.'- ';
                    }else{
                        return 'Low cances but we can try to claim up to 1350 EUR per passenger'.'- ';
                    }
                }
            }

        }else{

            if ($time_diff > (2*365*24*60*60)) {
                return '0'.'- ';
            }else{
                return 'up to 1350 EUR'.'- ';
            }

        }
        return '0'.'- ';
    }







    public function delay_luggage_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim_id){

        $airline_id = ItineraryDetail::WHERE('claim_id', $claim_id)->WHERE('flight_segment', $selected_connection_iata_codes)->first()->airline_id;

        $airline = Airline::WHERE('id', $airline_id)->first();


        $departed_from = Airport::WHERE('id', $departed_from_id)->first();
        $final_destination = Airport::WHERE('id', $final_destination_id)->first();


        $distance = $this->distance($departed_from->latitude, $departed_from->longitude, $final_destination->latitude, $final_destination->longitude, 'K');

        // stated from Europe
        if ((in_array(strtolower($departed_from->country), $this->europe_countries)) || (in_array(strtolower($departed_from->country), $this->europe_countries_code))) {

            // europe to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {

                if ($total_delay == "less_than_3_hours") {
                  return '0'.'-'.$distance;
                }else{
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }

            // europe to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {

                if ($total_delay == "3_to_8_hours") {
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }elseif($total_delay == "more_than_8_hours"){
                  if ($distance < 2000) {
                    return '1250 ILS'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '2000 ILS'.'-'.$distance;
                  }elseif ($distance <= 4500) {
                    return '600 EUR'.'-'.$distance;
                  }else{
                    return '3080 ILS'.'-'.$distance;
                  }
                }


            // europe to other country
            }else{

              if ($total_delay == "less_than_3_hours") {
                return '0'.'-'.$distance;
              }else{
                if ($distance < 1500) {
                  return '250 EUR'.'-'.$distance;
                }elseif ($distance <= 3500) {
                  return '400 EUR'.'-'.$distance;
                }else{
                  return '600 EUR'.'-'.$distance;
                }
              }

            }


          // started from israel
          }elseif ((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") )  {
            // israel to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
              if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {

                if ($total_delay == "3_to_8_hours") {
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }elseif($total_delay == "more_than_8_hours"){
                  if ($distance < 2000) {
                    return '1250 ILS'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '2000 ILS'.'-'.$distance;
                  }elseif ($distance <= 4500) {
                    return '600 EUR'.'-'.$distance;
                  }else{
                    return '3080 ILS'.'-'.$distance;
                  }
                }

              // israel airline
              }elseif ($airline->country == "IL") {
                if ($total_delay == "more_than_8_hours") {
                  if ($distance < 2000) {
                    return '1250 ILS'.'-'.$distance;
                  }elseif ($distance <= 4500) {
                    return '2000 ILS'.'-'.$distance;
                  }else{
                    return '3080 ILS'.'-'.$distance;
                  }
                }else{
                  return '0'.'-'.$distance;
                }
              }

            // israel to other
            }else{
              if ($total_delay == "more_than_8_hours") {
                if ($distance < 2000) {
                  return '1250 ILS'.'-'.$distance;
                }elseif ($distance <= 4500) {
                  return '2000 ILS'.'-'.$distance;
                }else{
                  return '3080 ILS'.'-'.$distance;
                }
              }else{
                return '0'.'-'.$distance;
              }
            }

          // started from other country
          }else{

            // other country to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
              if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
                if ($total_delay == "less_than_3_hours") {
                  return '0'.'-'.$distance;
                }else{
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }
              }else{
                return '0'.'-'.$distance;
              }

            // other country to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {
              if ($total_delay == "more_than_8_hours") {
                if ($distance < 2000) {
                  return '1250 ILS'.'-'.$distance;
                }elseif ($distance <= 4500) {
                  return '2000 ILS'.'-'.$distance;
                }else{
                  return '3080 ILS'.'-'.$distance;
                }
              }else{
                return '0'.'-'.$distance;
              }
            }
          }
          return '0'.'-'.$distance;
        }




    public function flight_cancellation_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim_id){

        $airline_id = ItineraryDetail::WHERE('claim_id', $claim_id)->WHERE('flight_segment', $selected_connection_iata_codes)->first()->airline_id;

        $airline = Airline::WHERE('id', $airline_id)->first();


        $departed_from = Airport::WHERE('id', $departed_from_id)->first();
        $final_destination = Airport::WHERE('id', $final_destination_id)->first();


        $distance = $this->distance($departed_from->latitude, $departed_from->longitude, $final_destination->latitude, $final_destination->longitude, 'K');

        // stated from Europe
        if ((in_array(strtolower($departed_from->country), $this->europe_countries)) || (in_array(strtolower($departed_from->country), $this->europe_countries_code))) {

            // europe to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {

                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }

            // europe to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {

                  if ($distance < 2000) {
                    return '1250 ILS'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '2000 ILS'.'-'.$distance;
                  }elseif ($distance <= 4500) {
                    return '600 EUR'.'-'.$distance;
                  }else{
                    return '3080 ILS'.'-'.$distance;
                  }


            // europe to other country
            }else{

                if ($distance < 1500) {
                  return '250 EUR'.'-'.$distance;
                }elseif ($distance <= 3500) {
                  return '400 EUR'.'-'.$distance;
                }else{
                  return '600 EUR'.'-'.$distance;
                }

            }


          // started from israel
          }elseif ((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") )  {
            // israel to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
              if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
                  if ($distance < 2000) {
                    return '1250 ILS'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '2000 ILS'.'-'.$distance;
                  }elseif ($distance <= 4500) {
                    return '600 EUR'.'-'.$distance;
                  }else{
                    return '3080 ILS'.'-'.$distance;
                  }

              // other airline
              }else {
                  if ($distance < 2000) {
                    return '1250 ILS'.'-'.$distance;
                  }elseif ($distance <= 4500) {
                    return '2000 ILS'.'-'.$distance;
                  }else{
                    return '3080 ILS'.'-'.$distance;
                  }
              }

            // israel to other
            }else{
                  if ($distance < 2000) {
                    return '1250 ILS'.'-'.$distance;
                  }elseif ($distance <= 4500) {
                    return '2000 ILS'.'-'.$distance;
                  }else{
                    return '3080 ILS'.'-'.$distance;
                  }
            }

          // started from other country
          }else{

            // other country to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
              if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
                if ($distance < 1500) {
                  return '250 EUR'.'-'.$distance;
                }elseif ($distance <= 3500) {
                  return '400 EUR'.'-'.$distance;
                }else{
                  return '600 EUR'.'-'.$distance;
                }
              }else{
                return '0'.'-'.$distance;
              }

            // other country to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {
                if ($distance < 2000) {
                  return '1250 ILS'.'-'.$distance;
                }elseif ($distance <= 4500) {
                  return '2000 ILS'.'-'.$distance;
                }else{
                  return '3080 ILS'.'-'.$distance;
                }
            }
          }
          return '0'.'-'.$distance;
        }



    public function flight_delay_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim_id){

        $airline_id = ItineraryDetail::WHERE('claim_id', $claim_id)->WHERE('flight_segment', $selected_connection_iata_codes)->first()->airline_id;

        $airline = Airline::WHERE('id', $airline_id)->first();


        $departed_from = Airport::WHERE('id', $departed_from_id)->first();
        $final_destination = Airport::WHERE('id', $final_destination_id)->first();


        $distance = $this->distance($departed_from->latitude, $departed_from->longitude, $final_destination->latitude, $final_destination->longitude, 'K');

        

        // stated from Europe
        if ((in_array(strtolower($departed_from->country), $this->europe_countries)) || (in_array(strtolower($departed_from->country), $this->europe_countries_code))) {
            
            // europe to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
                
                if ($total_delay == "less_than_3_hours") {
                    
                  return '0'.'-'.$distance;
                }else{
                    
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }

            // europe to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {

                if ($total_delay == "3_to_8_hours") {
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }elseif($total_delay == "more_than_8_hours"){
                  if ($distance < 2000) {
                    return '1250 ILS'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '2000 ILS'.'-'.$distance;
                  }elseif ($distance <= 4500) {
                    return '600 EUR'.'-'.$distance;
                  }else{
                    return '3080 ILS'.'-'.$distance;
                  }
                }

            // europe to other country
            }else{

                if ($total_delay == "less_than_3_hours") {
                  return '0'.'-'.$distance;
                }else{
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }

            }


          // started from israel
          }elseif ((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") )  {

            

            // israel to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
              if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {

                if ($total_delay == "3_to_8_hours") {
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }elseif($total_delay == "more_than_8_hours"){
                  if ($distance < 2000) {
                    return '1250 ILS'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '2000 ILS'.'-'.$distance;
                  }elseif ($distance <= 4500) {
                    return '600 EUR'.'-'.$distance;
                  }else{
                    return '3080 ILS'.'-'.$distance;
                  }
                }

              // other airline
              }else {
                if ($total_delay == "more_than_8_hours") {
                  if ($distance < 2000) {
                    return '1250 ILS'.'-'.$distance;
                  }elseif ($distance <= 4500) {
                    return '2000 ILS'.'-'.$distance;
                  }else{
                    return '3080 ILS'.'-'.$distance;
                  }
                }else{
                  return '0'.'-'.$distance;
                }
              }

            // israel to other
            }else{
              if ($total_delay == "more_than_8_hours") {
                if ($distance < 2000) {
                  return '1250 ILS'.'-'.$distance;
                }elseif ($distance <= 4500) {
                  return '2000 ILS'.'-'.$distance;
                }else{
                  return '3080 ILS'.'-'.$distance;
                }
              }else{
                return '0'.'-'.$distance;
              }
            }

          // started from other country
          }else{

            

            // other country to europe
            if ( (in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code)) ) {
              
              // europe airline
              if ( (in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
                if ($total_delay == "less_than_3_hours") {
                  return '0'.'-'.$distance;
                }else{
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }
              }else{

                if(in_array(strtolower($final_destination->country), $this->europe_countries_code)){
                    Log::debug('working');
                }else{
                    Log::debug('not working');
                }


                return '0'.'-'.$distance;
              }

            // other country to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {
              if ($total_delay == "more_than_8_hours") {
                if ($distance < 2000) {
                  return '1250 ILS'.'-'.$distance;
                }elseif ($distance <= 4500) {
                  return '2000 ILS'.'-'.$distance;
                }else{
                  return '3080 ILS'.'-'.$distance;
                }
              }else{
                return '0'.'-'.$distance;
              }
            }
          }
          return '0'.'-'.$distance;
        }




    public function missed_calculaion($departed_from_id, $final_destination_id, $total_delay, $selected_connection_iata_codes, $claim_id){

        $airline_id = ItineraryDetail::WHERE('claim_id', $claim_id)->WHERE('flight_segment', $selected_connection_iata_codes)->first()->airline_id;

        $airline = Airline::WHERE('id', $airline_id)->first();


        $departed_from = Airport::WHERE('id', $departed_from_id)->first();
        $final_destination = Airport::WHERE('id', $final_destination_id)->first();


        $distance = $this->distance($departed_from->latitude, $departed_from->longitude, $final_destination->latitude, $final_destination->longitude, 'K');

        // stated from Europe
        if ((in_array(strtolower($departed_from->country), $this->europe_countries)) || (in_array(strtolower($departed_from->country), $this->europe_countries_code))) {

            // europe to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {

                if ($total_delay == "less_than_3_hours") {
                  return '0'.'-'.$distance;
                }else{
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }

            // europe to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {

                if ($total_delay == "3_to_8_hours") {
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }elseif($total_delay == "more_than_8_hours"){
                  if ($distance < 2000) {
                    return '1250 ILS'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '2000 ILS'.'-'.$distance;
                  }elseif ($distance <= 4500) {
                    return '600 EUR'.'-'.$distance;
                  }else{
                    return '3080 ILS'.'-'.$distance;
                  }
                }

            // europe to other country
            }else{

              if ($total_delay == "less_than_3_hours") {
                return '0'.'-'.$distance;
              }else{
                if ($distance < 1500) {
                  return '250 EUR'.'-'.$distance;
                }elseif ($distance <= 3500) {
                  return '400 EUR'.'-'.$distance;
                }else{
                  return '600 EUR'.'-'.$distance;
                }
              }

            }


          // started from israel
          }elseif ((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") )  {
            // israel to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {

              if ($total_delay == "less_than_3_hours") {
                return '0'.'-'.$distance;
              }else{
                  // europe airline
                  if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {

                    if ($total_delay == "3_to_8_hours") {
                      if ($distance < 1500) {
                        return '250 EUR'.'-'.$distance;
                      }elseif ($distance <= 3500) {
                        return '400 EUR'.'-'.$distance;
                      }else{
                        return '600 EUR'.'-'.$distance;
                      }
                    }elseif($total_delay == "more_than_8_hours"){
                      if ($distance < 2000) {
                        return '1250 ILS'.'-'.$distance;
                      }elseif ($distance <= 3500) {
                        return '2000 ILS'.'-'.$distance;
                      }elseif ($distance <= 4500) {
                        return '600 EUR'.'-'.$distance;
                      }else{
                        return '3080 ILS'.'-'.$distance;
                      }
                    }

                  // other airline
                  }else{
                    if ($total_delay == "more_than_8_hours") {
                      if ($distance < 2000) {
                        return '1250 ILS'.'-'.$distance;
                      }elseif ($distance <= 4500) {
                        return '2000 ILS'.'-'.$distance;
                      }else{
                        return '3080 ILS'.'-'.$distance;
                      }
                    }else{
                      return '0'.'-'.$distance;
                    }
                  }
              }


            // israel to other
            }else{
              if ($total_delay == "more_than_8_hours") {
                if ($distance < 2000) {
                  return '1250 ILS'.'-'.$distance;
                }elseif ($distance <= 4500) {
                  return '2000 ILS'.'-'.$distance;
                }else{
                  return '3080 ILS'.'-'.$distance;
                }
              }else{
                return '0'.'-'.$distance;
              }
            }

          // started from other country
          }else{

            // other country to europe
            if ((in_array(strtolower($final_destination->country), $this->europe_countries)) || (in_array(strtolower($final_destination->country), $this->europe_countries_code))) {
              // europe airline
              if ((in_array(strtolower($airline->country), $this->europe_countries)) || (in_array(strtolower($airline->country), $this->europe_countries_code)) ) {
                if ($total_delay == "less_than_3_hours") {
                  return '0'.'-'.$distance;
                }else{
                  if ($distance < 1500) {
                    return '250 EUR'.'-'.$distance;
                  }elseif ($distance <= 3500) {
                    return '400 EUR'.'-'.$distance;
                  }else{
                    return '600 EUR'.'-'.$distance;
                  }
                }
              }else{
                return '0'.'-'.$distance;
              }

            // other country to israel
            }elseif((strtolower($final_destination->country) == "il") || (strtolower($final_destination->country) == "israel") ) {
              if ($total_delay == "more_than_8_hours") {
                if ($distance < 2000) {
                  return '1250 ILS'.'-'.$distance;
                }elseif ($distance <= 4500) {
                  return '2000 ILS'.'-'.$distance;
                }else{
                  return '3080 ILS'.'-'.$distance;
                }
              }else{
                return '0'.'-'.$distance;
              }
            }
          }
          return '0'.'-'.$distance;
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $claim = Claim::findOrFail($id);

        return view('claims.show', compact('claim'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $claim = Claim::findOrFail($id);

        return view('claims.edit', compact('claim'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        $requestData = $request->all();

        $claim = Claim::findOrFail($id);
        $claim->update($requestData);

        return redirect('claims')->with('flash_message', 'Claim updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Claim::destroy($id);

        return redirect('claims')->with('flash_message', 'Claim deleted!');
    }
}
