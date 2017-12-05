<?php

namespace App\Http\Controllers;

use App\Notifications;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Session;
use Redirect;

class NotificacionesController extends Controller
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
        $unreadNotifications = auth()->user()->unreadNotifications;
        $readNotifications = auth()->user()->readNotifications;
        return view('admin.notificaciones.index',compact('unreadNotifications','readNotifications'));
        
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        //

        DatabaseNotification::find($id)->markAsRead();
        Session::flash('message','Su notificacion fue leida');
        return redirect::to('admin/notificaciones');
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

        DatabaseNotification::find($id)->delete();
        Session::flash('message','Su notificacion ha sido eliminada');
        return redirect::to('admin/notificaciones');


    }
}
