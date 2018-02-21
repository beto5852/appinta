<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class SocialLoginController extends Controller
{
    //

    public function redirectToFacebook()
    {

        return Socialite::driver('facebook')->redirect();

    }

    public function handleFacebookCallback()
    {

        $facebookuser = Socialite::driver('facebook')->user();

       $user =  User::firstOrNew(['facebook_id' => $facebookuser->getId()]);


//        dd($facebookuser);

        if(! $user->exists){

            $user->name = $facebookuser->getName();
            $user->email = $facebookuser->getEmail();
            $user->save();
        }



       Auth::login($user);

       return redirect()->route('admin.home.busqueda')->with('message','Bienvenido'.$user->name);
    }
}
