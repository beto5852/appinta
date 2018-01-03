@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Editar Usuario')

@section('css')

        <!-- daterange picker -->
<link rel="stylesheet" href="{{asset('/adminlte/plugins/daterangepicker/daterangepicker.css')}}">
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="{{asset('/adminlte/plugins/datepicker/datepicker3.css')}}">
<!-- Bootstrap Color Picker -->
<link rel="stylesheet" href="{{asset('/adminlte/plugins/colorpicker/bootstrap-colorpicker.min.css')}}">
<!-- Bootstrap time Picker -->
<link rel="stylesheet" href="{{asset('/adminlte/plugins/timepicker/bootstrap-timepicker.min.css')}}">

@endsection

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
                       {!! Form::label('nacimiento','Fecha de nacimiento') !!}

                       <div class="input-group date">
                           <div class="input-group-addon">
                               <i class="fa fa-calendar"></i>
                           </div>
                           @if(empty($user->nacimiento))

                           {!! Form::text('nacimiento',null,['class' =>'form-control pull-rigth datepicker','id' => 'datepicker', 'placeholder' =>''])!!}

                           @else

                           {!! Form::text('nacimiento',$user->nacimiento,['class' =>'form-control pull-rigth datepicker','id' => 'datepicker', 'placeholder' =>''])!!}

                            @endif

                       </div>
                       <!-- /.input group -->
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


        <!-- bootstrap color picker -->
    <script src="{{asset('/adminlte/plugins/colorpicker/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('/adminlte/plugins/daterangepicker/daterangepicker.js')}}"></script>

    <!-- bootstrap datepicker -->
    <script src="{{asset('/adminlte/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

    <!-- bootstrap time picker -->
    <script src="{{asset('/adminlte/plugins/timepicker/bootstrap-timepicker.min.js')}}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{asset('/adminlte/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>

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


        $('.datepicker').datepicker({
              autoclose: true
        });

    </script>

@endsection