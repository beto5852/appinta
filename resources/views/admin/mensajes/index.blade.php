@extends('layouts.admin')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Enviar mensaje')

@section('header')
    <section class="content-header">
        <h1>
            Realiza tu consulta
            <small>al cualquiera de los administradores</small>
        </h1>

    </section>
@endsection
@section('breadcrumb')

    <ol class="breadcrumb">
        <li class="active">{!! Breadcrumbs::render('mensajes') !!}</li>
    </ol>


@endsection

@section('content')

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

            <div class="box-body">

                <!--Aqui va el formulario de la practica agricola-->
                {!! Form::open(['url' => 'admin/mensajes', 'method' => 'POST']) !!}


                <div class="form-group">
                    {{ Form::label('Enviar a:','Enviar a:') }}
                    {{ Form::select('recibe_id',$users,null,['class' => 'form-control chosen-select','required'])}}
                </div>
                <div class="form-group">
                    {{ Form::label('Mensaje','Escribe tu mensaje') }}
                    {{ Form::textarea('body','',['id' => 'my-editor','class' => 'my-editor','placeholder' => 'Escribe aquí tu mensaje...','required']) }}
                </div>

                <div class="form-group text-right">
                    {{ Form::submit('Enviar mensaje', ['class' => 'btn btn-raised btn-success']) }}
                </div>
                {!! Form::close() !!}


            </div>
        </div>
    </div>
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


@endsection