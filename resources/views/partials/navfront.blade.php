<nav id="nav-menu-container">
    <ul class="nav-menu">
        <li class="menu-active"><a href="#intro">Inicio</a></li>
        <li><a href="#about">Acerca de nosotros</a></li>
        <li><a href="#features">Prácticas Agricolas</a></li>
        <li><a href="#team">Cultivos</a></li>
        <li><a href="#gallery">Galeria</a></li>
        <li class="menu-has-children"><a href="#">Acceder</a>

            @if(Auth::check())

            <ul>
                <li><a href="{{route('administrador')}}"><i class="fa fa-lock" aria-hidden="true"></i> Acceder a la APPINTA</a></li>

            </ul>

            @else

                <ul>
                    <li><a href="{{route('administrador')}}"><i class="fa fa-lock" aria-hidden="true"></i> Administrar</a></li>
                    <li><a href="{{url('/login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</a></li>
                    <li><a href="{{'/register'}}"><i class="fa fa-user-plus" aria-hidden="true"></i></i> Registrarse</a></li>
                </ul>
            @endif


        </li>
        <li><a href="#contact">Contactanos</a></li>

    </ul>
</nav>

