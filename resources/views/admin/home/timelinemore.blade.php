@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Crear práctica agricola')

@section('header')
    <section class="content-header">
        <h1>
            Calendario de las Practicas Agricolas
            <small>Revisa el timeline segun la epoca de siembra</small>
        </h1>

    </section>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('practicas.create') !!}</li>
    </ul>
@endsection
@section('content')

{{-- 
<div class="row">
    <div class="jumbotron col-md-8"><h1>Labores Agrícolas de la semana</h1>

        <article>
            <h2>{{$practicas->nombre_practica}}</h2>
            <div class="row">
                <div class="col-md-8">
                    <i class="fa fa-folder-open" aria-hidden="true"></i>{{$practicas->tecnologia->nombre_tecnologia}}
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>{{$practicas->user->name}}
                </div>
                <div class="col-md-4">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i> {{$practicas->created_at}}
                </div>
            </div>
            <br>
            @if(empty($practicas->path))
                <img src="{{asset('img/no-imagen.jpg')}}" class="img-responsive" width="100%">
            @else
                <img src="{{asset('img/')}}/{{$practicas->path}}" class="img-responsive" width="100%">
            @endif
            <br>
            <p>{!! substr($practicas->contenido,0,10000) !!} </p>

        </article>

    </div>
   

</div> --}}

 <!-- Main content -->
        <div class="content body">

<section id="introduction">
  <h2 class="page-header"><a href="#introduction">{{$practicas->nombre_practica}}</a></h2>
  <p class="lead">
    {!! $practicas->contenido !!} 
  </p>
</section><!-- /#introduction -->





        </div><!-- /.content -->
      </div><!-- /.content-wrapper -->

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
    $('.datepicker').datepicker({
        format: "dd/mm/yyyy",
        lenguage: "es"
        autoclose: true,

    });

   var accept = ".png";
   
   var myDropzone = new Dropzone('.dropzone',{
        url : '/admin/practicas/',
        dictDefaultMessage: 'Arrastra las fotos aqui para subirlas',

    });
    Dropzone.autoDiscover = false;    

</script>
@endsection




