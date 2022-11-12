@extends('layouts.app')

@section('htmlheader_title')Tipos de Dirección
@endsection

@section('content')
    @pageHeader('Tipos de Dirección.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('tipoDireccionsShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Tipos de Dirección
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.tipo_direccions.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.tipoDireccions.index')

        </div>
    </div>
@endsection