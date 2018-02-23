<?php

namespace App\Http\Controllers;

use App\SocialProfile;
use Auth;
use App\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class SocialLoginController extends Controller
{
    //

    public function redirectToredesSociales($redesSociales)
    {

        return Socialite::driver($redesSociales)->redirect();

    }

    public function handleredesSocialesCallback($redesSociales)
    {

        if(! request('code')){
            return redirect()->route('login')->with('warning','Hubo un error');
        }

        $socialUser = Socialite::driver($redesSociales)->user();

       $socialProfile = SocialProfile::firstOrNew([
            'red_social' => $redesSociales,
            'social_user_id' => $socialUser->getId(),
        ]);


//        dd($facebookuser);

        if(! $socialProfile->exists){

            $user = User::firstOrNew(['email' => $socialUser->getEmail()]);


            if(! $user->exists){
                $user->name = $socialUser->getName();
                $user->save();
            }

            $user->profiles()->save($socialProfile);
        }



       Auth::login($socialProfile->user);

       return redirect()->route('admin.home.busqueda')->with('message','Bienvenido'.$socialProfile->user->name);
    }
}
