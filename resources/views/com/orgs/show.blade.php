@extends('layouts.app')

@section('htmlheader_title')Condominios
@endsection

@section('content')
    @pageHeader('Condominio.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('orgsShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Condominio
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.orgs.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.orgs.index')

        </div>
    </div>
@endsection

