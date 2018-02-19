@extends('layouts.front-practica')


@section('practica')



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
                                    <img class="advanced-feature-img-right wow fadeInRight" src="{{asset('img/')}}/{{$practicas->path}}"  width="50%" alt="auto">
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
                                <img src="{{asset('template/img/product-features.png')}}" alt="" class="wow fadeInLeft">
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
                                        <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.2s">
                                        <div class="icon"><i class="ion-erlenmeyer-flask"></i></div>
                                        <h4 class="title"><a href="">Tecnologia</a></h4>
                                        <p class="description">{{$practicas->tecnologia->nombre_tecnologia}}</p>
                                </div>
                                @else
                                    <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.2s">
                                    <div class="icon"><i class="ion-erlenmeyer-flask"></i></div>
                                    <h4 class="title"><a href="">Tecnologias</a></h4>
                                    <p class="description">Saberes y los dispositivos que posibilitan que el conocimiento científico se aplique de forma práctica.
                                        Agropecuario, por su parte, es aquello que se vincula a la ganadería (la crianza y comercialización de ganado)
                                        y la agricultura (la actividad que consiste en desarrollar cultivos)..</p>
                            </div>

                            @endif
                            @if(!empty($practicas->cultivos))
                                <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
                                    <div class="icon"><i class="ion-ios-flower"></i></div>
                                    <h4 class="title"><a href="">Cultivos</a></h4>
                                    <p class="description">
                                    @foreach( $practicas->cultivos as $cultivo)
                                        {{$cultivo->nombre_cultivo}}<br>
                                    @endforeach

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
                    <h3 class="section-title">Galeria {{$practicas->nombre_practica}}</h3>
                    <span class="section-divider"></span>
                </div>




                <!--==========================
                     Call To Action Section
                   ============================-->
                <section id="call-to-action">
                    <div class="container">
                        <div class="row">
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
                </section><!-- #call-to-action -->

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
                            <h3 class="section-title">Galeria {{$practicas->nombre_practica}}</h3>
                            <span class="section-divider"></span>
                        </div>

                        <!--==========================
                Call To Action Section
              ============================-->
                        <section id="call-to-action">
                            <div class="container">
                                <div class="row">
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
                        </section><!-- #call-to-action -->
                    </div>
                </section><!-- #gallery -->
        </section>
        @endif

                <!--==========================
          amigos
        ============================-->
<section id="clients">
    <div class="container">

        <div class="row wow fadeInUp">

            <div class="col-md-2">
                <img src="{{asset('template/img/clients/client-1.png')}}" alt="">
            </div>

            <div class="col-md-2">
                <img src="{{asset('template/img/clients/client-2.png')}}" alt="">
            </div>

            <div class="col-md-2">
                <img src="{{asset('template/img/clients/client-3.png')}}" alt="">
            </div>

            <div class="col-md-2">
                <img src="{{asset('template/img/clients/client-4.png')}}" alt="">
            </div>

            <div class="col-md-2">
                <img src="{{asset('template/img/clients/client-5.png')}}" alt="">
            </div>

            <div class="col-md-2">
                <img src="{{asset('template/img/clients/client-6.png')}}" alt="">
            </div>

        </div>
    </div>
</section><!-- #more-features -->



<!--==========================
  Contact Section
============================-->
<section id="contact">
    <div class="container">
        <div class="row wow fadeInUp">

            <div class="col-lg-8 col-md-4">
                <div class="contact-about">
                    <h3><img src="{{asset('template/img/clients/logo-inta.png')}}" width="25%" alt="auto"></h3>
                    <p>Puedes visitar nuestras redes sociales y canales para ver mas contenido del que hacer de nuestra institución.</p>
                    <div class="social-links">
                        <a href="https://www.facebook.com/inta.nicaragua" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="https://twitter.com/intanicaragua" class="twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="https://www.youtube.com/user/INTANICARAGUA" class="youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="https://plus.google.com/112535730954267366501" class="google-plus" target="_blank"><i class="fa fa-google-plus"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="info">
                    <div>
                        <i class="ion-ios-location-outline"></i>
                        <p> Contiguo a la Policía Nacional del Distrito 5, Managua</p>
                    </div>

                    <div>
                        <i class="ion-ios-email-outline"></i>
                        <p>oaip@inta.gob.ni </p>
                    </div>

                    <div>
                        <i class="ion-ios-telephone-outline"></i>
                        <p>(505)  22780471</p>
                    </div>

                </div>
            </div>

        </div>

    </div>
</section><!-- #contact -->

@endsection

