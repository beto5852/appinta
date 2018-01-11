@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Practica')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('tecnologias.edit') !!}</li>
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
        {!! Form::open(['url' => ['admin/tags',$tags], 'method' => 'PUT']) !!}

        <div class="modal-body">
            <div class="form-group {{$errors->has('nombre_tags') ? 'has-error' : ''}}">
                {!! Form::label('nombre_tags','Nombre la etiqueta') !!}
                {!! Form::text('nombre_tags',$tags->nombre_tags,['class' =>'form-control', 'placeholder' =>'Escriba en nombre de la etiqueta ejemplo: cultivo','required','value' => '{old(nombre_practica,$tags->nombre_tags)}'])!!}
                {!! $errors->first('nombre_tags','<span class="help-block">:message</span>') !!}
            </div>

        </div>
        <div class="modal-footer">
            {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
            {{ Form::submit('Guardar etiqueta agricola', ['class' => 'btn btn-primary btn-block']) }}
        </div>
        </div>
        {!! Form::close() !!}




@endsection