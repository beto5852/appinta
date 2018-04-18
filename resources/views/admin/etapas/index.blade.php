@extends('layouts.admin')


@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de etapas agricolas')
@section('header')
    <section class="content-header">
        <h1>
            Etapas Agricolas
            <small>Listado de las etapas agricolas</small>
        </h1>

    </section>
@endsection
@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('etapas') !!}</li>
    </ul>
@endsection

@section('content')
    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif

    <div class="box box-primary">
        <div class="box-header">
            {{--<h3 class="box-title">Listado de prácticas agricolas</h3>--}}
            <button href="#" class="btn btn-raised btn-success" data-toggle="modal" data-target="#myModalEtapas"><i class="fa fa-pagelines" aria-hidden="true"></i> Crear etapa agricola</button>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="etapa-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Etapa agricola </th>
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

    @section('etapas_index')
            <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="myModalEtapas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(['url' => 'admin/etapas', 'method' => 'POST']) !!}

            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar etapa agricola</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group {{$errors->has('nombre_etapa') ? 'has-error' : ''}}">
                        {{ Form::label('nombre_etapa','Nombre de la variedad agricola') }}
                        {{ Form::text('nombre_etapa',null,['class' =>'form-control', 'placeholder' =>'Nombre de la etapa agricola','required'])}}
                        {!! $errors->first('nombre_etapa','<span class="help-block">:message</span>') !!}
                    </div>

                </div>
                <div class="modal-footer">
                    {{ Form::submit('Guardar etapa', ['class' => 'btn btn-primary btn-block']) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>





    <script>

        $(function() {
            $('#etapa-table').DataTable({
                "processing": true,
                "serverSide": true,
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
                "pageLength": 5,
                "columnDefs": [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
                language : {
                    "url": '{!! asset('/adminlte/plugins/datatables/latino.json') !!}'
                },
                ajax: '{!! route('admin.etapas.datos.index') !!}',
                headers:{
                    'X-CSRF-TOKEN':'{{csrf_token()}}'
                },
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'nombre_etapa', name: 'nombre_etapa' },
//                    { data: 'action', name: 'action' },
                    { data: null, render: function (data, type ,row) {
                        return  '<td>'+
                                '<a href="{{url("admin/etapas/edit")}}/'+data.id+'" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>'+
                                '<form method="POST" action="{{url("admin/etapas")}}/'+data.id+'" style="display:inline" >'+
                                '{{ csrf_field() }} {{method_field("DELETE")}}'+
                                '<button class="btn btn-raised btn-danger" onclick="return confirm("Esta seguro de eliminar la etapa")"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>'+
                                '</form>'+
                                '</td>'

                    }}
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

@endsection








