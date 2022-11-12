@extends('layouts.app')

@section('htmlheader_title')Región
@endsection

@section('content')
    @pageHeader('Región.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('regionsShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Región
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.regions.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.regions.index')

        </div>
    </div>
@endsection
