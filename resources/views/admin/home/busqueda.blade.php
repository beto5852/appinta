@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de usuarios ')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('tags') !!}</li>
    </ul>
@endsection


@section('content')

    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif



<div class="box box-primary">

    <div class="box-header">
        <h4 class="box-title">Buscar Practica$practicas</h4>
        <div class="input-group input-group-sm">
            <input type="text" class="form-control" id="dato_buscado">
                            <span class="input-group-btn">
                              <button class="btn btn-info btn-flat" type="button" onclick="buscarusuario();" >Buscar!</button>
                            </span>
        </div>
        <div  >
            <select  id="select_filtro_pais"  onchange="buscarusuario();" >
                <?php  if(isset($cultivosel)){
                    $listadocultivo=$cultivosel->nombre;
                    $optsel= '<option value="'.$cultivosel->id.'">'.$cultivosel->nombre_cultivo.' </option>';
                }else{
                    $listadocultivo="General";
                    $optsel="";
                } ?>

                <?=  $optsel;  ?>
                <option value="0">General </option>
                <?php foreach($cultivos as $cultivo){   ?>
                <option value="<?= $cultivo->id; ?>" > <?= $cultivo->nombre_cultivo; ?></option>
                <?php }  ?>
            </select>

            <span >  Resultados en  listado <b><?= $listadocultivo; ?></b></span>


        </div>




    </div>

    <div class="box-body">
        <?php

        if( count($practicas) >0){
        ?>

        <table id="tabla_pacientes" class="display table table-hover" cellspacing="0" width="100%">

            <thead>
            <tr>
                <th style="width:10px">Id</th>
                <th>Nombres</th>
                <th>email</th>
                <th>pais</th>
                <th>instituccion</th>
                <th>ocupacion</th>
                <th>Fecha Creado</th>

                <th>Acción</th>
            </tr>
            </thead>



            <tbody>


            <?php

            foreach($practicas as $practica){
            ?>

            <tr role="row" class="odd">
                <td class="sorting_1"><?= $practica->id; ?></td>
                <td class="mailbox-messages mailbox-name" ><a href="javascript:void(0);" onclick="mostrarficha(<?= $practica->id; ?>);"  style="display:block"><i class="fa fa-user"></i>&nbsp;&nbsp;<?= $practica->nombre_practica;  ?></a></td>
                <td><?= $practica->rubro->nombre_rubro;  ?></td>
                <td><?= $practica->etapa->nombre_etapa;  ?></td>
                <td><?= $practica->institucion;  ?></td>
                <td><?= $practica->ocupacion;  ?></td>
                <td><?= $practica->created_at;  ?></td>
                <td><button class="btn  btn-success btn-xs" onclick="mostrarficha(<?= $practica->id; ?>);" ><i class="fa fa-fw fa-eye"></i>Ver</button></td>
            </tr>

            <?php
            }
            ?>




        </table>



        <?php


        echo str_replace('/?', '?', $practicas->render() )  ;

        }
        else
        {

        ?>


        <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun usuario...</label>  </div>

        <?php
        }

        ?>
    </div>
</div>
@endsection

