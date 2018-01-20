<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
<body class="hold-transition register-page">



<div class="register-box">
    <div class="login-logo" >
        <a href="{{asset('/')}}"><div align="center"><img src="{{asset('img/logo-inta.png')}}" class="img-responsive" width="50%"></div></a>
    </div>

    <div class="register-box-body">
        <p class="login-box-msg">Restablesca su contraseña</p>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                      <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus placeholder="Su correo electronico: ejemplo@gmail.com">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">

                    <input id="password" type="password" class="form-control" name="password" required placeholder="*******">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="*******">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>

                    @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                    @endif
            </div>





            <div class="row">
                <div class="col-xs-8">
                    <!--  <div class="checkbox icheck">
                       <label>
                         <input type="checkbox"> Acepta nuestros  <a href="#">terminos</a>
                       </label>
                     </div> -->
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Actualizar</button>
                </div>
                <!-- /.col -->
            </div>
        </form>

        <!--  <div class="social-auth-links text-center">
           <p>- OR -</p>
           <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
             Facebook</a>
           <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
             Google+</a>
         </div> -->


    </div>
    <!-- /.form-box -->
</div>



<!-- /.register-box -->

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


