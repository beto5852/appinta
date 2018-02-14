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


//        dd($mesactual);

//         dd($numeroSemana = date("W"));

       // dd(Carbon::now()->format('m'));

        // $practica = DB::table('practicas')
        //             ->join('mes_practica','practicas.id','mes_practica.practica_id')
        //             ->join('meses','mes_practica.mes_id','meses.id')
        //             ->select('practicas.*','meses.nombre_mes')
        //             ->where('nombre_mes', '=', 'Enero')
        //             ->get();





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
    public function reportes()
    {
        $anio=date("Y");
        $mes=date("m");

        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y')) ->get();

        $chart = Charts::database($users, 'bar', 'highcharts')
            ->title("Registro de usuarios por mes")
            ->elementLabel("Total de usuarios registrados")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupByMonth(date('Y'), true);


        $genero = Charts::database(User::all(), 'bar', 'highcharts')
            ->title("Registro de usuarios por mes")
            ->elementLabel("total")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupBy('sexo');


        $userdia = Charts::database(User::all(), 'line', 'highcharts')
            ->title("Registro de usuarios por mes")
            ->elementLabel("Registro por dia")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupByDay();


        $practica = DB::table('practicas')
            ->leftjoin('etapa_practica','practicas.id','etapa_practica.practica_id')
            ->leftjoin('etapas','etapa_practica.etapa_id','etapas.id')
            ->distinct()
            ->whereNotNull('nombre_etapa')
            ->select('practicas.nombre_practica','etapas.nombre_etapa')
            ->orderBy('nombre_etapa', 'desc')
            ->get();

//        dd($practica);
        
        $chartpract = Charts::database($practica, 'bar', 'highcharts')
            ->title("Etapa de practica")
            ->elementLabel("Numero de etapas en esta practica")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupBy('nombre_practica');

//        dd($chartpract);



        $prac = Charts::multiDatabase('line', 'material')
            ->dataset('Practicas', Practica::all())
            ->dataset('Tecnologias', Tecnologia::all())
            ->dataset('Rubros', Rubro::all())
            ->dataset('Cultivos', Cultivo::all())
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->GroupByDay();



        $activities = Activity::users()->get();
        
        
        $activ = Charts::database($activities, 'bar', 'highcharts')
            ->elementLabel("Usuarios en linea")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupBy('name');
        
        $edad = Charts::database( User::all(), 'bar', 'highcharts')
            ->title("% de usuarios por edad")
            ->elementLabel("Edad por usuarios")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupBy('edad');

      


        return view('admin.reportes.index',compact('anio','mes','chart','totaluser','genero','userdia','prac','activ','chartpract','edad'));
    }


    public function admin()
    {
        $anio=date("Y");
        $mes=date("m");
        
        $activities = Activity::users()->get();
      
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
