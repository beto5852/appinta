@extends('layouts.admin')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Bienvenido')

@section('breadcrumb')

        <ol class="breadcrumb">
                <li class="active">{!! Breadcrumbs::render('home') !!}</li>
        </ol>
@endsection

@section('content')

        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{!! $totaltecnologias->count() !!}</h3>

                        <p>Tecnologias</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{url('admin/tecnologias/')}}" class="small-box-footer">Ver tecnologias <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{!! $totalpracticas->count() !!}</h3>

                        <p>Prácticas agricolas</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{url('admin/practicas/')}}" class="small-box-footer">Ver Prácticas <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3>{!! $totalusers->count() !!}</h3>

                        <p>Usuarios Registrados</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{url('admin/users/')}}" class="small-box-footer">Ver usuarios <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3>{!! $activities->count() !!}</h3>

                        <p>Usuario en linea</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">Ver actividad <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

      <div class="row">
        <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Ultimos usuarios agregados</h3>

                    <div class="box-tools pull-right">
                        <span class="label label-danger">{!! $users->count() !!} ultmos agregados</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        @foreach($users as $user)
                        <li>

                            @if(empty($user->perfil))

                                @if($user->sexo == 'masculino')
                                    <img src="{{asset('img/user_masculino.jpg')}}" class="img-circle" alt="User Image">
                                @else
                                    <img src="{{asset('img/user_femenino.jpg')}}" class="img-circle" alt="User Image">
                                @endif
                            @else
                                <img src="{{asset('img/'.$user->perfil)}}" class="img-circle" alt="User Image">
                            @endif

                            <a class="users-list-name" href="{{url('admin/users/'.$user->id)}}">{{  $user->name}}</a>
                            <span class="users-list-date">{{  $user->created_at->format('M d')}}</span>
                        </li>
                        @endforeach

                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{asset('admin/users/')}}" class="uppercase">Ver Todos los usuarios</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>
        <!-- /.col 1-->
<div class="col-md-6">
            <!-- USERS LIST -->
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Usuarios en linea</h3>

                    <div class="box-tools pull-right">
                        <span class="label label-danger">{!! $activities->count() !!} usuario online</span>
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                        @foreach($activities as $activity)
                        <li>

                            @if(empty(Auth::user()->perfil))

                                @if(Auth::user()->sexo == 'masculino')
                                    <img src="{{asset('img/user_masculino.jpg')}}" class="img-circle" alt="User Image">
                                    <a class="users-list-name" href="{{url('admin/users/'.$activity->user->id)}}">{{  $activity->user->name}}</a>

                            <span class="users-list-date">{{ $activity->user->type}}</span>
                            <a href="{{url('admin/users/'.$activity->user->id)}}"><i class="fa fa-circle text-success"></i> Online</a>
                                @else
                                    <img src="{{asset('img/user_femenino.jpg')}}" class="img-circle" alt="User Image">
                                    <a class="users-list-name" href="{{url('admin/users/'.$activity->user->id)}}">{{  $activity->user->name}}</a>

                            <span class="users-list-date">{{ $activity->user->type}}</span>
                            <a href="{{url('admin/users/'.$activity->user->id)}}"><i class="fa fa-circle text-success"></i> Online</a>
                                @endif
                            @else
                                <img src="{{asset('img/'.$activity->user->perfil)}}" class="img-circle" alt="User Image">
                          

                            <a class="users-list-name" href="{{url('admin/users/'.$activity->user->id)}}">{{  $activity->user->name}}</a>

                            <span class="users-list-date">{{ $activity->user->type}}</span>
                            <a href="{{url('admin/users/'.$activity->user->id)}}"><i class="fa fa-circle text-success"></i> Online</a>
                              @endif
                        </li>
                        @endforeach

                    </ul>
                    <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                    <a href="{{asset('admin/users/')}}" class="uppercase">Ver Todos los usuarios</a>
                </div>
                <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>
        <!-- /.col -->

      </div>
        <!-- /.row -->

@endsection