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

        return Datatables::of( DB::table('cultivos')->select('id','nombre_cultivo')->get())->make(true);

    }

    public function create()
    {
        $rubro = Rubro::pluck('nombre_rubro','id');

//        dd($rubro);

        return view('admin.cultivos.create',compact('rubro'));
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
            'rubro_id' => 'required',
        ]);
//        dd($request->all());
        $cultivo = new Cultivo($request->all());
        $cultivo->save();


        Session::flash('message', 'Cultivo registrado correctamente');
        return redirect::to('admin/cultivos/');

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

        // dd($variedades);
        $cultivo    = Cultivo::findOrFail($id);

        return view('admin.cultivos.edit', compact('cultivo'));
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
        $cultivo = Cultivo::find($id);
        $cultivo->fill($request->all());
        $cultivo->save();
        Session::flash('message','Cultivo actualizado correctamente');
        return redirect::to('admin/cultivos');
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
