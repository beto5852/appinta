<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Role;
use App\Rubro;
use App\User;
use Storage;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

use Illuminate\Http\Request;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','roles:admin,miembro']);
        $this->middleware('roles:admin', ['only' => ['index', 'edit', 'update', 'create', 'destroy']]);
        // $this->middleware('roles:miembro', ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $users = User::Search($request->search)->orderBy('id','ASC')->paginate(6);
        // dd($users);
        return view("admin.users.index",compact('users'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles  = Role::orderBy('display_name', 'ASC')->pluck('display_name', 'id');              
        return view("admin.users.create",compact('roles'));
        //return 'esta es una prueba';
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
        $v = \Validator::make($request->all(), [

            'name' => 'required',
            'password' => 'required',
            'email'    => 'required|email',
            'sexo' => 'required_if:masculino,femenino',
            'perfil' => 'dimensions:min_width=100,min_heigth:100'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

        $user = new User($request->all());
        
        $user->password = bcrypt($request->password);
        //dd($user);
        
        $user->save();
        
        $user->roles()->sync($request->role_id);
        

        Session::flash('message','Usuario registrado correctamente');
        return redirect::to('admin/users');
        //dd($user);
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
        $user = User::find($id);
       // $rubros = Rubro::orderBy('nombre_rubro','ASC')->pluck('nombre_rubro','id');

        //dd($user);

        return view('admin.users.show',compact('user'));
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
        $user = User::find($id);
        $roles       = Role::pluck('display_name','id');

//        dd($roles);

        return view('admin.users.edit',compact('user','roles'));
        //dd($user);
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

        $v = \Validator::make($request->all(), [

            'name' => 'required',
            'password' => 'required',
            'email'    => 'required|email',
            'sexo' => 'required_if:masculino,femenino',
            'type' => 'required_if:admin,miembro',
            'perfil' => 'dimensions:min_width=100,min_heigth:100'
        ]);

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }
        //
//        return $request->all();
        $user = User::find($id);
        $user->fill($request->all());
        $user->password = bcrypt($request->password);
        $user->update(['perfil']);
        $user->save();
        $user->roles()->sync($request->roles);

        Session::flash('message','Usuario actualizado correctamente');
        return redirect::to('admin/users');
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
        $user = User::find($id);
        $user->delete();
        
        Session::flash('message','Usuario eliminado correctamente');
        return redirect::to('admin/users');
        //dd($id);
    }
}
