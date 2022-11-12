@extends('layouts.app')
@section('htmlheader_title')Estatus Tarea
@endsection

@section('content')
    @pageHeader('Estatus Tarea.', 'Visualización.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('estatusTareasShow') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Visualización de Estatus Tarea
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div class="form-body">
                @include('com.estatusTareas.show_fields')
            </div>
            <div class="clearfix"></div>
            @pageFormActions('show','com.estatusTareas.index')
        </div>
    </div>
@endsection
