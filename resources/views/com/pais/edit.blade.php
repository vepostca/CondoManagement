@extends('layouts.app')

@section('htmlheader_title')País
@endsection

@section('content')
    @pageHeader('País.', 'Edición.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('paisEdit') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Edición de País
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::model($pais, ['route' => ['com.pais.update', $pais->id,
                            'class' => 'horizontal-form'], 'method' => 'patch']) !!}
            <div class="form-body">
                @include('com.pais.fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('new-edit','com.pais.index')

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