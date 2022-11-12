@extends('layouts.app')

@section('htmlheader_title')Tipos de Cálculo de Cuotas
@endsection

@section('content')
    @pageHeader('Tipos de Cálculo de Cuotas.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('tipoCalculoCuotasShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Tipos de Cálculo de Cuotas
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.tipo_calculo_cuotas.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.tipoCalculoCuotas.index')

        </div>
    </div>
@endsection