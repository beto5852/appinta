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
                    {{ Form::text('nombre_practica','',['class' => 'form-control','placeholder' => 'Tema aquí...','value' => 'old(nombre_practica)' ]) }}
                </div>


            </div>


            <div class="form-group">
                {!! Form::textarea('contenido',null,['id' => 'my-editor','class' => 'my-editor','value' => 'old(contenido)'])!!}

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
                   {{ Form::text('created_at','',['class' => 'form-control pull-rigth', 'id' => 'datepicker','value' => 'old(created_at)'] )}}
               </div>
               <!-- /.input group -->
           </div>

           <div class="box-body">

                <div class="form-group">
                    {{ Form::label('Tecnologia','Tipo de tecnológia') }}
                    {{ Form::select('tecnologia_id',$tecnologias,null,['class' => 'form-control chosen-select','value' => 'old(tecnologia_id) == $tecnologias->id ? selected :'])}}
                </div>

               <div class="form-group">
                   {{ Form::hidden('usuario_id',Auth::user()->id,null,['class' => 'form-control'])}}
               </div>
               <div class="form-group">
                   {{ Form::label('path','Imagen de la práctica') }}
                   {{ Form::file('path')}}
               </div>

               <div class="form-group">
                   {{ Form::label('tag_id','Etiquetas agropecuarias') }}
                   {{ Form::select('tag_id[]',$tags,null,['class'=>'form-control chosen-select','multiple','data-placeholder' => 'Agrega los tags para tu práctica agricola','value' => 'old(tag_id[])']) }}
               </div>


               <div class="form-group">
                   <div  class="dropzone">
                 
                   </div>
               </div>


               <div class="form-group text-right">

                   {{ Form::submit('Guardar Práctica Agricola', ['class' => 'btn btn-primary btn-block']) }}

               </div>

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

   var accept = ".png";
   
   var myDropzone = new Dropzone('.dropzone',{
        url : '/admin/practicas/',
        dictDefaultMessage: 'Arrastra las fotos aqui para subirlas',

    });

    Dropzone.autoDiscover = false;

    


</script>
@endsection