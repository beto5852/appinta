@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Practica')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('practicas.edit') !!}</li>
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
        {!! Form::open(['url' => ['admin/practicas',$practica], 'method' => 'PUT','enctype' => 'multipart/form-data','files'=> 'true']) !!}

        <div class="col-md-8">
            <div class="box box-primary">

                <!--Aqui va el formulario de la practica agricola-->

                <div class="box-body">


                    <div class="form-group">
                        {{ Form::label('nombre_practica','Nombre de la labor agricola') }}
                        {{ Form::text('nombre_practica',$practica->nombre_practica,['class' =>'form-control', 'placeholder' =>'Nombre practica','required'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('tecnologia','Tecnológia') }}
                        {{ Form::select('practica_id_tecnologia',$tecnologias,$practica->tecnologia->id,['class' => 'form-control'])}}
                    </div>
                </div>


                <div class="form-group">
                    {{  Form::textarea('contenido',$practica->contenido,['id' => 'my-editor','class' => 'my-editor']) }}

                </div>




            </div>
        </div>
        <div class="col-md-4">
            <div class="box box-primary">

                <!-- Date -->
                <div class="form-group">
                    <label>Fecha de publicación:</label>

                    <div class="input-group date">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>

                        <input type="text" class="form-control pull-right" id="datepicker">

                        {{ Form::text('publish_at','',['class' => 'form-control pull-right', 'id' => 'datepicker',]) }}
                    </div>
                    <!-- /.input group -->
                </div>

                <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('user','Cambiar editor') }}
                        {{ Form::select('practica_id_usuario',$users,null,['class' => 'form-control'])}}
                    </div>

                    @if(empty($practica->path))
                        <img src="{{asset('img/no-imagen.jpg')}}" alt="" style="width: 100px;" />
                    @else
                        <img src="{{asset('img/')}}/{{$practica->path}}" alt="" style="width: 100px;" />
                    @endif
                    <div class="form-group">
                        {{ Form::label('imagen','Imagen de la práctica') }}
                        {{ Form::file('path')}}
                    </div>

                <!--    <div class="form-group">

                        <label>Multiple</label>
                    <select class="form-control select2" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                  </div>-->

                    <div class="form-group">

                        {{ Form::label('pt_id_tags','Tags') }}
                        {{ Form::select('pt_id_tags[]',$tags,$my_tags,['class'=>'form-control select2', 'multiple','style' => '100%', 'required' ]) }}


                    </div>
                    <div class="form-group text-right">

                        {{ Form::submit('Actualizar Práctica Agricola', ['class' => 'btn btn-primary btn-block']) }}

                    </div>

                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>

@endsection


@section('styles')

    <link rel="stylesheet" href="{{asset('adminlte/plugins/datepicker/datepicker3.css')}}">

    @endsection

    @section('script')
            <!-- bootstrap datepicker -->
    <script src="adminlte/plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Select2 -->

    <script src="{{asset('adminlte/plugins/select2/select2.full.min.js')}}"></script>

    <script>
        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        });
    </script>

@endsection














