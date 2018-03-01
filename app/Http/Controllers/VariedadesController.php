<?php

namespace App\Http\Controllers;

use App\Variedad;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Session;
use Redirect;
use Illuminate\Http\Request;

class VariedadesController extends Controller
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
        return view("admin.variedades.index");
    }

    public function datos_variedades(){

        $variedades = Variedad::select('variedades.id','variedades.nombre_variedad');

        return Datatables::of($variedades)
            ->make(true);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.variedades.create');
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
            'nombre_variedad' => 'required|min:3|max:200',
        ]);

        $vatiedades = Variedad::create(['nombre_variedad' => $request->get('nombre_variedad')]);

        Session::flash('message','Variedad agricola creada con exito');
        return redirect()->route('admin.variedades.edit',$vatiedades);
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
        $variedad = Variedad::findOrFail($id);

        return view('admin.variedades.edit',compact('variedad'));
        //dd($tecnologias);
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
        $variedad = Variedad::find($id);
        $variedad->fill($request->all());
        $variedad->save();


        Session::flash('message','Variedad actualizada correctamente');
        return redirect::to('admin/variedades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variedad = Variedad::find($id);
        $variedad->delete();
        Session::flash('message','Variedad eliminada correctamente');
        return redirect::to('admin/variedades');
    }
}
