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
                @if(empty($user->perfil))
                    @if($user->sexo == 'masculino')
                        <td><img class="profile-user-img img-responsive img-circle" src="{{asset('img/user_masculino.jpg')}}" alt="User profile picture"></td>
                    @elseif($user->sexo == 'femenino')
                        <td><img class="profile-user-img img-responsive img-circle" src="{{asset('img/user_femenino.jpg')}}" alt="User profile picture"></td>
                    @endif
                @else
                    <td><img src="{{asset('img/')}}/{{$user->perfil}}" style = "width: 100px;" class="img-circle" alt="User Image"></td>
                @endif
                </td>
                <td>
                    <a href="{{url('admin/users/'.$user->id.'/edit')}}" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                    <form method="POST" action="{{route('admin.users.destroy',$user->id)}}" style="display:inline" >
                        {{ csrf_field() }} {{method_field('DELETE')}}

                        <button class="btn btn-raised btn-danger" onclick="return confirm('Esta seguro de eliminar al usuario')"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>

                    </form>

                </td>
            </tr>
        @endforeach

        </tbody>

    </table>
    <center>{{ $users->links() }}</center>


@endsection