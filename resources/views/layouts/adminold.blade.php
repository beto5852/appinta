<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'APPINTA') }}</title>

    <!-- Styles -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css" >

    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/icon?family=Material+Icons">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/bootstrap-material-design.min.css')}}" rel="stylesheet" type="text/css" >
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" >

    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<div id="app">

    @include('partials.navadmin')


    <div class="container">

        @yield('breadcrumb')

        <Notificaciones></Notificaciones>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"> @yield('title')</h3>
            </div>


            <div class="jumbotron panel-body">


                @yield('content')
            </div>
        </div>
    </div>


</div>

<!-- Scripts -->

<script src="https://npmcdn.com/tether@1.2.4/dist/js/tether.min.js"></script>
<script src="https://npmcdn.com/bootstrap@4.0.0-alpha.5/dist/js/bootstrap.min.js"></script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>



<script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/material.min.js') }}"></script>
<script src="{{ asset('js/ripples.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>



<script>
    $(document).ready(function () {
        $.material.init();
    })
</script>

</body>
</html>
