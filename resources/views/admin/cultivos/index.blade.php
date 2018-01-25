@extends('layouts.admin')


@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de Tecnologias generadas por el INTA')
@section('header')
    <section class="content-header">
        <h1>
            Cultivos Agricolas
            <small>Listado de cultivos</small>
        </h1>

    </section>
@endsection
@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('cultivos') !!}</li>
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

    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif

    <div class="box box-primary">
        <div class="box-header">
            {{--<h3 class="box-title">Listado de prácticas agricolas</h3>--}}
            <button href="#" class="btn btn-raised btn-success" data-toggle="modal" data-target="#myModalCultivos"><i class="fa fa-pagelines" aria-hidden="true"></i> Crear cultivo</button>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="tags-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Lista de cultivos</th>
                    <th>Rubro al que pertenece</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
@endsection

@section('cultivos')
            <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="myModalCultivos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(['url' => 'admin/cultivos', 'method' => 'POST']) !!}

            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar etiquetas agropecuarias</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group {{$errors->has('nombre_cultivo') ? 'has-error' : ''}}">
                        {!! Form::label('nombre_cultivo','Nombre del cultivo') !!}
                        {!! Form::text('nombre_cultivo',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
                        {!! $errors->first('nombre_cultivo','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('descripcion_cultivo','Descripción de la tecnológia') !!}
                        {!! Form::textarea('descripcion_cultivo',null,['class' => 'form-control','placeholder' => ''])!!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('rubro_id','Rubro al que pertenece') }}
                        {{ Form::select('rubro_id',$rubro,old('rubro_id',$rubro),['class'=>'form-control select2','required'])}}
                    </div>
                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{ Form::submit('Guardar Cultivo', ['class' => 'btn btn-primary btn-block']) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>


    </div>



    <script>

        $(function() {
            $('#tags-table').DataTable({
                "processing": true,
                "serverSide": true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "pageLength": 10,
                language : {
                    "url": '{!! asset('/adminlte/plugins/datatables/latino.json') !!}'
                },
                ajax: '{!! route('admin.cultivos.datos.index') !!}',
                headers:{
                    'X-CSRF-TOKEN':'{{csrf_token()}}'
                },
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'nombre_cultivo', name: 'nombre_cultivo' },
                    { data: 'nombre_rubro', name: 'nombre_rubro'},
                    { data: null, render: function (data, type ,row) {

//                     return  "<td><a href='#' class='btn btn-raised btn-success' role='button'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>"
                        return  '<td>'+
                                '<a href="{{url("admin/cultivos/edit")}}/'+data.id+'" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>'+
                                '<form method="POST" action="{{url("admin/cultivos")}}/'+data.id+'" style="display:inline" >'+
                                '{{ csrf_field() }} {{method_field("DELETE")}}'+
                                '<button class="btn btn-raised btn-danger" onclick="return confirm("Esta seguro de eliminar la práctica")"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>'+
                                '</form>'+
                                '</td>'

                    }},


                ]
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

        CKEDITOR.replace('my-editor1', options);
        CKEDITOR.config.height = 150;


    </script>

    <script>
        $(".select2").select2({

            width:'100%'
        });

    </script>

@endsection

