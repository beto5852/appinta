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
                    {{ Form::label('nombre_tecnologia','Nombre de la tecnológia') }}
                    {{ Form::text('nombre_tecnologia',null,['class' =>'form-control', 'placeholder' =>'Nombre de la tecnológia','required'])}}
                    {!! $errors->first('nombre_tecnologia','<span class="help-block">:message</span>') !!}
                </div>

            </div>
            <div class="modal-footer">
                {{ Form::submit('Guardar Tecnológia', ['class' => 'btn btn-primary btn-block']) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>

</div>
