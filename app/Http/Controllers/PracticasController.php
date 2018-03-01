<?php

namespace App\Http\Controllers;

use App\Cultivo;
use App\Etapa;
use App\Http\Requests\StorePracticaRequest;
use App\Practica;
use App\Mes;
use App\Rubro;
use App\Variedad;
use Illuminate\Support\Facades\DB;
use App\Semana;
use App\Tag;
use App\Tecnologia;
use App\User;
use Yajra\Datatables\Datatables;
use App\Traits\DatesTraslator;
use App\Events\CrearPractica;
use Illuminate\Http\Request;

use Redirect;
use Session;
use Storage;

class PracticasController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['only' => ['index','show','edit','update','create','destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //mostrar algunas practicas

        // $practicas = Practica::Search($request->search)->orderBy('id', 'DESC')->paginate(4);

        return view("admin.practicas.index");
    }

    public function datos_practicas(){

        return Datatables::of( DB::table('practicas')
            ->whereNotNull('practicas.id')
            ->join('tecnologias', 'practicas.tecnologia_id', '=', 'tecnologias.id')
            ->join('users', 'practicas.user_id', '=', 'users.id')
            ->select('practicas.*', 'tecnologias.nombre_tecnologia', 'users.name')
            ->get())->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.practicas.create');

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {

//        dd($request->all());

        $this->validate($request,['nombre_practica' => 'required|min:3|max:100']);



        if ($practica = Practica::create(['nombre_practica' => $request->get('nombre_practica')])) {

            \Event::fire(new CrearPractica($practica));
        }



        Session::flash('message','Practica Creada');
        return redirect()->route('admin.practicas.edit',$practica->id);

    }

    public function show($id)
    {
        //Muestra con el id
        $practica = Practica::find($id);
        return view('admin.practicas.show', compact('practica'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        //edita con id
//        $practica = Practica::with(['users','tecnologias','tags','meses','semanas'])->get();

        $practica    = Practica::find($id);
        $users       = User::pluck('name', 'id');
        $tecnologias = Tecnologia::pluck('nombre_tecnologia', 'id');
        $cultivos = Cultivo::pluck('nombre_cultivo', 'id');
        $rubros = Rubro::pluck('nombre_rubro','id');
        $etapas = Etapa::pluck('nombre_etapa','id');
        $variedades = Variedad::pluck('nombre_variedad','id');
        $meses       = Mes::pluck('nombre_mes','id');
        $semanas     = Semana::pluck('nombre_semana','id');

        $my_etapas    = $practica->etapas->pluck('id')->toArray();
        $my_mes    = $practica->meses->pluck('id')->toArray();
        $my_semana = $practica->semanas->pluck('id')->toArray();
        $my_variedades = $practica->variedades->pluck('id')->toArray();

//        $mesactual = [date('m')];
//         dd(count($my_semana));

        return view('admin.practicas.edit', compact('users', 'practica','meses', 'semanas',
            'tecnologias','cultivos','rubros','etapas','variedades','my_etapas','my_mes','my_semana','my_variedades'));
    }



    public function update(StorePracticaRequest $request, Practica $practica)
    {

//        dd($request->all());

        $practica->slug = null;
        $practica->update($request->all());
        $practica->syncVariedad($request->get('variedad_id'));
        $practica->syncEtapa($request->get('etapa_id'));
        $practica->meses()->sync($request->get('mes_id'));
        $practica->semanas()->sync($request->get('semana_id'));

        return redirect()->route('admin.practicas.edit',$practica)->with('message','Tu práctica ha sido actualizada correctamente');
    }


    public function destroy($id)
    {
        //elimina la practica con el id que recibe
        $practica = Practica::find($id);
        $practica->meses()->detach();
        $practica->semanas()->detach();
        $practica->etapas()->detach();
        $practica->variedades()->detach();

        $practica->delete();


        Session::flash('message', 'Práctica eliminada correctamente');
        return redirect::to('admin/practicas');
        //dd($id);
    }



}
