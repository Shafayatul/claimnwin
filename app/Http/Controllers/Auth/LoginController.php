<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    /**
     * Get the needed authorization credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(\Illuminate\Http\Request $request)
    {
    $credentials = $request->only($this->username(), 'password');
    return array_add($credentials, 'status', '1');
    }


    public function showLoginForm()
    {
        // return view('auth.login');
        return redirect('/user/login');
    }

    /**
     * Check user's role and redirect user based on their role
     * @return
     */
    public function authenticated()
    {
        event(new \App\Events\LogEvent(Auth::user(), 'Authentication', 'Successfully logged in.'));
        if(auth()->user()->hasRole('User')){
            return redirect('/user-home');
        }else{
            return redirect('/home');
        }
    }
}
