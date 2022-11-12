@extends('layouts.app')
@section('htmlheader_title')Instalación
@endsection

@section('content')
    @pageHeader('Instalación.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('instalacionsShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Instalación
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.instalacions.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.instalacions.index')
        </div>
    </div>
@endsection
