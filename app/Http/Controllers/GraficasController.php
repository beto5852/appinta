<?php

namespace App\Http\Controllers;
use App\Practica;
use App\Tecnologia;
use App\Cultivo;
use App\User;
use App\Rubro;
use Redirect;
use Session;
use Storage;

use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Activity;
use Illuminate\Http\Request;

class GraficasController extends Controller
{
    public function reportes()
    {
       

        $users = User::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y')) ->get();

        $chart = Charts::database($users, 'bar', 'highcharts')
            ->title("Registro de usuarios por mes")
            ->elementLabel("Total de usuarios registrados")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupByMonth(date('Y'), true);



        $userdia = Charts::database(User::all(), 'line', 'highcharts')
            ->title("Registro de usuarios por mes")
            ->elementLabel("Registro por dia")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupByDay();


        

        return view('admin.reportes.index',compact('chart','totaluser','userdia'));
    }


    public function reportes_sexo(){
        
        $genero = Charts::database(User::all(), 'bar', 'highcharts')
            ->title("Registro de usuarios por mes")
            ->elementLabel("total")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupBy('sexo');
        
        return view('admin.reportes.sexo',compact('genero'));

    }
    public function reportes_edad(){
        
        $edad = Charts::database( User::all(), 'bar', 'highcharts')
            ->title("% de usuarios por edad")
            ->elementLabel("Edad por usuarios")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupBy('edad');
        
        return view('admin.reportes.edad',compact('edad'));

    }
    public function reportes_online(){

        $activities = Activity::users()->get();


        $activ = Charts::database($activities, 'bar', 'highcharts')
            ->title("Usuarios en línea")
            ->elementLabel("Usuarios en linea")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupBy('name');

        return view('admin.reportes.online',compact('activ'));
    }
    public function reportes_practicas(){


        $practis = Practica::with(['etapas' => function ($query) {
            $query->distinct()
                ->whereNotNull('nombre_etapa')
                ->orderBy('nombre_etapa', 'desc');
        }])->get();


        $chartpract = Charts::database($practis, 'bar', 'highcharts')
            ->title("Etapa de practica")
            ->elementLabel("Número de etapas en esta práctica")
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->groupBy('nombre_practica');

        $prac = Charts::multiDatabase('line', 'material')
            ->title("Registros de practicas, tecnológia, rubros, cultivos")
//            ->elementLabel("Edad por usuarios")
            ->dataset('Practicas', Practica::all())
            ->dataset('Tecnologias', Tecnologia::all())
            ->dataset('Rubros', Rubro::all())
            ->dataset('Cultivos', Cultivo::all())
            ->height(300)
            ->width(300)
            ->responsive(true)
            ->GroupByDay();

        return view('admin.reportes.practicas',compact('prac','chartpract'));


    }
}
