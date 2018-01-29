<?php

namespace App\Http\Controllers;

use App\Cultivo;
use App\Practica;
use App\Mes;
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
        $this->middleware(['auth','roles:admin']);
        $this->middleware('roles:admin', ['only' => ['index', 'edit', 'update', 'create', 'destroy']]);
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
                'nombre_practica' => 'required|min:3|max:100',
         ]);

        $practica = Practica::create(['nombre_practica' => $request->get('nombre_practica')]);

        Session::flash('message','Practica Creada');
        return redirect()->route('admin.practicas.edit',$practica);

    }


//    public function store(Request $request)
//    {
//
//        $this->validate($request , [
//                'nombre_practica' => 'required',
//                'contenido'       => 'required',
//                'tecnologia_id'   => 'required',
//                'mes_id'          => 'required',
//                'semana_id'       => 'required',
//                'tag_id'          => 'required',
//            ]
//        );
//
//        $practica = new Practica;
//
//        $practica->nombre_practica = $request->get('nombre_practica');
//        $practica->contenido = $request->get('contenido');
//        $practica->tecnologia_id = $request->get('tecnologia_id');
//        $practica->path = $request->path;
//        $practica->user_id = $request->get('user_id');
//        // dd($request->get('path'));
//
//        $practica->save();
//
//        $practica->tags()->attach($request->get('tag_id'));
//        $practica->meses()->attach($request->get('mes_id'));
//        $practica->semanas()->attach($request->get('semana_id'));
//
//
//        Session::flash('message', 'Labor agricola registrado correctamente');
//        return redirect::to('admin/practicas/create');
//        //dd($user);
//    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Muestra con el id
        $practica = Practica::find($id);
        if($practica->isPublished()){
            //dd($practica);
            return view('admin.practicas.show', compact('practica'));
        }
        abort(404);

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

        $practica    = Practica::findOrFail($id);
        $users       = User::pluck('name', 'id');
        $tecnologias = Tecnologia::pluck('nombre_tecnologia', 'id');
        $tags        = Tag::pluck('nombre_tags','id');
        $meses       = Mes::pluck('nombre_mes','id');
        $semanas     = Semana::pluck('nombre_semana','id');


        $my_tags   = $practica->tags->pluck('id')->toArray();
        $my_mes    = $practica->meses->pluck('id')->toArray();
        $my_semana = $practica->semanas->pluck('id')->toArray();

//        $mesactual = [date('m')];
//         dd($my_semana);

        return view('admin.practicas.edit', compact('users', 'practica', 'tags', 'meses', 'semanas','tecnologias','my_tags','my_mes','my_semana'));
    }





//    public function edit($id)
//    {
//        //edita con id
//        $practica    = Practica::findOrFail($id);
//        $users       = User::pluck('name', 'id');
//        $tecnologias = Tecnologia::pluck('nombre_tecnologia', 'id');
//        $tags        = Tag::pluck('nombre_tags');
//        $meses       = Mes::pluck('nombre_mes');
//        $semanas     = Semana::pluck('nombre_semana');
//
//        $my_tags   = $practica->tags->pluck('id')->ToArray();
//        $my_mes    = $practica->meses->pluck('id')->ToArray();
//        $my_semana = $practica->semanas->pluck('id')->ToArray();
//
//
//        // dd($my_mes);
//
//        return view('admin.practicas.edit', compact('users', 'tecnologias', 'practica', 'tags', 'meses', 'semanas', 'my_tags', 'my_mes', 'my_semana'));
//    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Practica $practica)
    {
        //actualiza lo que se envio en edit$id

        $this->validate($request , [
                'nombre_practica' => 'required',
                'textomedio'       => 'required|min:5|max:900',
                'contenido'       => 'required|max:100000',
                'tecnologia_id'   => 'required',
                'mes_id'          => 'required',
                'semana_id'       => 'required',
                'tag_id'          => 'required',
            ]
        );

//        dd($request->all());
        $practica->nombre_practica = $request->get('nombre_practica');
        $practica->textomedio = $request->get('textomedio');
        $practica->contenido = $request->get('contenido');

        $practica->tecnologia_id = Tecnologia::find($tec = $request->get('tecnologia_id'))
                                    ? $tec
                                    : Tecnologia::create(['nombre_tecnologia' => $tec])->id;

//        dd($practica);
        $practica->path = $request->path;
        $practica->user_id = $request->get('user_id');
        $practica->video = $request->get('video');
        $practica->slug = null;
        $practica->update(['nombre_practica' => $request->get('nombre_practica')]);
        $practica->save();
        // dd($request->get('path'));

        $tags = [];

        foreach ($request->get('tag_id') as $tag)
        {
            $tags[] = Tag::find($tag)
                    ? $tag
                    : Tag::create(['nombre_tags' => $tag])->id;
        }
        $practica->tags()->sync($tags);

        $practica->meses()->sync($request->mes_id);
        $practica->semanas()->sync($request->semana_id);
//
        return redirect()->route('admin.practicas.edit',$practica)->with('message','Tu práctica ha sido actualizada correctamente');

//        Session::flash('message', 'Tu práctica ha sido actualizada correctamente');
//        return redirect::to('admin/practicas/'.$practica->id.'/edit');
    }



//    public function update(Request $request, $id)
//    {
//        //actualiza lo que se envio en edit$id
//
//        $this->validate($request , [
//                'nombre_practica' => 'required',
//                'contenido'       => 'required|min:100|max:3000',
//                'tecnologia_id'   => 'required',
//                'mes_id'          => 'required',
//                'semana_id'       => 'required',
//                'tag_id'          => 'required',
//            ]
//        );
//
//        $practica = Practica::find($id);
//        $practica->fill($request->all());
//        $practica->slug = null;
//        $practica->update(['nombre_practica']);
//
////       dd($practica);
//
//        $practica->save();
////
//        $practica->tags()->sync($request->tag_id);
//        $practica->meses()->sync($request->mes_id);
//        $practica->semanas()->sync($request->semana_id);
//
//
//        Session::flash('message', 'Práctica actualizado correctamente');
//        return redirect::to('admin/practicas');
//    }
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
