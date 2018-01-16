<?php

namespace App\Http\Controllers;

use App\Cultivo;
use App\Http\Controllers\Controller;
use App\Variedad;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Storage;

class CultivosController extends Controller
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
        //
        $cultivos = Cultivo::orderBy('id', 'DESC')->paginate(5);
        // dd($cultivos);
        return view("admin.cultivos.index", compact('cultivos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $variedades = Variedad::orderBy('nombre_variedad', 'ASC')->pluck('nombre_variedad', 'id');

        // dd($variedades);

        return view('admin.cultivos.create', compact('variedades'));
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
        $this->validate($request, [
            'nombre_cultivo' => 'required',

        ]);

        $cultivo = new Cultivo;

        //$cultivo_id = $request->get('cultivo_id');

        //$variedades = new Variedad($cultivo_id);

//        dd($cultivo[0]->cultivo);
        // dd($cultivo_id);

        $cultivo->nombre_cultivo      = $request->get('nombre_cultivo');
        $cultivo->descripcion_cultivo = $request->get('descripcion_cultivo');
        $cultivo->save();

        //$cultivo->variedades()->create($cultivo_id);

        // dd($cultivo->ToArray());

        // $cultivo->save();

        // $cultivo->variedades()->sync($request->cultivo_id);

        Session::flash('message', 'Cultivo registrado correctamente');
        return redirect::to('admin/cultivos/create');

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
        // //
        $cultivo = Cultivo::find($id);
        $cultivo->delete();

        Session::flash('message', 'Cultivo eliminado correctamente');
        return redirect::to('admin/cultivos');
        //dd($id);
    }
}
