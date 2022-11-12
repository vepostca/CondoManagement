@extends('layouts.app')
@section('htmlheader_title')Bancos
@endsection

@section('content')
    @pageHeader('Bancos.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('entidadBancariasShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Banco
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.entidadBancarias.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.entidadBancarias.index')
        </div>
    </div>
@endsection
