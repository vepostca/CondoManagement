@extends('layouts.app')

@section('htmlheader_title')Tipos de Inmueble
@endsection

@section('content')
    @pageHeader('Tipos de Inmueble.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('tipoInmueblesShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Tipos de Inmueble
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.tipo_inmuebles.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.tipoInmuebles.index')

        </div>
    </div>
@endsection