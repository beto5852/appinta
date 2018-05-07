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

    <link rel="stylesheet" href="{{asset('/chosen/chosen.css')}}">

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
        <a href="{{asset('/')}}"><b>Resgistro al sistema de </b>prácticas agricolas <br><div align="center"><img src="{{asset('img/logo-inta.png')}}" class="img-responsive" width="50%"></div></a>

    </div>

  <div class="register-box-body">
    <p class="login-box-msg">Bienvenido puede registar a un nuevo usuario</p>

      {!! Form::open(['url' => '/register', 'method' => 'POST']) !!}

     {{ csrf_field() }}

      <div class="form-group has-feedback {{ $errors->has('name') ? ' has-error' : '' }}">
          {!! Form::label('name','Nombre y Apellido') !!}
          {!! Form::text('name',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo','value' => 'old(name)','required'])!!}
          {!! $errors->first('name','<span class="help-block">:message</span>') !!}
      </div>

      <div class="form-group has-feedback {{ $errors->has('edad') ? ' has-error' : '' }}">

          {!! Form::label('edad','Rango de años de edad') !!}<br>

          {{ Form::radio('edad', '20',true) }}
          {!! Form::label('edad','10-20') !!}
          {{ Form::radio('edad', '30') }}
          {!! Form::label('edad','21-30') !!}
          {{ Form::radio('edad', '40') }}
          {!! Form::label('edad','31-40') !!}
          {{ Form::radio('edad', '50') }}
          {!! Form::label('edad','41-50') !!}
          {{ Form::radio('edad', '60') }}
          {!! Form::label('edad','51-60') !!}


          {{--{!! Form::label('edad','Edad') !!}--}}
          {{--{!! Form::text('edad',null,['class' =>'form-control', 'placeholder' =>'Edad eje: 20, 25, 30, 40','value' => 'old(edad)','required'])!!}--}}
          {!! $errors->first('edad','<span class="help-block">:message</span>') !!}
      </div>
      <div class="form-group has-feedback {{ $errors->has('sexo') ? ' has-error' : '' }}">
          {{ Form::label('sexo','Seleccione su genero') }}<br>
          {{ Form::radio('sexo', 'mascúlino', true) }}
          {!! Form::label('sexo','mascúlino') !!}
          {{ Form::radio('sexo', 'femenino') }}
          {!! Form::label('sexo','femenino') !!}

          {{--{{ Form::select('sexo',['' => 'Seleccione su genero' , 'masculino' => 'mascúlino', 'femenino' => 'femenino'],null,['class' => 'form-control chosen-select'])}}--}}
          {!! $errors->first('sexo','<span class="help-block">:message</span>') !!}
      </div>
      <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
          {!! Form::label('email','Correo electrónico') !!}
          {!! Form::email('email',null,['class' =>'form-control', 'placeholder' =>'example@gmail.com','value' => 'old(email)','required'])!!}
          <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          {!! $errors->first('email','<span class="help-block">:message</span>') !!}
      </div>

      <div class="form-group has-feedback {{ $errors->has('password') ? ' has-error' : '' }}">
          {!! Form::label('password','Contraseña') !!}
          {!! Form::password('password',['class' =>'form-control', 'placeholder' =>'**************','required'])!!}
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          {!! $errors->first('password','<span class="help-block">:message</span>') !!}

      </div>

      <div class="form-group has-feedback">
          {!! Form::label('password_confirmation','Contraseña') !!}
          {!! Form::password('password_confirmation',['class' =>'form-control', 'placeholder' =>'**************','required'])!!}
          <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
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
            {{ Form::submit('Registrarse', ['class' => 'btn btn-primary btn-block btn-flat']) }}
        </div>
        <!-- /.col -->
      </div>
      {!! Form::close() !!}
   <!--  <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a>
    </div> -->

    <a href="{{asset('login')}}" class="text-center">Ya tengo una cuenta</a>
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

<script src="{{asset('/chosen/chosen.jquery.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
<script>
    $(".chosen-select").chosen();
</script>
</body>
</html>
