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


@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Crear Usuarios')


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
                    <div class="form-group">
                        {{ Form::label('type','Tipo de usuario') }}
                        {{ Form::select('type',['' => 'Seleccione el tipo de usuario' , 'miembro' => 'miembro', 'admin' => 'admin'],null,['class' => 'form-control chosen-select'])}}
                    </div>

                    <div class="form-group">
                        {!! Form::label('ocupacion','Ocupación') !!}
                        {!! Form::text('ocupacion',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo'])!!}
                    </div>
                    <div class="form-group">
                         {!! Form::label('pais','Pais') !!} 

                        {!! Form::text('pais',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo'])!!}

                        
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
</script>
@endsection











