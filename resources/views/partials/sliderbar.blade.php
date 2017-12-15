<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">

                @if(empty(Auth::user()->perfil))
                    @if(Auth::user()->sexo == 'masculino'   )
                        <img src="{{asset('img/user_masculino.jpg')}}" class="img-circle" alt="User Image">
                    @else
                        <img src="{{asset('img/user_femenino.jpg')}}" class="img-circle" alt="User Image">
                    @endif
                @else
                    <img src="{{asset('img/')}}/{{$user->img_perfil}}" class="img-circle" alt="User Image">
                @endif

            </div>
            <div class="pull-left info">
                <p>{!! Auth::user()->name !!}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
       <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Busqueda...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">MENU</li>

            <!-- Optionally, you can add icons to the links -->
            <li {{request()->is('admin') ? 'class=active': ''}}>
                <a href="/admin"><i class="fa fa-home"></i> <span>INICIO</span></a></li>

            <!--  Menu USUARIOS -->

            <li class="treeview" {{request()->is('admin/users*')? 'active': ''}}>

                <a href="#"><i class="fa fa-users"></i>Usuarios</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li {{request()->is('admin/users/create') ? 'class=active': ''}}><a href="{{url('admin/users/create')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> Crear usuarios</a></li>
                    <li {{request()->is('admin/users/') ? 'class=active': ''}}><a href="{{url('admin/users/')}}"><i class="fa fa-users" aria-hidden="true"></i> Listar Usuarios</a></li>
                </ul>
            </li>

            <!--  Menu PRACTICAS AGRICOLAS -->

            <li class="treeview" {{request()->is('admin/practicas*') ? 'active': ''}}>

                <a href="#"><i class="fa fa-th-list"></i> <span>Prácticas Agricola</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/practicas/create')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Crear práctica agricola</a></li>
                    <li><a href="{{url('admin/practicas/')}}"><i class="fa fa-list" aria-hidden="true"></i> Listar prácticas</a></li>
                </ul>

            </li>

            <!--  Menu TECNOLOGIAS -->

            <li class="treeview" {{ request()->is('admin/tecnologias*') ? 'active': ''}}>
                <a href="#"><i class="fa fa-wrench"></i> <span>Tecnológias</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/tecnologias/create')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Crear tecnologia</li>
                    <li><a href="{{url('admin/tecnologias/')}}"><i class="fa fa-list" aria-hidden="true"></i> Listar tecnologia</a></li>
                </ul>
            </li>

            <!--  Menu CULTIVOS -->

            <li class="treeview" {{request()->is('admin/cultivos*') ? 'active': ''}}>
                <a href="#"><i class="fa fa-pagelines"></i> <span>Cultivos</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/cultivos/create')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Cultivo</a></li>
                    <li><a href="{{url('admin/cultivos/')}}"><i class="fa fa-list" aria-hidden="true"></i> Listar cultivos</a></li>
                    <li><a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Variedad</a></li>
                    <li><a href="#"><i class="fa fa-list" aria-hidden="true"></i> Listar Variedades</a></li>
                    <li><a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Caracteristica</a></li>
                    <li><a href="#"><i class="fa fa-list" aria-hidden="true"></i> Listar Caracteristica</a></li>

                </ul>

            </li>

            <!--  Menu ETAPAS -->

            <li class="treeview" {{request()->is('admin/etapas') ? 'active': ''}}>
                <a href="#"><i class="fa fa-list-alt"></i> <span>Etapas de Siembra</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar etapa de siembra</a></li>
                    <li><a href="#"><i class="fa fa-list" aria-hidden="true"></i> Listar etapas de siembra</a></li>
                </ul>
            </li>


            <!--  Menu TAGS -->

            <li class="treeview" {{request()->is('admin/tags') ? 'active': ''}}>
                <a href="#"><i class="fa fa-tags"></i> <span> Tags</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/tags/')}}"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Tags</a></li>
                    <li><a href="{{url('admin/tags/')}}"><i class="fa fa-list" aria-hidden="true"></i> Listar Tags</a></li>
                </ul>
            </li>

        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
