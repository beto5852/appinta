<?php

namespace App\Http\Controllers;

use App\Cultivo;
use App\Http\Controllers\Controller;
use App\Rubro;
use App\Variedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Redirect;
use Session;
use Storage;

class CultivosController extends Controller
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
        //
        $rubro = Rubro::pluck('nombre_rubro','id')->toArray();
//        dd($rubro);
        return view("admin.cultivos.index", compact('rubro'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datos_cultivos(){

        return Datatables::of( DB::table('cultivos')
            ->join('rubros','cultivos.rubro_id','=','rubros.id')
            ->select('cultivos.*','rubros.nombre_rubro')
            ->orderBy('rubros.nombre_rubro')
            ->get())->make(true);
    }

    public function create()
    {
        return view('admin.cultivos.create');
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
            'nombre_cultivo' => 'required|min:3|max:100',
        ]);
//        dd($request->all());
        $cultivo = new Cultivo($request->all());

        $cultivo->save();

        Session::flash('message', 'Cultivo registrado correctamente');
        return redirect()->route('admin.cultivos.edit',$cultivo);
//        return redirect::to('admin/cultivos/');

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
        //
//        $variedades = Variedad::orderBy('nombre_variedad', 'ASC')->pluck('nombre_variedad', 'id');
        $rubro = Rubro::pluck('nombre_rubro','id')->toArray();
        // dd($variedades);
        $cultivo    = Cultivo::findOrFail($id);

        return view('admin.cultivos.edit', compact('cultivo','rubro'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cultivo $cultivo)
    {
        //
        $cultivo->nombre_cultivo = $request->get('nombre_cultivo');
        $cultivo->descripcion_cultivo = $request->get('descripcion_cultivo');
        $cultivo->rubro_id = $request->get('rubro_id');

//
//        $cultivo = Cultivo::find($id);
//        $cultivo->fill($request->all());

        $cultivo->save();

        return redirect()->route('admin.cultivos.edit',$cultivo)->with('message','Cultivo actualizado correctamente');
//
//        Session::flash('message','Cultivo actualizado correctamente');
//        return redirect::to('admin/cultivos');
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
