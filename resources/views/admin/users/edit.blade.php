@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Usuario')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('users.edit') !!}</li>
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
        
          <!--Aqui va el formulario de la practica agricola-->
        {!! Form::open(['url' => ['admin/users',$user], 'method' => 'PUT','files'=> 'true','enctype' => 'multipart/form-data']) !!}

        <div class="col-md-8">
            <div class="box box-primary">
               <div class="box-body">
                    <div class="form-group">
                        {{ Form::label('name','Nombre') }}
                        {{ Form::text('name',$user->name,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])}}
                    </div>

                    <div class="form-group">
                        {{ Form::label('email','Correo electrónico') }}
                        {{ Form::email('email',$user->email,['class' =>'form-control', 'placeholder' =>'example@gmail.com','required'])}}
                    </div>
                    <div class="form-group">
                        {{ Form::label('password','Contraseña') }}
                        {{ Form::password('password',['class' =>'form-control', 'placeholder' =>'**************','required']) }}
                    </div>
                    <div class="form-group">
                        {{form::label('notas','Acerca de mi:') }}
                        {{ Form::text('notas',$user->notas,['id' => 'my-editor','class' => 'my-editor', 'placeholder' =>'Describete para conocerte'])}}
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="box box-primary">
                <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('telefono','Telefono') !!}
                        {!! Form::text('telefono',$user->telefono,['class' =>'form-control', 'placeholder' =>'+505-9999-9999'])!!}
                        </div>

                        <div class="form-group">
                             {!! Form::label('sexo','Sexo') !!}
                        {!! Form::select('sexo',['' => 'Seleccione una opción' , 'masculino' => 'mascúlino', 'femenino' => 'femenino'],$user->sexo,['class' => 'form-control chosen-select']) !!}
                        </div>
                        <div class="form-group">
                              {{ Form::label('type','Tipo de usuario') }}
                            {{ Form::select('type',['' => 'Seleccione tipo de usuario' , 'miembro' => 'miembro', 'admin' => 'admin'],$user->type,['class' => 'form-control chosen-select'])}}
                        </div>

                        <div class="form-group">
                            {!! Form::label('ocupacion','Ocupación') !!}
                            {!! Form::text('ocupacion',$user->ocupacion,['class' =>'form-control', 'placeholder' =>'Nombre Completo']) !!}
                        </div>
                        <div class="form-group">
                             {{ Form::label('pais','Pais') }}
                             {{ Form::text('pais',$user->pais,['class' =>'form-control', 'placeholder' =>'Nombre Completo'])}}
                           
                         </div>

                        @if(empty(Auth::user()->perfil))
                            @if(Auth::user()->sexo == 'masculino')
                                <img src="{{asset('img/user_masculino.jpg')}}" alt="" style="width: 100px;" />
                            @elseif(Auth::user()->sexo == 'femenino')
                                <img src="{{asset('img/user_femenino.jpg')}}" alt="" style="width: 100px;" />
                             @endif
                       @else
                       <img src="{{asset('img/'.$user->perfil)}}" alt="" style="width: 100px;" />
                       @endif
                    <div class="form-group">
                        {{ Form::label('imagen','Imagen de perfil') }}
                        {{ Form::file('perfil')}}
                    </div>


                    <div class="form-group text-right">

                        {{ Form::submit('Actualizar Registro', ['class' => 'btn btn-primary btn-block']) }}
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
        lenguage:'esp', 
        autoclose: true
    });
</script>
@endsection