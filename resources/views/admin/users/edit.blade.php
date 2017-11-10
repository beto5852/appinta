@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Usuario')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('users.edit') !!}</li>
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
        {!! Form::open(['url' => ['admin/users',$user], 'method' => 'PUT']) !!}


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('name','Nombre') !!}
                    {!! Form::text('name',$user->name,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('email','Correo electrónico') !!}
                    {!! Form::email('email',$user->email,['class' =>'form-control', 'placeholder' =>'example@gmail.com','required'])!!}
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('sexo','Sexo') }}
                    {{ Form::select('sexo',['' => 'Seleccione una opción' , 'masculino' => 'mascúlino', 'femenino' => 'femenino'],$user->sexo,['class' => 'form-control'])}}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {{ Form::label('type','Tipo de usuario') }}
                    {{ Form::select('type',['' => 'Seleccione tipo de usuario' , 'miembro' => 'miembro', 'admin' => 'admin'],$user->type,['class' => 'form-control'])}}
                </div>

            </div>

        </div>



        <div class="form-group text-right">

            <a href="{{url('admin/users')}}" class="btn btn-raised btn-primary" >Lista de usuarios</a>
            {{ Form::submit('Actualizar', ['class' => 'btn btn-raised btn-success']) }}

        </div>
        {!! Form::close() !!}




@endsection