@extends('layouts.admin')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Enviar mensaje')

@section('breadcrumb')

    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="active">{!! Breadcrumbs::render('mensajes') !!}</li>
            </ol>
        </div>
    </section>

@endsection

@section('content')

        <!--Aqui va el formulario de la practica agricola-->
    {!! Form::open(['url' => 'admin/users', 'method' => 'POST']) !!}

            <div class="form-group">
                {{ Form::label('tecnologia','Tecnológia') }}
                {{ Form::select('practica_id_tecnologia',$users,null,['class' => 'form-control'])}}
            </div>
            <div class="form-group">
                {{ Form::label('Mensaje','Escribe tu mensaje') }}
                {{ Form::text('mensaje','',['class' => 'form-control','placeholder' => 'Escribe aquí tu mensaje...','required']) }}
            </div>


    <div class="form-group text-right">
        {{ Form::submit('Enviar mensaje', ['class' => 'btn btn-raised btn-success']) }}
    </div>
    {!! Form::close() !!}


@endsection