@extends('layouts.admin')


@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de Tecnologias generadas por el INTA')

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('tecnologias') !!}</li>
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
                <a href="{{url('admin/tecnologias/create')}}" class="btn btn-raised btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Crear tecnológia</a>
            </div>
        </div>
        <div class="col-xs-2">
            {!! Form::open(['url' => ['admin/tecnologias'], 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'aria-describedby' => 'search']) !!}

            <div class="form-group">
                {!! Form::text('search',null,['class' =>'form-control', 'placeholder' =>'Buscar','required'])!!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <table class="table table-striped table-hover" >
        <thead>
        <tr >
            <th>Labor agricola</th>
            <th>Descripción</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tecnologias as $tecnologia)
            <tr class="info">
                <td>{{  $tecnologia->nombre_tecnologia }}</td>
                <td >{!! $tecnologia->descripcion_tecnologia !!}</td>
                <td>
                    <a href="{{url('admin/tecnologias/'.$tecnologia->id.'/edit')}}" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <a href="#" class="btn btn-raised btn-warning" role="button"
                       onclick="return confirm('Esta seguro de eliminar al usuario')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <center>{{ $tecnologias->links() }}</center>


@endsection