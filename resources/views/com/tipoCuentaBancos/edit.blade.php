@extends('layouts.app')

@section('htmlheader_title')Tipos de Cuenta Bancaria
@endsection

@section('content')
    @pageHeader('Tipos de Cuenta Bancaria.', 'Edición.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('tipoCuentaBancosEdit') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Edición de Tipo de Cuenta Bancaria
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::model($tipoCuentaBanco, ['route' => ['com.tipoCuentaBancos.update', $tipoCuentaBanco->id,
                                'class' => 'horizontal-form'], 'method' => 'patch']) !!}
                <div class="form-body">
                    @include('com.tipoCuentaBancos.fields')
                </div>
                <div class="clearfix"></div>
                @pageFormActions('new-edit','com.tipoCuentaBancos.index')

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