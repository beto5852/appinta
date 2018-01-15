<div class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">Prácticas Agricolas en Nicaragua</a>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <ul class="nav navbar-nav">
                <li class="#"><a href="/">Inicio</a></li>

                <li class="dropdown">
                    <a href="bootstrap-elements.html" data-target="#" class="dropdown-toggle" data-toggle="dropdown">Tecnologias
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Tecnologias</a></li>
                        <li><a href="#">Practicas</a></li>
                        <li><a href="#">Etapas</a></li>
                        <li><a href="#">Videos</a></li>
                    </ul>
                </li>


            </ul>

            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control col-md-8" placeholder="Buscar">
                </div>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li class=""><a href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Calendario</a></li>
                <li class=""><a href="#"><i class="fa fa-play" aria-hidden="true"></i> Videos</a></li>
                <li><a href="#"><i class="fa fa-phone" aria-hidden="true"></i> Contacto</a></li>

                @if(Auth::user())
                    <li class="dropdown">
                        <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lock" aria-hidden="true"></i> Acceder
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('administrador')}}"><i class="fa fa-lock" aria-hidden="true"></i> Administrar</a></li>
                            <li><a href="{{url('/login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</a></li>
                            <li><a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrarse</a></li>
                        </ul>
                    </li>
                @else
                    <li class="dropdown">
                        <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lock" aria-hidden="true"></i> Acceder
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('administrador')}}"><i class="fa fa-lock" aria-hidden="true"></i> Administrar</a></li>
                            <li><a href="{{url('/login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</a></li>
                            <li><a href="{{'/register'}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Registrarse</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>