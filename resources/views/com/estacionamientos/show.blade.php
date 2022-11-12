@extends('layouts.app')
@section('htmlheader_title')Estacionamiento
@endsection

@section('content')
    @pageHeader('Estacionamiento.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('estacionamientosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Estacionamiento
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.estacionamientos.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.estacionamientos.index')
        </div>
    </div>
@endsection
