@extends('layouts.app')

@section('htmlheader_title')Parámetros Condominio
@endsection

@section('content')
    @pageHeader('Parámetros Condominio.', 'Edición.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('orgInfosEdit',$orgInfo->id) !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Edición de Parámetros Condominio
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::model($orgInfo, ['route' => ['com.orgInfos.update', $orgInfo->id,
                                'class' => 'horizontal-form'], 'method' => 'patch']) !!}
            <div class="form-body">
                @include('com.org_infos.fields')
            </div>
            <div class="clearfix"></div>
            {{--@pageFormActions('new-edit','com.orgInfos.show')--}}
            <div class="form-actions" style="padding: 10px;">
                <div class="col-sm-12">
                    <button type="submit" class="btn blue-hoki">
                        <i class="fa fa-check"></i> Grabar
                    </button>

                    <a href="{!! route('com.orgInfos.show',$orgInfo->id) !!}"
                       class="btn blue-hoki btn-outline">
                        <i class="fa fa-undo"></i> Cancelar</a>
                </div>
            </div>

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
            $('#com_moneda_id').select2({
                language: "es", allowClear: false, placeholder: "Seleccione Moneda"
            });
            $('#com_tipo_calculo_cuota_id').select2({
                language: "es", allowClear: false, placeholder: "Seleccione Tipo"
            });
        });
    </script>
@endsection