@extends('layouts.app')
@section('htmlheader_title')Propietario
@endsection

@section('content')
    @pageHeader('Propietario.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('propietariosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Propietario
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.propietarios.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.propietarios.index')
        </div>
    </div>
@endsection
