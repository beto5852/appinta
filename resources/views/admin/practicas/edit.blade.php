
@extends('layouts.admin')

@section('css')

        <!-- daterange picker -->
<link rel="stylesheet" href="{{asset('/adminlte/plugins/daterangepicker/daterangepicker.css')}}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datepicker/datepicker3.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{asset('/adminlte/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{asset('/adminlte/plugins/timepicker/bootstrap-timepicker.min.css')}}">

@endsection

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Practica')

@section('header')
    <section class="content-header">
        <h1>
            Actualizar Práctica Agricola
            <small>Actualice la información</small>
        </h1>

    </section>
@endsection


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('practicas.edit') !!}</li>
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

        @if($practica->fotos->count())
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="row">
                        @foreach($practica->fotos as $foto)
                            <form  method="POST" action="{{route('admin.fotos.destroy',$foto->id)}}">
                                {{method_field('DELETE')}}{{csrf_field()}}
                                <div class="col-md-1 col-sm-12 co-xs-12 gal-item">
                                    <button class="btn-danger btn-xs pull-right" style="position: absolute">
                                        <i class="fa fa-remove"></i>
                                    </button>
                                    <img src="{{$foto->url}}" class="img-responsive">
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif


        {!! Form::open(['url' => ['admin/practicas',$practica], 'method' => 'PUT','enctype' => 'multipart/form-data','files'=> 'true']) !!}
        {{csrf_field()}}
        <div class="col-md-8">
            <div class="box box-primary">

                <!--Aqui va el formulario de la practica agricola-->

                <div class="box-body">

                    <div class="form-group {{$errors->has('nombre_practica') ? 'has-error' : ''}}" >
                        {{ Form::label('nombre_practica','Nombre de la labor agricola') }}
                        {{ Form::text('nombre_practica',$practica->nombre_practica,['class' =>'form-control', 'value' => '{old(nombre_practica,$practica->nombre_practica)}'])}}
                        {!! $errors->first('nombre_practica','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{$errors->has('contenido') ? 'has-error' : ''}}">
                        {{ Form::label('Agregue el contenido','Agregue el contenido') }}
                        {{ Form::textarea('contenido',old('contenido',$practica->contenido),['id' => 'my-editor','class' => 'my-editor','placeholder' => ''])}}
                        {!! $errors->first('contenido','<span class="help-block">:message</span>') !!}
                    </div>
                    <div class="form-group {{$errors->has('video') ? 'has-error' : ''}}">
                        {{ Form::label('Agregue el Video','Agregue Video') }}
                        {{ Form::textarea('video',old('contenido',$practica->contenido),['rows' => '2','class' => 'form-control','placeholder' => ''])}}
                        {!! $errors->first('video','<span class="help-block">:message</span>') !!}
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                    <!-- Date -->
                    <!-- Date and time range -->
                    <div class="form-group">

                        {{ Form::label('Fechas de la practica','Fechas de la practica') }}

                        <table class="table table-bordered">
                            <thead>
                            <th>Mes</th>
                            <th>Semana</th>
                            {{--  <th><a href="#" class="addRow" id="addRow"><i class="glyphicon glyphicon-plus" aria-hidden="true"></a></th> --}}
                            </thead>
                            <tbody>

                            <tr>

                                <td class="col-sm-4">
                                    {!! Form::select('mes_id[]',$meses,$my_mes,['class' => 'form-control chosen-select'])!!}

                                </td>

                                <td class="col-sm-5">
                                    {!! Form::select('semana_id[]',$semanas,$my_semana,['class' => 'form-control chosen-select'])!!}
                                </td>

                                {{--    <td style="display:inline;"><a name="remove" id="{{ $i }}" class="btn btn-danger btn-remove">X</a>
                                 </td>
                                --}}
                            </tr>

                            </tbody>
                        </table>

                    </div>

                    <div class="form-group">
                        {{ Form::label('user_id','Cambiar editor') }}
                        {{ Form::select('user_id',$users,old('user_id',$practica->user_id),['class' => 'form-control chosen-select'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('tecnologia','Tecnológia') }}
                        {{ Form::select('tecnologia_id',$tecnologias,old('tecnologia_id',$practica->tecnologia_id),['class' => 'form-control chosen-select'])}}
                    </div>


                    @if(empty($practica->path))
                        <img src="{{asset('img/no-imagen.jpg')}}" alt="" style="width: 100px;" />
                    @else
                        <img src="{{asset('img/')}}/{{$practica->path}}" alt="" style="width: 100px;" />
                    @endif
                    <div class="form-group">
                        {{ Form::label('path','Imagen de la práctica') }}
                        {{ Form::file('path')}}
                    </div>

                    {{--<div class="form-group" {{$errors->has('tag_id') ? 'has-error' : ''}}>--}}
                        {{--<label>Etiquetas agropecuarias</label>--}}
                        {{--<select name="tag_id[]" class="form-control chosen-select" multiple="multiple" data-placeholder="Agrega los tags para tu práctica agricola" style="width: 100%;">--}}
                            {{--@foreach($tags as $tag)--}}
                            {{--<option {{collect(old('tags',$practica->$tags->pluck('id')))->contains($tag->id) ? 'selected' : '' }} value="{{ $tag->id }}" >{{$tag->name}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                        {{--{!! $errors->first('tag_id','<span class="help-block">:message</span>') !!}--}}
                    {{--</div>--}}


                    <div class="form-group {{$errors->has('tag_id') ? 'has-error' : ''}}">
                        {{ Form::label('tag_id','Etiquetas agropecuarias') }}
                        {{ Form::select('tag_id[]',$tags,old('tags',$my_tags),['class'=>'form-control chosen-select','multiple','data-placeholder' => 'Agrega los tags para tu práctica agricola','value' => 'old($my_tag)']) }}
                        {!! $errors->first('tag_id','<span class="help-block">:message</span>') !!}
                    </div>


                    <div class="form-group">
                        <div  class="dropzone">

                        </div>
                    </div>


                    <div class="form-group text-right">

                        {{ Form::submit('Actualizar Práctica Agricola', ['class' => 'btn btn-primary btn-block']) }}

                    </div>

                </div>
            </div>

        </div>
        {!! Form::close() !!}



    </div>

    @endsection


    @section('practicas')

            <!-- date-range-picker -->
    <script src="{{asset('/js/moment.min.js')}}"></script>

    <!-- bootstrap color picker -->
    {{-- <script src="{{asset('/adminlte/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script> --}}
    {{-- <script src="{{asset('/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script> --}}

            <!-- bootstrap datepicker -->
    {{-- <script src="{{asset('/adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script> --}}

            <!-- bootstrap time picker -->
    {{-- <script src="{{asset('/adminlte/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script> --}}
            <!-- SlimScroll 1.3.0 -->
    {{-- <script src="{{asset('/adminlte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script> --}}

    <script>
        $(function () {
            $('#practicas-table').DataTable({
                "paging": false,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false
            });
        });
    </script>

    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>


    <script>
        CKEDITOR.replace('my-editor', options);
        CKEDITOR.config.height = 450;
    </script>

    <script>
        $(".chosen-select").chosen({width: "100%"});
    </script>

    <script>
        //Date picker
        $('#datepicker').datepicker({
            format: "dd/mm/yyyy",
            lenguage: 'es',
            autoclose: true,

        });

        var accept = ".png";

        var myDropzone =   new Dropzone('.dropzone',{
            url : '/admin/practicas/{{$practica->id}}/fotos',
            acceptedFiles : 'image/*',
            maxFilesize: 2,
            maxFiles: 5,
            paramName: 'foto',
            headers:{
                'X-CSRF-TOKEN':'{{csrf_token()}}'
            },
            dictDefaultMessage: 'Arrastra las fotos aqui para subirlas',

        });

        myDropzone.on('error' ,function (file ,res) {
            /* Act on the event */
            var msg = res.foto[0];
            $('.dz-error-message:last > span ').text(msg);

        });

        Dropzone.autoDiscover = false;

    </script>



@endsection


