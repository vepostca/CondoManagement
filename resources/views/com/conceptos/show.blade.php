@extends('layouts.app')
@section('htmlheader_title')Conceptos
@endsection

@section('content')
    @pageHeader('Conceptos.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('conceptosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Concepto
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.conceptos.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.conceptos.index')
        </div>
    </div>
@endsection
