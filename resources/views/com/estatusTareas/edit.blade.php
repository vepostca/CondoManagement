@extends('layouts.app')

@section('htmlheader_title')Estatus Tarea
@endsection

@section('content')
    @pageHeader('Estatus Tarea.', 'Edición.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('estatusTareasEdit') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Edición de Estatus Tarea
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::model($estatusTarea, ['route' => ['com.estatusTareas.update', $estatusTarea->id,
                                'class' => 'horizontal-form'], 'method' => 'patch']) !!}
                <div class="form-body">
                    @include('com.estatusTareas.fields')
                </div>
                <div class="clearfix"></div>
                @pageFormActions('new-edit','com.estatusTareas.index')

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