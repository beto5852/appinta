{{-- {{ dd($practicas->meses->nombre_mes) }} --}}
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

        <div class="col-md-12">
          <!-- The time line -->
           
    
               <ul class="timeline">  
         @foreach($practicas as $practica)

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
                      <i class="fa  fa-calendar-check-o bg-blue"></i>

                      <div class="timeline-item">

                         @foreach($practica->semanas as $semana)
                        <span class="time"><i class="fa fa-clock-o"></i> {{$semana->nombre_semana}}</span>
                         @endforeach
                        <h3 class="timeline-header"><a href="{{'timelinemore'}}/{{$practica->slug}}">{{$practica->nombre_practica}}</a></h3>


                        <div class="timeline-body">
                          {!! substr($practica->contenido,0,800) !!}

                        </div><br>

                             {{--<a href="https://www.facebook.com/sharer.php?u={{request()->fullUrl()}}&text={{$practica->nombre_practica}}" class="btn btn-social-icon btn-facebook" title="Compartir en Facebook" target="_blank"><i class="fa fa-facebook"></i></a>--}}
                             {{--<a href="https://plus.google.com/share?url={{request()->fullUrl()}}" class="btn btn-social-icon btn-google" title="Compartir en Google+" target="_blank"><i class="fa fa-google-plus"></i></a>--}}
                             {{--<a href="https://twitter.com/intent/tweet?url={{request()->fullUrl()}}&text={{$practica->nombre_practica}}" class="btn btn-social-icon btn-twitter" title="Compartir en Twitter" target="_blank"><i class="fa fa-twitter"></i></a>--}}

                         @foreach( $practica->tags as $tag)
                        <span class="time pull-right" ><i class="fa fa-tags"></i>{{$tag->nombre_tags}}</span>
                        @endforeach


                        <div class="timeline-footer">



                          <a href="{{'timelinemore'}}/{{$practica->slug}}" class="btn btn-primary">Leer mas</a>

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


<!-- FastClick -->

<script src="{{asset('/adminlte/plugins/fastclick/fastclick.js')}}"></script>

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




