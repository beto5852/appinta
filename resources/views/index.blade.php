@extends('layouts.front')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Bienvenido')

@section('content')

            {{--@section('breadcrumb')--}}
                {{--<ul class="breadcrumb" style="margin-bottom: 5px;">--}}
                    {{--<li>{!! Breadcrumbs::render('inicio') !!}</li>--}}
                {{--</ul>--}}
            {{--@endsection--}}



        <!--==========================
          About Us Section
        ============================-->
        <section id="about" class="section-bg">
            <div class="container-fluid">
                <div class="section-header">
                    <h3 class="section-title">Acerca de nosotros</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">
                        El Instituto Nicaragüense de Tecnología Agropecuaria (INTA) fue creado en 1993 por Decreto No 2293,<br>
                        try publicado en el Diario Oficial La Gaceta # 61 del 26 de Marzo del mismo año. Es una Institución del Poder Ejecutivo <br>
                        y miembro del Gabinete de la Producción del Gobierno de Reconciliación y Unidad Nacional. <br><br>

                        En el marco del fortalecimiento de nuestro modelo de desarrollo agropecuario nos proponemos reorientar nuestra estrategia de trabajo,<br>
                        desarrollando la investigación e innovación a fin de incrementar la producción y productividad principalmente de pequeños y medianos <br>
                        productores/as de nuestro país.
                    </p>
                </div>

                <div class="row">
                    <div class="col-lg-6 about-img wow fadeInLeft">
                        <img src="template/img/about-img.jpg" alt="">
                    </div>

                    <div class="col-lg-6 content wow fadeInRight">
                        <h2>Nuestra Misión</h2>
                        <p>
                            Contribuir al incremento de la productividad agropecuaria al manejo sostenible de los recursos naturales, a la soberanía,
                            seguridad alimentaria y reducción de la pobreza, mediante la investigación científica e innovación tecnológica, a través de
                            alianzas público-privadas con el protagonismo de las familias de productores y productoras
                        </p>

                        <!--<ul>
                          <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                          <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                          <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
                        </ul> -->
                        <h2>Nuestra Visión</h2>
                        <p>
                            Institución líder en los procesos de investigación técnica-científica, reconocida nacional e internacionalmente, con personal calificado,
                            infraestructura y equipamiento atendiendo las demandas tecnológicas del sector agropecuario en alianza con organizaciones públicas y privadas.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- #about -->




        <!--==========================
          Product Advanced Featuress Section
        ============================-->
        <section id="advanced-features">

            <div class="features-row section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img class="advanced-feature-img-right wow fadeInRight" src="template/img/advanced-feature-1.jpg" alt="">
                            <div class="wow fadeInLeft">
                                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
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
                                <h3 class="section-title">Prácticas Agricolas</h3>
                                <span class="section-divider"></span>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-5 features-img">
                            <img src="template/img/product-features.png" alt="" class="wow fadeInLeft">
                        </div>

                        <div class="col-lg-8 col-md-7 ">

                            <div class="row">

                                <div class="col-lg-6 col-md-6 box wow fadeInRight">
                                    <div class="icon"><i class="ion-leaf"></i></div>
                                    <h4 class="title"><a href="">Rubros</a></h4>
                                    <p class="description">Denominación genérica de cada uno de los productos de la agricultura, la actividad humana
                                        que obtiene materias primas de origen vegetal a través del cultivo.</p>
                                </div>
                                <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
                                    <div class="icon"><i class="ion-android-time"></i></div>
                                    <h4 class="title"><a href="">Etapas de siembra</a></h4>
                                    <p class="description">Después de la siembra la semilla empieza a embeber agua a través de la testa y el micrópilo, aumentando gradualmente de tamaño.</p>
                                </div>
                                <div class="col-lg-6 col-md-6 box wow fadeInRight data-wow-delay="0.2s">
                                <div class="icon"><i class="ion-erlenmeyer-flask"></i></div>
                                <h4 class="title"><a href="">Tecnologias</a></h4>
                                <p class="description">Saberes y los dispositivos que posibilitan que el conocimiento científico se aplique de forma práctica.
                                    Agropecuario, por su parte, es aquello que se vincula a la ganadería (la crianza y comercialización de ganado)
                                    y la agricultura (la actividad que consiste en desarrollar cultivos)..</p>
                            </div>
                            <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
                                <div class="icon"><i class="ion-ios-flower"></i></div>
                                <h4 class="title"><a href="">Cultivos</a></h4>
                                <p class="description">El cultivo es la práctica de sembrar semillas en la tierra y realizar las labores necesarias para obtener frutos de las mismas.
                                </p>
                            </div>
                        </div>

                    </div>

                </div>

                </div>

            </section><!-- #features -->



            <div class="features-row">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img class="advanced-feature-img-left" src="template/img/advanced-feature-2.jpg" alt="">
                            <div class="wow fadeInRight">
                                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                                <i class="ion-ios-paper-outline" class="wow fadeInRight" data-wow-duration="0.5s"></i>
                                <p class="wow fadeInRight" data-wow-duration="0.5s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                                <i class="ion-ios-color-filter-outline wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s"></i>
                                <p class="wow fadeInRight" data-wow-delay="0.2s" data-wow-duration="0.5s">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                                <i class="ion-ios-barcode-outline wow fadeInRight" data-wow-delay="0.4" data-wow-duration="0.5s"></i>
                                <p class="wow fadeInRight" data-wow-delay="0.4s" data-wow-duration="0.5s">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="features-row section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <img class="advanced-feature-img-right wow fadeInRight" src="template/img/advanced-feature-3.jpg" alt="">
                            <div class="wow fadeInLeft">
                                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                                <i class="ion-ios-albums-outline"></i>
                                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #advanced-features -->


       <!--==========================
          Product Featuress Section
        ============================-->
        <section id="features">
            <div class="container">

                <div class="row">

                    <div class="col-lg-8 offset-lg-4">
                        <div class="section-header wow fadeIn" data-wow-duration="1s">
                            <h3 class="section-title">Prácticas Agricolas</h3>
                            <span class="section-divider"></span>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-5 features-img">
                        <img src="template/img/product-features.png" alt="" class="wow fadeInLeft">
                    </div>

                    <div class="col-lg-8 col-md-7 ">

                        <div class="row">

                            <div class="col-lg-6 col-md-6 box wow fadeInRight">
                                <div class="icon"><i class="ion-leaf"></i></div>
                                <h4 class="title"><a href="">Rubros</a></h4>
                                <p class="description">Denominación genérica de cada uno de los productos de la agricultura, la actividad humana
                                    que obtiene materias primas de origen vegetal a través del cultivo.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.1s">
                                <div class="icon"><i class="ion-android-time"></i></div>
                                <h4 class="title"><a href="">Etapas de siembra</a></h4>
                                <p class="description">Después de la siembra la semilla empieza a embeber agua a través de la testa y el micrópilo, aumentando gradualmente de tamaño.</p>
                            </div>
                            <div class="col-lg-6 col-md-6 box wow fadeInRight data-wow-delay="0.2s">
                            <div class="icon"><i class="ion-erlenmeyer-flask"></i></div>
                            <h4 class="title"><a href="">Tecnologias</a></h4>
                            <p class="description">Saberes y los dispositivos que posibilitan que el conocimiento científico se aplique de forma práctica.
                                Agropecuario, por su parte, es aquello que se vincula a la ganadería (la crianza y comercialización de ganado)
                                y la agricultura (la actividad que consiste en desarrollar cultivos)..</p>
                        </div>
                        <div class="col-lg-6 col-md-6 box wow fadeInRight" data-wow-delay="0.3s">
                            <div class="icon"><i class="ion-ios-flower"></i></div>
                            <h4 class="title"><a href="">Cultivos</a></h4>
                            <p class="description">El cultivo es la práctica de sembrar semillas en la tierra y realizar las labores necesarias para obtener frutos de las mismas.
                            </p>
                        </div>
                    </div>

                </div>

            </div>

            </div>

        </section><!-- #features -->



        <!--==========================
          Gallery Section
        ============================-->
        <section id="gallery">
            <div class="container-fluid">
                <div class="section-header">
                    <h3 class="section-title">Galeria</h3>
                    <span class="section-divider"></span>
                    <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
                </div>

                <div class="row no-gutters">

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="template/img/gallery/gallery-1.jpg" class="gallery-popup">
                                <img src="template/img/gallery/gallery-1.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="template/img/gallery/gallery-2.jpg" class="gallery-popup">
                                <img src="template/img/gallery/gallery-2.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="template/img/gallery/gallery-3.jpg" class="gallery-popup">
                                <img src="template/img/gallery/gallery-3.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="template/img/gallery/gallery-4.jpg" class="gallery-popup">
                                <img src="template/img/gallery/gallery-4.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="template/img/gallery/gallery-5.jpg" class="gallery-popup">
                                <img src="template/img/gallery/gallery-5.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="template/img/gallery/gallery-6.jpg" class="gallery-popup">
                                <img src="template/img/gallery/gallery-6.jpg" alt="">
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- #gallery -->


        <!--==========================
          amigos
        ============================-->
        <section id="clients">
            <div class="container">

                <div class="row wow fadeInUp">

                    <div class="col-md-2">
                        <img src="template/img/clients/client-1.png" alt="">
                    </div>

                    <div class="col-md-2">
                        <img src="template/img/clients/client-2.png" alt="">
                    </div>

                    <div class="col-md-2">
                        <img src="template/img/clients/client-3.png" alt="">
                    </div>

                    <div class="col-md-2">
                        <img src="template/img/clients/client-4.png" alt="">
                    </div>

                    <div class="col-md-2">
                        <img src="template/img/clients/client-5.png" alt="">
                    </div>

                    <div class="col-md-2">
                        <img src="template/img/clients/client-6.png" alt="">
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
                            <h3><img src="template/img/clients/logo-inta.png" width="25%" alt="auto"></h3>
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




        {{--<div class="row">--}}
                {{--<div class="jumbotron col-md-8">--}}
            {{----}}
                    {{--@foreach($practicas as $practica)--}}
                        {{--<article>--}}
                            {{--<h3>{{$practica->nombre_practica}}</h3>--}}
                            {{--<div class="row">--}}
                                {{--<div class="col-md-8">--}}
                                    {{--<i class="fa fa-folder-open" aria-hidden="true"></i>{{$practica->tecnologia->nombre_tecnologia}}--}}
                                    {{--<i class="fa fa-user-circle-o" aria-hidden="true"></i>--}}
                                {{--</div>--}}
                                {{--<div class="col-md-4">--}}
                                    {{--<i class="fa fa-calendar-o" aria-hidden="true"></i> {{$practica->created_at->format('M')}}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<br>--}}
                            {{--@if(empty($practica->path))--}}
                                {{--<img src="{{asset('img/no-imagen.jpg')}}" class="img-responsive" width="100%">--}}
                            {{--@else--}}
                                {{--<a  href="{{'practica'}}/{{$practica->slug}}"> <img src="{{asset('img/')}}/{{$practica->path}}" class="img-responsive" width="100%"></a>--}}
                            {{--@endif--}}
                            {{--<br>--}}
                            {{--<p>{!! substr($practica->contenido,0,200) !!} </p>--}}
                            {{--<p class="text-right"><a class="btn btn-raised btn-primary" href="{{'practica'}}/{{$practica->slug}}">Leer más..</a></p>--}}
            {{----}}
                        {{--</article>--}}
                    {{--@endforeach--}}
                    {{--<center>{{ $practicas->links()}}</center>--}}
            {{----}}
                {{--</div>--}}
        {{--</div>--}}

@endsection