@extends('layouts.admin')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Notificaciones')

@section('header')
    <section class="content-header">
        <h1>
            Sección de Notificaciones
            <small>Lista de notificaciones leídas y no leídas</small>
        </h1>

    </section>
@endsection

@section('breadcrumb')


    <ol class="breadcrumb">
        <li class="active">{!! Breadcrumbs::render('notificaciones') !!}</li>
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

                <!-- Content Wrapper. Contains page content -->


        <!-- Main content -->
        <section class="content">
            <div class="row">

                <!-- /.col -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Notificaciones no leídas</h3>

                            {{--<div class="box-tools pull-right">--}}
                            {{--<div class="has-feedback">--}}
                            {{--<input type="text" class="form-control input-sm" placeholder="Search Mail">--}}
                            {{--<span class="glyphicon glyphicon-search form-control-feedback"></span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                                    <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <tbody>

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

                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                    </div>
                </div>
                <!-- /.col -->




                <!-- /.col -->
                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Notificaciones leídas</h3>

                            {{--<div class="box-tools pull-right">--}}
                            {{--<div class="has-feedback">--}}
                            {{--<input type="text" class="form-control input-sm" placeholder="Search Mail">--}}
                            {{--<span class="glyphicon glyphicon-search form-control-feedback"></span>--}}
                            {{--</div>--}}
                            {{--</div>--}}
                                    <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body no-padding">

                            <div class="table-responsive mailbox-messages">
                                <table class="table table-hover table-striped">
                                    <tbody>

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


                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                            <!-- /.mail-box-messages -->
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>

@endsection