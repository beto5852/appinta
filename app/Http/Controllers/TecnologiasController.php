<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tecnologia;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Session;
use Redirect;

class TecnologiasController extends Controller
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
        $tecnologias = Tecnologia::all();        
        return view("admin.tecnologias.index",compact('tecnologias'));
    }

    public function datos_tecnologias(){

        $tecnologias = Tecnologia::select('tecnologias.id','tecnologias.nombre_tecnologia');

        return Datatables::of($tecnologias)
            ->make(true);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tecnologias.create');
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
        $this->validate($request , [
            'nombre_tecnologia' => 'required|min:3|max:200',
        ]);

        $tecnologia = Tecnologia::create(['nombre_tecnologia' => $request->get('nombre_tecnologia')]);

        Session::flash('message','Tecnologia Creada');
        return redirect()->route('admin.tecnologias.edit',$tecnologia);

    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

//        return $id;

        $tecnologia = Tecnologia::findOrFail($id)->practicas;
//        $practicas = $tecnologia->practicas;

        dd($tecnologia);


        return view('/',[

            
        ]);


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
        $tecnologia = Tecnologia::findOrFail($id);

        return view('admin.tecnologias.edit',compact('tecnologia'));
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
        //
        $tecnologia = Tecnologia::find($id);
        $tecnologia->fill($request->all());
        $tecnologia->save();


        Session::flash('message','Tecnológia actualizada correctamente');
        return redirect::to('admin/tecnologias');
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
        $tecnologia = Tecnologia::find($id);
        $tecnologia->delete();
        Session::flash('message','Tecnológia eliminada correctamente');
        return redirect::to('admin/tecnologias');
    }
}
