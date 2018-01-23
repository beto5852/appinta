@extends('layouts.admin')



@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Crear Usuarios')

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

@section('header')
    <section class="content-header">
        <h1>
            Crear usuario
            <small>Agregue la información del usuario</small>
        </h1>

    </section>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('users.create') !!}</li>
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
        {!! Form::open(['url' => 'admin/users', 'method' => 'POST','files'=> 'true','enctype' => 'multipart/form-data']) !!}

        <div class="col-md-8">
            <div class="box box-primary">

                <!--Aqui va el formulario de la practica agricola-->

                <div class="box-body">


                    <div class="form-group">
                        {!! Form::label('name','Nombre y Apellido') !!}
                        {!! Form::text('name',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('nacimiento','Fecha de nacimiento') !!}

                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            {!! Form::text('nacimiento',null,['class' =>'form-control pull-rigth datepicker','id' => 'datepicker', 'placeholder' =>''])!!}
                        </div>
                        <!-- /.input group -->
                    </div>



                    <div class="form-group">
                        {!! Form::label('email','Correo electrónico') !!}
                        {!! Form::email('email',null,['class' =>'form-control', 'placeholder' =>'example@gmail.com','required'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('password','Contraseña') !!}
                        {!! Form::password('password',['class' =>'form-control', 'placeholder' =>'**************','required'])!!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('notas','Acerca de usted:') !!}
                        {!! Form::text('notas',null,['id' => 'my-editor','class' => 'my-editor', 'placeholder' =>'Describete para conocerte'])!!}
                    </div>

                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="box box-primary">

                <div class="box-body">

                    <div class="form-group">
                        {!! Form::label('telefono','Telefono') !!}
                        {!! Form::text('telefono',null,['class' =>'form-control', 'placeholder' =>'+505-9999-9999'])!!}
                    </div>

                    <div class="form-group">
                        {{ Form::label('sexo','Sexo') }}
                        {{ Form::select('sexo',['' => 'Seleccione su genero' , 'masculino' => 'mascúlino', 'femenino' => 'femenino'],null,['class' => 'form-control chosen-select'])}}
                    </div>
                    <div class="form-group {{$errors->has('role_id') ? 'has-error' : ''}}">
                        {{ Form::label('role_id','Etiquetas agropecuarias') }}
                        {{ Form::select('role_id[]',$roles,old('role_id'),['class'=>'form-control select2','multiple','data-placeholder' => 'Agrega los rol']) }}
                        {!! $errors->first('role_id','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ocupacion','Ocupación') !!}
                        {!! Form::text('ocupacion',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo'])!!}
                    </div>
                    <div class="form-group">
                         {!! Form::label('pais','Pais') !!} 

                        {!! Form::text('pais',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo'])!!}
                     </div>
                    <div class="form-group">
                        {{ Form::hidden('active',1,null,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('perfil','Imagen de perfil') }}
                        {{ Form::file('perfil')}}
                    </div>

                </div>
                <div class="form-group text-right">

                    {{ Form::submit('Registrar', ['class' => 'btn btn-primary btn-block']) }}

                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

@endsection



@section('script')


        <!-- bootstrap color picker -->
         <script src="{{asset('/adminlte/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
         <script src="{{asset('/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>

                <!-- bootstrap datepicker -->
         <script src="{{asset('/adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

                <!-- bootstrap time picker -->
         <script src="{{asset('/adminlte/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
                <!-- SlimScroll 1.3.0 -->
         <script src="{{asset('/adminlte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>

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
            $(".chosen-select").chosen();
            $(".select2").select2({
                tags: true
            });

        </script>

            <script>

                // ----------------- DEFINICIÓN DE IDIOMA ----------------------
                // Recurso original:
                // http://reviblog.net/2014/01/07/jquery-ui-datepicker-poner-el-calendario-en-espanol-euskera-o-cualquier-otro-idioma/
                $.datepicker.regional['es'] = {
                    closeText: 'Cerrar',
                    prevText: '<Ant',
                    nextText: 'Sig>',
                    currentText: 'Hoy',
                    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
                    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
                    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
                    weekHeader: 'Sm',
                    dateFormat: 'dd/mm/yy',
                    firstDay: 1,
                    isRTL: false,
                    showMonthAfterYear: false,
                    yearSuffix: ''

                };

                $.datepicker.setDefaults($.datepicker.regional['es']);

                //Date picker
//                $(function() {
//                    $('#datepicker').datepicker({ autoclose: true});
//                });


                $('.datepicker').datepicker({
                    format: "dd/mm/yyyy",
                    language: "es",
                    autoclose: true
                });

            </script>

@endsection