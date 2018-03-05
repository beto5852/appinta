@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de usuarios ')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('reporteregistros') !!}</li>
    </ul>
@endsection


@section('content')

    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif
    {!! Charts::assets() !!}
    <div  class="row" >


        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header">
                </div>
                <div class="container">
                   {!! $chartpract->render() !!}
                    {!! $prac->render() !!}
                </div>
                <div class="box-footer">
                </div>
            </div>

        </div>

    </div>


@endsection


@section('script')


@endsection