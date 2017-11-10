<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Tecnologia;
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

        $tecnologias =  Tecnologia::orderBy('id','DESC')->paginate(5);
        // dd($users);
        return view("admin.tecnologias.index",['tecnologias' => $tecnologias]);
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
        $tecnologias = new Tecnologia($request->all());
        $tecnologias->save();
        Session::flash('message','Tecnolóogia registrada correctamente');
        return redirect::to('admin/tecnologias');
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
        $tecnologias = Tecnologia::find($id);
        return view('admin.tecnologias.edit',compact('tecnologias'));
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
