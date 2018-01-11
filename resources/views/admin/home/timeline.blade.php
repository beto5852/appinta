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


                   <li>
                       <i class="fa fa-camera bg-purple"></i>

                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                   <i class="fa  fa-calendar-check-o bg-blue"></i>



                        <div class="timeline-item">

                            @if($practica->fotos->count() === 1)

                                   <div class="col-sm-6">
                                             <img class="img-responsive" width="100%" src="{{$practica->fotos->first()->url }}" alt="Photo">
                                    </div>

                            @elseif($practica->fotos->count() > 1)
                                            <div class="timeline-body">
                                            @foreach($practica->fotos as $key => $foto)
                                                  <img src="{{$foto->url }}" style = "width: 100px;" >
                                             @endforeach
                                             </div>
                                         @endif

                            <h1 ><a href="{{'timelinemore'}}/{{$practica->slug}}">{{$practica->nombre_practica}}</a></h1>
                            <br>







                        <div class="timeline-body">
                          {!! substr($practica->contenido,0,800) !!}

                        </div><br>

                             {{--<a href="https://www.facebook.com/sharer.php?u={{request()->fullUrl()}}&text={{$practica->nombre_practica}}" class="btn btn-social-icon btn-facebook" title="Compartir en Facebook" target="_blank"><i class="fa fa-facebook"></i></a>--}}
                             {{--<a href="https://plus.google.com/share?url={{request()->fullUrl()}}" class="btn btn-social-icon btn-google" title="Compartir en Google+" target="_blank"><i class="fa fa-google-plus"></i></a>--}}
                             {{--<a href="https://twitter.com/intent/tweet?url={{request()->fullUrl()}}&text={{$practica->nombre_practica}}" class="btn btn-social-icon btn-twitter" title="Compartir en Twitter" target="_blank"><i class="fa fa-twitter"></i></a>--}}

                          @foreach($practica->semanas as $semana)
                              <span class="time"><i class="fa fa-clock-o"></i> {{$semana->nombre_semana}}</span>
                          @endforeach

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

@endsection




