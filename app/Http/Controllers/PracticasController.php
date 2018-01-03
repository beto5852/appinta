<?php

namespace App\Http\Controllers;

use App\Cultivo;
use App\Mes;
use App\MPS;
use App\Practica;
use App\Semana;
use App\Tag;
use App\Tecnologia;
use App\User;
//use App\Traits\DatesTraslator;
use App\Events\CrearPractica;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Storage;

class PracticasController extends Controller
{

//    use DatesTraslator;
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['index', 'edit', 'update', 'create', 'destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //mostrar algunos Productos

        $practicas = Practica::Search($request->search)->orderBy('id', 'DESC')->paginate(4);

        return view("admin.practicas.index", compact('practicas'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $tecnologias = Tecnologia::orderBy('nombre_tecnologia', 'ASC')->pluck('nombre_tecnologia', 'id');
        $tags        = Tag::orderBy('nombre_tags', 'ASC')->pluck('nombre_tags', 'id');
        $semanas     = Semana::orderBy('id', 'ASC')->pluck('nombre_semana', 'id');
        $meses       = Mes::orderBy('id', 'ASC')->pluck('nombre_mes', 'id');
        $cultivos    = Cultivo::orderBy('nombre_cultivo', 'DESC')->pluck('nombre_cultivo', 'id');

        return view('admin.practicas.create', compact('tecnologias', 'tags', 'cultivos', 'meses', 'semanas'));

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request , [
                'nombre_practica' => 'required',
                'contenido'       => 'required|ma',
                'tecnologia_id'   => 'required',
                'mes_id'          => 'required',
                'semana_id'       => 'required',
                'tag_id'          => 'required',
            ]
        );

        $practica = new Practica;

        $practica->nombre_practica = $request->get('nombre_practica');
        $practica->contenido = $request->get('contenido');
        $practica->tecnologia_id = $request->get('tecnologia_id');
        $practica->path = $request->get('path');
        $practica->user_id = $request->get('user_id');

        $practica->save();

//       $meses = array_values($request->input('mes_id'));

        // dd($meses);


        $practica->tags()->attach($request->get('tag_id'));


        for ($i = 0; $i < count($request->semana_id); $i++) {

            $practica->meses()->attach($request->mes_id[$i], ['semana_id' => $request->semana_id[$i]]);
        }


        Session::flash('message', 'Labor agricola registrado correctamente');
        return redirect::to('admin/practicas/create');
        //dd($user);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Muestra con el id

        //dd($id);
        $practica = Practica::find($id);

        //dd($practica);
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
        $practica    = Practica::findOrFail($id);
        $users       = User::pluck('name', 'id');
        $tecnologias = Tecnologia::pluck('nombre_tecnologia', 'id');
        $tags        = Tag::pluck('nombre_tags');
        $meses       = Mes::pluck('nombre_mes');
        $semanas     = Semana::pluck('nombre_semana');

        $my_tags   = $practica->tags->pluck('id')->ToArray();
        $my_semana = $practica->semanas->pluck('id')->ToArray();
        $my_mes    = $practica->meses->pluck('id')->ToArray();

        // dd(count($my_mes));
        return view('admin.practicas.edit', compact('users', 'tecnologias', 'practica', 'tags', 'meses', 'semanas', 'my_tags', 'my_mes', 'my_semana'));
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
        //actualiza lo que se envio en edit$id
        $practica = Practica::find($id);
        $practica->fill($request->all());
        $practica->slug = null;
        $practica->update(['nombre_practica']);

//       dd($practica);

        $practica->save();
//
        $practica->tags()->detach();
        $practica->meses()->detach();
        $practica->semanas()->detach();

//
////         $varmps = MPS::orderBy('id', 'ASC')->pluck('id');
//
//         dd($request->mes_id);
//
//
//        for ($i = 0; $i < count($request->mes_id); $i++) {
//
//            $practica->meses()->attach($request->mes_id[$i], ['semana_id' => $request->semana_id[$i]]);
//        }

//        $practica->meses()->sync($request->mes_id);
//        $practica->semanas()->sync($request->semana_id);
        $practica->tags()->sync($request->tag_id);
       


        Session::flash('message', 'Práctica actualizado correctamente');
        return redirect::to('admin/practicas');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //elimina la practica con el id que recibe
        $practica = Practica::findOrFail($id);
        $practica->tags()->detach();
        $practica->meses()->detach();
        $practica->semanas()->detach();
        
        $practica->delete();


        Session::flash('message', 'Práctica eliminada correctamente');
        return redirect::to('admin/practicas');
        //dd($id);
    }
}
