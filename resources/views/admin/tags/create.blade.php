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
                    <div class="form-group">
                        {!! Form::label('nombre_tags','Nombre del Tags') !!}
                        {!! Form::text('nombre_tags',null,['class' =>'form-control', 'placeholder' =>'Nombre','required'])!!}
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