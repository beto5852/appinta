
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


    <div class="row">
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
                        {{ Form::textarea('contenido',null,['id' => 'my-editor','class' => 'my-editor','value' => "old(contenido,$practica->contenido)"])}}
                        {!! $errors->first('contenido','<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">

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
                                {!! Form::select('mes_id',$meses,null,['class' => 'form-control chosen-select','value' => 'old($my_mes)'])!!}

                            </td>

                            <td class="col-sm-5">
                                {!! Form::select('semana_id',$semanas,null,['class' => 'form-control chosen-select','value' => 'old($my_semana)'])!!}
                            </td>

                            {{--    <td style="display:inline;"><a name="remove" id="{{ $i }}" class="btn btn-danger btn-remove">X</a>
                             </td>
                            --}}
                        </tr>

                        </tbody>
                    </table>

                </div>
                <div class="box-body">

                    <div class="form-group">
                        {{ Form::label('user_id','Cambiar editor') }}
                        {{ Form::select('user_id',$users,null,['class' => 'form-control chosen-select'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('tecnologia','Tecnológia') }}
                        {{ Form::select('tecnologia_id',$tecnologias,null,['class' => 'form-control chosen-select'])}}
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

                    <div class="form-group {{$errors->has('contenido') ? 'has-error' : ''}}">
                        {{ Form::label('tag_id','Etiquetas agropecuarias') }}
                        {{ Form::select('tag_id',$tags,null,['class'=>'form-control chosen-select','multiple','data-placeholder' => 'Agrega los tags para tu práctica agricola','value' => 'old($my_tag)']) }}
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


    @section('script')

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
    </script>

    <script>
        $(".chosen-select").chosen({width: "100%"});
    </script>

    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });

        new Dropzone('.dropzone',{
            url : '/admin/practicas/fotos',
            dictDefaultMessage: 'Arrastra las fotos aqui para subirlas'
        });

        Dropzone.autoDiscover = false;

    </script>



@endsection


