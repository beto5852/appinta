<!-- Modal -->
<div class="modal fade" id="myModalCultivos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        {!! Form::open(['url' => 'admin/cultivos', 'method' => 'POST']) !!}

        {{csrf_field()}}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Agregar etiquetas agropecuarias</h4>
            </div>
            <div class="modal-body">
                <div class="form-group {{$errors->has('nombre_cultivo') ? 'has-error' : ''}}">
                    {!! Form::label('nombre_cultivo','Nombre del cultivo') !!}
                    {!! Form::text('nombre_cultivo',null,['class' =>'form-control', 'placeholder' =>'Nombre Completo','required'])!!}
                </div>

                <div class="form-group">
                    {!! Form::label('descripcion_cultivo','Descripción de la tecnológia') !!}
                    {!! Form::textarea('descripcion_cultivo',null,['id' => 'my-editor','class' => 'my-editor','value' => 'old(descripcion_cultivo)'])!!}
                </div>


            </div>
            <div class="modal-footer">
                {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                { Form::submit('Guardar Cultivo', ['class' => 'btn btn-primary btn-block']) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>

</div>

