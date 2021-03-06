@extends('layouts.admin')


@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de variedades agricolas')
@section('header')
    <section class="content-header">
        <h1>
            Variedades Agricolas
            <small>Listado de las variedades agricolas</small>
        </h1>

    </section>
@endsection
@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('variedades') !!}</li>
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
            <button href="#" class="btn btn-raised btn-success" data-toggle="modal" data-target="#myModalVariedades"><i class="fa fa-pagelines" aria-hidden="true"></i> Crear variedad</button>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="variedades-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Variedad </th>
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

    @section('variedades')
            <!-- Modal -->
    <!-- Modal -->
    <div class="modal fade" id="myModalVariedades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(['url' => 'admin/variedades', 'method' => 'POST']) !!}

            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar variedad agricola</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group {{$errors->has('nombre_variedad') ? 'has-error' : ''}}">
                        {{ Form::label('nombre_variedad','Nombre de la variedad agricola') }}
                        {{ Form::text('nombre_variedad',null,['class' =>'form-control', 'placeholder' =>'Nombre de la variedad agricola','required'])}}
                        {!! $errors->first('nombre_variedad','<span class="help-block">:message</span>') !!}
                    </div>

                </div>
                <div class="modal-footer">
                    {{ Form::submit('Guardar Variedad', ['class' => 'btn btn-primary btn-block']) }}
                </div>
            </div>
            {!! Form::close() !!}
        </div>

    </div>



    <script>

        $(function() {
            $('#variedades-table').DataTable({
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
                ajax: '{!! route('admin.variedades.datos.index') !!}',
                headers:{
                    'X-CSRF-TOKEN':'{{csrf_token()}}'
                },
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'nombre_variedad', name: 'nombre_variedad' },
                    { data: null, render: function (data, type ,row) {
                        return  '<td>'+
                                '<a href="{{url("admin/variedades/edit")}}/'+data.id+'" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>'+
                                '<form method="POST" action="{{url("admin/variedades")}}/'+data.id+'" style="display:inline" >'+
                                '{{ csrf_field() }} {{method_field("DELETE")}}'+
                                '<button class="btn btn-raised btn-danger" onclick="return confirm("Esta seguro de eliminar la variedad")"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>'+
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








