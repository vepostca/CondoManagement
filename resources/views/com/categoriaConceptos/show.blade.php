@extends('layouts.app')
@section('htmlheader_title')Categorías Concepto
@endsection

@section('content')
    @pageHeader('Categorías Concepto.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('categoriaConceptosShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Categorías Concepto
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.categoriaConceptos.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.categoriaConceptos.index')
        </div>
    </div>
@endsection
