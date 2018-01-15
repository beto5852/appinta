@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de usuarios ')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('tags') !!}</li>
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
            <button href="#" class="btn btn-raised btn-success pull-right" data-toggle="modal" data-target="#myModalTags"><i class="fa fa-tag" aria-hidden="true"></i> Crear etiquetas</button>
            <div class="col-xs-2">
                {!! Form::open(['url' => ['admin/tags'], 'method' => 'GET', 'class' => 'navbar-form navbar-rigth']) !!}

                <div class="input-group">
                    {!! Form::text('search',null,['class' =>'form-control', 'placeholder' =>'Buscar','aria-describedby' => 'search'])!!}
                    <span id="search" class="input-group-addon"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></span>
                </div>

                {!! Form::close() !!}
            </div>

        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table id="tags-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Tag</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>

               {{--  @foreach($tags  as $tag)
                    <tr class="info">
                        <td>{{  $tag->id}}</td>
                        <td>{{  $tag->nombre_tags}}</td>
                        <td>
                            <a href="{{url('admin/tags/'.$tag->id.'/edit')}}" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                            <form method="POST" action="{{route('admin.tags.destroy',$tag->id)}}" style="display:inline" >
                                {{ csrf_field() }} {{method_field('DELETE')}}

                                <button class="btn btn-raised btn-danger" onclick="return confirm('Esta seguro de eliminar el tag')"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>

                            </form>

                        </td>
                    </tr>
                @endforeach
 --}}
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    {{-- <ul class="pager"><center>{{ $tags->links() }}</center></ul> --}}
@endsection


@section('tags')
    <!-- Modal -->
    <div class="modal fade" id="myModalTags" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
           {!! Form::open(['url' => 'admin/tags', 'method' => 'POST']) !!}

            {{csrf_field()}}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Agregar etiquetas agropecuarias</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group {{$errors->has('nombre_tags') ? 'has-error' : ''}}">
                        {!! Form::label('nombre_tags','Nombre la etiqueta agropecuaria') !!}
                        {!! Form::text('nombre_tags',null,['class' =>'form-control', 'placeholder' =>'Escriba en nombre de la etiqueta ejemplo: cultivo','required', 'value' => '{old(nombre_tags)}'])!!}
                        {!! $errors->first('nombre_tags','<span class="help-block">:message</span>') !!}
                    </div>

                </div>
                <div class="modal-footer">
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{ Form::submit('Crear Práctica Agricola', ['class' => 'btn btn-primary btn-block']) }}
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
              "ordering": true,
             "info": true,
             "autoWidth": false,
             "pageLength": 10,
             language : {
                 "url": '{!! asset('/adminlte/plugins/datatables/latino.json') !!}'
             },
             ajax: '{!! route('admin.tags.datos.index') !!}',
             headers:{
                 'X-CSRF-TOKEN':'{{csrf_token()}}'
             },
             columns: [
                 { data: 'id', name: 'id'},
                 { data: 'nombre_tags', name: 'nombre_tags' },
                 { data: null, render: function (data, type ,row) {

//                     return  "<td><a href='#' class='btn btn-raised btn-success' role='button'><i class='fa fa-pencil' aria-hidden='true'></i></a></td>"
                        return  '<td>'+
                             '<a href="{{url("admin/tags/edit")}}/'+data.id+'" class="btn btn-raised btn-success" role="button"><i class="fa fa-pencil" aria-hidden="true"></i></a>'+
                             '<form method="POST" action="{{url("admin/tags")}}/'+data.id+'" style="display:inline" >'+
                             '{{ csrf_field() }} {{method_field("DELETE")}}'+
                             '<button class="btn btn-raised btn-danger" onclick="return confirm("Esta seguro de eliminar la práctica")"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>'+
                             '</form>'+
                              '</td>'

                 }},



             ]
         });
     });
 </script>




@endsection