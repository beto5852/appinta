@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Crear tecnológia INTA')

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('cultivos.create') !!}</li>
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
        {!! Form::open(['url' => 'admin/cultivos', 'method' => 'POST']) !!}

        <div class="col-md-8">
            <div class="box box-primary">

                <!--Aqui va el formulario de la practica agricola-->

                <div class="box-body">


                    <div class="form-group">
                        {!! Form::label('nombre_cultivo','Nombre del cultivo') !!}
                        {!! Form::text('nombre_cultivo',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('descripcion_cultivo','Descripción de la tecnológia') !!}
                        {!! Form::textarea('descripcion_cultivo',null,['class' => 'form-control'])!!}
                    </div>
                </div>



            </div>
        </div>


        <div class="col-md-4">
            <div class="box box-primary">



                <div class="box-body">
                           <div class="form-group">
                                {{ Form::label('variedad_id','Variedades') }}
                                {{ Form::select('variedad_id[]',$variedades,null,['class'=>'form-control chosen-select','multiple','required']) }}
                             </div>
                </div>
                <div class="form-group text-right">

                    {{ Form::submit('Guardar Cultivo', ['class' => 'btn btn-primary btn-block']) }}

                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

@endsection

