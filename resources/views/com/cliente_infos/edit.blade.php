@extends('layouts.app')

@section('htmlheader_title')Parámetros Compañía
@endsection

@section('content')
    @pageHeader('Parámetros Compañía.', 'Edición.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('clienteInfosEdit',$clienteInfo->id) !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Edición de Parámetros Compañía
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::model($orgInfo, ['route' => ['com.clienteInfos.update', $orgInfo->id,
                                'class' => 'horizontal-form'], 'method' => 'patch']) !!}
            <div class="form-body">
                @include('com.cliente_infos.fields')
            </div>
            <div class="clearfix"></div>
            {{--@pageFormActions('new-edit','com.orgInfos.show')--}}
            <div class="form-actions" style="padding: 10px;">
                <div class="col-sm-12">
                    <button type="submit" class="btn blue-hoki">
                        <i class="fa fa-check"></i> Grabar
                    </button>

                    <a href="{!! route('com.clienteInfos.show',$clienteInfo->id) !!}"
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
            $('#com_org_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Condominio"
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