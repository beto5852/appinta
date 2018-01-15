@extends('layouts.admin')


@section('meta-title','Lista de Practicas')


@section('header')
    <section class="content-header">
        <h1>
            Practicas Agricolas
            <small>Listado de las practicas generadas por el INTA</small>
        </h1>

    </section>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('practicas') !!}</li>
    </ul>
@endsection




@section('content')

  @if(count($errors) > 0)

        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                @foreach($errors->all() as $mensaje)
                    <li>{{$mensaje}}</li>
                @endforeach
            </ul>
        </div>

    @endif


    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif

    <div class="row">
        {{--<div class="col-xs-8">--}}
            {{--<div class="form-group">--}}
                {{--<a href="{{url('admin/practicas/create')}}" class="btn btn-raised btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Crear Práctica</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        {{--<div class="col-xs-12">--}}
            {{--{!! Form::open(['url' => ['admin/practicas'], 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'aria-describedby' => 'search']) !!}--}}


            {{--<div class="input-group pull-right">--}}
                {{--{!! Form::text('search',null,['class' =>'form-control', 'placeholder' =>'Buscar','aria-describedby' => 'search'])!!}--}}
                {{--<span id="search" class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>--}}
            {{--</div>--}}
            {{--{!! Form::close() !!}--}}
        {{--</div>--}}
        {{----}}

    </div>


    <div class="box box-primary">
        <div class="box-header">
            {{--<h3 class="box-title">Listado de prácticas agricolas</h3>--}}
            <button href="#" class="btn btn-raised btn-success pull-right" data-toggle="modal" data-target="#myModalPracticas"><i class="fa fa-user-plus" aria-hidden="true"></i> Crear Práctica</button>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="practicas-table" class="table table-bordered table-striped" style="width: 100% !important;">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Práctica</th>
                    <th>creado por:</th>
                    <th>Tecnológia</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
               </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection




@section('practicas')


        <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(['url' => 'admin/practicas','method' => 'POST','files'=> 'true','enctype' => 'multipart/form-data']) !!}
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Crear práctica</h4>
                </div>
                <div class="modal-body">


                    <div class="form-group {{$errors->has('nombre_practica') ? 'has-error' : ''}}" >
                        {{ Form::label('Practica','Tema de la práctica agrícola') }}
                        {{ Form::text('nombre_practica','',['class' => 'form-control','placeholder' => 'Tema aquí...','value' => 'old(nombre_practica)','Required' ]) }}

                        {!! $errors->first('nombre_practica','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        {{ Form::hidden('user_id',Auth::user()->id,null,['class' => 'form-control'])}}
                    </div>

                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{ Form::submit('Crear Práctica Agricola', ['class' => 'btn btn-primary btn-block']) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>



<script>

$(function() {
         $('#practicas-table').DataTable({
             processing: true,
             serverSide: true,
             paging: true,
             "lengthChange": true,
             "searching": true,
              "ordering": true,
             "info": true,
             "autoWidth": false,
             "pageLength": 10,
             language : {
                 "url": '{!! asset('/adminlte/plugins/datatables/latino.json') !!}'
             },
             ajax: '{!! route('admin.practicas.datos.index') !!}',
             headers:{
                 'X-CSRF-TOKEN':'{{csrf_token()}}'
             },
             columns: [
                 { data: 'id', name: 'id'},
                 { data: 'nombre_practica', name: 'nombre_practica' },
                 { data: 'name', name: 'name' },
                 { data: 'nombre_tecnologia', name: 'nombre_tecnologia' },
                 { data: 'path', render: function (data, type ,row) {

                     {{--return '<td><img src="{{asset('img/no-imagen.jpg')}}" style = "width: 100px;"></td>'--}}

                     return  '@if(empty($practica->path))'+
                             '<td><img src="{{asset('img/no-imagen.jpg')}}" style = "width: 100px;"></td>'+
                             '@else'+
                             '<td><img src="{{asset('img/')}}/'+data.path+'" style = "width: 100px;"></td>'+
                             '@endif'

                 }},
                 { data: null, render: function (data, type ,row) {

                 return  '<td>'+
                         '<a href="{{url("admin/practicas/edit")}}/'+data.id+'" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>'+
                         '<form method="POST" action="{{url("admin/practicas")}}/'+data.id+'" style="display:inline" >'+
                         '{{ csrf_field() }} {{method_field("DELETE")}}'+
                         '<button class="btn btn-raised btn-danger" onclick="return confirm("Esta seguro de eliminar la práctica")"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>'+
                         '</form>'+
                         '<a href="{{"timelinemore"}}/'+data.slug+'" class="btn btn-raised btn-info" role="button" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>'+
                         '</td>'
                 }},
                ]
             });
            });
    </script>




@endsection