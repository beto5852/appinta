@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Variedad')
@section('header')
    <section class="content-header">
        <h1>
            Variedades Agricolas
            <small>Edita la variedad agricola</small>
        </h1>

    </section>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('variedades.edit') !!}</li>
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

    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8">
            <div class="box box-primary">

                <!--Aqui va el formulario de la practica agricola-->
                {!! Form::open(['url' => ['admin/variedades',$variedad], 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group {{$errors->has('nombre_variedad') ? 'has-error' : ''}}">
                        {!! Form::label('nombre_variedad','Nombre del cultivo') !!}
                        {!! Form::text('nombre_variedad',old('nombre_cultivo',$variedad->nombre_variedad),['class' =>'form-control', 'placeholder' =>'Nombre Completo de la Variedad','required'])!!}
                        {!! $errors->first('nombre_variedad','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('caracteristica_agronomica','Caracteristica Agronómica') !!}
                        {!! Form::textarea('caracteristica_agronomica',old('caracteristica_agronomica',$variedad->caracteristica_agronomica),['id' => 'my-editor1','class' => 'form-control my-editor1','placeholder' => 'Caracteristica agronómica'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('descripcion_caracteristica','Descripción Agronómica') !!}
                        {!! Form::textarea('descripcion_caracteristica',old('descripcion_caracteristica',$variedad->descripcion_caracteristica),['id' => 'my-editor1','class' => 'form-control my-editor1','placeholder' => 'Descripción de la variedad'])!!}
                    </div>
                    <div class="form-group text-right">

                        <a href="{{url('admin/variedades')}}" class="btn btn-info" >Lista de Variedades</a>
                        {{ Form::submit('Actualizar', ['class' => 'btn btn-info']) }}

                    </div>
                </div>



            </div>
        </div>

        {!! Form::close() !!}
    </div>


@endsection

@section('script')

    <script src="{{asset('/js/moment.min.js')}}"></script>

    <!-- bootstrap color picker -->
    <script src="{{asset('/adminlte/plugins/select2/select2.full.min.js')}}"></script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>


    <script>
        CKEDITOR.replace('my-editor1', options);
        CKEDITOR.config.height = 100;

        CKEDITOR.replace('my-editor2', options);
        CKEDITOR.config.height = 200;
    </script>

    <script>
        $(".chosen-select").chosen();
        $(".select2").select2({
            tags: true
        });

    </script>

@endsection