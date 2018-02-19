@extends('layouts.front-busqueda')


@section('practica')



        <!--==========================
          Product Advanced Featuress Section
        ============================-->

<section id="advanced-features">

    <div class="features-row section-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">


                </div>
            </div>
        </div>
    </div>


    <div class="box box-primary">

        <!-- /.box-header -->
        <div class="box-body">
            <center>{{ $practicas->links() }}</center>
            <table id="practicas-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Práctica</th>
                    <th>Tecnológia</th>
                    <th>Rubro</th>
                    <th>Cultivo</th>
                    <th>Etapas</th>
                    <th>Mes</th>
                    <th>Semanas</th>
                    <th>Imagen</th>
                    <th>ver</th>
                </tr>
                </thead>

                <tbody>
                @foreach($practicas as $practica)

                    <tr class="info">

                        <td>{{  $practica->nombre_practica}}</td>

                        <td>{{  $practica->tecnologia['nombre_tecnologia']}}</td>

                        <td>{{  $practica->rubro['nombre_rubro']}}</td>

                        <td>{{  $practica->cultivo['nombre_cultivo']}}</td>
                        <td>
                            @foreach($practica->etapas as $etapa)
                                <span class="label label-success">{{$etapa->nombre_etapa}}</span><br>
                            @endforeach
                        </td>
                        @foreach($practica->meses as $mes)
                            <td> {{$mes->nombre_mes}}</td><br>
                        @endforeach

                        <td>
                            @foreach($practica->semanas as $semana)

                                <span class="label label-primary">{{$semana->nombre_semana}}</span><br>
                            @endforeach
                        </td>


                        @if(empty($practica->path))
                            <td><img src="{{asset('img/no-imagen.jpg')}}" style = "width: 100px;"></td>
                        @else
                            <td><img src="{{asset('img/')}}/{{$practica->path}}" style = "width: 100px;"></td>
                        @endif
                        <td>
                            <a href="{{'practica'}}/{{$practica->slug}}" class="btn btn-raised btn-info" role="button" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                @endforeach


                </tbody>



            </table>
            <center>{{ $practicas->links() }}</center>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

        <!--==========================
          amigos
        ============================-->
<section id="clients">
    <div class="container">

        <div class="row wow fadeInUp">

            <div class="col-md-2">
                <a href="http://www.marena.gob.ni/" target="_blank"> <img src="template/img/clients/client-1.png" alt=""></a>
            </div>

            <div class="col-md-2">
                <a href="http://www.economiafamiliar.gob.ni/" target="_blank"><img src="template/img/clients/client-2.png" alt=""></a>
            </div>

            <div class="col-md-2">
                <a href="http://www.ipsa.gob.ni/" target="_blank"> <img src="template/img/clients/client-3.png" alt=""></a>
            </div>

            <div class="col-md-2">
                <a href="http://www.ineter.gob.ni/" target="_blank"> <img src="template/img/clients/client-4.png" alt=""></a>
            </div>

            <div class="col-md-2">
                <a href="http://canal6.com.ni/" target="_blank"> <img src="template/img/clients/client-5.png" alt=""></a>
            </div>

            <div class="col-md-2">
                <a href="https://www.el19digital.com/" target="_blank"> <img src="template/img/clients/client-6.png" alt=""></a>
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

