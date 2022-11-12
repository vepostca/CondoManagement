@extends('layouts.app')
@section('htmlheader_title')Forma de Pago
@endsection

@section('content')
    @pageHeader('Forma de Pago.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('formaPagosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Forma de Pago
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.formaPagos.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.formaPagos.index')
        </div>
    </div>
@endsection
