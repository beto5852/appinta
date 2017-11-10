@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de usuarios ')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('tags') !!}</li>
    </ul>
@endsection


@section('content')

    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif

    <div class="row">
        <div class="col-xs-8">
            <div class="form-group">
                <a href="{{url('admin/tags/create')}}" class="btn btn-raised btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Crear Tags</a>
            </div>
        </div>
        <div class="col-xs-2">
            {!! Form::open(['url' => ['admin/tags'], 'method' => 'GET', 'class' => 'navbar-form navbar-rigth']) !!}

            <div class="input-group">
                {!! Form::text('search',null,['class' =>'form-control', 'placeholder' =>'Buscar','aria-describedby' => 'search'])!!}
                <span id="search" class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">

        <table class="table table-striped table-hover" >

            <thead class="col-md-6">
            <tr >
                <th>ID</th>
                <th>Nombre Tag</th>
            </tr>
            </thead>

            <tbody>
            @foreach($tags  as $tag)
                <tr class="info">
                    <td>{{  $tag->id}}</td>
                    <td>{{  $tag->nombre_tags}}</td>
                    <td>
                        <a href="{{url('admin/tags/'.$tag->id.'/edit')}}" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a href="{{url('tags/'.$tag->id)}}" class="btn btn-raised btn-warning" role="button"
                           onclick="return confirm('Esta seguro de eliminar al usuario')"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <ul class="pager"><center>{{ $tags->links() }}</center></ul>


@endsection