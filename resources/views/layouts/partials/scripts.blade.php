<!--[if lt IE 9]>
<script src="{{ asset('assets/global/plugins/respond.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/excanvas.min.js') }}"></script>
<![endif]-->

{{-- BEGIN CORE PLUGINS --}}
<script src="{{ asset('assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/select2/i18n/es.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/global/plugins/bootstrap-toggle/js/bootstrap2-toggle.min.js') }}" type="text/javascript"></script>

{{-- END CORE PLUGINS --}}

{{-- BEGIN PAGE LEVEL PLUGINS --}}
@yield("page_level_plugin_scripts")
{{-- END PAGE LEVEL PLUGINS --}}
{{-- BEGIN THEME GLOBAL SCRIPTS --}}
<script src="{{ asset('assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/select2-cascade.js') }}" type="text/javascript"></script>
{{-- END THEME GLOBAL SCRIPTS --}}

{{-- BEGIN PAGE LEVEL SCRIPTS --}}
@yield("page_level_scripts")
{{-- END PAGE LEVEL SCRIPTS --}}

{{-- BEGIN THEME LAYOUT SCRIPTS --}}
<script src="{{ asset('assets/layouts/layout2/scripts/layout.min.js') }}" type="text/javascript"></script>
{{-- END THEME LAYOUT SCRIPTS --}}

<script src="{{ asset('assets/global/plugins/DataTables-1.10.12/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/global/plugins/DataTables-1.10.12/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/buttons_datatable.js') }}"></script>

@yield('datatable_scripts')


