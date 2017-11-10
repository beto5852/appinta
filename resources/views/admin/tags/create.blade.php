@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Crear tecnológia INTA')

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('tags.create') !!}</li>
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
        {!! Form::open(['url' => 'admin/tags', 'method' => 'POST']) !!}
        <div class="form-group">
            {!! Form::label('nombre_tags','Nombre del Tags') !!}
            {!! Form::text('nombre_tags',null,['class' =>'form-control', 'placeholder' =>'Nombre','required'])!!}
        </div>

        <div class="form-group text-right">
            <a href="{{url('admin/tags')}}" class="btn btn-raised btn-primary">ver lista de tecnologias</a>
            {{ Form::submit('Registrar', ['class' => 'btn btn-raised btn-success']) }}

        </div>
        {!! Form::close() !!}


@endsection