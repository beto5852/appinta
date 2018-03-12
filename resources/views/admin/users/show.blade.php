@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Usuario')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('users.show') !!}</li>
    </ul>
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



    <div class="row">

        <div class="col-md-6">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">


                    @if(empty(Auth::user()->profiles()->first()->perfil))
                        @if(empty($user->perfil))
                            @if($user->sexo == 'masculino'   )
                                <td><img class="profile-user-img img-responsive img-circle" src="{{asset('img/user_masculino.jpg')}}" style = "width: 100px;"  alt="User Image"></td>
                            @else
                                <td><img class="profile-user-img img-responsive img-circle" src="{{asset('img/user_femenino.jpg')}}"style = "width: 100px;"   alt="User Image"></td>
                            @endif
                        @else
                        <td><img src="{{asset('img/'.$user->perfil)}}" style = "width: 100px;" class="profile-user-img img-responsive img-circle" alt="User Image"></td>
                        @endif
                    @else
                        <td><img src="{{Auth::user()->profiles()->first()->perfil}}" style = "width: 100px;" class="profile-user-img img-responsive img-circle" alt="User Image"></td>
                     @endif


                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                    <p class="text-muted text-center">{{$user->type}}</p>

                    <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-primary btn-block"><b>Editar perfil</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>

        <div class="col-md-6">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Acerca de mi</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Ocupación</strong>

                    <p class="text-muted">
                       {{ $user->ocupacion }}
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Pais</strong>

                    <p class="text-muted">{{$user->pais}}</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Teléfono</strong>

                    <p>

                        <span class="label label-primary">{{$user->telefono}}</span>

                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Más de mi</strong>

                    <p>{{$user->notas}}</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        </div>



    </div>

@endsection