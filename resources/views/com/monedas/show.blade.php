@extends('layouts.app')

@section('htmlheader_title')Moneda
@endsection

@section('content')
    @pageHeader('Moneda.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('monedasShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Moneda
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.monedas.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.monedas.index')

        </div>
    </div>
@endsection