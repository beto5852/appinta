@extends('layouts.admin')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Enviar mensaje')

@section('breadcrumb')

    <ol class="breadcrumb">
        <li class="active">{!! Breadcrumbs::render('mensajes') !!}</li>
    </ol>


@endsection

@section('content')

    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
        @endif

        <!--Aqui va el formulario de la practica agricola-->
    {!! Form::open(['url' => 'admin/mensajes', 'method' => 'POST']) !!}

            <div class="form-group">
                {{ Form::label('Enviar a:','Enviar a:') }}
                {{ Form::select('recibe_id',$users,null,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{ Form::label('Mensaje','Escribe tu mensaje') }}
                {{ Form::text('body','',['class' => 'form-control','placeholder' => 'Escribe aquí tu mensaje...','required']) }}
            </div>

    <div class="form-group text-right">
        {{ Form::submit('Enviar mensaje', ['class' => 'btn btn-raised btn-success']) }}
    </div>
    {!! Form::close() !!}

@endsection