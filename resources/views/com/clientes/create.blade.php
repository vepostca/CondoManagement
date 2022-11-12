@extends('layouts.app')

@section('htmlheader_title')Compañía
@endsection

@section('content')
    @pageHeader('Compañía.', 'Nuevo Registro.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('clientesCreate') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Nueva Compañía
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form" style="margin-bottom: 0px">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::open(['route' => 'com.clientes.store','class' => 'horizontal-form']) !!}
            <div class="form-body">
                @include('com.clientes.fields')
                <div class="row">
                    <div class="col-md-12">
                        @include('system.tab_contacto')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        @include('system.fields_email')
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            @pageFormActions('new-edit','com.clientes.index')
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="{{ asset('/assets/global/plugins/SheepIt/jquery.sheepItPlugin-1.1.1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/opciones_contacto.js') }}" type="text/javascript"></script>
    <script language="JavaScript">
        var formDireccion = {};
        var formTelefono = {};
        var formContactoWeb = {};
        var nDirs = {{ $nDirs }};
        //var opcionesDir = getOpcionesSheepIt(3,1,{{ $nDirs }});


        var opciones_direccion ={
            separator: "", allowRemoveLast: true, allowRemoveCurrent: true, allowRemoveAll: true, allowAdd: true,
            allowAddN: false, maxFormsCount: 3, minFormsCount: 1, iniFormsCount: nDirs, continuousIndex: true,

            removeLastConfirmation: true, removeCurrentConfirmation: true, removeAllConfirmation: true,
            removeLastConfirmationMsg: '¿Está Seguro?',
            removeCurrentConfirmationMsg: '¿Está Seguro?',
            removeAllConfirmationMsg: '¿¿Está Seguro?',
            afterAdd: function(source, newForm) {
                initSelect2Direccion(newForm,"{{ url('com/regiones_json') }}");
            },
            beforeAdd: function(source) {
                return false;
            },
            beforeClone: function(source, template) {
                return false;
            }
        };

        var opciones_telefono ={
            separator: "", allowRemoveLast: true, allowRemoveCurrent: true, allowRemoveAll: true, allowAdd: true,
            allowAddN: false, maxFormsCount: 3, minFormsCount: 1, iniFormsCount: {{ $nTelfs }}, continuousIndex: true,

            removeLastConfirmation: true, removeCurrentConfirmation: true, removeAllConfirmation: true,
            removeLastConfirmationMsg: '¿Está Seguro?',
            removeCurrentConfirmationMsg: '¿Está Seguro?',
            removeAllConfirmationMsg: '¿¿Está Seguro?',
            afterAdd: function(source, newForm) {
                initSelect2Telefono(newForm);
            },
            beforeAdd: function(source) {
                return false;
            },
            beforeClone: function(source, template) {
                return false;
            }
        };

        var opciones_contacto_web ={
            separator: "", allowRemoveLast: true, allowRemoveCurrent: true, allowRemoveAll: true, allowAdd: true,
            allowAddN: false, maxFormsCount: 6, minFormsCount: 1, iniFormsCount: {{ $nWebs }}, continuousIndex: true,

            removeLastConfirmation: true, removeCurrentConfirmation: true, removeAllConfirmation: true,
            removeLastConfirmationMsg: '¿Está Seguro?',
            removeCurrentConfirmationMsg: '¿Está Seguro?',
            removeAllConfirmationMsg: '¿¿Está Seguro?',
            afterAdd: function(source, newForm) {
                initSelect2Web(newForm);
            },
            beforeAdd: function(source) {
                return false;
            },
            beforeClone: function(source, template) {
                return false;
            }
        };

        $(document).ready(function() {
            formDireccion = $('#formDireccion').sheepIt(opciones_direccion);
            formTelefono = $('#formTelefono').sheepIt(opciones_telefono);
            formContactoWeb = $('#formContactoWeb').sheepIt(opciones_contacto_web);
        });

    </script>
@endsection