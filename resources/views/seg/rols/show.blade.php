@extends('layouts.app')

@section('htmlheader_title')Rol
@endsection

@section('content')
    @pageHeader('Rol.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('rolsShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Rol
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('seg.rols.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','seg.rols.index')
        </div>
    </div>
@endsection