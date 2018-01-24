<?php

namespace App\Http\Controllers;
//use Jenssegers\Date\Date;
use Carbon\Carbon;
use Activity;
use App\Practica;
use App\Tecnologia;
use App\User;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
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

    public function timeline()
    {
        //
        // dd($practicas); 
        // $practicas = Practica::OrderBy('id', 'DESC')->paginate(3);
        
//
//       $arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
//           'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
//
//       $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
//           'Miercoles', 'Jueves', 'Viernes', 'Sabado');
//
//       $mesactual = $arrayMeses[date('m')-1];

//         dd($numeroSemana = date("W"));

       // dd(Carbon::now()->format('m'));

        // $practica = DB::table('practicas')
        //             ->join('mes_practica','practicas.id','mes_practica.practica_id')
        //             ->join('meses','mes_practica.mes_id','meses.id')
        //             ->select('practicas.*','meses.nombre_mes')
        //             ->where('nombre_mes', '=', 'Enero')
        //             ->get();




        //  dd($practica);           

     $practicas = Practica::with(['meses' => function ($query) {
               $query->whereNotNull('mes_id')
                   ->where('mes_id','=',Carbon::now()->format('m')+1);
           }])->paginate(2);

       
        return view('admin.home.timeline',compact('practicas'));

    }

    public function timelinemore($slug)
    {
        $practicas = Practica::where('slug', $slug)->first();
        
        return view('admin.home.timelinemore', compact('practicas'));
    }
    public function reportes()
    {
        $anio=date("Y");
        $mes=date("m");

      return view('admin.reportes.index',compact('anio','mes'));
    }


    public function admin()
    {
        $anio=date("Y");
        $mes=date("m");
        $activities = Activity::users()->get();
        $tipospublicacion=Tecnologia::all();

//         $activities = Activity::users(1)->get();   // Last 1 minute
        //         $activities = Activity::users(10)->get();  // Last 10 minutes
        //         $activities = Activity::users(60)->get();  // Last 60 minutes
        //         $activities = Activity::usersBySeconds(30)->get();  // Get active users within the last 30 seconds
        //         $activities = Activity::usersByMinutes(10)->get();  // Get active users within the last 10 minutes
        //         $activities = Activity::usersByHours(1)->get();     // Get active users within the last 1 hour

// $numberOfUsers = Activity::users()->count();        // Count the number of active users
        //         $activities = Activity::users()->mostRecent()->get();   // Get active users and sort them by most recent
        //         $activities = Activity::users()->leastRecent()->get();  // Get active users and sort them by least recent
        //         // $numberOfGuests = Activity::guests()->count();
        $totalusers       = User::all();
        $users            = User::orderBy('id', 'DESC')->paginate(8);
        $totaltecnologias = Tecnologia::all();
        $totalpracticas   = Practica::all();
        $totalcultivos    = Practica::all();
        // dd( $activities);
        /* $variable = nameModelo::find($id);
        if(Cache::has($id)==false){
        Cache::add($id,'contador',0.30);
        $variable->total_visitas++;
        $variable->save();
        }
         */

        $practicas   = Practica::OrderBy('id', 'DESC')->paginate(3);
        $tecnologias = Tecnologia::OrderBy('id', 'DESC')->paginate(3);

        // dd($practicas);
        return view('admin.home.index', compact('practicas', 'totalusers', 'totaltecnologias', 'totalpracticas', 'totalcultivos', 'users', 'tecnologias', 'activities','anio','mes'));
    }

    public function practica($slug)
    {
        //$practicas = Practica::find($slug);
        $practicas = Practica::where('slug', $slug)->first();
        //dd($practicas);
        //$practicas = Practica::find()->pluck('slug');

        return view('practica', compact('practicas'));
    }



    public function searchPracticas($name)
    {
        $practicas = Practica::scopeSearchPractica($name)->get();
        dd($practicas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
