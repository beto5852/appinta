@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Show Practica')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('practicas.show') !!}</li>
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
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <h1>{{$practica->nombre_practica}}</h1>
                <p>{{$practica->contenido}}</p>
            </div>

        </div>

    </div>

@endsection