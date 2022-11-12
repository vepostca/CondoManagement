@extends('layouts.app')

@section('htmlheader_title')Gestión de Cuentas
@endsection

@section('content')
    @pageHeader('Gestión de Cuentas.', 'Edición.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('cuentaBancosEdit') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Edición de Cuenta
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::model($cuentaBanco, ['route' => ['com.cuentaBancos.update', $cuentaBanco->id,
                                'class' => 'horizontal-form'], 'method' => 'patch']) !!}
                <div class="form-body">
                    @include('com.cuentaBancos.fields')
                </div>
                <div class="clearfix"></div>
                @pageFormActions('new-edit','com.cuentaBancos.index')

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
            $('#com_tipo_cuenta_banco_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Tipo de Cuenta"
            });
            $('#com_entidad_bancaria_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Banco"
            });
        });
    </script>
@endsection