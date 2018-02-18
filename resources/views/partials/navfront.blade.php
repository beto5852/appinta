<nav id="nav-menu-container">
    <ul class="nav-menu">
        <li class="menu-active"><a href="/">Inicio</a></li>
        {{--<li><a href="#about">Acerca de nosotros</a></li>--}}
        @if(!empty($practicas->nombre_practica))
        <li {{request()->is('#advanced-features') ? 'class=active': ''}}><a href="#advanced-features">{{$practicas->nombre_practica }}</a></li>
        @else
            <li  {{request()->is('#advanced-features') ? 'class=active': ''}}><a href="#advanced-features">Practicas</a></li>
        @endif

        <li  {{request()->is('#features') ? 'class=active': ''}}><a href="#features">Información</a></li>
        <li {{request()->is('#gallery') ? 'class=active': ''}}><a href="#gallery">Galeria</a></li>
        <li class="menu-has-children"><a href="#">Acceder</a>

            @if(Auth::check())

            <ul>
                <li><a href="{{route('administrador')}}"><i class="fa fa-lock" aria-hidden="true"></i> Acceder a la APPINTA</a></li>

            </ul>

            @else

                <ul>
                    <li><a href="{{url('/login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i> Entrar</a></li>
                    <li><a href="{{'/register'}}"><i class="fa fa-user-plus" aria-hidden="true"></i></i> Registrarse</a></li>
                </ul>
            @endif


        </li>
        <li {{request()->is('#contact') ? 'class=active': ''}}><a href="#contact">Contactanos</a></li>

    </ul>
</nav>

