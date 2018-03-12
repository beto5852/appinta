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
        $this->middleware('admin',['only' => ['show','edit','update','create','destroy']]);
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

        return view('admin.mensajes.index',compact('users'));;
    }

    
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
        
        Session::flash('message','Tu Mensaje ha sido enviado');
        return redirect::to('admin/mensajes');
         //return back()->with('flash','Tu mensaje fue enviado');
    }

  
    public function show($id)
    {
        //
        $mensajes = Mensaje::findOrFail($id);

      // dd($id);

        return view('admin.mensajes.show',compact('mensajes'));

    }

}
