@extends('layouts.app')
@section('htmlheader_title')Fondo
@endsection

@section('content')
    @pageHeader('Fondos.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('fondosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Fondo
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.fondos.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.fondos.index')
        </div>
    </div>
@endsection
