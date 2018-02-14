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
            <table id="practicas-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Práctica</th>
                    {{--<th>creado por:</th>--}}
                    {{--<th>Tecnológia</th>--}}
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

                            <form method="POST" action="{{route('admin.practicas.destroy',$practica->id)}}" style="display:inline" >
                                {{ csrf_field() }} {{method_field('DELETE')}}

                                <button class="btn btn-raised btn-danger" onclick="return confirm('Esta seguro de eliminar la práctica')"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>

                            </form>
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



@endsection
