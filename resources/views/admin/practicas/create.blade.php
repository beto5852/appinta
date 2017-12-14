@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Crear práctica agricola')

@section('header')
    <section class="content-header">
        <h1>
            Crear Practicas Agricolas
            <small>Agregue la información</small>
        </h1>

    </section>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('practicas.create') !!}</li>
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
    {!! Form::open(['url' => 'admin/practicas','method' => 'POST','files'=> 'true','enctype' => 'multipart/form-data']) !!}

    <div class="col-md-8">
        <div class="box box-primary">

            <!--Aqui va el formulario de la practica agricola-->

            <div class="box-body">


                <div class="form-group">
                    {{ Form::label('Practica','Tema de la práctica agrícola') }}
                    {{ Form::text('nombre_practica','',['class' => 'form-control','placeholder' => 'Tema aquí...','required']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('tecnologia','Tipo de tecnológia') }}
                    {{ Form::select('practica_id_tecnologia',$tecnologias,null,['class' => 'form-control','required'])}}
                </div>
            </div>


            <div class="form-group">
                {!! Form::textarea('contenido',null,['class' => 'form-control'])!!}

            </div>




        </div>
    </div>
    <div class="col-md-4">
       <div class="box box-primary">

           <!-- Date -->
           <div class="form-group">
               <label>Fecha de publicación:</label>

               <div class="input-group date">
                   <div class="input-group-addon">
                       <i class="fa fa-calendar"></i>
                   </div>
                   {{ Form::text('publish_at','',['class' => 'form-control pull-right', 'id' => 'datepicker',]) }}
               </div>
               <!-- /.input group -->
           </div>

           <div class="box-body">
               <div class="form-group">
                   {{ Form::hidden('practica_id_usuario',Auth::user()->id,null,['class' => 'form-control'])}}
               </div>
               <div class="form-group">
                   {{ Form::label('path','Imagen de la práctica') }}
                   {{ Form::file('path')}}
               </div>

               <div class="form-group">
                   <label>Multiple</label>
                   <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                       <option>Alabama</option>
                       <option>Alaska</option>
                       <option>California</option>
                       <option>Delaware</option>
                       <option>Tennessee</option>
                       <option>Texas</option>
                       <option>Washington</option>
                   </select>
               </div>



               <div class="form-group">
                   {{ Form::label('pt_id_tags','Tags') }}
                   {{ Form::select('pt_id_tags[]',$tags,null,['class'=>'form-control chosen-select','multiple','required']) }}
               </div>
               <div class="form-group text-right">

                   {{ Form::submit('Guardar Práctica Agricola', ['class' => 'btn btn-primary btn-block']) }}

               </div>

           </div>
       </div>

    </div>
    {!! Form::close() !!}
</div>

@stop


@section('styles')

<link rel="stylesheet" href="{{asset('adminlte/plugins/datepicker/datepicker3.css')}}">


@endsection

@section('script')
<!-- bootstrap datepicker -->
<script src="{{asset('admilte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Select2 -->

<script src="{{asset('adminlte/plugins/select2/select2.full.min.js')}}"></script>

<script>
    //Date picker
    $('#datepicker').datepicker({
        autoclose: true
    });
</script>

@endsection

