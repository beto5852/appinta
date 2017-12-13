<?php

namespace App\Http\Controllers;


use Session;
use Redirect;
use App\User;
use App\Mensaje;
use App\Notifications\MensajeEnviado;
use Illuminate\Http\Request;

class MensajesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $this->validate($request,[
            'body' => 'required',
            'recibe_id' => 'required|exists:users,id',
        ]);
        //dd($request->ToArray());

        //$recibe = $request->recibe_id;


        $mensaje = Mensaje::create([
            'envia_id' => auth()->id(),
            'recibe_id' => $request->recibe_id,
            'body' => $request->body,
        ]);

        $recibe = User::find($request->recibe_id);

        //dd($recibe);

        $recibe->notify(new MensajeEnviado($mensaje));
        
        Session::flash('message','Tu Mensaje Enviado');
        return redirect::to('admin/mensajes');
         //return back()->with('flash','Tu mensaje fue enviado');
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
        $mensajes = Mensaje::findOrFail($id);

      // dd($id);

        return view('admin.mensajes.show',compact('mensajes'));

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
