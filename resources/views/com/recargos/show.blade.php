@extends('layouts.app')
@section('htmlheader_title')Recargos
@endsection

@section('content')
    @pageHeader('Recargo.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('recargosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Recargo
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.recargos.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.recargos.index')
        </div>
    </div>
@endsection
