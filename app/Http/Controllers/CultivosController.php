<?php

namespace App\Http\Controllers;

use App\Cultivo;
use App\Variedad;
use Storage;
use Session;
use Redirect;
use Illuminate\Http\Request;

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
        $cultivos =  Cultivo::orderBy('id','DESC')->paginate(5);
        // dd($cultivos);
        return view("admin.cultivos.index",compact('cultivos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $variedades = Variedad::orderBy('nombre_variedad','ASC')->pluck('nombre_variedad','id');
        
        return view('admin.cultivos.create',compact('variedades'));
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
        // //
        $cultivo = Cultivo::find($id);
        $cultivo->delete();

        Session::flash('message','Cultivo eliminado correctamente');
        return redirect::to('admin/cultivos');
        //dd($id);
    }
}
