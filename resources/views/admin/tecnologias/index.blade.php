@extends('layouts.admin')


@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de Tecnologias generadas por el INTA')

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('tecnologias') !!}</li>
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
            <button href="#" class="btn btn-raised btn-success" data-toggle="modal" data-target="#myModalTecnologias"><i class="fa fa-pagelines" aria-hidden="true"></i> Crear tecnológia</button>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="tags-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tecnológias</th>
                    <th>Rubro de la tecnológia</th>
                    {{--<th>cultivos de la tecnológia</th>--}}
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
    <div class="modal fade" id="myModalTecnologias" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(['url' => 'admin/tecnologias', 'method' => 'POST']) !!}

            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar etiquetas agropecuarias</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group {{$errors->has('nombre_tecnologia') ? 'has-error' : ''}}">
                        {!! Form::label('nombre_tecnologia','Nombre de la tecnológia') !!}
                        {!! Form::text('nombre_tecnologia',null,['class' =>'form-control', 'placeholder' =>'Nombre de la tecnológia','required'])!!}
                        {!! $errors->first('nombre_tecnologia','<span class="help-block">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('descripcion_tecnologia','Descripción de la tecnológia') !!}
                        {!! Form::textarea('descripcion_tecnologia',null,['class' => 'form-control','placeholder' => ''])!!}
                    </div>
                    <div class="form-group {{$errors->has('rubro_id') ? 'has-error' : ''}}">
                        {{ Form::label('rubro_id','Rubros  a los que se aplica esta tecnológia') }}
                        {{ Form::select('rubro_id[]',$rubros,old('rubro_id',$rubros),['class'=>'form-control chosen-select1','multiple']) }}
                        {!! $errors->first('rubro_id','<span class="help-block">:message</span>') !!}
                    </div>

                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{ Form::submit('Guardar tecnológia', ['class' => 'btn btn-primary btn-block']) }}
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
                "columnDefs": [{
                    "defaultContent": "-",
                    "targets": "_all"
                }],
                language : {
                    "url": '{!! asset('/adminlte/plugins/datatables/latino.json') !!}'
                },
                ajax: '{!! route('admin.tecnologias.datos.index') !!}',
                headers:{
                    'X-CSRF-TOKEN':'{{csrf_token()}}'
                },
                columns: [
                    { data: 'id', name: 'id'},
                    { data: 'nombre_tecnologia', name: 'nombre_tecnologia' },
                    {data: 'rubros', name: 'rubros', orderable: false, searchable: true},
                    { data: null, render: function (data, type ,row) {

//                     return  "<td><a href='#' class='btn btn-raised btn-success' role='button'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>"
                        return  '<td>'+
                                '<a href="{{url("admin/tecnologias/edit")}}/'+data.id+'" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>'+
                                '<form method="POST" action="{{url("admin/tecnologias")}}/'+data.id+'" style="display:inline" >'+
                                '{{ csrf_field() }} {{method_field("DELETE")}}'+
                                '<button class="btn btn-raised btn-danger" onclick="return confirm("Esta seguro de eliminar la práctica")"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>'+
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


    <script>
        $(".chosen-select1").chosen({
            placeholder_text_multiple: 'selecciones los rubros',
            no_results_text: "Sin resultados!",
            width: "100%"
        });

    </script>

@endsection








