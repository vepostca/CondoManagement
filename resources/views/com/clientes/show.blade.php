@extends('layouts.app')

@section('htmlheader_title')Compañías
@endsection

@section('content')
    @pageHeader('Compañía.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('clientesShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Compañías
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.clientes.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.clientes.index')

        </div>
    </div>
@endsection
