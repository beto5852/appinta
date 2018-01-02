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

 <!-- row -->
      <div class="row">

  <div class="jumbotron col-md-8">

        @foreach($practicas as $practica)
            <article>
                <h3>{{$practica->nombre_practica}}</h3>
                <div class="row">
                    <div class="col-md-8">
                        <i class="fa fa-folder-open" aria-hidden="true"></i>{{$practica->tecnologia->nombre_tecnologia}}
                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                    </div>
                    <div class="col-md-4">
                        <i class="fa fa-calendar-o" aria-hidden="true"></i> {{$practica->created_at->format('M')}}
                    </div>
                </div>
                <br>
                @if(empty($practica->path))
                    <img src="{{asset('img/no-imagen.jpg')}}" class="img-responsive" width="100%">
                @else
                    <a  href="{{'practica'}}/{{$practica->slug}}"> <img src="{{asset('img/')}}/{{$practica->path}}" class="img-responsive" width="100%"></a>
                @endif
                <br>
                <p>{!! substr($practica->contenido,0,200) !!} </p>
                <p class="text-right"><a class="btn btn-raised btn-primary" href="{{'practica'}}/{{$practica->slug}}">Leer más..</a></p>

            </article>
        @endforeach
        <center>{{ $practicas->links()}}</center>

    </div>


        <div class="col-md-12">
          <!-- The time line -->
          @foreach($practicas as $practica)
       
               <ul class="timeline">
                   @foreach($practica->meses as $mes)
                      
                    <!-- timeline time label -->
                 {{-- @if($mes->nombre_mes == 'admin') --}}
                
                    <li class="time-label">
                          <span class="bg-red">
                            {{$mes->nombre_mes}}
                          </span>
                    </li>
                     
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa fa-envelope bg-blue"></i>

                      <div class="timeline-item">
                         @foreach($practica->semanas as $semana)
                        <span class="time"><i class="fa fa-clock-o"></i> {{$semana->nombre_semana}}</span>
                         @endforeach
                        <h3 class="timeline-header"><a href="#">{{$practica->nombre_practica}}</a></h3>

                        <div class="timeline-body">
                          {!! substr($practica->contenido,0,200) !!}
                        </div>
                        @foreach( $practica->tags as $tag)
                        <span class="time"><i class="fa fa-tags"></i> {{$tag->nombre_tags}}</span>
                        @endforeach
                        <div class="timeline-footer">
                          <a href="{{'timelinemore'}}/{{$practica->slug}}" class="btn btn-primary btn-xs">Leer mas</a>
                          {{-- <a class="btn btn-danger btn-xs">Delete</a> --}}
                        </div>

                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    
                 
                  
                   @endforeach
                   @endforeach
                     <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                  </ul>                 
        

        </div>
<center>{{ $practicas->links()}}</center>
        <!-- /.col -->
      </div>
      <!-- /.row -->

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




