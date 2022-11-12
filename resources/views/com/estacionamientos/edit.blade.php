@extends('layouts.app')

@section('htmlheader_title')Estacionamiento
@endsection

@section('content')
    @pageHeader('Estacionamiento.', 'Edición.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('estacionamientosEdit') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Edición de Estacionamiento
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::model($estacionamiento, ['route' => ['com.estacionamientos.update', $estacionamiento->id,
                                'class' => 'horizontal-form'], 'method' => 'patch']) !!}
                <div class="form-body">
                    @include('com.estacionamientos.fields')
                </div>
                <div class="clearfix"></div>
                @pageFormActions('new-edit','com.estacionamientos.index')

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script language="JavaScript">
        $(document).ready(function() {
            $('#com_cliente_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Compañía"
            });
            $('#com_org_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Condominio"
            });
            $('#com_inmueble_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Inmueble"
            });
        });
    </script>
@endsection