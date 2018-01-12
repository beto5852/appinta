<?php

namespace App\Http\Controllers;
use App\Practica;
use App\Foto;
use Illuminate\Http\Request;
use Storage;

class FotoController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $this->validate($request ,[
                'foto' => 'required|image|max:2048',
            ]
        );

        $foto =  request()->file('foto')->store('public');

//        return $foto;

        Foto::create([
            'url' => Storage::url($foto),
            'practica_id' => $id,
        ]);
    }

    public function destroy(Foto $foto){

        $foto->delete();

        $fotoPath = str_replace('storage','public',$foto->url);

        Storage::delete($fotoPath);

        return back()->with('message','Foto Eliminada');

    }

    
}
