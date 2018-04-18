<?php

namespace App\Http\Controllers;
use App\Etapa;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Session;
use Redirect;
use Illuminate\Http\Request;

class EtapasController extends Controller
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
         return view("admin.etapas.index");
    }

    public function datos_etapas(){

        $etapas = Etapa::select('etapas.id','etapas.nombre_etapa');

       $buttonDelete='<i class="fa fa-trash-o"></i>{{ trans("admin/modal.delete") }}';

        return Datatables::of($etapas)
//            ->add_column('action','
//            <form action="{{ route(\'admin.etapas.destroy\', $id) }}" method="POST">
//            <input type="hidden" name="_method" value="DELETE">
//            {{ csrf_field() }} {{method_field("DELETE")}}
//            <button class="btn btn-raised btn-danger" onclick=""><i class="fa fa-trash-o" aria-hidden="true" ></i></button>
//            </form>')
            ->make(true);
    }
    
    
    
    public function create()
    {
        return view('admin.etapas.create');
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
            'nombre_etapa' => 'required|min:3|max:200',
        ]);

        $etapa = Etapa::create(['nombre_etapa' => $request->get('nombre_etapa')]);


        Session::flash('message','Etapa agricola creada con exito');
        return redirect()->route('admin.etapas.index');
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
        $etapa = Etapa::findOrFail($id);

        return view('admin.etapas.edit',compact('etapa'));
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
        $etapa = Etapa::find($id);
        $etapa->fill($request->all());
        $etapa->save();


        Session::flash('message','Etapa actualizada correctamente');
        return redirect::to('admin/etapas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $etapa = Etapa::find($id);
        $etapa->delete();
        Session::flash('message','Etapa eliminada correctamente');
        return redirect::to('admin/etapas');
    }
}
