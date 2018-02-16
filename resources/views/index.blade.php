@extends('layouts.front')

@section('content')


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

<section id="practicas" class="section-bg">
    <div class="container-fluid">
        <div class="section-header">
            <h3 class="section-title">Labores Agricolas</h3>
            <span class="section-divider"></span>
          </div>

    @foreach($practicas as $practica)



        <section id="advanced-features">

            <div class="features-row section-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            @if(empty($practica->path))
                                <img class="advanced-feature-img-right wow fadeInRight" src="{{asset('img/no-imagen.jpg')}}" width="50%" alt="auto">
                            @else
                                <a  href="{{'practica'}}/{{$practica->slug}}">  <img class="advanced-feature-img-right wow fadeInRight" src="{{asset('img/')}}/{{$practica->path}}"  width="50%" alt="auto"></a>
                            @endif

                            <div class="wow fadeInLeft">
                                <h2>{{$practica->nombre_practica }}</h2>
                                <p>{!! $practica->textomedio !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

      <center>{{ $practicas->links()}}</center>
</div>
</section>



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
                            <a href="template/img/gallery/img1.jpg" class="gallery-popup">
                                <img src="template/img/gallery/img1.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="template/img/gallery/img2.jpg" class="gallery-popup">
                                <img src="template/img/gallery/img2.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="template/img/gallery/img3.jpg" class="gallery-popup">
                                <img src="template/img/gallery/img3.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="template/img/gallery/img4.jpg" class="gallery-popup">
                                <img src="template/img/gallery/img4.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="template/img/gallery/img5.jpg" class="gallery-popup">
                                <img src="template/img/gallery/img5.jpg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="gallery-item wow fadeInUp">
                            <a href="template/img/gallery/img6.jpg" class="gallery-popup">
                                <img src="template/img/gallery/img6.jpg" alt="">
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


@endsection