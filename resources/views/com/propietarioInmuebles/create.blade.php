@extends('layouts.app')

@section('htmlheader_title')Asignación de Inmuebles y Propietarios
@endsection

@section('content')
    @pageHeader('Asignación de Inmuebles y Propietarios.', 'Nuevo Registro.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('propietarioInmueblesCreate') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-thumb-tack"></i>Nueva Asignación de Inmueble y Propietario
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
                {!! Form::open(['route' => 'com.propietarioInmuebles.store','class' => 'horizontal-form']) !!}
                    <div class="form-body">
                        @include('com.propietarioInmuebles.fields')
                    </div>
                    <div class="clearfix"></div>
                    @pageFormActions('new-edit','com.propietarioInmuebles.index')
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
            $('#com_propietario_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Propietario"
            });
            $('#com_tipo_propietario_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Tipo"
            });
        });
    </script>
@endsection
