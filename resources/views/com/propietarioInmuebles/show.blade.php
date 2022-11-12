@extends('layouts.app')
@section('htmlheader_title')Asignación de Propietario e Inmueble
@endsection

@section('content')
    @pageHeader('Asignación de Inmuebles y Propietarios.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('propietarioInmueblesShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Asignación de Inmuebles y Propietarios
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.propietarioInmuebles.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.propietarioInmuebles.index')
        </div>
    </div>
@endsection
