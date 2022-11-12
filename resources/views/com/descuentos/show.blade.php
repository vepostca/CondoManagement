@extends('layouts.app')
@section('htmlheader_title')Descuento
@endsection

@section('content')
    @pageHeader('Descuento.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('descuentosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Descuento
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.descuentos.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.descuentos.index')
        </div>
    </div>
@endsection
