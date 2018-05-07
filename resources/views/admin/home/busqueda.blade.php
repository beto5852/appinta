@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de usuarios ')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('busqueda') !!}</li>
    </ul>
@endsection



@section('content')
    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif

    <div class="row">

        <div class="col-xs-12">
        {!! Form::open(['url' => ['admin/busqueda'], 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'aria-describedby' => 'search']) !!}


        <div class="input-group pull-right">
        {!! Form::text('search',null,['class' =>'form-control', 'placeholder' =>'Buscar','aria-describedby' => 'search'])!!}
        <span id="search" class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
        </div>
        {!! Form::close() !!}
        </div>


    </div>


    <div class="box box-primary">

        <!-- /.box-header -->
        <div class="box-body">
            <center>{{ $practicas->links() }}</center>
            <table id="practicas-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Práctica</th>
                    <th>Tecnológia</th>
                    <th>Rubro</th>
                    <th>Cultivo</th>
                    <th>Etapas</th>
                    <th>Mes</th>
                    <th>Semanas</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
                </thead>

                <tbody>
                @foreach($practicas as $practica)

                    <tr class="info">

                        <td>{{  $practica->nombre_practica}}</td>

                        <td>{{  $practica->tecnologia['nombre_tecnologia']}}</td>

                        <td>{{  $practica->rubro['nombre_rubro']}}</td>

                        <td>{{  $practica->cultivo['nombre_cultivo']}}</td>
                        <td>
                        @foreach($practica->etapas as $etapa)
                           <span class="label label-success">{{$etapa->nombre_etapa}}</span><br>
                        @endforeach
                        </td>
                        @foreach($practica->meses as $mes)
                            <td> {{$mes->nombre_mes}}</td><br>
                        @endforeach

                        <td>
                        @foreach($practica->semanas as $semana)

                           <span class="label label-primary">{{$semana->nombre_semana}}</span><br>
                        @endforeach
                        </td>


                      @if(empty($practica->path))
                            <td><img src="{{asset('img/no-imagen.jpg')}}" style = "width: 100px;"></td>
                        @else
                            <td><img src="{{asset('img/')}}/{{$practica->path}}" style = "width: 100px;"></td>
                        @endif
                        <td>
                            @if(Auth::user()->type == 'admin')

                            <a href="{{url('admin/practicas/'.$practica->id.'/edit')}}" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                <a class="btn btn-raised btn-danger" data-toggle="modal" style="position: absolute" data-url="{!! URL::route('admin.practicas.destroy',$practica->id) !!}" data-id="{{$practica->id}}" data-target="#custom-width-modal" ><i class="fa fa-trash-o" aria-hidden="true" ></i></a>
                            <br>
                            @endif
                            <a href="{{'timelinemore'}}/{{$practica->slug}}" class="btn btn-raised btn-info" role="button" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach


                </tbody>



            </table>
          <center>{{ $practicas->links() }}</center>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- Delete Model -->
    <form action="{{url('admin/practicas/'.$practica->id)}}" method="POST" class="remove-record-model">
        {{method_field('DELETE')}}{{csrf_field()}}
        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" style="width:30%;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="modal-title" id="custom-width-modalLabel">Eliminar Práctica Agricola</h4>
                    </div>
                    <div class="modal-body">
                        <h4>Esta seguro de eliminar la práctica agricola?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger waves-effect waves-light">Eliminar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
