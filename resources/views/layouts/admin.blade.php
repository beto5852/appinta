<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('meta-title','Prácticas | INTA')</title>


    <!-- Tell the browser to be responsive to screen width -->
    <meta name="description" content="@yield('meta-content','Esta es la aplicación de prácticas agricolas')">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link href="{{asset('/css/app.css')}}" rel="stylesheet" type="text/css" >


    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{asset('/adminlte/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('/adminlte/plugins/datatables/dataTables.bootstrap.css')}}">


    <link rel="stylesheet" href="{{asset('/adminlte/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.

    -->
    @yield('css')    

    <link rel="stylesheet" href="{{asset('/chosen/chosen.css')}}">

    <link rel="stylesheet" href="{{asset('/adminlte/css/skins/skin-blue.min.css')}}">

    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{asset('/adminlte/plugins/datepicker/datepicker3.css')}}">

    <!-- Dropzone-->
    <link rel="stylesheet" href="{{asset('/dropzone/dropzone.css')}}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9] -->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>




    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
         ]); !!}
    </script>


  <!--[endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    @include('partials.navadmin')
    <!-- Left side column. contains the logo and sidebar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            @yield('header')

                @yield('breadcrumb')

        </section>

        <!-- Main content -->
        <section class="content">

                      <!-- Your Page Content Here -->
            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
@include('partials.footer')
        <!-- Control Sidebar -->
@include('partials.sliderbar')
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.2.3 -->
<script src="{{asset('/adminlte/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

<!-- DataTables -->
<script src="{{asset('adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script src="{{asset('/ckeditor/ckeditor.js')}}"></script>

<script src="{{asset('/chosen/chosen.jquery.js')}}"></script>

<!-- Bootstrap 3.3.6 -->
<script src="{{asset('/adminlte/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/adminlte/js/app.min.js')}}"></script>

<!-- bootstrap datepicker -->
<script src="{{asset('/adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<!-- Select2 -->

<script src="{{asset('/adminlte/plugins/select2/select2.full.min.js')}}"></script>

<script src="{{asset('/dropzone/dropzone.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<!-- page script -->
@yield('script')

        <!-- Go to www.addthis.com/dashboard to customize your tools -->
{{--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5a538b776181597d"></script>--}}

</body>
</html>
