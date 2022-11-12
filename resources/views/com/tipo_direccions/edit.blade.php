@extends('layouts.app')

@section('htmlheader_title')Tipos de Dirección
@endsection

@section('content')
    @pageHeader('Tipos de Dirección.', 'Edición.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('tipoDireccionsEdit') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Edición de Tipo de Dirección
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::model($tipoDireccion, ['route' => ['com.tipoDireccions.update', $tipoDireccion->id,
                            'class' => 'horizontal-form'], 'method' => 'patch']) !!}
            <div class="form-body">
                @include('com.tipo_direccions.fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('new-edit','com.tipoDireccions.index')

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