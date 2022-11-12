@extends('layouts.app')

@section('htmlheader_title')País
@endsection

@section('content')
    @pageHeader('País.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('paisShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de País
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.pais.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.pais.index')

        </div>
    </div>
@endsection