@extends('layouts.app')

@section('htmlheader_title')Región
@endsection

@section('content')
    @pageHeader('Región.', 'Edición.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('regionsEdit') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Edición de Región
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::model($region, ['route' => ['com.regions.update', $region->id,
                            'class' => 'horizontal-form'], 'method' => 'patch']) !!}
            <div class="form-body">
                @include('com.regions.fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('new-edit','com.regions.index')

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
            $('#com_pais_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione País"
            });
        });
    </script>
@endsection