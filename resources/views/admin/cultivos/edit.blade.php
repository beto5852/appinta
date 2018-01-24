@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Practica')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('cultivos.edit') !!}</li>
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
                    {!! Form::open(['url' => ['admin/cultivos',$cultivo], 'method' => 'PUT']) !!}
                    <div class="box-body">
                        <div class="form-group {{$errors->has('nombre_cultivo') ? 'has-error' : ''}}">
                            {!! Form::label('nombre_cultivo','Nombre del cultivo') !!}
                            {!! Form::text('nombre_cultivo',old('nombre_cultivo',$cultivo->nombre_cultivo),['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
                            {!! $errors->first('nombre_cultivo','<span class="help-block">:message</span>') !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('descripcion_cultivo','Descripción de la tecnológia') !!}
                            {!! Form::textarea('descripcion_cultivo',old('descripcion_cultivo',$cultivo->descripcion_cultivo),['id' => 'my-editor1','class' => 'form-control my-editor1','placeholder' => ''])!!}
                        </div>
                        <div class="form-group text-right">

                            <a href="{{url('admin/cultivos')}}" class="btn btn-info" >Lista Cultivos</a>
                            {{ Form::submit('Actualizar', ['class' => 'btn btn-info']) }}

                        </div>
                    </div>



                </div>
          </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('rubro_id','Rubro al que pertenece') }}
                        {{ Form::select('rubro_id',$rubro,old('rubro_id',$cultivo->rubro_id),['class' => 'form-control select2','required'])}}
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