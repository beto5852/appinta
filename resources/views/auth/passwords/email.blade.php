<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'APPINTA') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href={{asset("adminlte/bootstrap/css/bootstrap.min.css")}}>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset("/adminlte/css/AdminLTE.min.css")}}>
    <!-- iCheck -->
    <link rel="stylesheet" href={{asset("/adminlte/plugins/iCheck/square/blue.css")}}>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo" >
        <a href="{{asset('/')}}"><b>Restablecer su contraseña</b> <br><div align="center"><img src="{{asset('img/logo-inta.png')}}" class="img-responsive" width="50%"></div></a>

    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">

        @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="panel-heading">Proporcione su correo electrónico y le enviaremos un correo electrónico para restablecer su contraseña.</div>
            <form class="form" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}

                <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">

                    {!! Form::email('email',old('email'),['class' =>'form-control','value' => '{old(email)}','placeholder' =>'example@gmail.com','required'])!!}
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                @if ($errors->has('email'))
                        <span class="help-block">  <strong>{{ $errors->first('email') }}</strong>  </span>
                    @endif
                </div>

                <div class="form-group">
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{ Form::submit('Enviar link de reseteo de password', ['class' => 'btn btn-primary btn-block']) }}
                </div>

            </form>

            <span>¿Recuerdas tu contraseña? </span><a href="{{ URL('login') }}" class="text-center">Iniciar sessión.</a>

    </div>
    <!-- /.login-box-body -->
</div>





<!-- jQuery 2.2.3 -->
<script src="/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/adminlte//bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/adminlte/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>


