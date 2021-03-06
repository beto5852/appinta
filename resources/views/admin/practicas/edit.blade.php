{{--{{dd($my_tags)}}--}}
@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Practica')

@section('header')
    <section class="content-header">
        <h1>
           Práctica Agricola
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

        <div class="col-md-12">
            <div class="row">
                @if($practica->fotos->count() > 1)
                    <div class="col-md-8">
                        <div class="box box-primary">
                            <div class="box-body">


                                @foreach($practica->fotos as $foto)
                                    {{--<form  method="POST" action="{{route('admin.fotos.destroy',$foto->id)}}">--}}
{{--                                        {{method_field('DELETE')}}{{csrf_field()}}--}}
                                        <div class="col-md-2 col-sm-12 co-xs-12 gal-item">

                                            <a class="btn-danger btn-xs pull-right" data-toggle="modal" style="position: absolute" data-url="{!! URL::route('admin.fotos.destroy', $foto->id) !!}" data-id="{{$foto->id}}" data-target="#custom-width-modal">X</a>
                                            {{--<button class="btn-danger btn-xs pull-right" style="position: absolute">--}}
                                                {{--<i class="fa fa-remove"></i>--}}
                                            {{--</button>--}}

                                            <img src="{{$foto->url}}" class="img-responsive">
                                        </div>
                                    </form>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                @if(!empty($practica->video))
                    <div class="col-md-4">
                        <div class="box box-primary">
                            <div class="box-body">
                                <div class="form-group ">
                                    <div class="video">
                                        {!! $practica->video !!}
                                        {{--<iframe width="560" height="315" src="{!! $practica->video !!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>--}}
                                        {{--<iframe width="100%" height="50%" src="{!! $practica->video !!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                        <!-- Delete Model -->
                        <form action="{{route('admin.fotos.destroy',$foto->id)}}" method="POST" class="remove-record-model">
                            {{method_field('DELETE')}}{{csrf_field()}}
                            <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog" style="width:30%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="custom-width-modalLabel">Eliminar Imagen de la práctica agricola</h4>
                                        </div>
                                        <div class="modal-body">
                                            <h4>Estas seguro de eliminar la imagen?</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger waves-effect waves-light">Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>



            </div>
        </div>

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

                    <div class="form-group {{$errors->has('textomedio') ? 'has-error' : ''}}">
                        {{ Form::label('Agregue el textomedio','Agregue el extracto del contenido') }}
                        {{ Form::textarea('textomedio',old('textomedio',$practica->textomedio),['rows' => '15','class' => 'form-control','placeholder' => ''])}}
                        {!! $errors->first('textomedio','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group {{$errors->has('contenido') ? 'has-error' : ''}}">
                        {{ Form::label('Agregue el contenido','Agregue el contenido') }}
                        {{ Form::textarea('contenido',old('contenido',$practica->contenido),['id' => 'my-editor2','class' => 'my-editor2','placeholder' => ''])}}
                        {!! $errors->first('contenido','<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">

                        <div class="form-group text-right">
                            {{ Form::submit('Actualizar Práctica Agricola', ['class' => 'btn btn-primary btn-block']) }}
                        </div>


                        <div class="form-group {{$errors->has('video') ? 'has-error' : ''}}">
                            {{ Form::label('Agregue el Video','Agregue url de video o audio') }}
                            {{ Form::textarea('video',old('video',$practica->video),['rows' => '3','class' => 'form-control','placeholder' => ''])}}
                            {!! $errors->first('video','<span class="help-block">:message</span>') !!}
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

                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-body">

                        <div class="form-group">

                            {{ Form::label('Fechas de la practica','Fechas de la practica') }}

                            <table class="table table-bordered">
                                <thead>
                                <th>Mes</th>
                                <th>Semanas</th>

                                </thead>
                                <tbody>

                                <tr>
                                    <td class="col-sm-4 {{$errors->has('mes_id[]') ? 'has-error' : ''}}">
                                        {!! Form::select('mes_id[]',$meses,old('mes_id',$my_mes),['class' => 'form-control chosen-select1'])!!}
                                        {!! $errors->first('mes_id[]','<span class="help-block">:message</span>') !!}
                                    </td>
                                    <td class="col-sm-5 {{$errors->has('semana_id[]') ? 'has-error' : ''}}">
                                        {{ Form::select('semana_id[]',$semanas,old('semana_id[]',$my_semana),['class'=>'form-control chosen-select2','multiple']) }}
                                        {!! $errors->first('semana_id[]','<span class="help-block">:message</span>') !!}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="form-group">
                            {{ Form::label('user_id','Cambiar editor') }}
                            {{ Form::select('user_id',$users,old('user_id',$practica->user_id),['class' => 'form-control select2'])}}
                        </div>


                        <div class="form-group">
                            {{ Form::label('tecnologia','Tecnológia') }}
                            {{ Form::select('tecnologia_id',$tecnologias,old('tecnologia_id',$practica->tecnologia_id),['class' => 'form-control select2',])}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('rubro','Rubro') }}
                            {{ Form::select('rubro_id',$rubros,old('rubro_id',$practica->rubro_id),['class' => 'form-control select2',])}}
                        </div>
                        <div class="form-group">
                            {{ Form::label('cultivo','Cultivo') }}
                            {{ Form::select('cultivo_id',$cultivos,old('cultivo_id',$practica->cultivo_id),['class' => 'form-control select2',])}}
                        </div>

                        <div class="form-group {{$errors->has('variedad_id') ? 'has-error' : ''}}">
                            {{ Form::label('variedad_id','Variedad  del cultivo') }}
                            {{ Form::select('variedad_id[]',$variedades,$my_variedades,['class'=>'form-control select2','multiple','value' => 'old($my_variedades)']) }}
                            {!! $errors->first('variedad_id','<span class="help-block">:message</span>') !!}
                        </div>


                         <div class="form-group {{$errors->has('etapa_id') ? 'has-error' : ''}}">
                            {{ Form::label('etapa_id','Etapa en la que se encuentra el cultivo ') }}
                            {{ Form::select('etapa_id[]',$etapas,$my_etapas,['class'=>'form-control select2','multiple','value' => 'old($my_etapas)']) }}
                            {!! $errors->first('etapa_id','<span class="help-block">:message</span>') !!}
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
        </div>

        {!! Form::close() !!}
    </div>
    @endsection

 @section('practicas_edit')
            <!-- date-range-picker -->
    <script src="{{asset('/js/moment.min.js')}}"></script>

    <!-- bootstrap color picker -->
     <script src="{{asset('/adminlte/plugins/select2/select2.full.min.js')}}"></script>
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
//        CKEDITOR.replace('my-editor1', options);
//        CKEDITOR.config.height = 50;

        CKEDITOR.replace('my-editor2', options);
        CKEDITOR.config.height = 200;
    </script>

    <script>
        $(".chosen-select1").chosen({
            placeholder_text_multiple: 'selecciones los meses',
            no_results_text: "Sin resultados!",
        });

        $(".chosen-select2").chosen({
            placeholder_text_multiple: 'selecciones las semanas',
            no_results_text: "Sin resultados!",
        });



        $(".select2").select2({
            tags: true
            });
        
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
            maxFiles: 6,
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


