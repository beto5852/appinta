@extends('layouts.app')

@section('title','<i class="fa fa-sign-in" aria-hidden="true"></i>'.' '.'Accerder')


@section('content')

    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Acceso a practicas tecnologias</div>
                <div class="panel-body">

                    {!! Form::open(['route' => 'login.store','method' => 'POST'], ['class' => 'form-control', 'role' => 'form']) !!}


                    <div class="form-group">
                        {!! Form::label('email','Correo electrónico',['class' =>'form-control']) !!}
                        {!! Form::email('email',null,['class' =>'form-control', 'placeholder' =>'example@gmail.com','required'])!!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password','Contraseña',['class' =>'form-control']) !!}
                        {!! Form::password('password',['class' =>'form-control', 'placeholder' =>'','required'])!!}
                    </div>




                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <div class="checkbox">
                                <a href="{{url('admin/users')}}" class="text-info">recuperar password</a>

                                {{ Form::submit('Entrar', ['class' => 'btn btn-info']) }}

                            </div>
                        </div>
                    </div>


                    {!! Form::close() !!}

                </div>

            </div>
        </div>
    </div>

@endsection