@extends('layouts.front')

@section('title','<i class="fa fa-home" aria-hidden="true"></i>'.' '.'Bienvenido')

@section('content')

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('home') !!}</li>
    </ul>
@endsection
<div class="row">
    <div class="jumbotron col-md-8"><h1>Labores Agrícolas de la semana</h1>

        <article>
            <h2>{{$practicas->nombre_practica}}</h2>
            <div class="row">
                <div class="col-md-8">
                    <i class="fa fa-folder-open" aria-hidden="true"></i>{{$practicas->tecnologia->nombre_tecnologia}}
                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>{{$practicas->user->name}}
                </div>
                <div class="col-md-4">
                    <i class="fa fa-calendar-o" aria-hidden="true"></i> {{$practicas->created_at}}
                </div>
            </div>
            <br>
            @if(empty($practicas->path))
                <img src="{{asset('img/no-imagen.jpg')}}" class="img-responsive" width="100%">
            @else
                <img src="{{asset('img/')}}/{{$practicas->path}}" class="img-responsive" width="100%">
            @endif
            <br>
            <p>{!! substr($practicas->contenido,0,10000) !!} </p>

        </article>

    </div>

    <div class="jumbotron col-md-4">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Tecnologias</h3>
            </div>
            <div class="panel-body">

                <div class="list-group">
                    <div class="list-group-item">
                        <div class="row-picture">
                            <img class="circle" src="{{asset('img/cultivomaiz.jpg')}}" alt="icon">
                        </div>
                        <div class="row-content">
                            <h4 class="list-group-item-heading">Tile with avatar</h4>

                            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus</p>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                    <div class="list-group-item">
                        <div class="row-picture">
                            <img class="circle" src="{{asset('img/cultivomaiz.jpg')}}" alt="icon">
                        </div>
                        <div class="row-content">
                            <h4 class="list-group-item-heading">Tile with another avatar</h4>

                            <p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                </div>

            </div>
        </div>
    </div>


    <div class="jumbotron col-md-4">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Proximas Labores</h3>
            </div>
            <div class="panel-body">

                <div class="list-group">
                    <div class="list-group-item">
                        <div class="row-picture">
                            <img class="circle" src="{{asset('img/cultivomaiz.jpg')}}" alt="icon">
                        </div>
                        <div class="row-content">
                            <h4 class="list-group-item-heading">Tile with avatar</h4>

                            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus</p>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                    <div class="list-group-item">
                        <div class="row-picture">
                            <img class="circle" src="{{asset('img/cultivomaiz.jpg')}}" alt="icon">
                        </div>
                        <div class="row-content">
                            <h4 class="list-group-item-heading">Tile with another avatar</h4>

                            <p class="list-group-item-text">Maecenas sed diam eget risus varius blandit.</p>
                        </div>
                    </div>
                    <div class="list-group-separator"></div>
                </div>

            </div>
        </div>
    </div>



</div>


<footert>

    <div class="container">
        <p class="text-center"> Derechos Reservados INTA &copy; 2017
            Contiguo a la Policía Nacional del Distrito 5, Managua
            Telf.: 505-22780471 Email:<a href="#" class="alert-link">oaip@inta.gob.ni</a></p>
    </div>

</footert>
@endsection

