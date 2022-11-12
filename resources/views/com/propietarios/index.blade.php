@extends('layouts.app')

@section('htmlheader_title')Propietarios
@endsection

@section('content')
    @pageHeader('Propietarios.', 'Lista de Registros.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('propietarios') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Lista de Propietarios
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
            <div class="actions">
                <a href="{!! route('com.propietarios.create') !!}" class="btn white btn-lg">
                    <i class="fa fa-plus"></i> <b>NUEVO</b> </a>

                <div class="btn-group">
                    <a class="btn blue-hoki btn-lg" href="javascript:;" data-toggle="dropdown">
                        <i class="icon-settings"></i>
                        <span class="hidden-xs"> <b>Opciones</b></span>
                        <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu pull-right" id="datatable_index_tools">
                        <li>
                            <a href="javascript:;" data-action="0" class="tool-action">
                                <i class="fa fa-print"></i> Imprimir</a>
                        </li>

                        <li>
                            <a href="javascript:;" data-action="1" class="tool-action">
                                <i class="fa fa-file-pdf-o"></i> PDF</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-action="2" class="tool-action">
                                <i class="fa fa-file-excel-o"></i> Excel</a>
                        </li>
                        <li>
                            <a href="javascript:;" data-action="3" class="tool-action">
                                <i class="fa fa-file-text-o"></i> CSV</a>
                        </li>
                        <li class="divider"> </li>
                        <li>
                            <a href="javascript:;" data-action="4" class="tool-action">
                                <i class="fa fa-refresh"></i> Recargar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="portlet-body">
            @include('flash::message')
            {{--<div class="clearfix"></div>--}}
            @include('com.propietarios.table')
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection