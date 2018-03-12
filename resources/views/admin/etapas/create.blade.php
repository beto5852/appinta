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
                    {{ Form::label('nombre_etapa','Nombre de la etapa agricola') }}
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
