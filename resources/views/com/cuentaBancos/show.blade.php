@extends('layouts.app')
@section('htmlheader_title')Gestión de Cuentas
@endsection

@section('content')
    @pageHeader('Gestión de Cuentas.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('cuentaBancosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Cuenta
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.cuentaBancos.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.cuentaBancos.index')
        </div>
    </div>
@endsection
