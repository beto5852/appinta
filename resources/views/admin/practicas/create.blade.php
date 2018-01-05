@extends('layouts.admin')


@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Crear práctica agricola')

@section('header')
    <section class="content-header">
        <h1>
            Crear Practicas Agricolas
            <small>Agregue la información</small>
        </h1>

    </section>
@endsection

@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('practicas.create') !!}</li>
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
<div class="row">
    {!! Form::open(['url' => 'admin/practicas','method' => 'POST','files'=> 'true','enctype' => 'multipart/form-data']) !!}
    {{csrf_field()}}
    <div class="col-md-8">
        <div class="box box-primary">

            <!--Aqui va el formulario de la practica agricola-->

            <div class="box-body">


                <div class="form-group {{$errors->has('nombre_practica') ? 'has-error' : ''}}" >
                    {{ Form::label('Practica','Tema de la práctica agrícola') }}
                    {{ Form::text('nombre_practica','',['class' => 'form-control','placeholder' => 'Tema aquí...','value' => 'old(nombre_practica)' ]) }}

                    {!! $errors->first('nombre_practica','<span class="help-block">:message</span>') !!}
                 </div>


            </div>


            <div class="form-group {{$errors->has('contenido') ? 'has-error' : ''}}">
                 {{ Form::label('Agregue el contenido','Agregue el contenido') }}
                {{ Form::textarea('contenido',null,['id' => 'my-editor','class' => 'my-editor','value' => 'old(contenido)'])}}
                 {!! $errors->first('contenido','<span class="help-block">:message</span>') !!}
            </div>


        </div>
    </div>
    <div class="col-md-4">
    <div class="box box-primary">
          <div class="box box-body">

             <!-- Date and time range -->


              <div class="form-group">

                {{ Form::label('Fechas de la practica','Fechas de la practica') }}

                <table class="table table-bordered ">
                  <thead>
                   <th>Mes</th>
                   <th>Semana</th>
                   {{--<th><a href="#" class="addRow" id="addRow"><i class="glyphicon glyphicon-plus" aria-hidden="true"></i></a></th>--}}
                  </thead>
                  <tbody>
                    <tr>
                     <td class="col-sm-4">{!! Form::select('mes_id',$meses,null,['class' => 'form-control chosen-select','value' => 'old(mes_id) == $meses->id ? selected :'])!!}</td>
                      <td class="col-sm-5">{!! Form::select('semana_id',$semanas,null,['class' => 'form-control chosen-select','value' => 'old(semana_id) == $semanas->id ? selected :'])!!}</td>
             {{--          <td style="display:inline;"><a href="#" class="btn btn-danger remove" ><i class="fa fa-trash-o" aria-hidden="true" ></a></td> --}}

                    </tr>
                  </tbody>
                </table>

              </div>

           </div>

           <div class="box-body">

                <div class="form-group">
                    {{ Form::label('Tecnologia','Tipo de tecnológia') }}
                    {{ Form::select('tecnologia_id',$tecnologias,null,['class' => 'form-control chosen-select','value' => 'old(tecnologia_id) == $tecnologias->id ? selected :'])}}
                </div>

               <div class="form-group">
                   {{ Form::hidden('user_id',Auth::user()->id,null,['class' => 'form-control'])}}
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


               <div class="form-group text-right">

                   {{ Form::submit('Guardar Práctica Agricola', ['class' => 'btn btn-primary btn-block']) }}

               </div>

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
        format: "dd/mm/yyyy",
        lenguage: 'es',
        autoclose: true,

    });

   var accept = ".png";
   
    new Dropzone('.dropzone',{
        url : '/admin/practicas/{{Auth::user()->id}}/fotos',
//        acceptedFiles : 'image/*',
        maxFilesize: 2,
        paramName: 'foto',
        headers:{
          'X-CSRF-TOKEN':'{{csrf_token()}}'
        },
        dictDefaultMessage: 'Arrastra las fotos aqui para subirlas',

    });

    Dropzone.autoDiscover = false;    

</script>


<script type="text/javascript">
  
 //agregar columnas dinamicas

$(document).ready(function() {
    


 $('.addRow').on('click', function() {
   /* Act on the event */
    addRow();
 });

 function addRow()
 {

             var i = 1;
             var tr='<tr id="row'+i+'">'+
                  '<td style="text-align: center;">'+
                  '{{ Form::select('mes_id[]',$meses,null,['class' => 'form-control chosen-select','value' => 'old(mes_id[]) == $meses->id ? selected :'])}}'+
                  '</td>'+
                  '<td style="text-align: center;">'+
                  '{{ Form::select('semana_id[]',$semanas,null,['class' => 'form-control chosen-select','value' => 'old(semana_id[]) == $semanas->id ? selected :'])}}'+
                  '</td>'+
                  '<td style="display:inline;"><button name="remove" id="'+i+'" class="btn btn-danger btn-remove">X</button></td>'+
                  '</tr>';


       $('tbody').append(tr);            
 }


 $(document).on('click','.btn-remove' ,function() {
   /* Act on the event */
   var button_id= $(this).attr("id");
   $("#row"+button_id+"").remove();

 });

});   
 


</script>


@endsection