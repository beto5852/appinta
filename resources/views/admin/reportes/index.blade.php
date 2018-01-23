@extends('layouts.admin')

@section('title','<i class="fa fa-list" aria-hidden="true"></i>'.' '.'Lista de usuarios ')


@section('breadcrumb')
    <ul class="breadcrumb" style="margin-bottom: 5px;">
        <li>{!! Breadcrumbs::render('tags') !!}</li>
    </ul>
@endsection


@section('content')

    @if(Session::has('message'))
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{Session::get('message')}}
        </div>
    @endif

    <div class="box box-primary">
        <div class="box-header">

         </div>

        <?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>

        <div  class="row" >
            <div class="col-md-6">
                <label>Año</label>
                <select class="form-control" id="anio_sel"  onchange="cambiar_fecha_grafica();">

                    <?php  echo '<option value="'.$anio.'" >'.$anio.'</option>';   ?>
                    <option value="2015" >2015</option>
                    <option value="2016" >2016</option>
                    <option value="2017" >2017</option>
                    <option value="2018">2018</option>
                    <option value="2019" >2019</option>
                </select>

            </div>

            <div class="col-md-6">
                <label>Mes</label>
                <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" >
                    <?php  echo '<option value="'.$mes.'" >'.$nombremes[intval($mes)].'</option>';   ?>
                    <option value="1">ENERO</option>
                    <option value="2">FEBRERO</option>
                    <option value="3">MARZO</option>
                    <option value="4">ABRIL</option>
                    <option value="5">MAYO</option>
                    <option value="6">JUNIO</option>
                    <option value="7">JULIO</option>
                    <option value="8">AGOSTO</option>
                    <option value="9">SEPTIEMBRE</option>
                    <option value="10">OCTUBRE</option>
                    <option value="11">NOVIEMBRE</option>
                    <option value="12">DICIEMBRE</option>

                </select>

            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                    </div>

                    <div class="box-body" id="div_grafica_barras">
                    </div>

                    <div class="box-footer">
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                    </div>

                    <div class="box-body" id="div_grafica_lineas">
                    </div>

                    <div class="box-footer">
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header">
                    </div>

                    <div class="box-body" id="div_grafica_pie">
                    </div>

                    <div class="box-footer">
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                </div>

                <div class="box-body" id="div_grafica_pie">
                </div>

                <div class="box-footer">
                </div>
            </div>

        </div>

    </div>


        <!-- /.box-header -->
        <div class="box-body">

        {{--@include('admin.reportes.listado_graficas')--}}

        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
    {{-- <ul class="pager"><center>{{ $tags->links() }}</center></ul> --}}
@endsection


@section('script')


    <script>
        cargar_grafica_barras(<?= $anio; ?>,<?= intval($mes); ?>);
        cargar_grafica_lineas(<?= $anio; ?>,<?= intval($mes); ?>);
        cargar_grafica_pie();

        $(function() {
            $('#sexo').highcharts(
                    {{json_encode($chartArray)}}
            )
        });

    </script>





@endsection