<?php

namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

class SocialLoginController extends Controller
{
    //

    public function redirectToFacebook(){

        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback(){
        var_dump('redirect to facebook');
    }

}
