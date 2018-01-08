@extends('layouts.admin')


@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de Practicas')

@section('header')
    <section class="content-header">
        <h1>
            Practicas Agricolas
            <small>Listado de las practicas generadas por el INTA</small>
        </h1>

    </section>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('practicas') !!}</li>
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
        {{--<div class="col-xs-8">--}}
            {{--<div class="form-group">--}}
                {{--<a href="{{url('admin/practicas/create')}}" class="btn btn-raised btn-success"><i class="fa fa-user-plus" aria-hidden="true"></i> Crear Práctica</a>--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="col-xs-2">
            {!! Form::open(['url' => ['admin/practicas'], 'method' => 'GET', 'class' => 'navbar-form navbar-left', 'aria-describedby' => 'search']) !!}


            <div class="input-group pull-right">
                {!! Form::text('search',null,['class' =>'form-control', 'placeholder' =>'Buscar','aria-describedby' => 'search'])!!}
                <span id="search" class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
            </div>


            {!! Form::close() !!}
        </div>
    </div>


    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Listado de prácticas agricolas</h3>
            <a href="#" class="btn btn-raised btn-success pull-right" data-toggle="modal" data-target="#myModal"><i class="fa fa-user-plus" aria-hidden="true"></i> Crear Práctica</a>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="practicas-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Práctica</th>
                    <th>creado por:</th>
                    <th>Tecnológia</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
                </thead>
               <tbody>

               @foreach($practicas as $practica)
                   <tr class="info">
                       <td>{{  $practica->id }}</td>
                       <td>{{  $practica->nombre_practica}}</td>
                       <!--  <td>{!! $practica->contenido !!}</td>-->
                       <td>{{  $practica->user['name']}}</td>
                       <td>{{  $practica->tecnologia['nombre_tecnologia']}}</td>
                       @if(empty($practica->path))
                           <td><img src="{{asset('img/no-imagen.jpg')}}" style = "width: 100px;"></td>
                       @else
                           <td><img src="{{asset('img/')}}/{{$practica->path}}" style = "width: 100px;"></td>
                       @endif
                       <td>
                           <a href="{{url('admin/practicas/'.$practica->id.'/edit')}}" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                           <form method="POST" action="{{route('admin.practicas.destroy',$practica->id)}}" style="display:inline" >
                               {{ csrf_field() }} {{method_field('DELETE')}}

                               <button class="btn btn-raised btn-danger" onclick="return confirm('Esta seguro de eliminar la práctica')"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>

                           </form>
                           <a href="{{'timelinemore'}}/{{$practica->slug}}" class="btn btn-raised btn-info" role="button" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a>
                       </td>
                   </tr>
               @endforeach


               </tbody>


            </table>
            <center>{{ $practicas->links() }}</center>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->



@endsection




@section('script')


        <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(['url' => 'admin/practicas','method' => 'POST','files'=> 'true','enctype' => 'multipart/form-data']) !!}
            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">


                    <div class="form-group {{$errors->has('nombre_practica') ? 'has-error' : ''}}" >
                        {{ Form::label('Practica','Tema de la práctica agrícola') }}
                        {{ Form::text('nombre_practica','',['class' => 'form-control','placeholder' => 'Tema aquí...','value' => 'old(nombre_practica)' ]) }}

                        {!! $errors->first('nombre_practica','<span class="help-block">:message</span>') !!}
                    </div>


                    <div class="form-group {{$errors->has('contenido') ? 'has-error' : ''}}">
                        {{ Form::label('Agregue el contenido','Agregue el contenido') }}
                        {{ Form::textarea('contenido',null,['id' => 'my-editor','class' => 'my-editor','value' => 'old(contenido)'])}}
                        {!! $errors->first('contenido','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">

                        {{ Form::label('Fechas de la practica','Fechas de la practica') }}

                                    <table class="table table-bordered ">
                                        <thead>
                                        <th>Mes</th>
                                        <th>Semana</th>
                                        <th><a href="#" class="addRow" id="addRow"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a></th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td class="col-sm-4">{!! Form::select('mes_id[]',$meses,null,['class' => 'form-control chosen-select','value' => 'old(mes_id[]) == $meses->id ? selected :'])!!}</td>
                                            <td class="col-sm-5">{!! Form::select('semana_id[]',$semanas,null,['class' => 'form-control chosen-select','value' => 'old(semana_id[]) == $semanas->id ? selected :'])!!}</td>
                                            {{--          <td style="display:inline;"><a href="#" class="btn btn-danger remove" ><i class="fa fa-trash-o" aria-hidden="true" ></a></td> --}}

                                        </tr>
                                        </tbody>
                                    </table>

                    </div>

                    <div class="form-group">
                                    {{ Form::label('Tecnologia','Tipo de tecnológia') }}
                                    {{ Form::select('tecnologia_id',$tecnologias,null,['class' => 'form-control chosen-select','value' => 'old(tecnologia_id) == $tecnologias->id ? selected :'])}}
                    </div>

                    <div class="form-group">
                                    {{ Form::hidden('usuario_id',Auth::user()->id,null,['class' => 'form-control'])}}
                    </div>
                    <div class="form-group">
                                    {{ Form::label('path','Imagen de la práctica') }}
                                    {{ Form::file('path')}}
                    </div>

                    <div class="form-group {{$errors->has('contenido') ? 'has-error' : ''}}">
                                    {{ Form::label('tag_id','Etiquetas agropecuarias') }}
                                    {{ Form::select('tag_id[]',$tags,null,['class'=>'form-control chosen-select','multiple','data-placeholder' => 'Agrega los tags para tu práctica agricola','value' => 'old(tag_id[])']) }}
                                    {!! $errors->first('tag_id','<span class="help-block">:message</span>') !!}
                    </div>


                    <div class="form-group">
                        <div  class="dropzone">

                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    {{ Form::submit('Guardar Práctica Agricola', ['class' => 'btn btn-primary btn-block']) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>



    <script>
        $(function () {
            $('#practicas-table').DataTable({
                "paging": false,
                "lengthChange": true,
                "searching": false,
                "ordering": true,
                "info": false,
                "autoWidth": false
            });
        });
    </script>

    <script>
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>


    <script>
        CKEDITOR.replace('my-editor', options);
    </script>

    <script>
        $(".chosen-select").chosen({width: "100%"});
    </script>

    <script>
        //Date picker
        $('#datepicker').datepicker({
            format: "dd/mm/yyyy",
            lenguage: 'es',
            autoclose: true,

        });

        var accept = ".png";

        var myDropzone = new Dropzone('.dropzone',{
            url : '/admin/practicas/',
            dictDefaultMessage: 'Arrastra las fotos aqui para subirlas',

        });
        Dropzone.autoDiscover = false;

    </script>




@endsection