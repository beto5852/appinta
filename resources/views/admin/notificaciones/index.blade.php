@extends('layouts.admin')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Notificaciones')

@section('breadcrumb')

    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="active">{!! Breadcrumbs::render('mensajes') !!}</li>
            </ol>
        </div>
    </section>

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

            <h2>Notificaciones no leidas</h2>

           <ul class="list-group-item">
               @foreach($unreadNotifications as $unreadNotification)
                   <li class="list-group-item">

                       <a href="{{($unreadNotification->data['link'])}}">
                           {{($unreadNotification->data['text'])}}
                       </a>
                       <form method="POST" action="{{route('notificaciones.read', $unreadNotification->id)}}" class="pull-right">
                          {{method_field('PATCH')}}
                           {{csrf_field()}}
                           <button class="btn btn-danger btn-xs">X</button>
                       </form>

                      </li>

                   @endforeach
           </ul>

        </div>
        <div class="col-md-6">

            <h2>Notificaciones leidas</h2>

            <ul class="list-group-item">
                @foreach($readNotifications as $readNotification)
                    <li class="list-group-item">
                        <a href="{{($readNotification->data['link'])}}">
                            {{($readNotification->data['text'])}}
                        </a>
                        <form method="POST" action="{{route('notificaciones.destroy', $readNotification->id)}}" class="pull-right">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                             <button class="btn btn-danger btn-xs" ><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                        </form>
                    </li>

                @endforeach
            </ul>

        </div>
    </div>

@endsection