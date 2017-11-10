@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Practica')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('cultivos.edit') !!}</li>
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

                <!--Aqui va el formulario de la practica agricola-->
        {!! Form::open(['url' => ['admin/cultivos',$cultivo], 'method' => 'PUT']) !!}
        <div class="form-group">
            {!! Form::label('nombre_cultivo','Nombre de la tecnológia') !!}
            {!! Form::text('nombre_cultivo',$cultivo->nombre_cultivo,['class' =>'form-control', 'placeholder' =>'Nombre practica','required'])!!}
        </div>

        <div class="form-group text-right">

            <a href="{{url('admin/cultivos')}}" class="btn btn-info" >Lista Cultivos</a>
            {{ Form::submit('Actualizar', ['class' => 'btn btn-info']) }}

        </div>
        {!! Form::close() !!}




@endsection