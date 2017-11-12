@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Practica')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('practicas.edit') !!}</li>
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
        {!! Form::open(['url' => ['admin/practicas',$practica], 'method' => 'PUT','enctype' => 'multipart/form-data','files'=> 'true']) !!}


        <div class="form-group">
            {{ Form::label('nombre_practica','Nombre de la labor agricola') }}
            {{ Form::text('nombre_practica',$practica->nombre_practica,['class' =>'form-control', 'placeholder' =>'Nombre practica','required'])}}
        </div>


        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('tecnologia','Tecnológia') }}
                    {{ Form::select('practica_id_tecnologia',$tecnologias,$practica->tecnologia->id,['class' => 'form-control'])}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('pt_id_tags','Tags') }}
                    {{ Form::select('pt_id_tags[]',$tags,$my_tags,['class'=>'form-control chosen-select', 'multiple', 'required' ]) }}
                </div>
            </div>
        </div>


        <div class="form-group">
            {{ Form::label('contenido','Descripción') }}
            {{  Form::textarea('contenido',$practica->contenido,['id' => 'my-ckeditor','class' => 'my-ckeditor']) }}
        </div>



        <div class="row">

            <div class="col-md-6">

                <div class="form-group">
                    {{ Form::label('user','Cambiar editor') }}
                    {{ Form::select('practica_id_usuario',$users,null,['class' => 'form-control'])}}

                </div>
            </div>
            <div class="col-md-6">
                @if(empty($practica->path))
                    <img src="{{asset('img/no-imagen.jpg')}}" alt="" style="width: 100px;" />
                @else
                    <img src="{{asset('img/')}}/{{$practica->path}}" alt="" style="width: 100px;" />
                @endif
                <div class="form-group">
                    {{ Form::label('imagen','Imagen de la práctica') }}
                    {{ Form::file('path')}}
                </div>

            </div>
        </div>



        <div class="form-group text-right">

            <a href="{{url('admin/practicas')}}" class="btn btn-raised btn-primary" >volver a prácticas</a>
            {{ Form::submit('Actualizar', ['class' => 'btn btn-raised btn-success']) }}

        </div>
        {!! Form::close() !!}




@endsection