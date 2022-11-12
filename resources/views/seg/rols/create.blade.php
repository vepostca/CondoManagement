@extends('layouts.app')

@section('htmlheader_title')Roles
@endsection

@section('content')
    @pageHeader('Roles.', 'Nuevo Registro.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('rolsCreate') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Nuevo Rol
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::open(['route' => 'seg.rols.store','class' => 'horizontal-form']) !!}
            <div class="form-body">
                @include('seg.rols.fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('new-edit','seg.rols.index')
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