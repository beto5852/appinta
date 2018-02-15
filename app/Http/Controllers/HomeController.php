<?php

namespace App\Http\Controllers;
use App\Practica;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $practicas = Practica::OrderBy('id', 'DESC')->paginate(3);

//        dd($practicas);

        return view('index', compact('practicas'));
    }

}
