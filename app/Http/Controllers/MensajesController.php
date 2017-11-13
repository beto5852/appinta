<?php

namespace App\Http\Controllers;

use Session;
use Redirect;
use App\Mensaje;
use App\User;

use Illuminate\Http\Request;

class MensajesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $users = User::Where('id', '!=', auth()->id())->Where('type','=', 'admin')->pluck('name','id');

       // dd($users);

        return view('admin.mensajes.index',compact('users'));
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

        //dd($request->ToArray());

        //$recibe = $request->recibe_id;
        //dd($recibe);

        Mensaje::create([
            'envia_id' => auth()->id(),
            'recibe_id' => $request->recibe_id,
            'body' => $request->body,

        ]);

        Session::flash('message','Mensaje Enviado');
        return redirect::to('admin/mensajes');

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
