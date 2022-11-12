@extends('layouts.app')

@section('htmlheader_title')Control de Proveedores
@endsection

@section('content')
    @pageHeader('Control de Proveedores.', 'Edición.', 'fa fa-angle-double-right')
    {!! Breadcrumbs::render('proveedorsEdit') !!}

    <div class="portlet box blue-hoki">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-thumb-tack"></i>Edición de Proveedor
            </div>
            <div class="tools">
                <a href="javascript:;" class="collapse"> </a>
                <a href="" class="fullscreen"> </a>
            </div>
        </div>

        <div class="portlet-body form">
            <div>@include('metronic-templates::common.errors')</div>
            {!! Form::model($proveedor, ['route' => ['pro.proveedors.update', $proveedor->id,
                                'class' => 'horizontal-form'], 'method' => 'patch']) !!}
                <div class="form-body">
                    @include('pro.proveedors.fields')
                    <div class="row">
                        <div class="col-md-12">
                            @include('system.tab_contacto')
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                @pageFormActions('new-edit','pro.proveedors.index')

            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('scripts')
    @parent
    <script src="{{ asset('/assets/global/plugins/SheepIt/jquery.sheepItPlugin-1.1.1.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/js/opciones_contacto.js') }}" type="text/javascript"></script>
    <script language="JavaScript">
        var formContactoWeb;
        var formDireccion;
        var formTelefono;
        var opciones_direccion ={
            separator: "", allowRemoveLast: true, allowRemoveCurrent: true, allowRemoveAll: true, allowAdd: true,
            allowAddN: false, maxFormsCount: 3, minFormsCount: 1, iniFormsCount: {{ $nDirs }}, continuousIndex: true,

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
            allowAddN: false, maxFormsCount: 3, minFormsCount: 1, iniFormsCount: {{ $nWebs }}, continuousIndex: true,

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
            $(document).ready(function() {
                $('#com_cliente_id').select2({
                    language: "es", allowClear: true, placeholder: "Seleccione Compañía"
                });
                $('#com_org_id').select2({
                    language: "es", allowClear: true, placeholder: "Seleccione Condominio"
                });
                $('#pro_actividad_proveedor_id').select2({
                    language: "es", allowClear: true, placeholder: "Seleccione Actividad"
                });
            });
            formDireccion = $('#formDireccion').sheepIt(opciones_direccion);
            formTelefono = $('#formTelefono').sheepIt(opciones_telefono);
            formContactoWeb = $('#formContactoWeb').sheepIt(opciones_contacto_web);
            formDireccion.inject({!! $dirs !!});
            formContactoWeb.inject({!! $webs !!});
            formTelefono.inject({!! $telfs !!});

        });
    </script>
@endsection