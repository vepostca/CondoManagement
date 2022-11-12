@extends('layouts.app')

@section('htmlheader_title')Inmueble
@endsection

@section('content')
    @pageHeader('Inmueble.', 'Nuevo Registro.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('inmueblesCreate') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Nuevo Inmueble
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::open(['route' => 'com.inmuebles.store','class' => 'horizontal-form']) !!}
            <div class="form-body">
                @include('com.inmuebles.fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('new-edit','com.inmuebles.index')

            {!! Form::close() !!}
        </div>
    </div>

@endsection
@section('scripts')
    @parent
    <script src="{{ asset('/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js') }}" type="text/javascript"></script>
    <script language="JavaScript">
        $(document).ready(function() {
            $("#coeficiente").inputmask('decimal', {
                numericInput: true,
                rightAlignNumerics: true,
                greedy: false,
                min: 0, max: 100,
                digitsOptional: false,
                decimalProtect: true
            });
            $("#area").inputmask('9{0,3}[.]9{0,2}', {
                numericInput: true,
                rightAlignNumerics: true,
                greedy: false
            });
            $('#com_cliente_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Compañía"
            });
            $('#com_org_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Condominio"
            });
            $('#com_division_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione División"
            });
            $('#com_tipo_inmueble_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Tipo de Inmueble"
            });
        });
    </script>
@endsection