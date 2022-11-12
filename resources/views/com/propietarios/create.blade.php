@extends('layouts.app')

@section('htmlheader_title')Propietario
@endsection

@section('content')
    @pageHeader('Propietario.', 'Nuevo Registro.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('propietariosCreate') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-thumb-tack"></i>Nuevo Propietario
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
                {!! Form::open(['route' => 'com.propietarios.store','class' => 'horizontal-form']) !!}
                    <div class="form-body">
                        @include('com.propietarios.fields')
                    </div>
                    <div class="clearfix"></div>
                    @pageFormActions('new-edit','com.propietarios.index')
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
            $('#com_tipo_propietario_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Tipo"
            });
        });
    </script>
@endsection
