{{--{{dd($anio)}}--}}
@extends('layouts.admin')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Bienvenido')

@section('breadcrumb')

        <ol class="breadcrumb">
                <li class="active">{!! Breadcrumbs::render('home') !!}</li>
        </ol>
@endsection

@section('content')

    @if(count($errors) > 0)

        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                @foreach($errors->all() as $mensaje)
                    <li>{{$mensaje}}</li>
                @endforeach
            </ul>
        </div>

    @endif


    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-info">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
        @endif


@if(Auth::user()->type == 'admin')
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


@else
<!-- row -->
      <div class="row">

        <div class="col-md-12">
          <!-- The time line -->
           
    
               <ul class="timeline">  
         @foreach($practicas as $practica)

           @foreach($practica->meses as $mes)
                           

                    <!-- timeline time label -->
                 {{-- @if($mes->nombre_mes == 'admin') --}}
                
                    <li class="time-label">
                          <span class="bg-red">
                            {{$mes->nombre_mes}}
                          </span>
                    </li>
                     
                    <!-- /.timeline-label -->
                    <!-- timeline item -->
                    <li>
                      <i class="fa  fa-calendar-check-o bg-blue"></i>

                      <div class="timeline-item">
                         @foreach($practica->semanas as $semana)
                        <span class="time"><i class="fa fa-clock-o"></i> {{$semana->nombre_semana}}</span>
                         @endforeach
                        <h3 class="timeline-header"><a href="#">{{$practica->nombre_practica}}</a></h3>

                        <div class="timeline-body">
                          {!! substr($practica->contenido,0,200) !!}
                        </div>
                        @foreach( $practica->etapas as $etapa)
                        <span class="time"><i class="fa fa-tags"></i> {{$etapa->nombre_etapa}}</span>
                        @endforeach
                        <div class="timeline-footer">
                          <a href="{{'admin/timelinemore'}}/{{$practica->slug}}" class="btn btn-primary btn-xs">Leer mas</a>
                          {{-- <a class="btn btn-danger btn-xs">Delete</a> --}}
                        </div>

                      </div>
                    </li>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    
                                   
                   @endforeach
                   @endforeach
                     <li>
                      <i class="fa fa-clock-o bg-gray"></i>
                    </li>
              </ul>        

        </div>
<center>{{ $practicas->links()}}</center>
        <!-- /.col -->
      </div>
      <!-- /.row -->
@endif


@endsection
