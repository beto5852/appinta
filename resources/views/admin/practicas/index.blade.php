@extends('layouts.admin')


@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de Practicas')

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


    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif

    <div class="row">
        <div class="col-xs-8">
            <div class="form-group">
                <a href="{{url('admin/practicas/create')}}" class="btn btn-raised btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Crear Práctica</a>
            </div>
        </div>
        <div class="col-xs-2">
            {!! Form::open(['url' => ['admin/practicas'], 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'aria-describedby' => 'search']) !!}


            <div class="input-group">
                {!! Form::text('search',null,['class' =>'form-control', 'placeholder' =>'Buscar','aria-describedby' => 'search'])!!}
                <span id="search" class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
            </div>


            {!! Form::close() !!}
        </div>
    </div>


    <div class="box">
        <div class="box-header">
            <h3 class="box-title">Listado de prácticas agricolas</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="practicas-table" class="table table-bordered table-striped">
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

               @foreach($practicas as $practica)
                   <tr class="info">
                       <td>{{  $practica->id }}</td>
                       <td>{{  $practica->nombre_practica}}</td>
                       <!--  <td>{!! $practica->contenido !!}</td>-->
                       <td>{{  $practica->user['name']}}</td>
                       <td>{{  $practica->tecnologia['nombre_tecnologia']}}</td>
                       @if(empty($practica->path))
                           <td><img src="{{asset('img/no-imagen.jpg')}}" style = "width: 100px;"></td>
                       @else
                           <td><img src="{{asset('img/')}}/{{$practica->path}}" style = "width: 100px;"></td>
                       @endif
                       <td>
                           <a href="{{url('admin/practicas/'.$practica->id.'/edit')}}" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                           <a href="{{url('practicas/'.$practica->id)}}" class="btn btn-raised btn-danger" role="button"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                           <a href="{{url('admin/practicas/'.$practica->id)}}" class="btn btn-raised btn-info" role="button"><i class="fa fa-eye" aria-hidden="true"></i></a>
                       </td>
                   </tr>
               @endforeach


               </tbody>
                <center>{{ $practicas->links() }}</center>

            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->







@endsection
