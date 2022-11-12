@extends('layouts.app')

@section('htmlheader_title')Bancos
@endsection

@section('content')
    @pageHeader('Bancos.', 'Edición.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('entidadBancariasEdit') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Edición de Bancos
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::model($entidadBancaria, ['route' => ['com.entidadBancarias.update', $entidadBancaria->id,
                                'class' => 'horizontal-form'], 'method' => 'patch']) !!}
                <div class="form-body">
                    @include('com.entidadBancarias.fields')
                </div>
                <div class="clearfix"></div>
                @pageFormActions('new-edit','com.entidadBancarias.index')

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