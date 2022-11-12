@extends('layouts.app')

@section('htmlheader_title')Instalación
@endsection
@section('other_css')
    <link href="{{ asset('assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('content')
    @pageHeader('Instalación.', 'Nuevo Registro.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('instalacionsCreate') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-thumb-tack"></i>Nueva Instalación
                </div>
                <div class="tools">
                    <a href="javascript:;" class="collapse"> </a>
                    <a href="" class="fullscreen"> </a>
                </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
                {!! Form::open(['route' => 'com.instalacions.store','class' => 'horizontal-form']) !!}
                    <div class="form-body">
                        @include('com.instalacions.fields')
                    </div>
                    <div class="clearfix"></div>
                    @pageFormActions('new-edit','com.instalacions.index')
                {!! Form::close() !!}
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script src="{{ asset('assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script language="JavaScript">

        var handleTimePickers = function () {
            if (jQuery().timepicker) {
                $('#hora_inicio').timepicker({
                    autoclose: true,
                    minuteStep: 5,
                    defaultTime: {!! old('hora_inicio',"'12:00 AM'") !!}
                });
                $('#hora_fin').timepicker({
                    autoclose: true,
                    minuteStep: 5,
                    defaultTime: {!! old('hora_fin',"'11:59 PM'") !!}
                });
                // handle input group button click
                $('.timepicker').parent('.input-group').on('click', '.input-group-btn', function(e){
                    e.preventDefault();
                    $(this).parent('.input-group').find('.timepicker').timepicker('showWidget');
                });
            }
        }

        $(document).ready(function() {
            $('#com_cliente_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Compañía"
            });
            $('#com_org_id').select2({
                language: "es", allowClear: true, placeholder: "Seleccione Condominio"
            });
            $('#com_fondo_id').select2({
                language: "es",
                allowClear: true, placeholder: "Seleccione Fondo"
            });
            handleTimePickers();
        });




    </script>
@endsection
