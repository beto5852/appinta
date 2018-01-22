<?php

namespace App\Http\Controllers;
use Auth;
use App\ActivationToken;
use Redirect;
use Session;
use Storage;

class ActivationTokenController extends Controller
{
    //

    public function activate(ActivationToken $token)
    {

//        $token->user()->update(['active' => true]);
//        Auth::login($token->user);
//        $token->delete();
        $token->user->activate($token);
        Session::flash('message','Tu cuenta ha sido activada.');
        return redirect('admin');

//        return redirect('admin')->withInfo('Tu cuenta ha sido activada.');
    }

}
