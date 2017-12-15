<header class="main-header">

    <!-- Logo -->
    <a href="{{route('administrador')}}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>INTA</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{{config('app.name')}}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">


                    <!-- Menu Toggle Button -->


                <!-- /.messages-menu -->

                <!-- Tasks Menu -->
                    <!-- Menu Toggle Button -->
                <li><a href="{{url('admin/mensajes')}}" ><i class="fa  fa-send-o" aria-hidden="true"></i> Enviar mensaje</a>


                <!-- Notifications Menu -->

                @if(Auth::user()->type == 'admin')

                <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-bell-o"></i>

                        @if($contador = auth()->user()->unreadNotifications()->groupBy('notifiable_type')->count())
                            <span class="label label-warning">{{$contador}}</span>
                        @endif
                    </a>
                    <ul class="dropdown-menu">

                        @if($contador = auth()->user()->unreadNotifications()->groupBy('notifiable_type')->count())
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="{{url('admin/notificaciones/')}}">
                                            <i class="fa fa-envelope-o text-aqua"></i> Tienes {{$contador}} notificaciones
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                        @else
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-envelope-o text-aqua"></i> 0 notificaciones
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                        @endif

                        <!-- <li class="footer"><a href="{{url('admin/notificaciones/')}}">Ver todas</a></li>-->
                    </ul>
                </li>

                @endif

                <!-- Tasks Menu -->

                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <!-- The user image in the navbar-->
                        @if(empty(Auth::user()->perfil))
                            @if(Auth::user()->sexo == 'masculino')
                                <img src="{{asset('img/user_masculino.jpg')}}" class="user-image" alt="User Image">
                            @else
                                <img src="{{asset('img/user_femenino.jpg')}}" class="user-image" alt="User Image">
                            @endif
                        @else
                            <img src="{{asset('img')}}/{{$user->perfil}}" class="user-image" alt="User Image">
                        @endif
                                 
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                        <span class="hidden-xs"> {!! Auth::user()->name !!}</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- The user image in the menu -->
                        <li class="user-header">
                            @if(empty(Auth::user()->img_perfil))
                                @if(Auth::user()->sexo == 'masculino'   )
                                    <img class="profile-user-img img-responsive img-circle" src="{{asset('img/user_masculino.jpg')}}" alt="User profile picture"></td>
                                @else
                                    <img class="profile-user-img img-responsive img-circle" src="{{asset('img/user_femenino.jpg')}}" alt="User profile picture"></td>
                                @endif
                            @else
                                <img src="{{asset('img/')}}/{{$user->img_perfil}}" style = "width: 100px;" class="img-circle" alt="User Image"></td>
                            @endif
                            <p>
                                {!! Auth::user()->name !!}
                                <small>{!! Auth::user()->type !!}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{url('admin/users/'.Auth::user()->id.'/edit')}}" class="btn btn-default btn-flat">Editar Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{url('logout')}}" class="btn btn-default btn-flat">Salir</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                    <li><a href="{{url('/')}}" target="_blank"><i class="glyphicon glyphicon-eye-open" aria-hidden="true" ></i> Ver sitio</a>
                    </li>

            </ul>
        </div>
    </nav>
</header>
