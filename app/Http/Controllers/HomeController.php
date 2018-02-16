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
    public function practica($slug)
    {
        //$practicas = Practica::find($slug);
        $practicas = Practica::where('slug', $slug)->first();
        //dd($practicas);
        //$practicas = Practica::find()->pluck('slug');

        return view('practica', compact('practicas'));
    }



}
