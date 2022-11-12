@extends('layouts.app')
@section('htmlheader_title')Tipos de Cuenta Bancaria
@endsection

@section('content')
    @pageHeader('Tipos de Cuenta Bancaria.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('tipoCuentaBancosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Tipo de Cuenta Bancaria
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.tipoCuentaBancos.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.tipoCuentaBancos.index')
        </div>
    </div>
@endsection
