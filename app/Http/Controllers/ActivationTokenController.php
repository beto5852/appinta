<?php

namespace App\Http\Controllers;

use App\ActivationToken;
use Illuminate\Http\Request;

class ActivationTokenController extends Controller
{
    //

    public function activate(ActivationToken $token){
        return $token;
    }

}
