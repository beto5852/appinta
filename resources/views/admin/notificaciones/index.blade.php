@extends('layouts.admin')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Notificaciones')

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

<h1>Notificaciones</h1>


@endsection