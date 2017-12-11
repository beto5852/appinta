@extends('layouts.admin')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Bienvenido')

@section('breadcrumb')

        <ol class="breadcrumb">
                <li class="active">{!! Breadcrumbs::render('home') !!}</li>
        </ol>
@endsection

@section('content')

    <h1>INICIO DE APP INTA </h1>


@endsection