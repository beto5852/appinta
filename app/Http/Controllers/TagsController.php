<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use Yajra\Datatables\Datatables;

class TagsController extends Controller
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

        // $tag = Datatables::of( DB::table('tags')->select('id','nombre_tags')->get())->make(true);

        // dd($tag);

        // $tags = Tag::Search($request->search)->orderBy('id','DESC')->paginate(6);

        return view('admin.tags.index');
    }
    public function datos_tags(){

      return Datatables::of( DB::table('tags')->select('id','nombre_tags')->get())->make(true);
         
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tags.create');
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
        $tag = new Tag($request->all());
        $tag->save();
        Session::flash('message','Tag registrado correctamente');
        return redirect::to('admin/tags');
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
//edita con id
        $tags    = Tag::findOrFail($id);
       
        return view('admin.tags.edit', compact('tags'));


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
        $tag = Tag::find($id);
        $tag->delete();
        Session::flash('message','Tags eliminado correctamente');
        return redirect::to('admin/tags');
    }
}
