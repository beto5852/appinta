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


    public function busqueda(Request $request)
    {
        //mostrar algunas practicas

        $practicas = Practica::Search($request->search)->orderBy('id', 'DESC')->paginate(10);

//            dd($practicas);

        return view('busqueda',['practicas' => $practicas]);
    }
    
    public function getSubString($string, $length=NULL)
    {
        //Si no se especifica la longitud por defecto es 50
        if ($length == NULL)
            $length = 50;
        //Primero eliminamos las etiquetas html y luego cortamos el string
        $stringDisplay = substr(strip_tags($string), 0, $length);
        //Si el texto es mayor que la longitud se agrega puntos suspensivos
        if (strlen(strip_tags($string)) > $length)
            $stringDisplay .= ' ...';
        return $stringDisplay;
    }
    


}
