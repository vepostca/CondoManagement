@extends('layouts.app')

@section('htmlheader_title')Tipo de Contacto Telefónico
@endsection

@section('content')
    @pageHeader('Tipo Contacto Telefónico.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('tipoTelefonosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Tipo Contacto Telefónico
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.tipo_telefonos.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.tipoTelefonos.index')

        </div>
    </div>
@endsection