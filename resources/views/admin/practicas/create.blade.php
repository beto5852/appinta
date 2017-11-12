@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Crear práctica agricola')

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('practicas.create') !!}</li>
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
        {!! Form::open(['url' => 'admin/practicas','method' => 'POST','files'=> 'true','enctype' => 'multipart/form-data']) !!}

        <div class="form-group">
            {{ Form::label('Practica','Tema de la práctica agrícola') }}
            {{ Form::text('nombre_practica','',['class' => 'form-control','placeholder' => 'Tema aquí...','required']) }}
        </div>
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('tecnologia','Tipo de tecnológia') }}
                    {{ Form::select('practica_id_tecnologia',$tecnologias,null,['class' => 'form-control','required'])}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('pt_id_tags','Tags') }}
                    {{ Form::select('pt_id_tags[]',$tags,null,['class'=>'form-control chosen-select','multiple','required']) }}
                </div>
            </div>

        </div>



        <div class="form-group">
            {!! Form::textarea('contenido',null,['id' => 'my-editor','class' => 'my-editor'])!!}

        </div>


        <div class="form-group">
            {{ Form::hidden('practica_id_usuario',Auth::user()->id,null,['class' => 'form-control'])}}
        </div>
        <div class="form-group">
            {{ Form::label('path','Imagen de la práctica') }}
            {{ Form::file('path')}}
        </div>


        <div class="form-group text-right">
            <a href="{{url('admin/practicas')}}">Regrese a la lista de prácticas</a>
            {{ Form::submit('Guardar', ['class' => 'btn btn-info']) }}

        </div>

        {!! Form::close() !!}

@endsection