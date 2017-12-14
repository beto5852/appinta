@extends('layouts.admin')


@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de Tecnologias generadas por el INTA')
@section('header')
    <section class="content-header">
        <h1>
            Cultivos Agricolas
            <small>Listado de cultivos</small>
        </h1>

    </section>
@endsection
@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('cultivos') !!}</li>
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
                <a href="{{url('admin/cultivos/create')}}" class="btn btn-raised btn-success"> Agregar cultivo</a>
            </div>
        </div>
        <div class="col-xs-2">
            {!! Form::open(['url' => ['admin/cultivos'], 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'aria-describedby' => 'search']) !!}

            <div class="form-group">
                {!! Form::text('search',null,['class' =>'form-control', 'placeholder' =>'Buscar','required'])!!}
            </div>

            {!! Form::close() !!}
        </div>
    </div>

    <table class="table table-striped table-hover" >
        <thead>
        <tr >
            <th>Lista de cultivos</th>
        </tr>
        </thead>
        <tbody>
        @foreach($cultivos as $cultivo)
            <tr class="info">
                <td>{{  $cultivo->nombre_cultivo}}</td>

                <td>
                    <a href="{{url('admin/cultivos/'.$cultivo->id.'/edit')}}" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <form method="POST" action="{{route('admin.cultivos.destroy',$cultivo->id)}}" style="display:inline" >
                        {{ csrf_field() }} {{method_field('DELETE')}}

                        <button class="btn btn-raised btn-danger" onclick="return confirm('Esta seguro de eliminar la práctica')"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>

                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <center>{{ $cultivos->links() }}</center>


@endsection