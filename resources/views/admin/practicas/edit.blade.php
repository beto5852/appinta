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
                        {{ Form::text('nombre_practica',$practica->nombre_practica,['class' =>'form-control', 'placeholder' =>'Nombre practica'])}}
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
                   {{ Form::text('created_at','',['class' => 'form-control pull-rigth', 'id' => 'datepicker','value' => 'old(created_at)'] )}}
               </div>
               <!-- /.input group -->
           </div>

           <div class="box-body">

                 <div class="form-group">
                        {{ Form::label('user','Cambiar editor') }}
                        {{ Form::select('practica_id_usuario',$users,null,['class' => 'form-control chosen-select'])}}
                 </div>

                <div class="form-group">
                    {{ Form::label('tecnologia','Tecnológia') }}
                        {{ Form::select('Ttecnologia_id',$tecnologias,$practica->tecnologia->id,['class' => 'form-control chosen-select'])}}
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
                    
                    <div class="form-group">
                        {{ Form::label('tag_id','Tags') }}
                        {{ Form::select('tag_id[]',$tags,$my_tags,['class'=>'form-control chosen-select', 'multiple','style' => '100%', 'required' ]) }}
                    </div>


               <div class="form-group">
                   <div  class="dropzone">
                 
                   </div>
               </div>


               <div class="form-group text-right">

                   {{ Form::submit('Guardar Práctica Agricola', ['class' => 'btn btn-primary btn-block']) }}

               </div>

           </div>
       </div>

    </div>
    {!! Form::close() !!}
</div>

@endsection


@section('script')

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
        autoclose: true
    });

   new Dropzone('.dropzone',{
        url : '/admin/practicas/fotos',
        dictDefaultMessage: 'Arrastra las fotos aqui para subirlas'
    });

    Dropzone.autoDiscover = false;

</script>
@endsection













