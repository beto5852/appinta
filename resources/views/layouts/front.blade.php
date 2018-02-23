<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('meta-title','Prácticas | INTA')</title>
    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Bootstrap CSS File -->

    <link rel="stylesheet" href={{asset("template/lib/bootstrap/css/bootstrap.min.css")}}>


    <!-- Libraries CSS Files -->
    <link rel="stylesheet" href={{asset("template/lib/animate/animate.min.css")}}>
    <link rel="stylesheet" href={{asset("template/lib/font-awesome/css/font-awesome.min.css")}}>
    <link rel="stylesheet" href={{asset("template/lib/ionicons/css/ionicons.min.css")}}>
    <link rel="stylesheet" href={{asset("template/lib/magnific-popup/magnific-popup.css")}}>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" >

    <!-- Main Stylesheet File -->
    <link rel="stylesheet" href={{asset("template/css/style.css")}}>


    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body>



<!--==========================
   Header
 ============================-->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <h1><a href="/" class="scrollto">
                    <img src="template/img/clients/logo-inta.png" width="45%" alt="auto"> </a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
        </div>

        @include('partials.navfront')

        <!-- #nav-menu-container -->
    </div>
</header><!-- #header -->


<!--==========================
   Intro Section
 ============================-->
<section id="intro">

    <div class="intro-text">
        <h2>Bienvenido</h2>
        <p>Aplicación Web de Prácticas Agrícolas
        Basado el Ciclo Productivo de Nicaragua</p>
        @if(Auth::check())
        <a href="{{asset('busqueda')}}" class="btn-get-started scrollto">Lista de prácticas agricolas</a>
        @else
         <a href="{{asset('register')}}" class="btn-get-started scrollto">Registrate aqui</a>

        @endif
    </div>

    {{--<div class="product-screens">--}}

        {{--<div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">--}}
            {{--<img src="template/img/product-screen-1.png" alt="">--}}
        {{--</div>--}}

        {{--<div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">--}}
            {{--<img src="template/img/product-screen-2.png" alt="">--}}
        {{--</div>--}}

        {{--<div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">--}}
            {{--<img src="template/img/product-screen-3.png" alt="">--}}
        {{--</div>--}}

    {{--</div>--}}

</section><!-- #intro -->

<main id="main">

    @yield('content')

</main>
@include('partials.footer')

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<script src="{{ asset('js/app.js') }}"></script>

<!-- JavaScript Libraries -->
<script src={{asset("template/lib/jquery/jquery.min.js")}}></script>
<script src={{asset("template/lib/jquery/jquery-migrate.min.js")}}></script>
<script src="{{ asset('template/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('template/lib/easing/easing.min.js') }}"></script>
<script src="{{ asset('template/lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('template/lib/superfish/hoverIntent.js') }}"></script>
<script src="{{ asset('template/lib/superfish/superfish.min.js') }}"></script>
<script src="{{ asset('template/lib/magnific-popup/magnific-popup.min.js') }}"></script>

<!-- Contact Form JavaScript File -->
<script src="{{ asset('template/contactform/contactform.js') }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('template/js/main.js') }}"></script>


</body>
</html>
