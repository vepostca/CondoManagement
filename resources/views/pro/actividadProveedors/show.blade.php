@extends('layouts.app')
@section('htmlheader_title')Actividad Proveedor
@endsection

@section('content')
    @pageHeader('Actividad Proveedor.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('actividadProveedorsShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Actividad Proveedor
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('pro.actividadProveedors.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','pro.actividadProveedors.index')
        </div>
    </div>
@endsection
