@extends('layouts.app')

@section('htmlheader_title')Permiso
@endsection

@section('content')
    @pageHeader('Permiso.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('permisosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Permiso
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('seg.permisos.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','seg.permisos.index')
        </div>
    </div>
@endsection
