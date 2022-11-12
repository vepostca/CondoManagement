@extends('layouts.app')

@section('htmlheader_title')Tipos de Contacto Web
@endsection

@section('content')
    @pageHeader('Tipos de Contacto Web.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('tipoContactoWebsShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Tipos de Contacto Web
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.tipo_contacto_webs.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.tipoContactoWebs.index')

        </div>
    </div>
@endsection