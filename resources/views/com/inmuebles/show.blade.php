@extends('layouts.app')

@section('htmlheader_title')Inmueble
@endsection

@section('content')
    @pageHeader('Inmueble.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('inmueblesShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Inmueble
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.inmuebles.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.inmuebles.index')

        </div>
    </div>
@endsection