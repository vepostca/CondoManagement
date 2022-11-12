@extends('layouts.app')

@section('htmlheader_title')Tipo de Contacto Telefónico
@endsection

@section('content')
    @pageHeader('Tipo Contacto Telefónico.', 'Nuevo Registro.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('tipoTelefonosCreate') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Nuevo Tipo Contacto Telefónico
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::open(['route' => 'com.tipoTelefonos.store','class' => 'horizontal-form']) !!}
                <div class="form-body">
                    @include('com.tipo_telefonos.fields')
                </div>
                <div class="clearfix"></div>
                @pageFormActions('new-edit','com.tipoTelefonos.index')
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
        });
    </script>
@endsection