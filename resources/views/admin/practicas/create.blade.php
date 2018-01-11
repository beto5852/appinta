<!-- Modal -->
<div class="modal fade" id="myModalPracticas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        {!! Form::open(['url' => 'admin/practicas','method' => 'POST','files'=> 'true','enctype' => 'multipart/form-data']) !!}
        {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Crear práctica</h4>
            </div>
            <div class="modal-body">


                <div class="form-group {{$errors->has('nombre_practica') ? 'has-error' : ''}}" >
                    {{ Form::label('Practica','Tema de la práctica agrícola') }}
                    {{ Form::text('nombre_practica','',['class' => 'form-control','placeholder' => 'Tema aquí...','value' => 'old(nombre_practica)' ]) }}

                    {!! $errors->first('nombre_practica','<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                    {{ Form::hidden('user_id',Auth::user()->id,null,['class' => 'form-control'])}}
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