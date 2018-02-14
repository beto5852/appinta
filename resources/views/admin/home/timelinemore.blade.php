@extends('layouts.admin')

@section('meta-title',$practicas->nombre_practica)
@section('meta-content','substr($practicas->contenido,0,100)')



@section('header')
    <section class="content-header">
        <h1>
            Práctica Agricola
            <small>{{ $practicas->nombre_practica }}</small>
        </h1>

    </section>
@endsection


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('timelinemore') !!}</li>
    </ul>
@endsection

@section('content')

<div class="row">

     
    @if($practicas->fotos->count())
        <div class="col-md-8">

            <div class="box box-primary">


                <div class="box-body">

                    <div class="form-group ">
                        <section>
                            <h1>
                                {{$practicas->nombre_practica}}
                                {{--<small>Revisa el timeline segun la epoca de siembra</small>--}}
                            </h1><br>

                        </section>

                        <section >
                            {{--<h2 class="page-header">{{$practicas->nombre_practica}}</h2>--}}
                            <article>
                                {{--<h2>{{$practicas->nombre_practica}}</h2>--}}
                                <div class="row">
                                     <div class="col-md-8">
                                         <i class="fa fa-folder-open" aria-hidden="true"></i>{{$practicas->tecnologia['nombre_tecnologia'] }}
                                         <i class="fa fa-user-circle-o" aria-hidden="true"></i>{{$practicas->user['name']}}

                                     </div>
                                    <div class="col-md-4">
                                       
                                         <span class="time pull-right" ><i class="fa fa-tags"></i>
                                        @foreach( $practicas->etapas as $etapa)
                                            #{{$etapa->nombre_etapa}}
                                          @endforeach 
                                         </span>
                                   
                                    </div>
                                    

                                </div>

                                <p class="lead">
                                    {!! $practicas->textomedio !!} </p>
                                <br>
                                @if(empty($practicas->path))
                                    <img src="{{asset('img/no-imagen.jpg')}}" class="img-responsive" width="100%">
                                @else
                                    <img src="{{asset('img/')}}/{{$practicas->path}}" class="img-responsive" width="100%">
                                @endif
                                <br>
                                <p class="lead">
                                    {!! $practicas->contenido !!} </p>
                                <br>

                            </article>
                        </section><!-- /#introduction -->

                    </div>

                    @if(!empty($practicas->video))
                        <div class="col-md-12">
                        <div class="video" >
                            {!! $practicas->video !!}
                            {{--<iframe width="560" height="315" src="{!! $practica->video !!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>--}}
                            {{--<iframe width="100%" height="50%" src="{!! $practica->video !!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>--}}
                        </div>
                        </div>
                    @endif

                </div>
            </div>

        </div>
        <div class="col-md-4">

            <div class="box box-primary">

                <div class="box-body">

                    <div class="form-group ">
                        @if($practicas->fotos->count() === 1)
                            <section class="content-header">

                                <h1>
                                    Multimedia
                                    {{--<small>Revisa el timeline segun la epoca de siembra</small>--}}
                                </h1>
                                <div class="row margin-bottom">
                                    <div class="col-sm-6">
                                        <img width="100%" src="{{$practicas->fotos->first()->url }}" alt="Photo">
                                    </div>
                                </div>

                            </section>
                        @elseif($practicas->fotos->count() > 1)

                            <section>
                                <h1>
                                    Galeria de fotos
                                    {{--<small>Revisa el timeline segun la epoca de siembra</small>--}}
                                </h1>

                                @if(!empty($practicas->video))

                                    <div class="video">
                                        {!! $practicas->video !!}
                                        {{--<iframe width="560" height="315" src="{!! $practica->video !!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>--}}
                                        {{--<iframe width="100%" height="50%" src="{!! $practica->video !!}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>--}}
                                    </div>
                                @endif


                                <div class="container gal-container">
                                    @foreach($practicas->fotos as $key => $foto)
                                        <div class="col-md-8 col-sm-12 co-xs-12 gal-item">
                                            <div class="col-md-5">
                                                <a href="#" data-toggle="modal" data-target="#{{$key}}">

                                                    <img src="{{$foto->url}}" class="img-responsive" width="100%">

                                                </a>
                                                <div class="modal fade" id="{{$key}}" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            <div class="modal-body">
                                                                <img src="{{$foto->url}}" class="img-responsive" width="100%">
                                                            </div>
                                                            <div class="col-md-12 description">
                                                                <h4>{{$practicas->nombre_practica}}</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </section>

                        @endif

                    </div>

                </div>
            </div>

        </div>

                  

    @else
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-body">
                    <div class="form-group ">
                        <section class="content-header">
                            <h1>
                                {{$practicas->nombre_practica}}
                            </h1><br>

                        </section>

                        <section>
                            <article>
                                <div class="row">
                                    <div class="col-md-8">
                                        <i class="fa fa-folder-open" aria-hidden="true"></i>{{$practicas->tecnologia['nombre_tecnologia'] }}
                                        <i class="fa fa-user-circle-o" aria-hidden="true"></i>{{$practicas->user['name']}}

                                       

                                    </div>
                                    <div class="col-md-5">
                                        <i class="fa fa-calendar-o" aria-hidden="true"></i> {{$practicas->created_at}}

                                    </div>


                                </div>

                                <p class="lead">{!! substr($practicas->contenido,0,10000) !!} </p>
                                <br>
                                @if(empty($practicas->path))
                                    <img src="{{asset('img/no-imagen.jpg')}}" class="img-responsive" width="100%">
                                @else
                                    <img src="{{asset('img/')}}/{{$practicas->path}}" class="img-responsive" width="100%">
                                @endif
                                <br>

                                {{--@if(!empty($practicas->video))--}}

                                    {{--<div class="video">--}}
                                        {{--{!! $practicas->video !!}--}}
                                    {{--</div>--}}
                                {{--@endif--}}

                            </article>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@endsection


@section('script')
        <!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a538b776181597d"></script>

@endsection


