{{--{{dd($rubro)}}--}}

@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Practica')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('tecnologias.edit') !!}</li>
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
        <div class="col-md-8">
            <div class="box box-primary">

                <!--Aqui va el formulario de la practica agricola-->
                {!! Form::open(['url' => ['admin/tecnologias',$tecnologia], 'method' => 'PUT']) !!}
                <div class="box-body">
                    <div class="form-group {{$errors->has('nombre_tecnologia') ? 'has-error' : ''}}">
                        {{Form::label('nombre_tecnologia','Nombre de la tecnológia')}}
                        {{Form::text('nombre_tecnologia',old('nombre_tecnologia',$tecnologia->nombre_tecnologia),['class' =>'form-control', 'placeholder' =>'Nombre tecnologia','required'])}}
                         {!! $errors->first('nombre_tecnologia','<span class="help-block">:message</span>') !!}
                    </div>


                    <div class="form-group {{$errors->has('descripcion_tecnologia') ? 'has-error' : ''}}">
                        {{ Form::label('Descripción de la tecnológia','Descripción de la tecnológia') }}
                        {{ Form::textarea('descripcion_tecnologia',old('descripcion_cultivo',$tecnologia->descripcion_tecnologia),['id' => 'my-editor1','class' => 'form-control my-editor1','placeholder' => ''])}}
                        {!! $errors->first('descripcion_tecnologia','<span class="help-block">:message</span>') !!}
                    </div>


                    <div class="form-group text-right">

                        <a href="{{url('admin/tecnologias')}}" class="btn btn-info" >Lista Tecnológias</a>
                        {{ Form::submit('Actualizar', ['class' => 'btn btn-info']) }}

                    </div>
                </div>



            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">

                    <div class="form-group {{$errors->has('rubro_id[]') ? 'has-error' : ''}}">
                        {{ Form::label('rubro_id','Etiquetas agropecuarias') }}
                        {{ Form::select('rubro_id[]',$rubros,$my_rubros,['class'=>'form-control chosen-select1','multiple']) }}
                        {!! $errors->first('rubro_id[]','<span class="help-block">:message</span>') !!}
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

        $(".chosen-select1").chosen({
            placeholder_text_multiple: 'selecciones los rubros',
            no_results_text: "Sin resultados!",
        });



        $(".select2").select2({
            tags: true,
            width:'100%'
        });

    </script>

@endsection





















