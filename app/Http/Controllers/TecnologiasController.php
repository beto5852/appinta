<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tecnologia;
use App\Rubro;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;
use Session;
use Redirect;

class TecnologiasController extends Controller
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

        $rubro = Rubro::pluck('nombre_rubro','id')->toArray();
        // dd($users);
        return view("admin.tecnologias.index",['rubro' => $rubro]);
    }

    public function datos_tecnologias(){

        return Datatables::of( DB::table('tecnologias')
            ->join('rubro_tecnologia','tecnologias.id','=','rubro_tecnologia.tecnologia_id')
            ->join('rubros','rubro_tecnologia.rubro_id','=','rubros.id')
            ->select('tecnologias.id','tecnologias.nombre_tecnologia','tecnologias.descripcion_tecnologia','rubros.nombre_rubro')
            ->orderBy('id', 'DESC')
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
            'nombre_tecnologia' => 'required|min:3|max:100',
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

        $tecnologia = Tecnologia::findOrFail($id);
        $rubros = Rubro::pluck('nombre_rubro','id');        
        $my_rubros   = $tecnologia->rubros->pluck('nombre_rubro','id')->toArray();

//        dd($my_rubros);

        return view('admin.tecnologias.edit',compact('tecnologia','rubros','my_rubros'));
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

        $tecnologia->rubros()->sync($request->rubro_id);

        Session::flash('message','Usuario actualizado correctamente');
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
