<?php

namespace App\Http\Controllers;
use App\Practica;
use App\Tecnologia;
use App\Cultivo;
use App\User;
use Redirect;
use Session;
use Storage;
use Illuminate\Http\Request;

class GraficasController extends Controller
{
    public function getUltimoDiaMes($elAnio,$elMes) {
        return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }



    public function registros_mes($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $usuarios=User::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($usuarios);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;
        }

        foreach($usuarios as $usuario){
            $diasel=intval(date("d",strtotime($usuario->created_at) ) );
            $registros[$diasel]++;
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }


    public function total_publicaciones(){

//        $tipospublicacion=Tecnologia::all();
//        $ctp=count($tipospublicacion);
//        $publicaciones=Practica::all();
//        $numerodepubli = [];
//        $ct =count($publicaciones);
//
//        for($i=0;$i<=$ctp-1;$i++){
//            $idTP=$tipospublicacion[$i]->id;
//            $numerodepubli[$idTP]=0;
//        }
//
//        for($j=0;$j<=$ct-1;$j++){
//            $idTP=$publicaciones[$j]->idTipopublicacion;
//            $numerodepubli[$idTP]++;
//        }
//
//        $data=array("totaltipos"=>$ctp,"tipos"=>$tipospublicacion, "numerodepubli"=>$numerodepubli);
//        return json_encode($data);

        $tipotecnologia=Tecnologia::all();
        $ctp=count($tipotecnologia);
        $practicas=Practica::all();
        $ct =count($practicas);

        for($i=0;$i<=$ctp-1;$i++){
            $idTP=$tipotecnologia[$i]->id;
            $numerodepract[$idTP]=0;
        }

//        dd($idTP);
        for($j=0;$j<=$ct-1;$j++){
            $idTP=$practicas[$j]->tecnologia_id;
            $numerodepract[$idTP]++;
        }

        
        $data=array("totaltipos"=>$ctp,"tipos"=>$tipotecnologia, "numerodepract"=>$numerodepract);
        return json_encode($data);

    }


    public function index()
    {
        $anio=date("Y");
        $mes=date("m");
        return view("partials.listado_graficas")
            ->with("anio",$anio)
            ->with("mes",$mes);
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
