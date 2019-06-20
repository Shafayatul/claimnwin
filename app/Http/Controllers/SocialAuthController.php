<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\User;
use Hash;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {

        $user = Socialite::driver($provider)->user();
        $authUser = User::where('provider_id', $user->id)->first();
        if($authUser != ''){
            auth()->login($authUser,true);
            return redirect('/user-home');
        }else{
            $authUser                  = new User;
            $authUser->name            = $user->name;
            $authUser->email           = $user->email;
            $authUser->provider        = $provider;
            $authUser->provider_id     = $user->id;
            $authUser->password        = Hash::make(rand(10000, 10000000));

            $authUser->save();
            if($authUser){
                $authUser->syncRoles('User');
            }
            auth()->login($authUser);

            return redirect('/user-home');
        }
    }
}
