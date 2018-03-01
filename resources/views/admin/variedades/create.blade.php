<!-- Modal -->
<div class="modal fade" id="myModalVariedades" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        {!! Form::open(['url' => 'admin/variedades', 'method' => 'POST']) !!}

        {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar etiquetas agropecuarias</h4>
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
