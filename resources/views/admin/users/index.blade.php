@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de usuarios ')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('users') !!}</li>
    </ul>
@endsection


@section('content')

    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif

    <div class="row">
        <div class="col-xs-8">
            <div class="form-group">
                <a href="{{url('admin/users/create')}}" class="btn btn-raised btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Crear Usuario</a>
            </div>
        </div>
        <div class="col-xs-2">
            {!! Form::open(['url' => ['admin/users'], 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'aria-describedby' => 'search']) !!}

            <div class="input-group">
                {!! Form::text('search',null,['class' =>'form-control', 'placeholder' =>'Buscar','aria-describedby' => 'search'])!!}
                <span id="search" class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <center>{{ $users->links() }}</center>
    <table class="table table-striped table-hover" >
        <thead>
        <tr >

            <th>Nombre y Apellidos</th>
            <th>Correo</th>
            <th>Tipo usuario</th>
            <th>Foto de perfil</th>
            <th>Acciones</th>

        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr class="info">
                <td>{{  $user->name}}</td>
                <td>{{  $user->email}}</td>

                @if($user->type=='admin')
                    <td><span class="label label-primary">{{  $user->type}}</span></td>
                @elseif($user->type=='miembro')
                    <td><span class="label label-danger">{{  $user->type}}</span></td>
                @endif
                <td>
                @if(empty($user->profiles()->first()->perfil))
                    @if(empty($user->perfil))
                        @if($user->sexo == 'masculino')
                           <img class="profile-user-img img-responsive img-circle" src="{{asset('img/user_masculino.jpg')}}" alt="User profile picture">
                        @elseif($user->sexo == 'femenino')
                            <img class="profile-user-img img-responsive img-circle" src="{{asset('img/user_femenino.jpg')}}" alt="User profile picture">
                        @endif
                    @else
                        <img class="profile-user-img img-responsive img-circle" src="{{asset('img/')}}/{{$user->perfil}}" alt="User profile picture">
                    @endif
                @else
                    <img class="profile-user-img img-responsive img-circle" src="{{$user->profiles()->first()->perfil}}" alt="User profile picture">
                @endif
                </td>
                <td>
                    <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    <button class="btn btn-raised btn-danger" data-toggle="modal" style="position: absolute" data-url="{!! URL::route('admin.users.destroy', $user->id) !!}" data-id="{{$user->id}}" data-target="#custom-width-modal" ><i class="fa fa-trash-o" aria-hidden="true" ></i></button>

                    <!-- Delete Model -->
                    <form action="{{url('admin/users/'.$user->id)}}" method="POST" class="remove-record-model">
                        {{method_field('DELETE')}}{{csrf_field()}}
                        <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog" style="width:30%;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="custom-width-modalLabel">Eliminar Usuario</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Esta seguro de eliminar al usuario?</h4>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default waves-effect remove-data-from-delete-form" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger waves-effect waves-light">Eliminar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>




                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    <center>{{ $users->links() }}</center>



@endsection