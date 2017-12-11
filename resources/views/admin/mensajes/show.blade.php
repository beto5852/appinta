@extends('layouts.admin')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Ver Mensajes')

@section('breadcrumb')


    <ol class="breadcrumb">
        <li class="active">{!! Breadcrumbs::render('mensajes') !!}</li>
    </ol>


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


    <div class="row">
        <div class="col-md-6">

            <h2>Mensajes</h2>
            <p>{{$mensajes->body}}</p>
            <small>Enviado por {{$mensajes->sender->name}}</small>

        </div>

    </div>

@endsection