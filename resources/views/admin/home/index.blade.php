@extends('layouts.admin')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Bienvenido')

@section('breadcrumb')

    <section id="breadcrumb">
        <div class="container">
            <ol class="breadcrumb">
                <li class="active">{!! Breadcrumbs::render('home') !!}</li>
            </ol>
        </div>
    </section>

@endsection

@section('content')

    @if(Session::has('message-error'))
        <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message-error')}}
        </div>
    @endif

    <section id="main">
        <div class="container">


            <div class="jumbotron col-md-3">

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Listar opciones</h3>
                    </div>
                    <div class="panel-body">

                        <div class="col-md-15">

                            <div class="list-group">
                                <div class="list-group-item">
                                    <a href="#" class="list-group-item"><i class="fa fa-list" aria-hidden="true"></i> Tegnológias <span class="badge">{!! $totalusers->count() !!}</span></a>
                                </div>
                                <div class="list-group-separator"></div>
                                <div class="list-group-item">
                                    <a href="#" class="list-group-item"><i class="fa fa-list" aria-hidden="true"></i> Prácticas <span class="badge">{!! $totaltecnologias->count() !!}</span></a>
                                </div>
                                <div class="list-group-separator"></div>
                                <div class="list-group-item">
                                    <a href="#" class="list-group-item"><i class="fa fa-list" aria-hidden="true"></i> Cultivos <span class="badge">{!! $totalcultivos->count() !!}</span></a>
                                </div>
                                <div class="list-group-separator"></div>
                                <div class="list-group-item">
                                    <a href="#" class="list-group-item"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Etapas <span class="badge">12</span></a>
                                </div>
                                <div class="list-group-separator"></div>
                                <div class="list-group-item">
                                    <a href="#" class="list-group-item"><i class="fa fa-tags" aria-hidden="true"></i> Tags <span class="badge">33</span></a>
                                </div>
                                <div class="list-group-separator"></div>
                                <div class="list-group-item">
                                    <a href="#" class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i></span> Calendario <span class="badge">203</span></a>
                                </div>
                                <div class="list-group-separator"></div>

                            </div>



                        </div>

                    </div>
                </div>
            </div>



            <div class="jumbotron col-md-8">
                <!-- Website Overview -->
                <div class="panel panel-success">
                    <div class="panel-heading main-color-bg">
                        <h3 class="panel-title">Reportes</h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> {!! $totalusers->count() !!}</h2>
                                <h4>Usuarios</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> {!! $totaltecnologias->count() !!}</h2>
                                <h4>Tecnológias</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> {!! $totalpracticas->count() !!}</h2>
                                <h4>Prácticas</h4>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="well dash-box">
                                <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 0</h2>
                                <h4>Visitantes</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Users -->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ultimos usuarios agregados</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover" >
                            <thead>
                            <tr >

                                <th>Nombre y Apellidos</th>
                                <th>Correo</th>
                                <th>Fecha</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr class="info">
                                    <td>{{  $user->name}}</td>
                                    <td>{{  $user->email}}</td>
                                    <td>{{  $user->created_at}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                            <ul class="pager"><center>{{ $users->links() }}</center></ul>
                        </table>
                    </div>
                </div>
            </div>

            <div class="jumbotron col-md-11">
                <!-- Latest tecnologias -->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ultimos prácticas registradas</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover" >
                            <thead>
                            <tr class="success">

                                <th>Nombre y Apellidos</th>
                                <th>credo por</th>
                                <th>Fecha</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($practicas as $practica)
                                <tr class="info">
                                    <td>{{  substr($practica->nombre_practica,0,50)}}</td>
                                    <td>{{  $practica->user['name']}}</td>
                                    <td>{{  $practica->created_at}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                            <ul class="pager"><center>{{ $users->links() }}</center></ul>
                        </table>
                    </div>
                </div>
            </div>
            <div class="jumbotron col-md-11">
                <!-- Latest tecnologias -->
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ultimos tecnologias registradas</h3>
                    </div>
                    <div class="panel-body">
                        <table class="table table-striped table-hover" >
                            <thead>
                            <tr class="success">

                                <th>Nombre y Apellidos</th>
                                <th>Fecha</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tecnologias as $tecnologia)
                                <tr class="info">
                                    <td>{{  substr($tecnologia->nombre_tecnologia,0,50)}}</td>
                                    <td>{{  $tecnologia->created_at}}</td>

                                </tr>
                            @endforeach
                            </tbody>
                            <ul class="pager"><center>{{ $users->links() }}</center></ul>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </section>


    <footert>

        <div class="container">
            <p class="text-center"> Derechos Reservados INTA &copy; 2017
                Contiguo a la Policía Nacional del Distrito 5, Managua
                Telf.: 505-22780471 Email:<a href="#" class="alert-link">oaip@inta.gob.ni</a></p>
        </div>

    </footert>

@endsection