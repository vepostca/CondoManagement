@extends('layouts.app')
@section('htmlheader_title')Control de Proveedores
@endsection

@section('content')
    @pageHeader('Control de Proveedores.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('proveedorsShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Proveedor
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('pro.proveedors.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','pro.proveedors.index')
        </div>
    </div>
@endsection
