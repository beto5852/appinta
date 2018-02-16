@extends('layouts.front-more')


@section('content')



        <!--==========================
          Product Advanced Featuress Section
        ============================-->

          <section id="advanced-features">

                <div class="features-row section-bg">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">

                                @if(empty($practicas->path))
                                    <img class="advanced-feature-img-right wow fadeInRight" src="{{asset('img/no-imagen.jpg')}}" width="50%" alt="auto">
                                @else
                                    <a  href="{{'practica'}}/{{$practicas->slug}}">  <img class="advanced-feature-img-right wow fadeInRight" src="{{asset('img/')}}/{{$practicas->path}}"  width="50%" alt="auto"></a>
                                @endif

                                <div class="wow fadeInLeft">
                                    <p>{!! substr($practicas->contenido,0,10000) !!}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section id="features">
                    <div class="container">

                        <div class="row">

                            <div class="col-lg-8 offset-lg-4">
                                <div class="section-header wow fadeIn" data-wow-duration="1s">
                                    <h3 class="section-title">Informacion de {{$practicas->nombre_practica }}</h3>
                                    <span class="section-divider"></span>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-5 features-img">
                                <img src="template/img/product-features.png" alt="" class="wow fadeInLeft">
                            </div>

                            <div class="col-lg-8 col-md-7 ">

                                <div class="row">

                                    @if(!empty($practicas->rubro->nombre_rubro))
                                        <div class="col-lg-6 col-md-6 box wow fadeInRight">
                                            <div class="icon"><i class="ion-leaf"></i></div>
                                            <h4 class="title"><a href="">Rubro</a></h4>
                                            <p class="description">{{$practicas->rubro->nombre_rubro}}</p>
                                        </div>
                                    @else
                                        <div class="col-lg-6 col-md-6 box wow fadeInRight">
                                            <div class="icon"><i class="ion-leaf"></i></div>
                                            <h4 class="title"><a href="">Rubros</a></h4>
                                            <p class="description">Denominación genérica de cada uno de los productos de la agricultura, la actividad humana
                                                que obtiene materias primas de origen vegetal a través del cultivo.</p>
                                        </div>
                                    @endif
                                    @if(!empty($practicas->etapas()))
                                        <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
                                            <div class="icon"><i class="ion-android-time"></i></div>
                                            <h4 class="title"><a href="">Etapas de siembra</a></h4>
                                            <p class="description">
                                                @foreach( $practicas->etapas as $etapa)
                                                    {{$etapa->nombre_etapa}}<br>
                                                @endforeach
                                            </p>
                                        </div>
                                    @else
                                        <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
                                            <div class="icon"><i class="ion-android-time"></i></div>
                                            <h4 class="title"><a href="">Etapas de siembra</a></h4>
                                            <p class="description">Después de la siembra la semilla empieza a embeber agua a través de la testa y el micrópilo, aumentando gradualmente de tamaño.</p>
                                        </div>
                                    @endif


                                    @if(!empty($practicas->tecnologia->nombre_tecnologia))
                                        <div class="col-lg-6 col-md-6 box wow fadeInRight data-wow-delay="0.2s">
                                        <div class="icon"><i class="ion-erlenmeyer-flask"></i></div>
                                        <h4 class="title"><a href="">Tecnologia</a></h4>
                                        <p class="description">{{$practicas->tecnologia->nombre_tecnologia}}</p>
                                </div>
                                @else
                                    <div class="col-lg-6 col-md-6 box wow fadeInRight data-wow-delay="0.2s">
                                    <div class="icon"><i class="ion-erlenmeyer-flask"></i></div>
                                    <h4 class="title"><a href="">Tecnologias</a></h4>
                                    <p class="description">Saberes y los dispositivos que posibilitan que el conocimiento científico se aplique de forma práctica.
                                        Agropecuario, por su parte, es aquello que se vincula a la ganadería (la crianza y comercialización de ganado)
                                        y la agricultura (la actividad que consiste en desarrollar cultivos)..</p>
                            </div>

                            @endif
                            @if(!empty($practicas->cultivo->nombre_cultivo))
                                <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
                                    <div class="icon"><i class="ion-ios-flower"></i></div>
                                    <h4 class="title"><a href="">Cultivos</a></h4>
                                    <p class="description">{{$practicas->cultivo->nombre_cultivo}}
                                    </p>
                                </div>
                            @else
                                <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
                                    <div class="icon"><i class="ion-ios-flower"></i></div>
                                    <h4 class="title"><a href="">Cultivos</a></h4>
                                    <p class="description">El cultivo es la práctica de sembrar semillas en la tierra y realizar las labores necesarias para obtener frutos de las mismas.
                                    </p>
                                </div>
                            @endif

                        </div>

                    </div>


         </section><!-- #features -->



<!--==========================
         Gallery Section
       ============================-->

@if($practicas->fotos->count() === 1)
<section id="gallery">
    <div class="container-fluid">
        <div class="section-header">
            <h3 class="section-title">Galeria {!! $practicas->nombre_practica !!}}</h3>
            <span class="section-divider"></span>
            <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row no-gutters">

            <div class="col-lg-4 col-md-6">
                <div class="gallery-item wow fadeInUp">
                    <a href="template/img/gallery/img1.jpg" class="gallery-popup">
                        <img src="template/img/gallery/img1.jpg" alt="">
                    </a>
                </div>
            </div>



        </div>

    </div>
</section><!-- #gallery -->
@elseif($practicas->fotos->count() > 1)


    @if(!empty($practicas->video))

        <div class="video">
            {!! $practicas->video !!}
        </div>
    @endif


    <section id="gallery">
        <div class="container-fluid">
            <div class="section-header">
                <h3 class="section-title">Galeria</h3>
                <span class="section-divider"></span>
                <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
            </div>

            <div class="row no-gutters">
                @foreach($practicas->fotos as $key => $foto)
                <div class="col-lg-4 col-md-6">
                    <div class="gallery-item wow fadeInUp">
                        <a href="{{$foto->url}}" class="gallery-popup">
                            <img src="{{$foto->url}}" alt="">
                        </a>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </section><!-- #gallery -->

@endif



@endsection

