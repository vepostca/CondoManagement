@extends('layouts.app')

@section('htmlheader_title')División
@endsection

@section('content')
    @pageHeader('División.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('divisionsShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de División
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.divisions.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.divisions.index')

        </div>
    </div>
@endsection
