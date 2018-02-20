<?php

namespace App\Http\Controllers;
use App\Etapa;
use Illuminate\Http\Request;
use App\Practica;
use App\Tecnologia;
use App\User;
use App\Role;
use App\Cultivo;
use App\Rubro;
use Carbon\Carbon;
use ConsoleTVs\Charts\Facades\Charts;
use Activity;

use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['reportes','edit','update','create','destroy']]);
    }

    public function index()
    {
        //
        $practicas = Practica::OrderBy('id', 'DESC')->paginate(3);

//        dd($practicas);

        return view('index', compact('practicas'));
    }

    public function busqueda(Request $request)
    {
        //mostrar algunas practicas

         $practicas = Practica::Search($request->search)->orderBy('id', 'DESC')->paginate(4);


        return view("admin.home.busqueda",['practicas' => $practicas]);
    }


    public function timeline()
    {
        //
        // dd($practicas);
        // $practicas = Practica::OrderBy('id', 'DESC')->paginate(3);

//
       $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
           'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');

       $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
           'Miercoles', 'Jueves', 'Viernes', 'Sabado');

       $mesactual = $arrayMeses[date('m')-1];



        $practicas = Practica::with(['meses' => function ($query) {
            $query->where('mes_id','=',Carbon::now()->format('m'));
        },'semanas'])->paginate(6);


//        dd($practicas);

        return view('admin.home.timeline',compact('practicas'));
    }

    public function timelinemore($slug)
    {
        $practicas = Practica::where('slug', $slug)->first();
        
        return view('admin.home.timelinemore', compact('practicas'));
    }
   


    public function admin()
    {
               
        $activities = Activity::users()->get();

                
        $totalusers       = User::all();
        $users            = User::orderBy('id', 'DESC')->paginate(8);
        $totaltecnologias = Tecnologia::all();
        $totalpracticas   = Practica::all();
        $totalcultivos    = Practica::all();
      
        $practicas   = Practica::OrderBy('id', 'DESC')->paginate(3);
        $tecnologias = Tecnologia::OrderBy('id', 'DESC')->paginate(3);

        // dd($practicas);
        return view('admin.home.index', compact('practicas', 'totalusers', 'totaltecnologias', 'totalpracticas', 'totalcultivos', 'users', 'tecnologias', 'activities'));
    }

   

 
}
