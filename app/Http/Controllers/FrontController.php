<?php

namespace App\Http\Controllers;

use App\Notifications;
use App\Tecnologia;
use App\Practica;
use App\User;
use App\Cultivo;
use Cache;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $practicas = Practica::OrderBy('id','DESC')->paginate(3);
        return view('index', compact('practicas'));
    }
    public function  admin(){
        $totalusers = User::all();
        $users = User::orderBy('id','DESC')->paginate(8);
        $totaltecnologias = Tecnologia::all();
        $totalpracticas = Practica::all();
        $totalcultivos = Practica::all();
        //d( $totalusers->count());
        /* $variable = nameModelo::find($id);
         if(Cache::has($id)==false){
             Cache::add($id,'contador',0.30);
             $variable->total_visitas++;
             $variable->save();
         }
         */

        $practicas = Practica::OrderBy('id','DESC')->paginate(5);
        $tecnologias = Tecnologia::OrderBy('id','DESC')->paginate(5);
        return view('admin.home.index',compact('practicas','totalusers','totaltecnologias','totalpracticas','totalcultivos','users','tecnologias'));
    }
    public function  practica($slug){
        //$practicas = Practica::find($slug);
        $practicas = Practica::where('slug',$slug)->first();
        //dd($practicas);
        //$practicas = Practica::find()->pluck('slug');

        return view('practica',compact('practicas'));;
    }
    public function searchPracticas($name){
        $practicas = Practica::scopeSearchPractica($name)->get();
        dd($practicas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }
}
