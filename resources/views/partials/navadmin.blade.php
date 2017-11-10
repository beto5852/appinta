<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">ADMIN INTA</a>
        </div>
        <div class="navbar-collapse collapse navbar-inverse-collapse">
            <ul class="nav navbar-nav">
                <li><a href="{{route('administrador')}}">Inicio</a></li>

                @if(Auth::user()->type == 'admin')

                    <li class="dropdown">
                        <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-user-o" aria-hidden="true"></i> Usuarios
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/users/create')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Crear usuarios</a></li>
                            <li><a href="{{url('admin/users/')}}"><i class="fa fa-users" aria-hidden="true"></i> Listar Usuarios</a></li>

                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"><i class="fa fa-bars" aria-hidden="true"></i> Prácticas Agricola
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/practicas/create')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Crear práctica</a></li>
                            <li><a href="{{url('admin/practicas/')}}"><i class="fa fa-list" aria-hidden="true"></i> Listar prácticas</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('admin/tecnologias/create')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Crear tecnologia</a></li>
                            <li><a href="{{url('admin/tecnologias/')}}"><i class="fa fa-list" aria-hidden="true"></i> Listar tecnologia</a></li>
                            <li class="divider"></li>
                            <li><a href="{{url('admin/cultivos/create')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Cultivo</a></li>
                            <li><a href="{{url('admin/cultivos/')}}"><i class="fa fa-list" aria-hidden="true"></i> Listar cultivos</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar etapa de siembra</a></li>
                            <li><a href="#"><i class="fa fa-list" aria-hidden="true"></i> Listar etapas de siembra</a></li>

                        </ul>
                    </li>


                    <li class="dropdown">
                        <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-tags" aria-hidden="true"></i> Tags
                            <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{url('admin/tags/')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Tags</a></li>
                            <li><a href="{{url('admin/tags/')}}"><i class="fa fa-list" aria-hidden="true"></i> Listar Tags</a></li>
                        </ul>
                    </li>
            </ul>
            @endif

            <ul class="nav navbar-nav navbar-right">

                <li><a href="{{route('home')}}" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i> Ver sitio</a></li>
                <!-- <li><a href="{{url('admin/notificaciones')}}" ><i class="fa fa-paper-plane" aria-hidden="true"></i> Enviar mensaje</a></li>
                @if(Auth::user()->type == 'admin')
                        <li><a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Notificaciones <span class="badge">0</span></a></li>
                    @endif -->
                <li class="dropdown">
                    <a href="#" data-target="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><i class="fa fa-user" aria-hidden="true"></i>
                        {!! Auth::user()->name !!}
                        <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('admin/users/'.Auth::user()->id.'/edit')}}"><i class="fa fa-pencil" aria-hidden="true"></i>
                                Editar Perfil</a></li>
                        <li><a href="{{url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a></li>
                    </ul>
                </li>

            </ul>
        </div>
        <!--/.nav-collapse -->
    </div>
</nav>

<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Administración <small>Bienvenido  {!! Auth::user()->name !!}</small></h1>
            </div>
            <div class="col-md-2">
                <div class="dropdown create">

                    <div class="btn-group">
                        <a href="#" class="btn btn-primary btn-raised" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Agregar</a>
                        <a href="bootstrap-elements.html" data-target="#" class="btn btn-primary btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a type="button" data-toggle="modal" data-target="#addPage">Agregar Mes</a></li>
                            <li><a href="#">Agregar Semana</a></li>
                            <li><a href="#">Agregar Tecnologia</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</header>



<!-- Add Page -->
<div class="modal fade" id="addPage" tabindex="" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content" >

            {!! Form::open(['url' => 'admin/tags', 'method' => 'POST']) !!}

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('nombre_tags','Nombre del Tags') !!}
                        {!! Form::text('nombre_tags',null,['class' =>'form-control', 'placeholder' =>'Nombre','required'])!!}
                    </div>
                </div>


            </div>
            <div class="form-group text-right">
                <a href="{{url('admin/tags')}}" class="btn btn-raised btn-primary">ver lista de tecnologias</a>
                {{ Form::submit('Registrar', ['class' => 'btn btn-raised btn-success']) }}

            </div>
            {!! Form::close() !!}

        </div>
    </div>
</div>
